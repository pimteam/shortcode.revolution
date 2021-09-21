<?php
if(!defined('ABSPATH')) exit;
// Lighbox / Modal
class ShortcodeRevolutionPopups {
	// using https://jquerymodal.com/
	public static function modal($atts, $content) {
		if(empty($content)) return;
		
		wp_register_script('jquery-modal', SREVO_URL.'lib/jquery-modal/jquery.modal.min.js', ['jquery'], '0.9.1', true);
		wp_enqueue_script('jquery-modal');		
		wp_enqueue_style('jquery-modal-css', SREVO_URL.'lib/jquery-modal/jquery.modal.min.css');		
		
		// ensure unque ID
		if(empty($_POST['srevo_unique_cnt'])) $_POST['srevo_unique_cnt'] = 1;
		else $_POST['srevo_unique_cnt'] = intval($_POST['srevo_unique_cnt']) + 1; 
		$unique_cnt = $_POST['srevo_unique_cnt'];
		
		$content = apply_filters('the_content', $content);	
		
		// default clickable is a predefined link in case something was entered wrong
		$link_class = empty($atts['link_class']) ? 'srevo-modal-button' : esc_attr($atts['link_class']);	
		$link_text = empty($atts['link_text']) ? __('Open modal', 'shortcode-revolution') : esc_attr($atts['link_text']);
		$clickable = '<p><a href="#srevo-modal-'.$unique_cnt.'" rel="modal:open" class="'.$link_class.'">'.$link_text.'</a></p>';				
		$close_text = __('Close','shortcode-revolution');			
		
		$html = '<div id="srevo-modal-'.$unique_cnt.'" class="modal">
  							<p>'.$content.'</p> 
					</div>';

		$html .= $clickable;
		
		return $html;
	} // end lightbox	
}