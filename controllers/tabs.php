<?php
if(!defined('ABSPATH')) exit;
// Tabs
class ShortcodeRevolutionTabs extends ShortcodeRevolutionShortcode {
	
	// The tabs container
	public static function tabs($atts, $content = '')  {
		if(empty($content)) return '';
		self :: load_css();
		
		// parse the tab shortcodes. Instead of displaying directly, we'll break them into an array
		$content = do_shortcode($content);
		
		$tabs = explode('{{{srevo-split-tabs}}}', $content);		
				
		$html = '<div class="srevo-tabs">
			<ul>';
		
		foreach($tabs as $cnt => $tab) {
			if(empty($tab)) continue;
			$cnt++;			
			$parts = explode('{{{srevo-split-parts}}}', $tab);
			//print_r($parts);			
			$html .= '<li><a href="#srevo-tabs-'.$cnt.'">'.esc_attr(stripslashes(trim($parts[0]))).'</a></li>'."\n";
		}
			
		$html .= "</ul>\n";
		
		foreach($tabs as $cnt => $tab) {			
			$cnt++;			
			$parts = explode('{{{srevo-split-parts}}}', $tab);
			
			$html .= '<div id="srevo-tabs-'.$cnt.'">'.wp_kses_post(stripslashes($parts[1]))."</div>\n";
		}
		 
		$html .='</div>';
		
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_style('jquery-ui-style', SREVO_URL.'css/jquery-ui.css');
		wp_enqueue_script('jquery-ui-tabs');
		
		// add inline script
		$html .= "\n".'<script>
		document.addEventListener("DOMContentLoaded", function() {
				jQuery(".srevo-tabs").tabs();
			});
		</script>'."\n";	
		
		return $html;
	} // end column		
	
	// one tab. Return title and content so the tabs() shortcode can parse properly
	public static function tab($atts, $content) {
		$title = empty($atts['title']) ? __('Tab', 'shortcode-revolution') : sanitize_text_field($atts['title']);
		return $title.'{{{srevo-split-parts}}}'.$content.'{{{srevo-split-tabs}}}';
	}
}