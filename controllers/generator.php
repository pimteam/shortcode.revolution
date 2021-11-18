<?php
// the shortcode generator 
class ShortcodeRevolutionGenerator {
	public static function main() {
		global $wpdb;
		$tab = empty($_GET['tab'])	? 'posts' : esc_attr($_GET['tab']);
		
		switch($tab) {
			case 'posts':
			   $what = empty($_POST['what']) ? 'posts' : esc_attr($_POST['what']);
			   
			   if(!empty($_POST['generate'])) {
			   	switch($what) {			   		
			   		case 'posts':
			   			$shortcode = '[srevo-posts';
			   				if(!empty($_POST['post_ids'])) $shortcode .= ' ids="'.preg_replace('/^[0-9,]+$/', '', $_POST['post_ids']).'"';
			   				if(!empty($_POST['post_types'])) $shortcode .= ' post_types="'.sanitize_text_field(preg_replace('/\s/', '', $_POST['post_types'])).'"';			   				
			   				if(!empty($_POST['categories'])) $shortcode .= ' categories="'.preg_replace('/\s/', '', sanitize_text_field($_POST['categories'])).'"';
			   				if(!empty($_POST['tags'])) $shortcode .= ' tags="'.sanitize_text_field(preg_replace('/\s/', '', $_POST['tags'])).'"';
			   				if(!empty($_POST['post_num'])) $shortcode .= ' num="'.intval($_POST['post_num']).'"';
			   				if(!empty($_POST['post_orderby'])) $shortcode .= ' orderby="'.sanitize_text_field($_POST['post_orderby']).'"';
			   				if(!empty($_POST['post_order'])) $shortcode .= ' order="'.sanitize_text_field($_POST['post_order']).'"';
			   				if(!empty($_POST['post_display_mode'])) $shortcode .= ' display_mode="'.sanitize_text_field($_POST['post_display_mode']).'"';
			   			$shortcode .= ']';
			   		break;
			   		
			   		case 'related':
			   			$shortcode = '[srevo-related-posts';
			   				if(!empty($_POST['related_id'])) $shortcode .= ' post_id="'.intval($_POST['related_id']).'"';
			   				if(!empty($_POST['related_criteria'])) $shortcode .= ' criteria="'.sanitize_text_field($_POST['related_criteria']).'"';
								if(!empty($_POST['related_num'])) $shortcode .= ' num="'.intval($_POST['related_num']).'"';
								if(!empty($_POST['related_display_mode'])) $shortcode .= ' display_mode="'.sanitize_text_field($_POST['related_display_mode']).'"';
			   			$shortcode .= ']';
			   		break;
			   		
			   		case 'comments':
			   			$shortcode = '[srevo-comments';
			   				if(!empty($_POST['author_email'])) $shortcode .= ' author_email="'.sanitize_email($_POST['author_email']).'"';		
			   				if($_POST['comment_for_post'] != 'any') {
			   					 if($_POST['comment_for_post'] == 'current') $shortcode .= ' post_id="current"';
			   					 else $shortcode .= ' post_id="'.intval($_POST['comment_post_id']).'"';
			   				}	   				
			   				
			   				if(!empty($_POST['comment_orderby'])) $shortcode .= ' orderby="'.sanitize_text_field($_POST['comment_orderby']).'"';
			   				if(!empty($_POST['comment_order'])) $shortcode .= ' order="'.sanitize_text_field($_POST['comment_order']).'"';
			   				if(!empty($_POST['comment_num'])) $shortcode .= ' num="'.intval($_POST['comment_num']).'"';
			   				if(!empty($_POST['comment_display_mode'])) $shortcode .= ' display_mode="'.sanitize_text_field($_POST['comment_display_mode']).'"';
			   			$shortcode .= ']';
			   		break;
			   	}
			   }
			break; // end posts
			
			case 'modals':
				if(!empty($_POST['generate'])) {
					$shortcode = '[srevo-modal';
		   			if(!empty($_POST['link_text'])) $shortcode .= ' link_text="'.esc_attr($_POST['link_text']).'"';
		   			if(!empty($_POST['link_class'])) $shortcode .= ' link_class="'.esc_attr($_POST['link_class']).'"';
		   			$shortcode .= ']';			   			
		   			$shortcode .= stripslashes($_POST['modal_content']);
			   	$shortcode .= '[/srevo-modal]';
				}
			break;
			
			case 'columns':
				if(!empty($_POST['generate'])) {
					if($_POST['content_type'] == 'columns') {
						$shortcode = '[srevo-columns';
			   			if(!empty($_POST['column_count'])) $shortcode .= ' column_count="'.intval($_POST['column_count']).'"';
			   			if(!empty($_POST['column_gap'])) $shortcode .= ' column_gap="'.esc_attr($_POST['column_gap']).'"';
			   			if(!empty($_POST['column_rule'])) $shortcode .= ' column_rule="'.esc_attr($_POST['column_rule']).'"';
			   			if(!empty($_POST['column_width'])) $shortcode .= ' column_width="'.esc_attr($_POST['column_width']).'"';
			   			$shortcode .= ']';			   			
			   			$shortcode .= stripslashes($_POST['columns_content']);
				   	$shortcode .= '[/srevo-columns]';					
					}
					
					if($_POST['content_type'] == 'grid') {
						$grid_items = empty($_POST['num_items']) ? 3 : intval($_POST['num_items']);
						
						$shortcode = '[srevo-grid';
			   			if(!empty($_POST['grid_column_count'])) $shortcode .= ' column_count="'.intval($_POST['grid_column_count']).'"';
			   			if(!empty($_POST['grid_padding'])) $shortcode .= ' grid_padding="'.esc_attr($_POST['grid_padding']).'"';
			   			if(!empty($_POST['item_padding'])) $shortcode .= ' item_padding="'.esc_attr($_POST['item_padding']).'"';
			   			if(!empty($_POST['item_border'])) $shortcode .= ' item_border="'.esc_attr($_POST['item_border']).'"';
			   			$shortcode .= ']'."\n";			   			
			   			
							for($i=0; $i < $grid_items; $i++) {
								$shortcode .= '[srevo-grid-item] '.sprintf(__('Content %d', 'shortcode-revolution'), $i+1).' [/srevo-grid-item]'."\n";
							} 			   			
			   			
				   	$shortcode .= '[/srevo-grid]';			
					}
				}	
				
				// set defaults for the grid
				$grid_columns = empty($_POST['grid_column_count']) ? 3 : intval($_POST['grid_column_count']);
				$grid_items = empty($_POST['num_items']) ? 3 : intval($_POST['num_items']);
				$grid_padding = empty($_POST['grid_padding']) ? "10px" : esc_attr($_POST['grid_padding']);
				$item_padding = empty($_POST['item_padding']) ? "10px" : esc_attr($_POST['item_padding']);
				$item_border = empty($_POST['item_border']) ? "1px solid rgba(0, 0, 0, 0.8)" : esc_attr($_POST['item_border']);
			break;
			
			case 'tabs':
				if(!empty($_POST['generate'])) {
					$shortcode = '[srevo-tabs]';
		   		$num_tabs = intval($_POST['num_tabs']);
		   		if($num_tabs <= 1) $num_tabs = 1;
					
					for($i = 1; $i <= $num_tabs; $i++) {	
						$shortcode .= "\n[srevo-tab title=\"".stripslashes($_POST['tab_text_'.$i])."\"]";
						$tab_content = wp_kses_post(stripslashes($_POST['tab_content_'.$i]));
						$shortcode .= $tab_content;
						$shortcode .= "[/srevo-tab]\n";
					}	   		
		   		
			   	$shortcode .= '[/srevo-tabs]';
				}
				
				wp_enqueue_script('jquery-ui-tabs');
			break;
			
			case 'buttons':
				if(!empty($_POST['generate'])) {
					$shortcode = '[srevo-button';
					
					$shortcode .= ' button_text="'.esc_attr($_POST['button_text']).'"';
					$shortcode .= ' button_href="'.esc_attr($_POST['button_href']).'"';					
					$shortcode .= ' button_style="'.esc_attr($_POST['button_style']).'" ';
					$shortcode .= ' button_classes="'.esc_attr($_POST['button_classes']).'"';
					$shortcode .= ' button_text_color="'.esc_attr($_POST['button_text_color']).'"';
					$shortcode .= ' button_bg_color="'.esc_attr($_POST['button_bg_color']).'"';
					$shortcode .= ' button_font_size="'.esc_attr($_POST['button_font_size']).'"';
					$shortcode .= ' button_padding="'.esc_attr($_POST['button_padding']).'"';
					$shortcode .= ' button_radius="'.esc_attr($_POST['button_radius']).'"';
					
					$shortcode .= ']';
				}
				
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'wp-color-picker' );		
				
				// front css is needed here too
				ShortcodeRevolution :: front_scripts();
			break;
			
			case 'tables':
				if(!empty($_POST['generate'])) {
					// upload file
					if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
					$uploadedfile = $_FILES['csv'];
									
					// must have a CSV extension
					$error = false;
					if($uploadedfile['type'] != 'text/csv') {
						$error = __('Only CSV files are accepted', 'srevo');
					}
					$content = file_get_contents($_FILES['csv']['tmp_name']);
					if(!$error and !mb_detect_encoding($content, 'UTF-8', true)) {
						$error = __('The file should be in UTF-8 Unicode format', 'srevo');
					}
					
					$upload_overrides = array( 'test_form' => false );
					$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
					if ( $movefile and empty($error)) {					    
					    $shortcode = '[srevo-table data_source="'.$movefile['url'].'" delimiter="'.esc_attr($_POST['delim']).'" css_classes="'.esc_attr($_POST['table_css']).'"]';
					} 
				}
			break;
			
			case 'flashcards':
				if(!empty($_POST['generate'])) {
					$shortcode = '[srevo-flashcard';
					
					$shortcode .= ' width="'.sanitize_text_field($_POST['card_width']).'"';
					$shortcode .= ' height="'.sanitize_text_field($_POST['card_height']).'"';
					$shortcode .= ' border_radius="'.sanitize_text_field($_POST['card_radius']).'"';					
					$shortcode .= ' front_color="'.sanitize_text_field($_POST['card_front_color']).'"';
					$shortcode .= ' back_color="'.sanitize_text_field($_POST['card_back_color']).'"';
					$shortcode .= ' padding="'.sanitize_text_field($_POST['padding']).'"';
				
					$shortcode .= ']';
					
			
					$shortcode .= wp_kses_post($_POST['flashcard_front']).'<!-- split -->'.wp_kses_post($_POST['flashcard_back']);				
					
					$shortcode .= '[/srevo-flashcard]';
				}
				
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'wp-color-picker' );		
			break;
			
			case 'data':
				// get all keys for user meta
				$meta_keys = $wpdb->get_results("SELECT DISTINCT(meta_key) as meta_key FROM {$wpdb->usermeta} 
					WHERE meta_key NOT LIKE 'wp_%' ORDER BY meta_key");
				
				if(!empty($_POST['generate'])) {
					$shortcode = '[srevo-profile user_id="'.sanitize_text_field($_POST['user_id']).'"';
					
					if($_POST['user_id'] == 'specific') $shortcode .= ' specific_user_id="'.intval($_POST['specific_user_id']).'"';				
					if($_POST['user_id'] == 'get') $shortcode .= ' var_name="'.sanitize_text_field($_POST['var_name']).'"';
					
					$shortcode .= ' field="'.sanitize_text_field($_POST['field']).'"';
					
					$shortcode .= ']';
					
					// all fields? Then construct a string inside the shortcode instead
					if($_POST['field'] == '__ALL__') {
						$content = "ID: {{ID}}\n".__('Username (login):', 'srevo')." {{user_login}}\n".__('Email address:', 'srevo')." {{user_email}}\n";
						$content .= __('First name:', 'srevo')." {{first_name}}\n".__('Last name:', 'srevo')." {{last_name}}\n";
						$content .= __('Display name:', 'srevo')." {{display_name}}\n".__('User roles:', 'srevo')." {{user_roles}}\n";
						$content .= __('Registration date / time:', 'srevo')." {{user_registered}}\n";		
						
						// now add meta
						foreach($meta_keys as $meta_key) $content .= $meta_key->meta_key.": {{meta_".$meta_key->meta_key."}}\n";
						
						$shortcode .= $content;				
						
						$shortcode .= '[/srevo-profile]';
					} // end all fields
				} 			
			break;
		} // end switch
		
		// enqueue jquery-ui
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_style('jquery-ui-style', SREVO_URL.'css/jquery-ui.css');
		include(SREVO_PATH."/views/generator.html.php");
	} // end main
}