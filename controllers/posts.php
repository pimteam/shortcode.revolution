<?php
if(!defined('ABSPATH')) exit;

// - option to display a list of posts based on search criteria
// - display X random posts
// - display related/suggested post(s) widget (options: fixed IDs, or random from the same category) [PRO] allow stats & tracking of views/clicks
// - display as a carousel. Carousel won't be a separate function but one of the display modes of the other shortcodes: normal, short list, carousel
// https://developer.wordpress.org/reference/classes/wp_query/
class ShortcodeRevolutionPosts extends ShortcodeRevolutionShortcode {
	// this is the most important function that takes params and runs a get_posts query
	// it's called by the other posts shortcodes - for example related widget, carousel etc
	public static function list($atts = null) {
		global $post;
		self :: load_css();
		
		$ids = empty($atts['ids']) ? '' : preg_replace('/^[0-9,]+$/', '', $atts['ids']);
		$types = empty($atts['post_types']) ? '' : explode(',', sanitize_text_field(preg_replace('/\s/', '', $atts['post_types'])));
		$cats = empty($atts['categories']) ? '' : preg_replace('/\s/', '', sanitize_text_field($atts['categories']));
		$tags = empty($atts['tags']) ? 0 : explode(',', sanitize_text_field(preg_replace('/\s/', '', $atts['tags'])));
		$orderby = empty($atts['orderby']) ? 'ID' : sanitize_text_field($atts['orderby']);
		$order = empty($atts['order']) ? 'ASC' : sanitize_text_field($atts['order']);
		if($order != 'ASC' and $order != 'DESC') $order = 'ASC';
		
		$query = [];		
		
		// post types
		if(!empty($atts['post_types'])) $query['post_type'] = $types;
		
		// categories		
		if(!empty($atts['categories'])) $query['category_name'] = $cats;
		
		// tags
		if(!empty($atts['tags'])) $query['tag_slug__in'] = $tags;
		
		// search in title and/or contents
		if(!empty($atts['search'])) $query['s'] = esc_attr(sanitize_text_field($atts['search']));

		// order	& limit	
		$query['orderby'] = $orderby;
		$query['order'] = $order;
		$query['posts_per_page'] = (empty($atts['num']) or !is_numeric($atts['num'])) ? 10 : intval($atts['num']);   
		
		if(!empty($post->ID)) $query['post__not_in'] = [$post->ID];
		
		$wp_query = new WP_Query($query);
		$posts = $wp_query->posts;
		
		$display_mode = empty($atts['display_mode']) ? 'regular' : $atts['display_mode'];
		if(!in_array($display_mode, ['regular', 'list', 'carousel'])) $display_mode = 'regular';
		
		$date_format = get_option('date_format');
		
		ob_start();
		require ShortcodeRevolutionTemplates :: load('posts-'.$display_mode);
		$content = ob_get_clean();
		return $content;
	} // end list

	// displays related post from same category and/or tags	
	public static function related($atts = null) {
		global $post;
		self :: load_css();
		$post_id = empty($atts['post_id']) ? $post->ID : intval($atts['post_id']);
		
		$post = get_post($post_id);
		
		if(empty($post)) return '';
		
		// tags, categories, or both?
		$criteria = $atts['criteria'];
		if(!in_array($criteria, ['tags', 'cats', 'both'])) $criteria = 'both'; 	
		
		// taxonomy query
		$query = [];		
		if($criteria == 'both' or $criteria == 'tags') {
			$tags = get_the_tags($post->ID);
			if(empty($tags) or !is_array($tags)) $tags = [];
						
			$tags_arr = [];
			foreach($tags as $tag) {
				$tags_arr[] = $tag->name;
			}
						
         $query['tag_slug__in'] = $tags_arr;
			
		} // end tags
		
		if($criteria == 'both' or $criteria == 'cats') {
			$cats = get_the_category($post->ID);
			$cats_arr = [];
			foreach($cats as $cat) $cats_arr[] = $cat->term_id;
			
			$query['category__in'] = $cats_arr;
		} // end categories
		
		//$query['nopaging'] = true;
		$query['posts_per_page'] = (empty($atts['num']) or !is_numeric($atts['num'])) ? 4 : intval($atts['num']) + 1;       
		$query['orderby'] = 'rand';
		
		$wp_query = new WP_Query($query);
		$posts = $wp_query->posts;
		
		// post__not_in does not work properly! for this reason skip the current post in PHP
		$posts = array_filter($posts, function($p) use($post_id) {				
				return ($p->ID != $post_id);					
		});
		
		// if the current post was not there we have one more than needed
		if($query['posts_per_page'] < count($posts)) array_pop($posts);
		
		$display_mode = empty($atts['display_mode']) ? 'regular' : $atts['display_mode'];
		if(!in_array($display_mode, ['regular', 'list', 'carousel'])) $display_mode = 'regular';
		
		$date_format = get_option('date_format');
		
		ob_start();
		require ShortcodeRevolutionTemplates :: load('posts-'.$display_mode);
		$content = ob_get_clean();
		return $content;
	} // end related posts
	
	// comments
	// search by: author_email, post_id
	// set order by, number (no pagination)
	// display_mode: standard, carousel
	// https://developer.wordpress.org/reference/classes/wp_comment_query/__construct/#parameters
	public static function comments($atts = null) {
		global $post;
		self :: load_css();
		
		$query = [];		
		$query['number'] = (empty($atts['num']) or !is_numeric($atts['num'])) ? 3 : intval($atts['num']);       
		$query['author_email'] = empty($atts['author_email']) ? '' : sanitize_email($atts['author_email']);
		if(!empty($atts['post_id'])) {
			if($atts['post_id'] == 'current' and !empty($post->ID)) $query['post_id'] = $post->ID;
			if(is_numeric($atts['post_id'])) $query['post_id'] = intval($atts['post_id']); 
		}
		
		if(!empty($atts['orderby'])) $query['orderby'] = esc_attr($atts['orderby']); 
	   $query['order'] = (!empty($atts['order']) and $atts['order'] == 'ASC') ? 'ASC' : 'DESC'; 
		
		$display_mode = empty($atts['display_mode']) ? 'regular' : $atts['display_mode'];
		if(!in_array($display_mode, ['regular', 'carousel'])) $display_mode = 'regular';
		
		$date_format = get_option('date_format');
		//print_r($query);
		$comments_query = new WP_Comment_Query( $query ); 
		$comments = $comments_query->comments;
		
		ob_start();
		require ShortcodeRevolutionTemplates :: load('comments-'.$display_mode);
		$content = ob_get_clean();
		return $content;
	} // end comments
}