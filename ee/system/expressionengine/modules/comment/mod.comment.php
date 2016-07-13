on') > 0)
			{
				$days = $query->row('entry_date') + ($query->row('comment_expiration') * 86400);

				if (ee()->localize->now > $days)
				{
					if (ee()->config->item('comment_moderation_override') == 'y')
					{
						$force_moderation = 'y';
					}
					else
					{
						return ee()->output->show_user_error('submission', ee()->lang->line('cmt_commenting_has_expired'));
					}
				}
			}
		}


		/** ----------------------------------------
		/**  Is there a comment timelock?
		/** ----------------------------------------*/
		if ($query->row('comment_timelock') != '' AND $query->row('comment_timelock') > 0)
		{
			if (ee()->session->userdata['group_id'] != 1)
			{
				$time = ee()->localize->now - $query->row('comment_timelock') ;

				ee()->db->where('comment_date >', $time);
				ee()->db->where('ip_address', ee()->input->ip_address());

				$result = ee()->db->count_all_results('comments');

				if ($result  > 0)
				{
					return ee()->output->show_user_error('submission', str_replace("%s", $query->row('comment_timelock') , ee()->lang->line('cmt_comments_timelock')));
				}
			}
		}

		/** ----------------------------------------
		/**  Do we allow duplicate data?
		/** ----------------------------------------*/
		if (ee()->config->item('deny_duplicate_data') == 'y')
		{
			if (ee()->session->userdata['group_id'] != 1)
			{
				ee()->db->where('comment', $_POST['comment']);
				$result = ee()->db->count_all_results('comments');

				if ($result > 0)
				{
					return ee()->output->show_user_error('submission', ee()->lang->line('cmt_duplicate_comment_warning'));
				}
			}
		}


		/** ----------------------------------------
		/**  Assign data
		/** ----------------------------------------*/
		$author_id				= $query->row('author_id') ;
		$entry_title			= $query->row('title') ;
		$url_title				= $query->row('url_title') ;
		$channel_title		 	= $query->row('channel_title') ;
		$channel_id			  	= $query->row('channel_id') ;
		$require_membership 	= $query->row('comment_require_membership') ;
		$comment_moderate		= (ee()->session->userdata['group_id'] == 1 OR ee()->session->userdata['exclude_from_moderation'] == 'y') ? 'n' : $force_moderation;
		$author_notify			= $query->row('comment_notify_authors') ;

		$comment_url			= $query->row('comment_url');
		$channel_url			= $query->row('channel_url');
		$entry_id				= $query->row('entry_id');
		$comment_site_id		= $query->row('site_id');


		$notify_address = ($query->row('comment_notify')  == 'y' AND $query->row('comment_notify_emails')  != '') ? $query->row('comment_notify_emails')  : '';


		/** ----------------------------------------
		/**  Start error trapping
		/** ----------------------------------------*/

		$error = array();

		if (ee()->session->userdata('member_id') != 0)
		{
			// If the user is logged in we'll reassign the POST variables with the user data

			 $_POST['name']		= (ee()->session->userdata['screen_name'] != '') ? ee()->session->userdata['screen_name'] : ee()->session->userdata['username'];
			 $_POST['email']	=  ee()->session->userdata['email'];
			 $_POST['url']		=  (is_null(ee()->session->userdata['url'])) ? '' : ee()->session->userdata['url'];
			 $_POST['location']	=  (is_null(ee()->session->userdata['location'])) ? '' : ee()->session->userdata['location'];
		}

		/** ----------------------------------------
		/**  Is membership is required to post...
		/** ----------------------------------------*/

		if ($require_membership == 'y')
		{
			// Not logged in

			if (ee()->session->userdata('member_id') == 0)
			{
				return ee()->output->show_user_error('submission', ee()->lang->line('cmt_must_be_member'));
			}

			// Membership is pending

			if (ee()->session->userdata['group_id'] == 4)
			{
				return ee()->output->show_user_error('general', ee()->lang->line('cmt_account_not_active'));
			}

		}
		else
		{
			/** ----------------------------------------
			/**  Missing name?
			/** ----------------------------------------*/

			if (trim($_POST['name']) == '')
			{
				$error[] = ee()->lang->line('cmt_missing_name');
			}

			/** -------------------------------------
			/**  Is name banned?
			/** -------------------------------------*/

			if (ee()->session->ban_check('screen_name', $_POST['name']))
			{
				$error[] = ee()->lang->line('cmt_name_not_allowed');
			}

			// Let's make sure they aren't putting in funky html to bork our screens
			$_POST['name'] = str_replace(array('<', '>'), array('&lt;', '&gt;'), $_POST['name']);

			/** ----------------------------------------
			/**  Missing or invalid email address
			/** ----------------------------------------*/

			if ($query->row('comment_require_email')  == 'y')
			{
				ee()->load->helper('email');

				if ($_POST['email'] == '')
				{
					$error[] = ee()->lang->line('cmt_missing_email');
				}
				elseif ( ! valid_email($_POST['email']))
				{
					$error[] = ee()->lang->line('cmt_invalid_email');
				}
			}
		}

		/** -------------------------------------
		/**  Is email banned?
		/** -------------------------------------*/

		if ($_POST['email'] != '')
		{
			if (ee()->session->ban_check('email', $_POST['email']))
			{
				$error[] = ee()->lang->line('cmt_banned_email');
			}
		}

		/** ----------------------------------------
		/**  Is comment too big?
		/** ----------------------------------------*/

		if ($query->row('comment_max_chars')  != '' AND $query->row('comment_max_chars')  != 0)
		{
			if (strlen($_POST['comment']) > $query->row('comment_max_chars') )
			{
				$str = str_replace("%n", strlen($_POST['comment']), ee()->lang->line('cmt_too_large'));

				$str = str_replace("%x", $query->row('comment_max_chars') , $str);

				$error[] = $str;
			}
		}

		/** ----------------------------------------
		/**  Do we have errors to display?
		/** ----------------------------------------*/

		if (count($error) > 0)
		{
			return ee()->output->show_user_error('submission', $error);
		}

		/** ----------------------------------------
		/**  Do we require CAPTCHA?
		/** ----------------------------------------*/

		if ($query->row('comment_use_captcha')  == 'y')
		{
			if (ee()->config->item('captcha_require_members') == 'y'  OR  (ee()->config->item('captcha_require_members') == 'n' AND ee()->session->userdata('member_id') == 0))
			{
				if ( ! isset($_POST['captcha']) OR $_POST['captcha'] == '')
				{
					return ee()->output->show_user_error('submission', ee()->lang->line('captcha_required'));
				}
				else
				{
					ee()->db->where('word', $_POST['captcha']);
					ee()->db->where('ip_address', ee()->input->ip_address());
					ee()->db->where('date > UNIX_TIMESTAMP()-7200', NULL, FALSE);

					$result = ee()->db->count_all_results('captcha');

					if ($result == 0)
					{
						return ee()->output->show_user_error('submission', ee()->lang->line('captcha_incorrect'));
					}

					// @TODO: AR
					ee()->db->query("DELETE FROM exp_captcha WHERE (word='".ee()->db->escape_str($_POST['captcha'])."' AND ip_address = '".ee()->input->ip_address()."') OR date < UNIX_TIMESTAMP()-7200");
				}
			}
		}

		/** ----------------------------------------
		/**  Build the data array
		/** ----------------------------------------*/

		ee()->load->helper('url');

		$notify = (ee()->input->post('notify_me')) ? 'y' : 'n';

		$cmtr_name	= ee()->input->post('name', TRUE);
		$cmtr_email	= ee()->input->post('email');
		$cmtr_loc	= ee()->input->post('location', TRUE);
		$cmtr_url	= ee()->input->post('url', TRUE);
		$cmtr_url	= (string) filter_var(prep_url($cmtr_url), FILTER_VALIDATE_URL);

		$data = array(
			'channel_id'	=> $channel_id,
			'entry_id'		=> $_POST['entry_id'],
			'author_id'		=> ee()->session->userdata('member_id'),
			'name'			=> $cmtr_name,
			'email'			=> $cmtr_email,
			'url'			=> $cmtr_url,
			'location'		=> $cmtr_loc,
			'comment'		=> ee()->security->xss_clean($_POST['comment']),
			'comment_date'	=> ee()->localize->now,
			'ip_address'	=> ee()->input->ip_address(),
			'status'		=> ($comment_moderate == 'y') ? 'p' : 'o',
			'site_id'		=> $comment_site_id
		);

		// -------------------------------------------
		// 'insert_comment_insert_array' hook.
		//  - Modify any of the soon to be inserted values
		//
			if (ee()->extensions->active_hook('insert_comment_insert_array') === TRUE)
			{
				$data = ee()->extensions->call('insert_comment_insert_array', $data);
				if (ee()->extensions->end_script === TRUE) return;
			}
		//
		// -------------------------------------------

		$return_link = ( ! stristr($_POST['RET'],'http://') && ! stristr($_POST['RET'],'https://')) ? ee()->functions->create_url($_POST['RET']) : $_POST['RET'];

		//  Insert data
		$sql = ee()->db->insert_string('exp_comments', $data);
		ee()->db->query($sql);
		$comment_id = ee()->db->insert_id();

		if ($notify == 'y')
		{
			ee()->load->library('subscription');
			ee()->subscription->init('comment', array('entry_id' => $entry_id), TRUE);

			if ($cmtr_id = ee()->session->userdata('member_id'))
			{
				ee()->subscription->subscribe($cmtr_id);
			}
			else
			{
				ee()->subscription->subscribe($cmtr_email);
			}
		}


		if ($comment_moderate == 'n')
		{
			/** ------------------------------------------------
			/**  Update comment total and "recent comment" date
			/** ------------------------------------------------*/

			ee()->db->set('recent_comment_date', ee()->localize->now);
			ee()->db->where('entry_id', $_POST['entry_id']);

			ee()->db->update('channel_titles');

			/** ----------------------------------------
			/**  Update member comment total and date
			/** ----------------------------------------*/

			if (ee()->session->userdata('member_id') != 0)
			{
				ee()->db->select('total_comments');
				ee()->db->where('member_id', ee()->session->userdata('member_id'));

				$query = ee()->db->get('members');

				ee()->db->set('total_comments', $query->row('total_comments') + 1);
				ee()->db->set('last_comment_date', ee()->localize->now);
				ee()->db->where('member_id', ee()->session->userdata('member_id'));

				ee()->db->update('members');
			}

			/** ----------------------------------------
			/**  Update comment stats
			/** ----------------------------------------*/

			ee()->stats->update_comment_stats($channel_id, ee()->localize->now);

			/** ----------------------------------------
			/**  Fetch email notification addresses
			/** ----------------------------------------*/

			ee()->load->library('subscription');
			ee()->subscription->init('comment', array('entry_id' => $entry_id), TRUE);

			// Remove the current user
			$ignore = (ee()->session->userdata('member_id') != 0) ? ee()->session->userdata('member_id') : ee()->input->post('email');

			// Grab them all
			$subscriptions = ee()->subscription->get_subscriptions($ignore);
			ee()->load->model('comment_model');
			ee()->comment_model->recount_entry_comments(array($entry_id));
			$recipients = ee()->comment_model->fetch_email_recipients($_POST['entry_id'], $subscriptions);
		}

		/** ----------------------------------------
		/**  Fetch Author Notification
		/** ----------------------------------------*/

		if ($author_notify == 'y')
		{
			ee()->db->select('email');
			ee()->db->where('member_id', $author_id);

			$result = ee()->db->get('members');

			$notify_address	.= ','.$result->row('email');
		}

		/** ----------------------------------------
		/**  Instantiate Typography class
		/** ----------------------------------------*/

		ee()->load->library('typography');
		ee()->typography->initialize(array(
			'parse_images'		=> FALSE,
			'allow_headings'	=> FALSE,
			'smileys'			=> FALSE,
			'word_censor'		=> (ee()->config->item('comment_word_censoring') == 'y') ? TRUE : FALSE)
		);

		$comment = ee()->security->xss_clean($_POST['comment']);
		$comment = ee()->typography->parse_type(
			$comment,
			array(
				'text_format'	=> 'none',
				'html_format'	=> 'none',
				'auto_links'	=> 'n',
				'allow_img_url' => 'n'
			)
		);

		$path = ($comment_url == '') ? $channel_url : $comment_url;

		$comment_url_title_auto_path = reduce_double_slashes($path.'/'.$url_title);

		/** ----------------------------
		/**  Send admin notification
		/** ----------------------------*/

		if ($notify_address != '')
		{
			$cp_url = ee()->config->item('cp_url').'?S=0&D=cp&C=addons_modules&M=show_module_cp&module=comment';

			$swap = array(
				'name'				=> $cmtr_name,
				'name_of_commenter'	=> $cmtr_name,
				'email'				=> $cmtr_email,
				'url'				=> $cmtr_url,
				'location'			=> $cmtr_loc,
				'channel_name'		=> $channel_title,
				'entry_title'		=> $entry_title,
				'comment_id'		=> $comment_id,
				'comment'			=> $comment,
				'comment_url'		=> reduce_double_slashes(ee()->input->remove_session_id(ee()->functions->fetch_site_index().'/'.$_POST['URI'])),
				'delete_link'		=> $cp_url.'&method=delete_comment_confirm&comment_id='.$comment_id,
				'approve_link'		=> $cp_url.'&method=change_comment_status&comment_id='.$comment_id.'&status=o',
				'close_link'		=> $cp_url.'&method=change_comment_status&comment_id='.$comment_id.'&status=c',
				'channel_id'		=> $channel_id,
				'entry_id'			=> $entry_id,
				'url_title'			=> $url_title,
				'comment_url_title_auto_path' => $comment_url_title_auto_path
			);

			$template = ee()->functions->fetch_email_template('admin_notify_comment');

			$email_tit = ee()->functions->var_swap($template['title'], $swap);
			$email_msg = ee()->functions->var_swap($template['data'], $swap);

			// We don't want to send an admin notification if the person
			// leaving the comment is an admin in the notification list
			// For added security, we only trust the post email if the
			// commenter is logged in.

			if (ee()->session->userdata('member_id') != 0 && $_POST['email'] != '')
			{
				if (strpos($notify_address, $_POST['email']) !== FALSE)
				{
					$notify_address = str_replace($_POST['email'], '', $notify_address);
				}
			}

			// Remove multiple commas
			$notify_address = reduce_multiples($notify_address, ',', TRUE);

			if ($notify_address != '')
			{
				/** ----------------------------
				/**  Send email
				/** ----------------------------*/

				ee()->load->library('email');

				$replyto = ($data['email'] == '') ? ee()->config->item('webmaster_email') : $data['email'];

				$sent = array();

				// Load the text helper
				ee()->load->helper('text');

				foreach (explode(',', $notify_address) as $addy)
				{
					if (in_array($addy, $sent))
					{
						continue;
					}

					ee()->email->EE_initialize();
					ee()->email->wordwrap = false;
					ee()->email->from(ee()->config->item('webmaster_email'), ee()->config->item('webmaster_name'));
					ee()->email->to($addy);
					ee()->email->reply_to($replyto);
					ee()->email->subject($email_tit);
					ee()->email->message(entities_to_ascii($email_msg));
					ee()->email->send();

					$sent[] = $addy;
				}
			}
		}


		/** ----------------------------------------
		/**  Send user notifications
		/** ----------------------------------------*/

		if ($comment_moderate == 'n')
		{
			$email_msg = '';

			if (count($recipients) > 0)
			{
				$action_id  = ee()->functions->fetch_action_id('Comment_mcp', 'delete_comment_notification');

				$swap = array(
					'name_of_commenter'	=> $cmtr_name,
					'channel_name'		=> $channel_title,
					'entry_title'		=> $entry_title,
					'site_name'			=> stripslashes(ee()->config->item('site_name')),
					'site_url'			=> ee()->config->item('site_url'),
					'comment_url'		=> reduce_double_slashes(ee()->input->remove_session_id(ee()->functions->fetch_site_index().'/'.$_POST['URI'])),
					'comment_id'		=> $comment_id,
					'comment'			=> $comment,
					'channel_id'		=> $channel_id,
					'entry_id'			=> $entry_id,
					'url_title'			=> $url_title,
					'comment_url_title_auto_path' => $comment_url_title_auto_path
				);


				$template = ee()->functions->fetch_email_template('comment_notification');
				$email_tit = ee()->functions->var_swap($template['title'], $swap);
				$email_msg = ee()->functions->var_swap($template['data'], $swap);

				/** ----------------------------
				/**  Send email
				/** ----------------------------*/

				ee()->load->library('email');
				ee()->email->wordwrap = true;

				$cur_email = ($_POST['email'] == '') ? FALSE : $_POST['email'];

				if ( ! isset($sent)) $sent = array();

				// Load the text helper
				ee()->load->helper('text');

				foreach ($recipients as $val)
				{
					// We don't notify the person currently commenting.  That would be silly.

					if ( ! in_array($val['0'], $sent))
					{
						$title	 = $email_tit;
						$message = $email_msg;

						$sub	= $subscriptions[$val['1']];
						$sub_qs	= 'id='.$sub['subscription_id'].'&hash='.$sub['hash'];

						// Deprecate the {name} variable at some point
						$title	 = str_replace('{name}', $val['2'], $title);
						$message = str_replace('{name}', $val['2'], $message);

						$title	 = str_replace('{name_of_recipient}', $val['2'], $title);
						$message = str_replace('{name_of_recipient}', $val['2'], $message);

						$title	 = str_replace('{notification_removal_url}', ee()->functions->fetch_site_index(0, 0).QUERY_MARKER.'ACT='.$action_id.'&'.$sub_qs, $title);
						$message = str_replace('{notification_removal_url}', ee()->functions->fetch_site_index(0, 0).QUERY_MARKER.'ACT='.$action_id.'&'.$sub_qs, $message);

						ee()->email->EE_initialize();
						ee()->email->from(ee()->config->item('webmaster_email'), ee()->config->item('webmaster_name'));
						ee()->email->to($val['0']);
						ee()->email->subject($title);
						ee()->email->message(entities_to_ascii($message));
						ee()->email->send();

						$sent[] = $val['0'];
					}
				}
			}

			/** ----------------------------------------
			/**  Clear cache files
			/** ----------------------------------------*/

			ee()->functions->clear_caching('all', ee()->functions->fetch_site_index().$_POST['URI']);

			// clear out the entry_id version if the url_title is in the URI, and vice versa
			if (preg_match("#\/".preg_quote($url_title)."\/#", $_POST['URI'], $matches))
			{
				ee()->functions->clear_caching('all', ee()->functions->fetch_site_index().preg_replace("#".preg_quote($matches['0'])."#", "/{$data['entry_id']}/", $_POST['URI']));
			}
			else
			{
				ee()->functions->clear_caching('all', ee()->functions->fetch_site_index().preg_replace("#{$data['entry_id']}#", $url_title, $_POST['URI']));
			}
		}

		/** ----------------------------------------
		/**  Set cookies
		/** ----------------------------------------*/

		if ($notify == 'y')
		{
			ee()->input->set_cookie('notify_me', 'yes', 60*60*24*365);
		}
		else
		{
			ee()->input->set_cookie('notify_me', 'no', 60*60*24*365);
		}

		if (ee()->input->post('save_info'))
		{
			ee()->input->set_cookie('save_info', 'yes', 60*60*24*365);
			ee()->input->set_cookie('my_name', $_POST['name'], 60*60*24*365);
			ee()->input->set_cookie('my_email', $_POST['email'], 60*60*24*365);
			ee()->input->set_cookie('my_url', $_POST['url'], 60*60*24*365);
			ee()->input->set_cookie('my_location', $_POST['location'], 60*60*24*365);
		}
		else
		{
			ee()->input->set_cookie('save_info', 'no', 60*60*24*365);
			ee()->input->delete_cookie('my_name');
			ee()->input->delete_cookie('my_email');
			ee()->input->delete_cookie('my_url');
			ee()->input->delete_cookie('my_location');
		}

		// -------------------------------------------
		// 'insert_comment_end' hook.
		//  - More emails, more processing, different redirect
		//  - $comment_id added in 1.6.1
		//
			ee()->extensions->call('insert_comment_end', $data, $comment_moderate, $comment_id);
			if (ee()->extensions->end_script === TRUE) return;
		//
		// -------------------------------------------

		/** -------------------------------------------
		/**  Bounce user back to the comment page
		/** -------------------------------------------*/

		if ($comment_moderate == 'y')
		{
			$data = array(
				'title' 	=> ee()->lang->line('cmt_comment_accepted'),
				'heading'	=> ee()->lang->line('thank_you'),
				'content'	=> ee()->lang->line('cmt_will_be_reviewed'),
				'redirect'	=> $return_link,
				'link'		=> array($return_link, ee()->lang->line('cmt_return_to_comments')),
				'rate'		=> 3
			);

			ee()->output->show_message($data);
		}
		else
		{
			ee()->functions->redirect($return_link);
		}
	}


	// --------------------------------------------------------------------

	/**
	 * Comment subscription tag
	 *
	 *
	 * @access	public
	 * @return	string
	 */
	function notification_links()
	{
		// Membership is required
		if (ee()->session->userdata('member_id') == 0)
		{
			return;
		}

		$entry_id = $this->_divine_entry_id();

		// entry_id is required
		if ( ! $entry_id)
		{
			return;
		}

		ee()->load->library('subscription');
		ee()->subscription->init('comment', array('entry_id' => $entry_id), TRUE);
		$subscribed = ee()->subscription->is_subscribed(FALSE);


		$action_id  = ee()->functions->fetch_action_id('Comment', 'comment_subscribe');

		// Bleh- really need a conditional for if they are subscribed

		$sub_link = ee()->functions->fetch_site_index(0, 0).QUERY_MARKER.'ACT='.$action_id.'&entry_id='.$entry_id.'&ret='.ee()->uri->uri_string();
		$unsub_link = ee()->functions->fetch_site_index(0, 0).QUERY_MARKER.'ACT='.$action_id.'&entry_id='.$entry_id.'&type=unsubscribe'.'&ret='. ee()->uri->uri_string();

		$data[] = array('subscribe_link' => $sub_link, 'unsubscribe_link' => $unsub_link, 'subscribed' => $subscribed);

		$tagdata = ee()->TMPL->tagdata;
		return ee()->TMPL->parse_variables($tagdata, $data);
	}

	// --------------------------------------------------------------------

	/**
	 * List of subscribers to an entry
	 *
	 *
	 * @access	public
	 * @return	string
	 */
	public function subscriber_list()
	{
		$entry_id = $this->_divine_entry_id();

		// entry is required, and this is not the same as "no results for a valid entry"
		// so return nada
		if ( ! $entry_id)
		{
			return;
		}

		$anonymous = TRUE;
		if (ee()->TMPL->fetch_param('exclude_guests') == 'yes')
		{
			$anonymous = FALSE;
		}

		ee()->load->library('subscription');
		ee()->subscription->init('comment', array('entry_id' => $entry_id), $anonymous);
		$subscribed = ee()->subscription->get_subscriptions(FALSE, TRUE);

		if (empty($subscribed))
		{
			return ee()->TMPL->no_results();
		}

		// non-member comments will expose email addresses, so make sure the visitor should
		// be able to see this data before including it
		$expose_emails = (ee()->session->userdata('group_id') == 1) ? TRUE : FALSE;

		$vars = array();
		$total_results = count($subscribed);
		$count = 0;
		$guest_total = 0;
		$member_total = 0;

		foreach ($subscribed as $subscription_id => $subscription)
		{
			$vars[] = array(
				'subscriber_member_id' => $subscription['member_id'],
				'subscriber_screen_name' => $subscription['screen_name'],
				'subscriber_email' => (($expose_emails && $anonymous) ? $subscription['email'] : ''),
				'subscriber_is_member' => (($subscription['member_id'] == 0) ? FALSE : TRUE),
				'subscriber_count' => ++$count,
				'subscriber_total_results' => $total_results
				);

			if ($subscription['member_id'] == 0)
			{
				$guest_total++;
			}
			else
			{
				$member_total++;
			}
		}

		// loop through again to add the final guest/subscribed tallies
		foreach ($vars as $key => $val)
		{
			$vars[$key]['subscriber_guest_total'] = $guest_total;
			$vars[$key]['subscriber_member_total'] = $member_total;
		}

		return ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $vars);
	}

	// --------------------------------------------------------------------

	/**
	 * Comment subscription w/out commenting
	 *
	 *
	 * @access	public
	 * @return	string
	 */
	function comment_subscribe()
	{
		// Membership is required
		if (ee()->session->userdata('member_id') == 0)
		{
			return;
		}

		$id		= ee()->input->get('entry_id');
		$type	= (ee()->input->get('type')) ? 'unsubscribe' : 'subscribe';
		$ret	= ee()->input->get('ret');

		if ( ! $id)
		{
			return;
		}

		ee()->lang->loadfile('comment');

		// Does entry exist?

		ee()->db->select('title');
		$query = ee()->db->get_where('channel_titles', array('entry_id' => $id));

		if ($query->num_rows() != 1)
		{
			return ee()->output->show_user_error('submission', 'invalid_subscription');
		}

		$row = $query->row();
		$entry_title = $row->title;

		// Are they currently subscribed

		ee()->load->library('subscription');
		ee()->subscription->init('comment', array('entry_id' => $id), TRUE);
		$subscribed = ee()->subscription->is_subscribed(FALSE);

		if ($type == 'subscribe' && $subscribed == TRUE)
		{
			return ee()->output->show_user_error('submission', ee()->lang->line('already_subscribed'));
		}

		if ($type == 'unsubscribe' && $subscribed == FALSE)
		{
			return ee()->output->show_user_error('submission', ee()->lang->line('not_currently_subscribed'));
		}

		// They check out- let them through
		ee()->subscription->$type();

		// Show success message

		ee()->lang->loadfile('comment');

		$title = ($type == 'unsubscribe') ? 'cmt_unsubscribe' : 'cmt_subscribe';
		$content = ($type == 'unsubscribe') ? 'you_have_been_unsubscribed' : 'you_have_been_subscribed';

		$return_link = ee()->functions->create_url($ret);

		$data = array(
			'title' 	=> ee()->lang->line($title),
			'heading'	=> ee()->lang->line('thank_you'),
			'content'	=> ee()->lang->line($content).' '.$entry_title,
			'redirect'	=> $return_link,
			'link'		=> array($return_link, ee()->lang->line('cmt_return_to_comments')),
			'rate'		=> 3
		);

		ee()->output->show_message($data);
	}

	// --------------------------------------------------------------------

	/**
	 * Frontend comment editing
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function edit_comment($ajax_request = TRUE)
	{
		@header("Content-type: text/html; charset=UTF-8");

		$unauthorized = ee()->lang->line('not_authorized');

		if (ee()->input->get_post('comment_id') === FALSE OR ((ee()->input->get_post('comment') === FALSE OR ee()->input->get_post('comment') == '') && ee()->input->get_post('status') != 'close'))
		{
			ee()->output->send_ajax_response(array('error' => $unauthorized));
		}

		// Not logged in member- eject
		if (ee()->session->userdata['member_id'] == '0')
		{
			ee()->output->send_ajax_response(array('error' => $unauthorized));
		}

		$edited_status = (ee()->input->get_post('status') != 'close') ? FALSE : 'c';
		$edited_comment = ee()->input->get_post('comment');
		$can_edit = FALSE;
		$can_moderate = FALSE;

		ee()->db->from('comments');
		ee()->db->from('channels');
		ee()->db->from('channel_titles');
		ee()->db->select('comments.author_id, comments.comment_date, channel_titles.author_id AS entry_author_id, channel_titles.entry_id, channels.channel_id, channels.comment_text_formatting, channels.comment_html_formatting, channels.comment_allow_img_urls, channels.comment_auto_link_urls');
		ee()->db->where('comment_id', ee()->input->get_post('comment_id'));
		ee()->db->where('comments.channel_id = '.ee()->db->dbprefix('channels').'.channel_id');
		ee()->db->where('comments.entry_id = '.ee()->db->dbprefix('channel_titles').'.entry_id');
		$query = ee()->db->get();

		if ($query->num_rows() > 0)
		{
			// User is logged in and in a member group that can edit this comment.
			if (ee()->session->userdata['group_id'] == 1
				OR ee()->session->userdata['can_edit_all_comments'] == 'y'
				OR (ee()->session->userdata['can_edit_own_comments'] == 'y'
					&& $query->row('entry_author_id') == ee()->session->userdata['member_id']))
			{
				$can_edit = TRUE;
				$can_moderate = TRUE;
			}
			// User is logged in and can still edit this comment.
			elseif (ee()->session->userdata['member_id'] != '0'
				&& $query->row('author_id') == ee()->session->userdata['member_id']
				&& $query->row('comment_date') > $this->_comment_edit_time_limit())
			{
				$can_edit = true;
			}

			$data = array();
			$author_id = $query->row('author_id');
			$channel_id = $query->row('channel_id');
			$entry_id = $query->row('entry_id');

			if ($edited_status != FALSE & $can_moderate != FALSE)
			{
				$data['status'] = 'c';
			}

			if ($edited_comment != FALSE & $can_edit != FALSE)
			{
				$data['comment'] = $edited_comment;
			}

			if (count($data) > 0)
			{
				$data['edit_date'] = ee()->localize->now;

				ee()->db->where('comment_id', ee()->input->get_post('comment_id'));
				ee()->db->update('comments', $data);

				if ($edited_status != FALSE & $can_moderate != FALSE)
				{
					// We closed an entry, update our stats
					$this->_update_comment_stats($entry_id, $channel_id, $author_id);

					// Send back the updated comment
					ee()->output->send_ajax_response(array('moderated' => ee()->lang->line('closed')));
				}

				ee()->load->library('typography');

				$f_comment = ee()->typography->parse_type(
					stripslashes(ee()->input->get_post('comment')),
					array(
						'text_format'   => $query->row('comment_text_formatting'),
						'html_format'   => $query->row('comment_html_formatting'),
						'auto_links'    => $query->row('comment_auto_link_urls'),
						'allow_img_url' => $query->row('comment_allow_img_urls')
					)
				);

				// Send back the updated comment
				ee()->output->send_ajax_response(array('comment' => $f_comment));
			}
		}

		ee()->output->send_ajax_response(array('error' => $unauthorized));
	}

	// --------------------------------------------------------------------

	/**
	 * Edit Comment Script
	 *
	 * Outputs a script tag with an ACT request to the edit comment JavaScript
	 *
	 * @access	public
	 * @return	type
	 */
	function edit_comment_script()
	{
		$src = ee()->functions->fetch_site_index(0, 0).QUERY_MARKER.'ACT=comment_editor';
		return $this->return_data = '<script type="text/javascript" charset="utf-8" src="'.$src.'"></script>';
	}

	// --------------------------------------------------------------------

	/**
	 * Comment Editor
	 *
	 * Outputs the JavaScript to edit comments on the front end, with JS headers.
	 * Called via an action request by the exp:comment:edit_comment_script tag
	 *
	 * @access	public
	 * @return	string
	 */
	function comment_editor()
	{
		$ajax_url = $this->ajax_edit_url();

$script = <<<CMT_EDIT_SCR
$.fn.CommentEditor = function(options) {

	var OPT;

	OPT = $.extend({
		url: "{$ajax_url}",
		comment_body: '.comment_body',
		showEditor: '.edit_link',
		hideEditor: '.cancel_edit',
		saveComment: '.submit_edit',
		closeComment: '.mod_link'
	}, options);

	var view_elements = [OPT.comment_body, OPT.showEditor, OPT.closeComment].join(','),
		edit_elements = '.editCommentBox',
		csrf_token = '{csrf_token}';

	return this.each(function() {
		var id = this.id.replace('comment_', ''),
		parent = $(this);

		parent.find(OPT.showEditor).click(function() { showEditor(id); return false; });
		parent.find(OPT.hideEditor).click(function() { hideEditor(id); return false; });
		parent.find(OPT.saveComment).click(function() { saveComment(id); return false; });
		parent.find(OPT.closeComment).click(function() { closeComment(id); return false; });
	});

	function showEditor(id) {
		$("#comment_"+id)
			.find(view_elements).hide().end()
			.find(edit_elements).show().end();
	}

	function hideEditor(id) {
		$("#comment_"+id)
			.find(view_elements).show().end()
			.find(edit_elements).hide();
	}

	function closeComment(id) {
		var data = {status: "close", comment_id: id, csrf_token: csrf_token};

		$.post(OPT.url, data, function (res) {
			if (res.error) {
				return $.error('Could not moderate comment.');
			}

			$('#comment_' + id).hide();
	   });
	}

	function saveComment(id) {
		var content = $("#comment_"+id).find('.editCommentBox'+' textarea').val(),
			data = {comment: content, comment_id: id, csrf_token: csrf_token};

		$.post(OPT.url, data, function (res) {
			if (res.error) {
				hideEditor(id);
				return $.error('Could not save comment.');
			}

			$("#comment_"+id).find('.comment_body').html(res.comment);
			hideEditor(id);
		});
	}
};


$(function() { $('.comment').CommentEditor(); });
CMT_EDIT_SCR;

		$script = ee()->functions->add_form_security_hash($script);
		$script = ee()->functions->insert_action_ids($script);

		ee()->output->enable_profiler(FALSE);
		ee()->output->set_header("Content-Type: text/javascript");

		if (ee()->config->item('send_headers') == 'y')
		{
			ee()->output->send_cache_headers(strtotime(APP_BUILD));
			ee()->output->set_header('Content-Length: '.strlen($script));
		}

		exit($script);
	}

	// --------------------------------------------------------------------

	/**
	 * AJAX Edit URL
	 *
	 * @access	public
	 * @return	string
	 */
	function ajax_edit_url()
	{
		$url = ee()->functions->fetch_site_index(0, 0).QUERY_MARKER.'ACT='.ee()->functions->fetch_action_id('Comment', 'edit_comment');

		return $url;
	}

	// --------------------------------------------------------------------

	/**
	 * Discover the entry ID for the current entry
	 *
	 *
	 * @access	private
	 * @return	int
	 */
	private function _divine_entry_id()
	{
		$entry_id = FALSE;
		$qstring = ee()->uri->query_string;
		$qstring_hash = md5($qstring);

		if (isset(ee()->session->cache['comment']['entry_id'][$qstring_hash]))
		{
			return ee()->session->cache['comment']['entry_id'][$qstring_hash];
		}

		if (ee()->TMPL->fetch_param('entry_id'))
		{
			return ee()->TMPL->fetch_param('entry_id');
		}
		elseif (ee()->TMPL->fetch_param('url_title'))
		{
			$entry_seg = ee()->TMPL->fetch_param('url_title');
		}
		else
		{
			if (preg_match("#(^|/)P(\d+)(/|$)#", $qstring, $match))
			{
				$qstring = trim(ee()->functions->remove_double_slashes(str_replace($match['0'], '/', $qstring)), '/');
			}

			// Figure out the right entry ID
			// If there is a slash in the entry ID we'll kill everything after it.
			$entry_seg = trim($qstring);
			$entry_seg= preg_replace("#/.+#", "", $entry_seg);
		}

		if (is_numeric($entry_seg))
		{
			$entry_id = $entry_seg;
		}
		else
		{
			ee()->db->select('entry_id');
			$query = ee()->db->get_where('channel_titles', array('url_title' => $entry_seg));

			if ($query->num_rows() == 1)
			{
				$row = $query->row();
				$entry_id = $row->entry_id;
			}
		}

		return ee()->session->cache['comment']['entry_id'][$qstring_hash] = $entry_id;
	}

	// --------------------------------------------------------------------

	/**
	 * Update Entry and Channel Stats
	 *
	 * @return	void
	 */
	private function _update_comment_stats($entry_id, $channel_id, $author_id)
	{
		ee()->stats->update_channel_title_comment_stats(array($entry_id));
		ee()->stats->update_comment_stats($channel_id, '', FALSE);
		ee()->stats->update_comment_stats();
		ee()->stats->update_authors_comment_stats(array($author_id));

		return;
	}

}
// END CLASS

/* End of file mod.comment.php */
/* Location: ./system/expressionengine/modules/comment/mod.comment.php */
