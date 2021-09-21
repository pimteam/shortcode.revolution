<?php
// the shortcode generator 
class ShortcodeRevolutionGenerator {
	public static function main() {
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
		} // end switch
		
		include(SREVO_PATH."/views/generator.html.php");
	} // end main
}