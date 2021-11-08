<?php
// Tabs
class ShortcodeRevolutionButtons {
	
	// The tabs container
	public static function button($atts) {
		$button_text = sanitize_text_field($atts['button_text']);
		$href = empty($atts['button_href']) ? '' : esc_url($atts['button_href']);
		
		$classes = '';
		if(!empty($atts['button_style'])) $classes .= ' '.sanitize_text_field($atts['button_style']);
		if(!empty($atts['button_classes'])) $classes .= ' '.sanitize_text_field($atts['button_classes']);
		
		$style = '';
		
		if(!empty($atts['button_text_color'])) $style .= 'color:'.sanitize_text_field($atts['button_text_color']).';';
		if(!empty($atts['button_bg_color'])) $style .= 'background-color:'.sanitize_text_field($atts['button_bg_color']).';';
		if(!empty($atts['button_font_size'])) $style .= 'font-size:'.sanitize_text_field($atts['button_font_size']).';';
		if(!empty($atts['button_padding'])) $style .= 'padding:'.sanitize_text_field($atts['button_padding']).';';
		if(!empty($atts['button_radius'])) $style .= 'border-radius:'.sanitize_text_field($atts['button_radius']).';';
		
		$html = '<button onclick="window.location=\''.$href.'\';" class="srevo-button '.esc_attr($classes).'" style="'.esc_attr($style).'">'.esc_attr($button_text).'</button>';	
		
		return $html;
	} // end button
}