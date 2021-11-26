<?php
if(!defined('ABSPATH')) exit;

// some methods inherited by all shortcode classes
class ShortcodeRevolutionShortcode {
	
	protected static function load_css() {		
		 $custom_css = get_option('srevo_custom_css');
		 if(empty($custom_css)) return false;
		 
		 wp_enqueue_style(
			'srevo-dynamic-style',
			site_url("?srevo_dynamic_css=1"),
			[],
			'1.0');
	} // end load_css
}