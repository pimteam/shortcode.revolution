<div class="wrap">
	<h1><?php _e('Shortcode Revolution Settings', 'shortcode-revolution');?></h1>
	
	<form method="post" class="srevo-form">
		<fieldset>
			<h3><?php _e('Custom CSS', 'shortcode-revolution');?></h3>
			<p><b><?php _e('Custom CSS for your shortcodes', 'shortcode-revolution');?></b> <br>
			<textarea cols="80" rows="10" name="custom_css"><?php echo esc_textarea(stripslashes($custom_css));?></textarea></p>
		</fieldset>
		
		<fieldset>
			<h3><?php _e('Manage roles', 'shortcode-revolution');?></h3>
			<p><?php _e('Specify roles that can have access to managing this plugin (except this settings page - it will always be accessible only to administrators.', 'shortcode-revolution');?></p>
			
			<p><?php foreach($roles as $key=>$r):
						if($key=='administrator') continue;
						$role = get_role($key);?>
						<input type="checkbox" name="manage_roles[]" value="<?php echo $key?>" <?php if($role->has_cap('srevo_manage')) echo 'checked';?>> <?php _e($role->name, 'shortcode-revolution')?> &nbsp;
					<?php endforeach;?></p>		
		</fieldset>	
		
		<p><input type="submit" value="<?php _e('Save Settings', 'shortcode-revolution')?>" class="button button-primary"></p>
		<?php wp_nonce_field('srevo_settings');?>
		<input type="hidden" name="save_settings" value="1">
	</form>
</div>