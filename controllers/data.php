<?php
// Tabs
class ShortcodeRevolutionData {	
	// Data from user profile
	public static function user($atts, $contents = '') {
		if(empty($atts['field'])) return __('No field specified', 'srevo');
		 
		// select the user
		switch($atts['user_id']) {
			case 'get':
			  $var_name = empty($atts['var_name']) ? 'uid' : sanitize_text_field($atts['var_name']);
			  
			  $user_id = empty($_GET[$var_name]) ? 0 : intval($_GET[$var_name]);
			break;
			case 'specific':
				$user_id = empty($atts['specific_user_id']) ? 0 : intval($atts['specific_user_id'])
			break;
			case 'logged_in':
			default:
			   $user_id = get_current_user_id();
			break;
		}
		
		$userdata = get_userdata($user_id);
		
		if(!preg_match('/^meta\_/', $atts['field'])) {
			if(!in_array($atts['field']), ['ID', 'user_login', 'user_email', 'first_name', 'last_name', 'display_name', 'user_roles', 'user_registered']) return "";

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
		// NYI
	} // end button
}