<?php
if(!defined('ABSPATH')) exit;

// Buttons
class ShortcodeRevolutionButtons extends ShortcodeRevolutionShortcode {
	
	// The tabs container
	public static function button($atts) {
		self :: load_css();
		
		$button_text = sanitize_text_field($atts['button_text']);
		$href = empty($atts['button_href']) ? '' : esc_url($atts['button_href']);
		
		$classes = '';
		if(!empty($atts['button_style'])) $classes .= ' '.esc_attr($atts['button_style']);
		if(!empty($atts['button_classes'])) $classes .= ' '.esc_attr($atts['button_classes']);
		
		$style = '';
		
		if(!empty($atts['button_text_color'])) $style .= 'color:'.esc_attr($atts['button_text_color']).';';
		if(!empty($atts['button_bg_color'])) $style .= 'background-color:'.esc_attr($atts['button_bg_color']).';';
		if(!empty($atts['button_font_size'])) $style .= 'font-size:'.esc_attr($atts['button_font_size']).';';
		if(!empty($atts['button_padding'])) $style .= 'padding:'.esc_attr($atts['button_padding']).';';
		if(!empty($atts['button_radius'])) $style .= 'border-radius:'.esc_attr($atts['button_radius']).';';
		
		$html = '<button onclick="window.location=\''.$href.'\';" class="srevo-button '.esc_attr($classes).'" style="'.esc_attr($style).'">'.esc_attr($button_text).'</button>';	
		
		return $html;
	} // end button
}