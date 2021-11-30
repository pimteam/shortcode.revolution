<?php
if(!defined('ABSPATH')) exit;
// Data
class ShortcodeRevolutionData extends ShortcodeRevolutionShortcode {	
	// Data from user profile
	public static function user($atts, $contents = '') {
		self :: load_css();
		
		if(empty($atts['field'])) return __('No field specified', 'shortcode-revolution');
		 
		// select the user
		switch($atts['user_id']) {
			case 'get':
			  $var_name = empty($atts['var_name']) ? 'uid' : sanitize_text_field($atts['var_name']);
			  
			  $user_id = empty($_GET[$var_name]) ? 0 : intval($_GET[$var_name]);
			break;
			case 'specific':
				$user_id = empty($atts['specific_user_id']) ? 0 : intval($atts['specific_user_id']);
			break;
			case 'logged_in':
			default:
			   $user_id = get_current_user_id();
			break;
		}
		
		$userdata = get_userdata($user_id);
		if(empty($userdata->ID)) return __('User not found', 'shortcode-revolution');
			
		// in case of all meta fields we have to collect the whole meta and then replace in the $content
		if($atts['field'] == '__ALL__') {
			// profile fields
			$contents = str_replace('{{ID}}', $userdata->ID, $contents);
			$contents = str_replace('{{user_login}}', $userdata->user_login, $contents);			
			$contents = str_replace('{{user_email}}', $userdata->user_email, $contents);
			$contents = str_replace('{{first_name}}', $userdata->first_name, $contents);
			$contents = str_replace('{{last_name}}', $userdata->last_name, $contents);
			$contents = str_replace('{{display_name}}', $userdata->display_name, $contents);
			$contents = str_replace('{{user_roles}}', implode(', ', $userdata->roles), $contents);
			$contents = str_replace('{{user_registered}}', date_i18n(get_option('date_format').' '.get_option('time_format'), strtotime($userdata->date_registered)), $contents);
			
			// meta
			$meta = get_user_meta($user_id);
				
			foreach($meta as $key => $val) {
				if(@unserialize($val[0]) !== false) $val[0] = unserialize($val[0]);
				if(is_array($val[0])) continue;
				$contents = str_replace('{{meta_'.$key.'}}', $val[0], $contents);
			}
			
			// any left replace with blank
			$contents = preg_replace('/{{[^}]*}}/', '', $contents);
			
			return $contents;			
		}
		
		if(!preg_match('/^meta\_/', $atts['field'])) {
			if(!in_array($atts['field'], ['ID', 'user_login', 'user_email', 'first_name', 'last_name', 'display_name', 'user_roles', 'user_registered'])) return "";

			// a couple of special fields			
			if($atts['field'] == 'user_roles') {
				return implode(', ', $userdata->roles);
			}
			if($atts['field'] == 'user_registered') {
				return date_i18n(get_option('date_format').' '.get_option('time_format'), strtotime($userdata->date_registered));
			}
			// end special fields
			
			// other fields just return 
			return $userdata->{$atts['field']};
		}
		
		// it's a meta field
		$meta_key = preg_replace("/^meta\_/", '', sanitize_text_field($atts['field']));
		$value = get_user_meta($user_id, $meta_key, true);
		return $value;
	} // end button
}