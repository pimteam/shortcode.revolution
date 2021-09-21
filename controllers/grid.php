<?php
// Grids and columns
class ShortcodeRevolutionGrid {
	// Content floating in columns
	// As explained at https://www.w3schools.com/css/css3_multiple_columns.asp
	public static function columns($atts, $content = '') {
		$column_count = empty($atts['column_count']) ? 3 : intval($atts['column_count']);
		$column_gap = empty($atts['column_gap']) ? '10px' : sanitize_text_field($atts['column_gap']);
		$column_rule = empty($atts['column_rule']) ? '' : sanitize_text_field($atts['column_rule']);
		$column_width = empty($atts['column_width']) ? '' : sanitize_text_field($atts['column_idth']);
		
		if(empty($content)) return '';
		
		// prepare inline style
		$style = 'column-count: '.$column_count.';column-gap:'.$column_gap.';';
		if(!empty($column_rule)) $style .= 'column-rule:'.$column_rule.';';
		if(!empty($column_width)) $style .= 'column-width:'.$column_width.';';
		
		$html = '<div style="'.$style.'">';
		$html .= stripslashes($content);
		$html .= '</div>';
		
		return $html;
	} // end column
}