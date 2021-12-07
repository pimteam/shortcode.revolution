<?php defined( 'ABSPATH' ) || exit;
// grid shortcode template [srevo-grd] ?>

<div class="srevo-grid-container<?php echo esc_attr($unique_cnt);?>">
		 <?php echo do_shortcode(wp_kses_post($content));?>
</div>

<style type="text/css">
.srevo-grid-container<?php echo esc_attr($unique_cnt);?> {
  display: grid;
  grid-template-columns: <?php for($i=0; $i < $grid_columns; $i++):?> auto<?php endfor;?>;			  
  padding: <?php echo esc_attr($grid_padding);?>;
}

.srevo-grid-container<?php echo esc_attr($unique_cnt);?> .srevo-grid-item {			  
  border: <?php echo esc_attr($item_border);?>;
  padding: <?php echo esc_attr($item_padding);?>;	 
  text-align: center;
}
</style>