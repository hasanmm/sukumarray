<?php

/*
=====================================================
 ExpressionEngine - by EllisLab
-----------------------------------------------------
 http://ellislab.com/
-----------------------------------------------------
 Copyright (c) 2004 - 2015 EllisLab, Inc.
=====================================================
 THIS IS COPYRIGHTED SOFTWARE
 PLEASE READ THE LICENSE AGREEMENT
 http://ellislab.com/expressionengine/user-guide/license.html
=====================================================
 File: pi.magpie.php
-----------------------------------------------------
 Purpose: Magpie RSS plugin
=====================================================

*/

$plugin_info = array(
	'pi_name'			=> 'Magpie RSS Parser',
	'pi_version'		=> '1.3.5',
	'pi_author'			=> 'Paul Burdick',
	'pi_author_url'		=> 'http://ellislab.com/',
	'pi_description'	=> 'Retrieves and Parses RSS/Atom Feeds',
	'pi_usage'			=> Magpie::usage()
);


Class Magpie {

	var $cache_name		= 'magpie_cache';						// Name of cache directory
	var $cache_refresh	= 360;									// Period between cache refreshes (in minutes)
	var $cache_data		= '';									// Data from cache file
	var $cache_path		= '';									// Path to cache file.
	var $cache_tpath	= '';									// Path to cache file's time file.

	var $page_url		= '';									// URL being requested

	var $items			= array();								// Information about items returned
	var $dates			= array('lastupdate','linkcreated');	// Date elements
	var $return_data	= ''; 									// Data sent back to Template parser


	 /** -------------------------------------
	 /**  Constructor
	 /** -------------------------------------*/
	 function Magpie()
	 {
		// Make a local reference of the ExpressionEngine super object
		$this->EE =& get_instance();

		// Deprecate
		ee()->load->library('logger');
		ee()->logger->deprecated('2.8', 'pi.rss_parser.php or ee()->rss_parser->create()');

	 	/** -------------------------------
	 	/**  Set Parameters
	 	/** -------------------------------*/

	 	$this->cache_refresh 	= ( ! ee()->TMPL->fetch_param('refresh')) ? $this->cache_refresh : ee()->TMPL->fetch_param('refresh');
	 	$this->page_url 		= ( ! ee()->TMPL->fetch_param('url')) ? '' : trim(ee()->TMPL->fetch_param('url'));
	 	$limit					= ( ! ee()->TMPL->fetch_param('limit')) ? 20 : ee()->TMPL->fetch_param('limit');
	 	$offset					= ( ! ee()->TMPL->fetch_param('offset')) ? 0 : ee()->TMPL->fetch_param('offset');
	 	$template				= ee()->TMPL->tagdata;


	 	if ($this->page_url == '')
	 	{
	 		return $this->return_data;
	 	}

	 	if (ee()->config->item('debug') == 2 OR (ee()->config->item('debug') == 1 && ee()->session->userdata['group_id'] == 1))
		{
			if ( ! defined('MAGPIE_DEBUG'))
			{
				define('MAGPIE_DEBUG', 1);
			}
		}
		else
		{
			if ( ! defined('MAGPIE_DEBUG'))
			{
				define('MAGPIE_DEBUG', 0);
			}
		}



	 	/** -------------------------------
	 	/**  Check and Retrive Cache
	 	/** -------------------------------*/

	 	if ( ! defined('MAGPIE_CACHE_DIR'))
		{
			define('MAGPIE_CACHE_DIR', APPPATH.'cache/'.$this->cache_name.'/');
		}

		if ( ! defined('MAGPIE_CACHE_AGE'))
		{
			define('MAGPIE_CACHE_AGE',	$this->cache_refresh * 60);
		}

		$this->RSS = fetch_rss($this->page_url);

		if (count($this->RSS->items) == 0)
		{
			return $this->return_data;
		}

		/** -----------------------------------
		/**  Parse Template - ITEMS
		/** -----------------------------------*/

		if (preg_match("/(".LD."items".RD."(.*?)".LD.'\/'.'items'.RD."|".LD."magpie:items".RD."(.*?)".LD.'\/'.'magpie:items'.RD.")/s", $template, $matches))
		{
			$items_data = '';
			$i = 0;

			if (count($this->RSS->items) > 0)
			{
				foreach($this->RSS->items as $item)
		  		{
		  			$i++;
		  			if ($i <= $offset) continue;

		  			$temp_data = $matches['1'];

		  			/** ----------------------------------------
					/**  Quick and Dirty Conditionals
					/** ----------------------------------------*/

					if (stristr($temp_data, LD.'if'))
					{
						$tagdata = ee()->functions->prep_conditionals($temp_data, $item, '', 'magpie:');
		  			}

		  			/** ----------------------------------------
					/**  Single Variables
					/** ----------------------------------------*/

		  			foreach($item as $key => $value)
		  			{
		  				if ( ! is_array($value))
		  				{
		  					$temp_data = str_replace(LD.$key.RD, $value, $temp_data);
		  					$temp_data = str_replace(LD.'magpie:'.$key.RD, $value, $temp_data);

		  					if ($key == 'atom_content')
		  					{
		  						$temp_data = str_replace(LD.'content'.RD, $value, $temp_data);
		  						$temp_data = str_replace(LD.'magpie:content'.RD, $value, $temp_data);
		  					}
		  				}
		  				else
		  				{
		  					foreach ($value as $vk => $vv)
		  					{
		  						$temp_data = str_replace(LD.$key.'_'.$vk.RD, $vv, $temp_data);
		  						$temp_data = str_replace(LD.'magpie:'.$key.'_'.$vk.RD, $vv, $temp_data);

		  						if ($key == 'dc')
		  						{
		  							$temp_data = str_replace(LD.$vk.RD, $vv, $temp_data);
		  							$temp_data = str_replace(LD.'magpie:'.$vk.RD, $vv, $temp_data);
		  						}
		  					}
		  				}
		  			}

		  			$items_data .= $temp_data;

		  			if ($i >= ($limit + $offset))
		  			{
		  				break;
		  			}
				}
			}

		  	/** ----------------------------------------
			/**  Clean up left over variables
			/** ----------------------------------------*/

		  	$items_data = str_replace(LD.'exp:', 'TgB903He0mnv3dd098', $items_data);
			$items_data = str_replace(LD.'/exp:', 'Mu87ddk2QPoid990iod', $items_data);

			$items_data = preg_replace("/".LD."if.*?".RD.".+?".LD.'\/'."if".RD."/s", '', $items_data);
			$items_data = preg_replace("/".LD.".+?".RD."/", '', $items_data);

			$items_data = str_replace('TgB903He0mnv3dd098', LD.'exp:', $items_data);
			$items_data = str_replace('Mu87ddk2QPoid990iod', LD.'/exp:', $items_data);

			$template = str_replace($matches['0'], $items_data, $template);
		}

		/** -----------------------------------
		/**  Parse Template
		/** -----------------------------------*/

		$channel_variables = array('title', 'link', 'modified', 'generator',
									'copyright', 'description', 'language',
									'pubdate', 'lastbuilddate', 'generator',
									'tagline', 'creator', 'date', 'rights');

		$image_variables = array('title','url', 'link','description', 'width', 'height');


		foreach (ee()->TMPL->var_single as $key => $val)
		{

			/** ----------------------------------------
			/**  {feed_version} - Version of RSS/Atom Feed
			/** ----------------------------------------*/

			if ($key == "feed_version" OR $key == "magpie:feed_version")
			{
				if ( ! isset($this->RSS->feed_version)) $this->RSS->feed_version = '';

				$template = ee()->TMPL->swap_var_single($val, $this->RSS->feed_version, $template);
			}

			/** ----------------------------------------
			/**  {feed_type}
			/** ----------------------------------------*/

			if (($key == "feed_type" OR $key == "magpie:feed_type") && isset($this->RSS->feed_type))
			{
				if ( ! isset($this->RSS->feed_type)) $this->RSS->feed_type = '';

				$template = ee()->TMPL->swap_var_single($val, $this->RSS->feed_type, $template);
			}

			/** ----------------------------------------
			/**  Image related variables
			/** ----------------------------------------*/

			foreach ($image_variables as $variable)
			{
				if ($key == 'image_'.$variable OR $key == 'magpie:image_'.$variable)
				{
					if ( ! isset($this->RSS->image[$variable])) $this->RSS->image[$variable] = '';

					$template = ee()->TMPL->swap_var_single($val, $this->RSS->image[$variable], $template);
				}
			}


			/** ----------------------------------------
			/**  Channel related variables
			/** ----------------------------------------*/

			foreach ($channel_variables as $variable)
			{
				if ($key == 'channel_'.$variable OR $key == 'magpie:channel_'.$variable)
				{
					if ( ! isset($this->RSS->channel[$variable]))
					{
						$this->RSS->channel[$variable] = ( ! isset($this->RSS->channel['dc'][$variable])) ? '' : $this->RSS->channel['dc'][$variable];
					}

					$template = ee()->TMPL->swap_var_single($val, $this->RSS->channel[$variable], $template);
				}
			}

			/** ----------------------------------------
			/**  {page_url}
			/** ----------------------------------------*/

			if ($key == 'page_url' OR $key == 'magpie:page_url')
			{
				$template = ee()->TMPL->swap_var_single($val, $this->page_url, $template);
			}
		}

		$this->return_data = &$template;

	}




	/** ----------------------------------------
	/**  Plugin Usage
	/** ----------------------------------------*/
	public static function usage()
	{
	ob_start();
	?>

STEP ONE:
Insert plugin tag into your template.  Set parameters and variables.

PARAMETERS:
The tag has three parameters:

1. url - The URL of the RSS or Atom feed.

2. limit - Number of items to display from feed.

3. offset - Skip a certain number of items in the display of the feed.

4. refresh - How often to refresh the cache file in minutes.  The plugin default is to refresh the cached file every three hours.


Example opening tag:  {exp:magpie url="http://expressionengine.com/feeds/rss/full/" limit="8" refresh="720"}

SINGLE VARIABLES:

feed_version - What version of RSS or Atom is this feed
feed_type - What type of feed is this, Atom or RSS
page_url - Page URL of the feed.

image_title - [RSS] The contents of the &lt;title&gt; element contained within the sub-element &lt;channel&gt;
image_url - [RSS] The contents of the &lt;url&gt; element contained within the sub-element &lt;channel&gt;
image_link - [RSS] The contents of the &lt;link&gt; element contained within the sub-element &lt;channel&gt;
image_description - [RSS] The contents of the optional &lt;description&gt; element contained within the sub-element &lt;channel&gt;
image_width - [RSS] The contents of the optional &lt;width&gt; element contained within the sub-element &lt;channel&gt;
image_height - [RSS] The contents of the optional &lt;height&gt; element contained within the sub-element &lt;channel&gt;

channel_title - [ATOM/RSS-0.91/RSS-1.0/RSS-2.0]
channel_link - [ATOM/RSS-0.91/RSS-1.0/RSS-2.0]
channel_modified - [ATOM]
channel_generator - [ATOM]
channel_copyright - [ATOM]
channel_description - [RSS-0.91/ATOM]
channel_language - [RSS-0.91/RSS-1.0/RSS-2.0]
channel_pubdate - [RSS-0.91]
channel_lastbuilddate - [RSS-0.91]
channel_tagline - [RSS-0.91/RSS-1.0/RSS-2.0]
channel_creator - [RSS-1.0/RSS-2.0]
channel_date - [RSS-1.0/RSS-2.0]
channel_rights - [RSS-2.0]


PAIR VARIABLES:

Only one pair variable, {items}, is available, and it is for the entries/items in the RSS/Atom Feeds. This pair
variable allows many different other single variables to be contained within it depending on the type of feed.

title - [ATOM/RSS-0.91/RSS-1.0/RSS-2.0]
link - [ATOM/RSS-0.91/RSS-1.0/RSS-2.0]
description - [RSS-0.91/RSS-1.0/RSS-2.0]
about - [RSS-1.0]
atom_content - [ATOM]
author_name - [ATOM]
author_email - [ATOM]
content - [ATOM/RSS-2.0]
created - [ATOM]
creator - [RSS-1.0]
pubdate/date - (varies by feed design)
description - [ATOM]
id - [ATOM]
issued - [ATOM]
modified - [ATOM]
subject - [ATOM/RSS-1.0]
summary - [ATOM/RSS-1.0/RSS-2.0]


EXAMPLE:

{exp:magpie url="http://expressionengine.com/feeds/rss/full/" limit="10" refresh="720"}
<ul>
{items}
<li><a href="{link}">{title}</a></li>
{/items}
</ul>
{/exp:magpie}


***************************
Version 1.2
***************************
Complete Rewrite That Improved the Caching System Dramatically

***************************
Version 1.2.1 + 1.2.2
***************************
Bug Fixes

***************************
Version 1.2.3
***************************
Modified the code so that one can put 'magpie:' as a prefix on all plugin variables,
which allows the embedding of this plugin in a {exp:channel:entries} tag and using
that tag's variables in this plugin's parameter (url="" parameter, specifically).

{exp:magpie url="http://expressionengine.com/feeds/rss/full/" limit="10" refresh="720"}
<ul>
{magpie:items}
<li><a href="{magpie:link}">{magpie:title}</a></li>
{/magpie:items}
</ul>
{/exp:magpie}

***************************
Version 1.2.4
***************************
Added the ability for the encoding to be parsed out of the XML feed and used to
convert the feed's data into the encoding specified in the preferences.  Requires
that the Multibyte String (mbstring: http://us4.php.net/manual/en/ref.mbstring.php)
library be compiled into PHP.

***************************
Version 1.2.5
***************************
Fixed a bug where the Magpie library was adding slashes to the cache directory
without doing any sort of double slash checking.

***************************
Version 1.3
***************************
Fixed a bug where the channel and image variables were not showing up because of a bug
introuced in 1.2.

***************************
Version 1.3.1
***************************
New parameter convert_entities="y" which will have any entities in the RSS feed converted
before being parsed by the PHP XML parser.  This is helpful because sometimes the XML
Parser converts entities incorrectly. You have to empty your Magpie cache after enabling this setting.

New parameter encoding="ISO-8859-1".  Allows you to specify the encoding of the RSS
feed, which is sometimes helpful when using the convert_encoding="y" parameter.

***************************
Version 1.3.2
***************************
Eliminated all of the darn encoding parameters previously being used and used the
encoding abilities recently added to the Magpie library that attempts to do all of the
converting early on.

***************************
Version 1.3.3
***************************
The Snoopy library that is included with the Magpie plugin by default was causing
problems with the Snoopy library included in the Third Party Linklist module, so
the name was changed to eliminate the conflict.

***************************
Version 1.3.4
***************************
The offset="" parameter was undocumented and had a bug.  Fixed.

***************************
Version 1.3.5
***************************
Added ability to override caching options when using fetch_rss() directly.


	<?php
	$buffer = ob_get_contents();

	ob_end_clean();

	return $buffer;
	}



} // END Magpie class




/*

// -------------------------------------------
//  BEGIN MagpieRSS Class
// -------------------------------------------

The MagpieRSS class is used here under a BSD license with the author's permission.

Copyright (c) 2002, Kellan Elliott-McCrea All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

- Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.

- Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
  and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A
PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR
BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER
IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
POSSIBILITY OF SUCH DAMAGE.



 * Project:	  MagpieRSS: a simple RSS integration tool
 * File:		  rss_parse.inc  - parse an RSS or Atom feed
 *				return as a simple object.
 *
 * Handles RSS 0.9x, RSS 2.0, RSS 1.0, and Atom 0.3
 *
 * The lastest version of MagpieRSS can be obtained from:
 * http://magpierss.sourceforge.net
 *
 * For questions, help, comments, discussion, etc., please join the
 * Magpie mailing list:
 * magpierss-general@lists.sourceforge.net
 *
 * Author:		Kellan Elliott-McCrea <kellan@protest.net>
 * Version:		0.6a
 * License:		GPL
 *
 *
 *  ABOUT MAGPIE's APPROACH TO PARSING:
 *	- Magpie is based on expat, a