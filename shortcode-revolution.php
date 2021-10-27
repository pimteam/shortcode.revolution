<?php
/*
Plugin Name: Shortcode Revolution
Plugin URI: http://calendarscripts.info/shortcode-revolution/
Description: Shortcode everything. The low code / no code tool for WordPress developers, designers, and power users.
Author: Kiboko Labs
Version: 0.2.8
Author URI: http://calendarscripts.info/
License: GPLv2 or later
Text domain: shortcode-revolution
*/

define( 'SREVO_PATH', dirname( __FILE__ ) );
define( 'SREVO_RELATIVE_PATH', dirname( plugin_basename( __FILE__ )));
define( 'SREVO_URL', plugin_dir_url( __FILE__ ));

// require controllers and models
require_once(SREVO_PATH.'/models/main.php');
require_once(SREVO_PATH.'/helpers/htmlhelper.php');
require_once(SREVO_PATH.'/controllers/ajax.php');
require_once(SREVO_PATH.'/controllers/posts.php');
require_once(SREVO_PATH.'/controllers/popups.php');
require_once(SREVO_PATH.'/controllers/grid.php');
require_once(SREVO_PATH.'/controllers/tabs.php');
require_once(SREVO_PATH.'/controllers/buttons.php');
require_once(SREVO_PATH.'/controllers/templates.php');
require_once(SREVO_PATH.'/controllers/generator.php');

add_action('init', array("ShortcodeRevolution", "init"));

register_activation_hook(__FILE__, array("ShortcodeRevolution", "install"));
add_action('admin_menu', array("ShortcodeRevolution", "menu"));
add_action('admin_enqueue_scripts', array("ShortcodeRevolution", "admin_scripts"));

// show the things on the front-end
add_action( 'wp_enqueue_scripts', array("ShortcodeRevolution", "front_scripts"));

// other actions
add_action('wp_ajax_srevo_ajax', ['ShortcodeRevolutionAjax', 'main']);
add_action('wp_ajax_nopriv_srevo_ajax', ['ShortcodeRevolutionAjax', 'main']);