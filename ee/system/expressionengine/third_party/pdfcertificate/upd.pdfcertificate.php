<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdfcertificate_upd {
	public $version = '1.0';

    private $module_name = "Pdfcertificate";
    private $EE;

	public function __construct(){
    	$this->EE =& get_instance();
    }

    /**
     * Install the module
     *
     * @return boolean TRUE
     */
	 public function install(){
	 	$mod_data = array(
            'module_name' => $this->module_name,
            'module_version' => $this->version,
            'has_cp_backend' => "y",
            'has_publish_fields' => 'n'
        );
        $this->EE->db->insert('modules', $mod_data);

		$data = array(
		    'class'     => 'pdfcertificate' ,
		    'method'    => 'print_cert'
		);

		$this->EE->db->insert('actions', $data);

      	return TRUE;
	}

	/**
     * Uninstall the module
     *
     * @return boolean TRUE
     */
	public function uninstall(){
        $this->EE->db->select('module_id');
        $query = $this->EE->db->get_where('modules',
            array( 'module_name' => $this->module_name )
        );

        $this->EE->db->where('module_id', $query->row('module_id'));
        $this->EE->db->delete('module_member_groups');

        $this->EE->db->where('module_name', $this->module_name);
        $this->EE->db->delete('modules');

        $this->EE->db->where('class', $this->module_name);
        $this->EE->db->delete('actions');

        $this->EE->db->where('class', $this->module_name.'_mcp');
        $this->EE->db->delete('actions');

        return TRUE;
    }

	/**
     * Update the module
     *
     * @return boolean
     */
    public function update($current = ''){
        if ($current == $this->version) {
            // No updates
            return FALSE;
        }

        return TRUE;
    }
}
