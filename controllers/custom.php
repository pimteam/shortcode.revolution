<?php
class ShortcodeRevolutionCustom {
	// manage shortcodes
	public static function manage() {
		global $wpdb;
		
		if(!empty($_GET['id']) and !empty($_POST['del']) and check_admin_referer('srevo_custom')) {
			$wpdb->query($wpdb->prepare("DELETE FROM ".SREVO_SHORTCODES." WHERE id=%d", intval($_GET['id'])));
			
			srevo_redirect("admin.php?page=shortcode_revolution&tab=custom");
		}
		
		if(!empty($_POST['save']) and check_admin_referer('srevo_custom')) {
			$name = preg_replace("/\W/", '', $_POST['name']);
			$shortcode = wp_kses_post($_POST['shortcode']);
			if(empty($_GET['id'])) {
				// add
				$wpdb->query($wpdb->prepare("INSERT INTO ".SREVO_SHORTCODES." SET name=%s, shortcode=%s", 
					$name, $shortcode));
					
			}		
			else {
				// edit
				$wpdb->query($wpdb->prepare("UPDATE ".SREVO_SHORTCODES." SET name=%s, shortcode=%s WHERE id=%d", 
					$name, $shortcode, intval($_GET['id']) ));
			}		
			
			srevo_redirect("admin.php?page=shortcode_revolution&tab=custom");	
		}
		
		if(!empty($_GET['id'])) {
			$shortcode = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".SREVO_SHORTCODES." WHERE id=%d", itnval($_GET['id'])));
		}
		
		include(SREVO_PATH."/views/custom-shortcode.html.php");
	} // end manage
}