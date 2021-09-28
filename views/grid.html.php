<?php defined( 'ABSPATH' ) || exit;
// grid shortcode template [srevo-grd] ?>

<div class="srevo-grid-container<?php echo $unique_cnt;?>">
		 <?php echo do_shortcode(stripslashes($content));?>
</div>

<style type="text/css">
.srevo-grid-container<?php echo $unique_cnt;?> {
  display: grid;
  grid-template-columns: <?php for($i=0; $i < $grid_columns; $i++):?> auto<?php endfor;?>;			  
  padding: <?php echo $grid_padding;?>;
}

.srevo-grid-container<?php echo $unique_cnt;?> .srevo-grid-item {			  
  border: <?php echo $item_border;?>;
  padding: <?php echo $item_padding;?>;	 
  text-align: center;
}
</style>