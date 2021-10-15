<?php
class ShortcodeRevolution {
	public static function install($update = false) {
		global $wpdb;
		$wpdb -> show_errors();
   	$collation = $wpdb->get_charset_collate();
   	if(!$update) self::init();
   	
   	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	} // end install
	
	public static function init() {
		global $wpdb;
		load_plugin_textdomain( 'shortcode-revolution', false, SREVO_RELATIVE_PATH."/languages/" );
				
		// define table names 
	
		$version = get_option('srevo_version');
		// if(version_compare($version, '0.1') == -1) self::install(true);
	
		// actions 
		
		// shortcodes
		
		// posts
		add_shortcode('srevo-related-posts', ['ShortcodeRevolutionPosts', 'related']);
		add_shortcode('srevo-posts', ['ShortcodeRevolutionPosts', 'list']);
		add_shortcode('srevo-comments', ['ShortcodeRevolutionPosts', 'comments']);
		
		// lightbox / modal
		add_shortcode('srevo-modal', ['ShortcodeRevolutionPopups', 'modal']);
		
		// columns & grid
		add_shortcode('srevo-columns', ['ShortcodeRevolutionGrid', 'columns']);
		add_shortcode('srevo-grid', ['ShortcodeRevolutionGrid', 'grid']);
		add_shortcode('srevo-grid-item', ['ShortcodeRevolutionGrid', 'grid_item']);
		
		// tabs
		add_shortcode('srevo-tabs', ['ShortcodeRevolutionTabs', 'tabs']);
		add_shortcode('srevo-tab', ['ShortcodeRevolutionTabs', 'tab']);
		
		// buttons
		add_shortcode('srevo-button', ['ShortcodeRevolutionButtons', 'button']);
		
	} // end init
	
	public static function admin_scripts() {
	  wp_register_style( 'srevo-admin-css', SREVO_URL.'css/admin.css?v=1');
	  wp_enqueue_style( 'srevo-admin-css' );
	} // end admin_scripts
	
	public static function front_scripts() {
		wp_enqueue_script('jquery');
		wp_register_style( 'srevo-front-css', SREVO_URL.'css/front.css?v=1');
	 	wp_enqueue_style( 'srevo-front-css' );
	} // end front_scripts
	
	// main menu
   public static function menu() {
   	$srevo_caps = current_user_can('manage_options') ? 'manage_options' : 'srevo_manage';
   	
   	add_menu_page(__('Shortcode Revolution', 'shortcode-revolution'), __('Shortcode Revolution', 'shortcode-revolution'), $srevo_caps , "shortcode_revolution", 
   		array('ShortcodeRevolutionGenerator', "main"));
   	add_submenu_page('shortcode_revolution', __('Get Shortcodes', 'shortcode-revolution'), __('Get Shortcodes', 'shortcode-revolution'), $srevo_caps , 
   		'shortcode_revolution', array('ShortcodeRevolutionGenerator', "main"));
   	add_submenu_page('shortcode_revolution', __('Settings', 'shortcode-revolution'), __('Settings', 'shortcode-revolution'), $srevo_caps , 
   		'shortcode_revolution_settings', array('ShortcodeRevolution', "settings"));
   	
	} // end menu
	
	public static function settings() {
	} // end settings
}