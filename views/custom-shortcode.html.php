<?php defined( 'ABSPATH' ) || exit; ?>

<h1><?php _e('Add/Edit a Custom Shortcode', 'srevo');?></h1>

<p><a href="admin.php?page=shortcode_revolution&tab=custom"><?php _e('Back to the shortcode generator', 'srevo');?></a></p>

	<p><?php _e('The custom shortcodes are just stored pieces of contents, HTML code, etc, which you can reuse across your site to save time', 'srevo');?></p>
			<p><?php printf(__('Each of these shortcodes allows enclosing contents. In that case using the variable %s in the shortcode box allows you to wrap the content inside a text or HTML code.', 'srevo'), '{{enclosed}}');?></p>

<div class="wrap">
	<form method="post" class="srevo-form">
		<p><label><?php _e("Shortcode name", 'srevo');?></label> <input type="text" name="name" value="<?php echo $shortcode->name ?? '';?>" required></p>
		
		<p><label><?php _e('Generated content:', 'srevo');?></label> 
		<?php wp_editor(empty($shortcode->shortcode) ? '' : stripslashes($shortcode->shortcode), "shortcodeContent", ['textarea_name'=>'shortcode'])?></p>
		
		<p><input type="submit" name="save" value="<?php _e('Save shortcode', 'srevo');?>" class="button button-primary">
		<?php if(!empty($shortcode->id)):?><input type="button" value="<?php _e('Delete', 'srevo');?>" class="button" onclick="srevoConfirmDelete(this.form);"><?php endif;?></p>
		<?php wp_nonce_field('srevo_custom');?>
		<input type="hidden" name="del" value="0">
	</form>
</div>

<script type="text/javascript" >
function srevoConfirmDelete(frm) {
	if(confirm('<?php _e('Are you sure?', 'srevo');?>')) {
		frm.del.value=1;
		frm.submit();
	}
}
</script>