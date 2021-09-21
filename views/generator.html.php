<div class="wrap">
	<h1><?php _e("Generate Shortcodes", 'shortcode-revolution')?></h1>

    <h2 class="nav-tab-wrapper">
        <a class='nav-tab <?php if($tab == 'posts'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=posts'><?php _e('Posts &amp; Comments', 'shortcode-revolution')?></a>
        <a class='nav-tab <?php if($tab == 'modals'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=modals'><?php _e('Popups &amp; Modals', 'shortcode-revolution')?></a>
        <a class='nav-tab <?php if($tab == 'tabs'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=tabs'><?php _e('Tabs &amp; Columns', 'shortcode-revolution')?></a>
        <a class='nav-tab <?php if($tab == 'buttons'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=buttons'><?php _e('Buttons', 'shortcode-revolution')?></a>
		  <a class='nav-tab <?php if($tab == 'tables'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=tables'><?php _e('Tables', 'shortcode-revolution')?></a>
		  <a class='nav-tab <?php if($tab == 'flashcards'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=flashcards'><?php _e('Flashcards', 'shortcode-revolution')?></a>
		  <a class='nav-tab <?php if($tab == 'data'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=data'><?php _e('Data Shortcodes', 'shortcode-revolution')?></a>
		  <a class='nav-tab <?php if($tab == 'custom'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=custom'><?php _e('Custom Shortcodes', 'shortcode-revolution')?></a>
    </h2>
    
	<div class="srevo-generator wrap">    
    	<?php if($tab == 'posts'):?>
	    	<h2><?php _e('Shortcodes for posts or comments', 'shortcode-revolution');?></h2>
	    	
	    	<p class="srevo-help"><?php _e('All search fields / filters are optional', 'srevo');?></p>
	    	
	    	<form method="post">
	    		<div class="srevo-form">
		    		<p>
			    		<label><?php _e('Dispaly:', 'srevo');?></label> <select name="what" onchange="srevoPostsDisplay(this.value);">
			    			<option value="posts"><?php _e('Posts', 'srevo');?></option>
			    			<option value="related" <?php if($what == 'related') echo 'selected';?>><?php _e('Related posts', 'srevo');?></option>
			    			<option value="comments" <?php if($what == 'comments') echo 'selected';?>><?php _e('Comments', 'srevo');?></option>
			    		</select>
		    		</p>
		    		
					<!-- comments -->
					
					<p class="srevo-comments <?php if($what != 'comments'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('From (author email):', 'srevo');?></label> <input type="text" name="author_email" value="<?php echo empty($_POST['author_email']) ? '' : esc_attr($_POST['author_email']);?>">
		    		</p>
		    		
		    		<p class="srevo-comments <?php if($what != 'comments'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('For post:', 'srevo');?></label> 
						<select name="comment_for_post" onchange="this.value == 'specific' ? jQuery('#commentPostID').show() : jQuery('#commentPostID').hide();">
							<option value="current" <?php if(!empty($_POST['comment_for_post']) and $_POST['comment_for_post'] == 'current') echo 'selected';?>><?php _e('Current (where the shortcode is published)', 'srevo');?></option>
							<option value="any" <?php if(!empty($_POST['comment_for_post']) and $_POST['comment_for_post'] == 'any') echo 'selected';?>><?php _e('Any post', 'srevo');?></option>
							<option value="specific" <?php if(!empty($_POST['comment_for_post']) and $_POST['comment_for_post'] == 'specific') echo 'selected';?>><?php _e('Specific post ID:', 'srevo');?></option>
						</select>	    			
		    			<input type="text" name="comment_post_id" id="commentPostID" value="<?php echo empty($_POST['comment_post_id']) ? '' : intval($_POST['comment_post_id']);?>" <?php if(empty($_POST['comment_for_post']) or $_POST['comment_for_post'] != 'specific') echo 'style="display:none;"';?>>
		    		</p>
		    		
		    		<p class="srevo-comments <?php if($what != 'comments'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Order by:', 'srevo');?></label> <select name="comment_orderby">	    				
		    				<option value="comment_author" <?php if(!empty($_POST['comment_orderby']) and $_POST['comment_orderby'] == 'comment_author') echo 'selected';?>><?php _e('Author', 'srevo');?></option>
		    				<option value="comment_author" <?php if(!empty($_POST['comment_orderby']) and $_POST['comment_orderby'] == 'comment_author') echo 'selected';?>><?php _e('Date', 'srevo');?></option>
		    				<option value="comment_karma" <?php if(!empty($_POST['comment_orderby']) and $_POST['comment_orderby'] == 'comment_karma') echo 'selected';?>><?php _e('Karma', 'srevo');?></option>
		    			</select>
		    			
		    			<select name="comment_order">
		    				<option value="ASC" <?php if(!empty($_POST['comment_order']) and $_POST['comment_order'] == 'ASC') echo 'selected';?>><?php _e('Ascending', 'srevo');?></option>
		    				<option value="DESC" <?php if(!empty($_POST['comment_order']) and $_POST['comment_order'] == 'DESC') echo 'selected';?>><?php _e('Descending', 'srevo');?></option>
		    			</select>
		    		</p>
						    		
		    		<p class="srevo-comments <?php if($what != 'comments'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Number of comments:', 'srevo');?></label> <input type="text" name="comment_num" value="<?php echo empty($_POST['comment_num']) ? '' : intval($_POST['comment_num']);?>">
		    		</p>
		    		
		    		<p class="srevo-comments <?php if($what != 'comments'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Display as:', 'srevo');?></label> <select name="comment_display_mode">
		    				<option value="regular" <?php if(!empty($_POST['comment_display_mode']) and $_POST['comment_display_mode'] == 'regular') echo 'selected';?>><?php _e('Default / regular', 'srevo');?></option>
		    				<option value="carousel" <?php if(!empty($_POST['comment_display_mode']) and $_POST['comment_display_mode'] == 'carousel') echo 'selected';?>><?php _e('Carousel', 'srevo');?></option>
		    			</select>
		    		</p>
		    		
		    		<!-- related posts -->
		    		
		    		<p class="srevo-related <?php if($what != 'related'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Related to post ID:', 'srevo');?></label> <input type="text" name="related_id" value="<?php echo empty($_POST['related_id']) ? '' : esc_attr($_POST['related_id']);?>">
		    			<span class="srevo-help"><?php _e('leave empty to generate shortcode related to the post it is published in', 'srevo');?></span>
		    		</p>
		    		
		    		<p class="srevo-related <?php if($what != 'related'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Criteria:', 'srevo');?></label> <select name="related_criteria">
		    				<option value="tags" <?php if(!empty($_POST['related_criteria']) and $_POST['related_criteria'] == 'tags') echo 'selected';?>><?php _e('Common tags', 'srevo');?></option>
		    				<option value="cats" <?php if(!empty($_POST['related_criteria']) and $_POST['related_criteria'] == 'cats') echo 'selected';?>><?php _e('Common categories', 'srevo');?></option>
		    				<option value="both" <?php if(!empty($_POST['related_criteria']) and $_POST['related_criteria'] == 'boths') echo 'selected';?>><?php _e('Common tags and categories', 'srevo');?></option>
		    			</select>
		    		</p>
		    		
		    		<p class="srevo-related <?php if($what != 'related'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Number of posts:', 'srevo');?></label> <input type="text" name="related_num" value="<?php echo empty($_POST['related_num']) ? '' : intval($_POST['related_num']);?>">
		    		</p>
		    		
		    		<p class="srevo-related <?php if($what != 'related'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Display as:', 'srevo');?></label> <select name="related_display_mode">
		    				<option value="regular" <?php if(!empty($_POST['related_display_mode']) and $_POST['related_display_mode'] == 'regular') echo 'selected';?>><?php _e('Default / regular', 'srevo');?></option>
		    				<option value="list" <?php if(!empty($_POST['related_display_mode']) and $_POST['related_display_mode'] == 'list') echo 'selected';?>><?php _e('List', 'srevo');?></option>
		    				<option value="carousel" <?php if(!empty($_POST['related_display_mode']) and $_POST['related_display_mode'] == 'carousel') echo 'selected';?>><?php _e('Carousel', 'srevo');?></option>
		    			</select>
		    		</p>
		    		
		    		<!--- posts -->
		    		
		    		<p class="srevo-posts <?php if($what != 'posts'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('With these IDs:', 'srevo');?></label> <input type="text" name="post_ids" value="<?php echo empty($_POST['post_ids']) ? '' : esc_attr($_POST['post_ids']);?>">
		    			<span class="srevo-help"><?php _e('separate multiple post IDs with comma', 'srevo');?></span>
		    		</p>
		    		
		    		<p class="srevo-posts <?php if($what != 'posts'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Of these post types:', 'srevo');?></label> <input type="text" name="post_types" value="<?php echo empty($_POST['post_types']) ? '' : esc_attr($_POST['post_types']);?>">
		    			<span class="srevo-help"><?php _e('separate multiple post types with comma', 'srevo');?></span>
		    		</p>
		    		
		    		<p class="srevo-posts <?php if($what != 'posts'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('In these categories:', 'srevo');?></label> <input type="text" name="categories" value="<?php echo empty($_POST['categories']) ? '' : esc_attr($_POST['categories']);?>">
		    			<span class="srevo-help"><?php _e('category slugs, separated by comma', 'srevo');?></span>
		    		</p>
		    		
		    		<p class="srevo-posts <?php if($what != 'posts'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Having any of these tags:', 'srevo');?></label> <input type="text" name="tags" value="<?php echo empty($_POST['tags']) ? '' : esc_attr($_POST['tags']);?>">
		    			<span class="srevo-help"><?php _e('tags, separated by comma', 'srevo');?></span>
		    		</p>
		    		
		    		<p class="srevo-posts <?php if($what != 'posts'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Contains (search phrase):', 'srevo');?></label> <input type="text" name="post_search" value="<?php echo empty($_POST['post_search']) ? '' : esc_attr($_POST['post_search']);?>">
		    		</p>
		    		
		    		<p class="srevo-posts <?php if($what != 'posts'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Number of posts:', 'srevo');?></label> <input type="text" name="post_num" value="<?php echo empty($_POST['post_num']) ? '' : intval($_POST['post_num']);?>">
		    		</p>
		    		
		    		<p class="srevo-posts <?php if($what != 'posts'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Order by:', 'srevo');?></label> <select name="post_orderby">
		    				<option value="ID" <?php if(!empty($_POST['post_orderby']) and $_POST['post_orderby'] == 'ID') echo 'selected';?>><?php _e('ID', 'srevo');?></option>
		    				<option value="author" <?php if(!empty($_POST['post_orderby']) and $_POST['post_orderby'] == 'author') echo 'selected';?>><?php _e('Author', 'srevo');?></option>
		    				<option value="title" <?php if(!empty($_POST['post_orderby']) and $_POST['post_orderby'] == 'title') echo 'selected';?>><?php _e('Title', 'srevo');?></option>
		    				<option value="date" <?php if(!empty($_POST['post_orderby']) and $_POST['post_orderby'] == 'date') echo 'selected';?>><?php _e('Date', 'srevo');?></option>
		    				<option value="comment_count" <?php if(!empty($_POST['post_orderby']) and $_POST['post_orderby'] == 'comment_count') echo 'selected';?>><?php _e('Comment count', 'srevo');?></option>
		    				<option value="rand" <?php if(!empty($_POST['post_orderby']) and $_POST['post_orderby'] == 'rand') echo 'selected';?>><?php _e('Random', 'srevo');?></option>
		    			</select>
		    			
		    			<select name="post_order">
		    				<option value="ASC" <?php if(!empty($_POST['post_orderby']) and $_POST['post_orderby'] == 'ASC') echo 'selected';?>><?php _e('Ascending', 'srevo');?></option>
		    				<option value="DESC" <?php if(!empty($_POST['post_orderby']) and $_POST['post_orderby'] == 'DESC') echo 'selected';?>><?php _e('Descending', 'srevo');?></option>
		    			</select>
		    		</p>
		    		
		    		<p class="srevo-posts <?php if($what != 'posts'):?>srevo-hidden<?php endif;?>">
		    			<label><?php _e('Display as:', 'srevo');?></label> <select name="post_display_mode">
		    				<option value="regular" <?php if(!empty($_POST['post_display_mode']) and $_POST['post_display_mode'] == 'regular') echo 'selected';?>><?php _e('Default / regular', 'srevo');?></option>
		    				<option value="list" <?php if(!empty($_POST['post_display_mode']) and $_POST['post_display_mode'] == 'list') echo 'selected';?>><?php _e('List', 'srevo');?></option>
		    				<option value="carousel" <?php if(!empty($_POST['post_display_mode']) and $_POST['post_display_mode'] == 'carousel') echo 'selected';?>><?php _e('Carousel', 'srevo');?></option>
		    			</select>
		    		</p>
		    	
			    	<p><input type="submit" name="generate" value="<?php _e('Generate Shortcode', 'srevo');?>" class="button-primary"></p>
			    	
		  		</div>	
		    	
		    	<?php if(!empty($_POST['generate']) and !empty($shortcode)):?>
			    	<input type="text" size="120" readonly="readonly" onclick="this.select()" value="<?php echo htmlentities($shortcode);?>">
		    	<?php endif;?>
	    	</form>
	    	
	    	<script type="text/javascript" >
	    	function srevoPostsDisplay(val) {
	    		if(val == 'posts') {
	    			jQuery('.srevo-posts').show();
	    			jQuery('.srevo-related').hide();
	    			jQuery('.srevo-comments').hide();
	    		}
	    		if(val == 'related') {
	    			jQuery('.srevo-posts').hide();
	    			jQuery('.srevo-related').show();
	    			jQuery('.srevo-comments').hide();
	    		}
	    		if(val == 'comments') {
	    			jQuery('.srevo-posts').hide();
	    			jQuery('.srevo-related').hide();
	    			jQuery('.srevo-comments').show();
	    		}
	    	}
	    	</script>
    	<?php endif;
    	if($tab == 'modals'):?>
			<h2><?php _e('Shortcodes for modal windows / lightboxes', 'shortcode-revolution');?></h2>
			<form method="post">
	    		<div class="srevo-form">
				   <p><label><?php _e('Contents of the modal window / lighbox', 'shortcode-revolution');?></label>
				   	<?php wp_editor(empty($_POST['modal_content']) ? '' : stripslashes($_POST['modal_content']), "modalContent", ['textarea_name'=>'modal_content'])?></p> 	
				   <p><label><?php _e('Clickable link/button text:', 'shortcode-revolution');?></label> <input type="text" name="link_text" size="30" value="<?php echo empty($_POST['link_text']) ? '' : htmlentities(stripslashes($_POST['link_text']));?>"></p>
				   <p><label><?php _e('CSS class for the clickable link:', 'shortcode-revolution');?></label> <input type="text" name="link_class" size="30" value="<?php echo empty($_POST['link_class']) ? 'srevo-modal-button' : htmlentities(stripslashes($_POST['link_class']));?>"></p>			
				
					<p><input type="submit" name="generate" value="<?php _e('Generate Shortcode', 'srevo');?>" class="button-primary"></p>
		    	</div>
		    	
		    	<?php if(!empty($_POST['generate']) and !empty($shortcode)):?>
			    	<textarea cols="120" rows="10" readonly="readonly" onclick="this.select()"><?php echo $shortcode;?></textarea>
		    	<?php endif;?>
			</form>   	
    	<?php endif;?>
    </div>
</div>