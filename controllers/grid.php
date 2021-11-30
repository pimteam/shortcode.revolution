<?php
if(!defined('ABSPATH')) exit;

// Grids and columns
class ShortcodeRevolutionGrid extends ShortcodeRevolutionShortcode {
	// Content floating in columns
	// As explained at https://www.w3schools.com/css/css3_multiple_columns.asp
	public static function columns($atts, $content = '') {
		self :: load_css(); 
		
		$column_count = empty($atts['column_count']) ? 3 : intval($atts['column_count']);
		$column_gap = empty($atts['column_gap']) ? '10px' : esc_attr($atts['column_gap']);
		$column_rule = empty($atts['column_rule']) ? '' : esc_attr($atts['column_rule']);
		$column_width = empty($atts['column_width']) ? '' : esc_attr($atts['column_idth']);
		
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
	
	// grid shortcode
	public static function grid($atts, $content = '') {
		self :: load_css(); 
		
		$grid_columns = empty($atts['column_count']) ? 3 : intval($atts['column_count']);
		$grid_padding = empty($atts['grid_padding']) ? '10px' : esc_attr($atts['grid_padding']);
		$item_padding = empty($atts['item_padding']) ? '10px' : esc_attr($atts['item_padding']);
		$item_border = empty($atts['item_border']) ? '10px' : esc_attr($atts['item_border']);
		
		$unique_cnt = srevo_unique_cnt();
		
		ob_start();
		require ShortcodeRevolutionTemplates :: load('grid');
		$content = ob_get_clean();
		return $content;
	} // end grid
	
	// grid item
	public static function grid_item($atts, $content = '') {
		$grid_column = empty($atts['grid_column']) ? '' : 'grid-column: '.esc_attr($atts['grid_column']).';';
			
		$html = '<div class="srevo-grid-item" style="'.$grid_column.'">'.apply_filters('the_content', $content).'</div>';
		return $html;
	} // end grid_item
}