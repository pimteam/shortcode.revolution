<?php
if(!defined('ABSPATH')) exit;

class ShortcodeRevolutionTemplates {
	// loads a template for a shortcode. First checks if custom modified file exists and loads it. If not, loads the default one.
	public static function load($template) {
		 if(@file_exists(get_stylesheet_directory().'/shortcode-revolution/' . $template . '.html.php')) return get_stylesheet_directory().'/shortcode-revolution/' . $template . '.html.php';
		 else return SREVO_PATH."/views/" . $template . '.html.php';
	} // end load	
}