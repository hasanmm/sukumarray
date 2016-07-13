<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2003 - 2015, EllisLab, Inc.
 * @license		http://ellislab.com/expressionengine/user-guide/license.html
 * @link		http://ellislab.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * ExpressionEngine Plugin Administration Class
 *
 * @package		ExpressionEngine
 * @subpackage	Control Panel
 * @category	Control Panel
 * @author		EllisLab Dev Team
 * @link		http://ellislab.com
 */
class Addons_plugins extends CP_Controller {

	var $paths = array();

	/**
	 * Constructor
	 *
	 * @access	public
	 */
	function __construct()
	{
		parent::__construct();

		if ( ! $this->cp->allowed_group('can_access_addons', 'can_access_plugins'))
		{
			show_error(lang('unauthorized_access'));
		}

		$this->lang->loadfile('admin');
	}

	// --------------------------------------------------------------------

	/**
	 * Plugin Homepage
	 *
	 * @access	public
	 * @return	void
	 */
	function index()
	{
		$this->load->library('table');

		$this->view->cp_page_title = lang('plugins');
		$this->cp->set_breadcrumb(BASE.AMP.'C=addons', lang('addons'));

		$this->jquery->tablesorter('.mainTable', '{
			headers: {2: {sorter: false}},
			widgets: ["zebra"]
		}');

		$this->javascript->compile();

		// Grab the data
		$plugins = $this->_get_installed_plugins();

		// Check folder permissions for all paths
		$is_writable = TRUE;
		foreach(array(PATH_PI, PATH_THIRD) as $path)
		{
			if ( ! is_really_writable($path))
			{
				$is_writable = FALSE;
			}
		}

		$sortby = FALSE;
		$sort_url = FALSE;

		// Assemble view variables
		$vars['is_writable'] = $is_writable;
		$vars['plugins'] = $plugins;

		$this->cp->render('addons/plugin_manager', $vars);
	}

	// --------------------------------------------------------------------

	/**
	 * Plugin Details
	 *
	 * Show all the plugin information
	 *
	 * @access	public
	 * @return	void
	 */
	function info()
	{
		$name = $this->input->get('name');

		// Basic security check
		if ( ! $name OR ! preg_match("/^[a-z0-9][\w.-]*$/i", $name))
		{
			$this->session->set_flashdata('message_failure', lang('no_additional_info'));
			$this->functions->redirect(BASE.AMP.'C=addons_plugins');
		}

		$this->load->library('table');

		$this->jquery->tablesorter('.mainTable', '{
			headers: {1: {sorter: false}},
			widgets: ["zebra"]
		}');

		$this->javascript->compile();

		$plugin = $this->_get_plugin_info($name);

		$this->view->cp_page_title = $plugin['pi_name'];

		// a bit of a breadcrumb override is needed
		$this->view->cp_breadcrumbs = array(
			BASE.AMP.'C=addons' => lang('addons'),
			BASE.AMP.'C=addons_plugins'=> lang('addons_plugins')
		);

		$this->cp->render('addons/plugin_info', array('plugin' => $plugin));
	}


	// --------------------------------------------------------------------

	/**
	 * Plugin Remove Confirm
	 *
	 * Confirm Plugin Deletion
	 *
	 * @access	public
	 * @return	void
	 */
	function remove_confirm()
	{
		if ($this->config->item('demo_date') != FALSE)
		{
			show_error(lang('unauthorized_access'));
		}

		$this->load->helper('file');

		$this->view->cp_page_title = lang('plugin_delete_confirm');
		$this->cp->set_breadcrumb(BASE.AMP.'C=addons', lang('addons'));

		$hidden = $this->input->post('toggle');

		if (empty($hidden))
		{
			$this->functions->redirect(BASE.AMP.'C=addons_plugins');
		}

		$vars['message'] = (count($hidden) > 1) ? 'plugin_multiple_confirm' : 'plugin_single_confirm';
		$vars['hidden'] = $hidden;

		$this->cp->render('addons/plugin_delete', $vars);
	}

	// --------------------------------------------------------------------

	/**
	 * Delete Plugins
	 *
	 * Remove Plugin Files
	 *
	 * @access	public
	 * @return	void
	 */
	function remove()
	{
		if ($this->config->item('demo_date') != FALSE)
		{
			show_error(lang('unauthorized_access'));
		}

		$plugins = $this->input->post('deleted');

		$cp_message_success = '';
		$cp_message_failure = '';

		if ( ! is_array($plugins))
		{
			$this->functions->redirect(BASE.AMP.'C=addons_plugins');
		}

		foreach($plugins as $name)
		{
			// We now have more than one path, so we try them all
			$success = FALSE;

			if (@unlink(PATH_PI.'pi.'.$name.'.php'))
			{
				$success = TRUE;
			}
			else
			{
				// first thing's first, let's make sure this isn't part of a package
				$files = glob(PATH_THIRD.$name.'/*.php');
				$pi_key = array_search(PATH_THIRD.$name.'/pi.'.$name.'.php', $files);

				// remove this file from the list
				unset($files[$pi_key]);

				// any other PHP files in this directory?  If not, balleet!
				if (empty($files))
				{
					$this->functions->delete_directory(PATH_THIRD.$name, TRUE);
					$success = TRUE;
				}
			}

			if ($success)
			{
				$cp_message_success .= ($success) ? lang('plugin_removal_success') : lang('plugin_removal_error');
				$cp_message_success .= ' '.ucwords(str_replace("_", " ", $name)).'<br>';
			}
			else
			{
				$cp_message_failure .= ($success) ? lang('plugin_removal_success') : lang('plugin_removal_error');
				$cp_message_failure .= ' '.ucwords(str_replace("_", " ", $name)).'<br>';
			}
		}

		if ($cp_message_success != '')
		{
			$cp_message['message_success'] = $cp_message_success;
		}

		if ($cp_message_failure != '')
		{
			$cp_message['message_failure'] = $cp_message_failure;
		}

		$this->session->set_flashdata($cp_message);
		$this->functions->redirect(BASE.AMP.'C=addons_plugins');
	}

	// --------------------------------------------------------------------

	/**
	 * Install a Plugin
	 *
	 * Downloads and Installs a Plugin
	 *
	 * @access	public
	 * @return	void
	 */
	function install()
	{
		if ($this->config->item('demo_date') != FALSE)
		{
			show_error(lang('unauthorized_access'));
		}

		@include_once(APPPATH.'libraries/Pclzip.php');

		if ( ! is_really_writable(PATH_THIRD))
		{
			$this->session->set_flashdata('message_failure', lang('plugin_folder_not_writable'));
			$this->functions->redirect(BASE.AMP.'C=addons_plugins');
		}

		if ( ! extension_loaded('curl') OR ! function_exists('curl_init'))
		{
			$this->session->set_flashdata('message_failure', lang('plugin_no_curl_support'));
			$this->functions->redirect(BASE.AMP.'C=addons_plugins');
		}

		$file = $this->input->get_post('file');

		$local_name = basename($file);
		$local_file = PATH_THIRD.$local_name;

		// Get the remote file
		$c = curl_init($file);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);

		// prevent a PHP warning on certain servers
		if ( ! ini_get('safe_mode') && ! ini_get('open_basedir'))
		{
			curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
		}

		$code = curl_exec($c);
		curl_close($c);

		$file_info = pathinfo($local_file);

		if ($file_info['extension'] == 'txt' ) // Get rid of any notes/headers in the TXT file
		{
			$code = strstr($code, '<?php');
		}

		if ( ! $fp = fopen($local_file, FOPEN_WRITE_CREATE_DESTRUCTIVE))
		{
			$this->session->set_flashdata('message_failure', lang('plugin_problem_creating_file'));
			$this->functions->redirect(BASE.AMP.'C=addons_plugins');
		}

		flock($fp, LOCK_EX);
		fwrite($fp, $code);
		flock($fp, LOCK_UN);
		fclose($fp);

		@chmod($local_file, DIR_WRITE_MODE);

		// Check file information so we know what to do with it

		if ($file_info['extension'] == 'txt' ) // We've got a TXT file!
		{
			$new_file = basename($local_file, '.txt');
			if ( ! rename($local_file, PATH_THIRD.$new_file))
			{
				$cp_type = 'message_failure';
				$cp_message = lang('plugin_install_other');
			}
			else
			{
				@chmod($new_file, DIR_WRITE_MODE);
				$cp_type = 'message_success';
				$cp_message = lang('plugin_install_success');
			}
		}
		else if ($file_info['extension'] == 'zip' ) // We've got a ZIP file!
		{
			// Unzip and install plugin
			if (class_exists('PclZip'))
			{
				// The chdir breaks CI's view loading, so we
				// store a reference and reset after the unzip
				$_ref = getcwd();

				$zip = new PclZip($local_file);

				$temp_dir = PATH_THIRD.'47346fc7580de7596d7df8d115a3545d';
				mkdir($temp_dir);
				chdir($temp_dir)