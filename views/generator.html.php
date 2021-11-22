<div class="wrap">
	<h1><?php _e("Generate Shortcodes", 'shortcode-revolution')?></h1>

    <h2 class="nav-tab-wrapper">
        <a class='nav-tab <?php if($tab == 'posts'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=posts'><?php _e('Posts &amp; Comments', 'shortcode-revolution')?></a>
        <a class='nav-tab <?php if($tab == 'modals'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=modals'><?php _e('Popups &amp; Modals', 'shortcode-revolution')?></a>
        <a class='nav-tab <?php if($tab == 'columns'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=columns'><?php _e('Columns &amp; Grid', 'shortcode-revolution')?></a>
        <a class='nav-tab <?php if($tab == 'tabs'):?>nav-tab-active<?php endif;?>' href='admin.php?page=shortcode_revolution&tab=tabs'><?php _e('Tabs', 'shortcode-revolution')?></a>
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
		    		<p class="srevo-help"><?php _e('If you have inserted contents of the modal window here you need to use the shortcode in "Text" mode of the rich text editor.', 'shortcode-revolution');?></p>
			    	<textarea cols="120" rows="10" readonly="readonly" onclick="this.select()"><?php echo $shortcode;?></textarea>
		    	<?php endif;?>
			</form>   	
    	<?php endif; // end if modals
    	if($tab == 'columns'):?>
			<h2><?php _e('Shortcodes for columns and grids', 'shortcode-revolution');?></h2>
			<form method="post">
	    		<div class="srevo-form">
				   <p><b><?php _e('Type of layout to create:', 'shortcode-revolution');?></b></p>
				   <p><input type="radio" name="content_type" value="columns" <?php if(empty($_POST['content_type']) or $_POST['content_type'] == 'columns') echo 'checked';?> onclick="jQuery('#columnsColumnsDiv').show();jQuery('#columnsGridDiv').hide();"> <?php _e('Newspaper-like content flowing in columns', 'shortcode-revolution');?> <a href="https://www.w3schools.com/css/css3_multiple_columns.asp" target="_blank"><?php _e('See example', 'shortcode-revolution');?></a><br>
				   <input type="radio" name="content_type" value="grid" <?php if(!empty($_POST['content_type']) and $_POST['content_type'] == 'grid') echo 'checked';?> onclick="jQuery('#columnsColumnsDiv').hide();jQuery('#columnsGridDiv').show();"> <?php _e('Grid: a fixed number of columns with different pieces of content into each column.', 'shortcode-revolution');?> 
				   </p>
				   
				   <div id="columnsColumnsDiv" style='display:<?php echo (empty($_POST['content_type']) or $_POST['content_type'] == 'columns') ? 'block' : 'none';?>'>
				   	<p><label><?php _e('Column count:', 'shortcode-revolution');?></label> <input type="text" name="column_count" value="<?php echo empty($_POST['column_count']) ? 3 : intval($_POST['column_count']);?>" size="2" maxlength="2"></p>
				   	<p><label><?php _e('Column gap:', 'shortcode-revolution');?></label> <input type="text" name="column_gap" value="<?php echo empty($_POST['column_gap']) ? '10px' : esc_attr($_POST['column_gap']);?>"></p>
				   	<p><label><?php _e('Column rule:', 'shortcode-revolution');?></label> <input type="text" name="column_rule" value="<?php echo empty($_POST['column_rule']) ? '' : esc_attr($_POST['column_rule']);?>"> <span class="srevo-help"><?php _e('Short CSS notation. Example: 1px solid blue', 'shortcode-revolution');?></span></p>
				   	<p><label><?php _e('Optimal column width:', 'shortcode-revolution');?></label> <input type="text" name="column_width" value="<?php echo empty($_POST['column_width']) ? '' : esc_attr($_POST['column_width']);?>"> <span class="srevo-help"><?php _e('Optional. Example: 100px', 'shortcode-revolution');?></span></p>
				   	
				   	<p><label><?php _e('Your content', 'shortcode-revolution');?></label>
				   	<?php wp_editor(empty($_POST['columns_content']) ? '' : stripslashes($_POST['columns_content']), "columnsContent", ['textarea_name'=>'columns_content'])?></p> 	
				   </div>
				   
				   <div id="columnsGridDiv" style='display:<?php echo (!empty($_POST['content_type']) and $_POST['content_type'] == 'grid') ? 'block' : 'none';?>'>
				   	<p><label><?php _e('Column count:', 'shortcode-revolution');?></label> <input type="text" name="grid_column_count" value="<?php echo $grid_columns;?>" onkeyup="gridChangeNumColumns(this.value)" size="2" maxlength="2"></p>
				   	<p><label><?php _e('Number of items:', 'shortcode-revolution');?></label> <input type="text" name="num_items" value="<?php echo $grid_items;?>" onkeyup="gridChangeNumItems(this.value)" size="3" maxlength="3"> <span class="srevo-help"><?php _e('Each item can be spread into multiple columns:', 'shortcode-revolution');?></span></p>
						<p><label><?php _e('Grid padding:', 'shortcode-revolution');?></label> <input type="text" name="grid_padding" id="gridPadding" value="<?php echo $grid_padding;?>" onkeyup="gridChangePadding(this.value)"></p>
						<p><label><?php _e('Items padding:', 'shortcode-revolution');?></label> <input type="text" name="item_padding" id="gridItemPadding" value="<?php echo $item_padding;?>" onkeyup="gridChangeItemPadding(this.value)"></p>
						<p><label><?php _e('Items border:', 'shortcode-revolution');?></label> <input type="text" name="item_border" value="<?php echo $item_border;?>" onkeyup="gridChangeBorder(this.value)" id="gridBorder"></p>
						
						<div id="previewGrid">
							<div class="grid-container" id="mainGrid">
								<?php for($i = 0; $i < $grid_items; $i++):?>
								 <div class="grid-item" id="gridItem<?php echo $i;?>"><?php printf(__('Content %d','shortcode-revolution'), $i+1);?> </div>
								<?php endfor;?> 
							</div>
						</div>
				   </div>
				
					<p><input type="submit" name="generate" value="<?php _e('Generate Shortcode', 'srevo');?>" class="button-primary"></p>
		    	</div>
		    	
		    	<?php if(!empty($_POST['generate']) and !empty($shortcode)):?>	
		    		<?php if($_POST['content_type'] == 'columns'):?><p class="srevo-help"><?php _e('If you have inserted contents for the columns or grid here you need to use the shortcode in "Text" mode of the rich text editor.', 'shortcode-revolution');?></p>
					<?php else:?>
					<p class="srevo-help"><?php printf(__('In each [srevo-grid-item] shortcode you can pass individual "grid_column" parameter to specify that the item will spread over several columns in the grid. <a href="%1$s" target="_blank">Learn more here</a>. Example: %2$s', 'srevo'), 'https://www.w3schools.com/css/css_grid_item.asp', '[srevo-grid-item grid_column="1 / 5"]');?></p>		    		
		    		<?php endif;?>
			    	<textarea cols="120" rows="10" readonly="readonly" onclick="this.select()"><?php echo $shortcode;?></textarea>
		    	<?php endif;?>
			</form>   	
			<style type="text/css">
			/* Default CSS for the grid */
			.grid-container {
			  display: grid;
			  grid-template-columns: <?php for($i=0; $i < $grid_columns; $i++):?> auto<?php endfor;?>;			  
			  padding: <?php echo $grid_padding;?>;
			}
			.grid-item {			  
			  border: <?php echo $item_border;?>;
			  padding: <?php echo $item_padding;?>;	 
			  text-align: center;
			}
			</style>
			<script type="text/javascript" >
			function gridChangeNumColumns(num) {
				if(isNaN(num)) return false;
				let gridColumns = '';
				for(i = 0; i < num; i++) gridColumns += 'auto ';
				jQuery('.grid-container').css('grid-template-columns', gridColumns);
				
				gridChangePadding(jQuery('#gridPadding').val());
				gridChangeItemPadding(jQuery('#gridItemPadding').val());
				gridChangeBorder(jQuery('#gridBorder').val());
			}
			
			function gridChangeNumItems(num) {
				if(isNaN(num)) return false;
				let itemHTML = '<div class="grid-item"><?php _e('Content %d','shortcode-revolution');?> </div>';
				let itemsHTML = '';
				for(i = 0; i < num; i++) {
					let thisItemHTML = itemHTML.replace('%d', i + 1);
					itemsHTML += thisItemHTML;
				}
				
				jQuery('#mainGrid').html(itemsHTML);
				gridChangePadding(jQuery('#gridPadding').val());
				gridChangeItemPadding(jQuery('#gridItemPadding').val());
				gridChangeBorder(jQuery('#gridBorder').val());
			}
			
			function gridChangePadding(val) {
				jQuery('.grid-container').css('padding', val);
			}
			
			function gridChangeItemPadding(val) {
				jQuery('.grid-item').css('padding', val);
			}
			
			function gridChangeBorder(val) {
				jQuery('.grid-item').css('border', val);
			}
			</script>
		<?php endif;// end column / grid 
		if($tab == 'tabs'):?>
			<h2><?php _e('Shortcodes for tabs', 'shortcode-revolution');?></h2>
			<form method="post">
	    		<div class="srevo-form">
	    			<p><label><?php _e('Number of tabs:', 'shortcode-revolution');?></label> <input type="text" name="num_tabs" value="<?php echo empty($_POST['num_tabs']) ? '' : intval($_POST['num_tabs']);?>" size="3" maxlength="2"> <input type="submit" value="<?php _e('Show form', 'shortcode-revolution');?>" class="button-primary"></p>
	    			<?php if(!empty($_POST['num_tabs']) and intval($_POST['num_tabs']) > 0):?>
	    				<div id="srevoTabsForm">
	    					<ul>
	    						<?php for($i = 1; $i <= $_POST['num_tabs']; $i++):?>
	    							<li><a href="#srevo-tabs-<?php echo $i;?>"><?php printf(__('Tab %d', 'srevo'), $i);?></a> <input type="text" name="tab_text_<?php echo $i;?>" value="<?php echo empty($_POST['tab_text_'.$i]) ? '' : esc_attr(stripslashes($_POST['tab_text_'.$i]));?>"></li>
	    						<?php endfor;?>
	    					</ul>
	    					<?php for($i = 1; $i <= $_POST['num_tabs']; $i++):	    					
	    						$tab_content = empty($_POST['tab_content_'.$i]) ? '' : wp_kses_post(stripslashes($_POST['tab_content_'.$i]));
	    						?>
	    						<div id="srevo-tabs-<?php echo $i;?>">
	    							<?php wp_editor($tab_content, "tab_content_".$i, ['textarea_name' => 'tab_content_'.$i]); ?>
	    						</div>
	    					<?php endfor;?>
	    				</div>
	    				<p class="srevo-help"><?php _e('If you have inserted contents for the tabs here you need to use the shortcode in "Text" mode of the rich text editor.', 'shortcode-revolution');?></p>
	    				<p><input type="submit" name="generate" value="<?php _e('Generate Shortcode', 'srevo');?>" class="button-primary"></p>
	    			<?php endif; // end if num tabs ?>	
    			
	    		</div>
	    		<?php if(!empty($_POST['generate']) and !empty($shortcode)):?>			    
			    	<textarea cols="120" rows="10" readonly="readonly" onclick="this.select()"><?php echo $shortcode;?></textarea>
		    	<?php endif;?>
			</form>   	
			
			<script type="text/javascript" >
			<?php if(!empty($_POST['num_tabs']) and intval($_POST['num_tabs']) > 0):?>
				document.addEventListener("DOMContentLoaded", function() {
					jQuery('#srevoTabsForm').tabs().find('.ui-tabs-nav li').off('keydown');
				});
			<?php endif;?>
			</script> 
		<?php endif; // end if tabs ;
		if($tab == 'buttons'):?>
			<h2><?php _e('Shortcodes for buttons', 'shortcode-revolution');?></h2>
			<form method="post">
				<div style="display: flex;">										
				
		    		<div class="srevo-form">
		    			<p><label><?php _e('Button text:', 'shortcode-revolution');?></label> <input type="text" name="button_text" value="<?php echo empty($_POST['button_text']) ? __('Demo Button', 'srevo')  : esc_attr($_POST['button_text']);?>"></p>
		    			<p><label><?php _e('Button link / href:', 'shortcode-revolution');?></label> <input type="text" name="button_href" value="<?php echo empty($_POST['button_href']) ? '' : esc_url($_POST['button_href']);?>" size="30"></p>
		    			
		    			<p><label><?php _e('Style and classes:', 'shortcode-revolution');?></label> <select name="button_style">
		    				<option value=""><?php _e('- Select a built-in style -');?></option>
		    				<option value="" <?php if(empty($_POST['button_style'])) echo 'selected';?>><?php _e('Default for your theme', 'srevo');?></option>
		    				<option value="srevo-button-flat" <?php if(!empty($_POST['button_style']) and $_POST['button_style'] == 'srevo-button-flat') echo 'selected';?>><?php _e('Flat', 'srevo');?></option>
		    				<option value="srevo-button-empty" <?php if(!empty($_POST['button_style']) and $_POST['button_style'] == 'srevo-button-empty') echo 'selected';?>><?php _e('Empty', 'srevo');?></option>
		    				<option value="srevo-button-glass" <?php if(!empty($_POST['button_style']) and $_POST['button_style'] == 'srevo-button-glass') echo 'selected';?>><?php _e('Glass', 'srevo');?></option>
		    				<option value="srevo-button-3d" <?php if(!empty($_POST['button_style']) and $_POST['button_style'] == 'srevo-button-3d') echo 'selected';?>><?php _e('3d', 'srevo');?></option>
		    			</select></p>
		    			<p><label><?php _e('Custom CSS classes:', 'srevo');?></label> <input type="text" name="button_classes" value="<?php echo empty($_POST['button_classes']) ? '': esc_attr($_POST['button_classes']);?>"></p>
		    			<p><label><?php _e('Text color:', 'shortcode-revolution');?></label> <input type="text" name="button_text_color" value="<?php echo empty($_POST['button_text_color']) ? '' : esc_attr($_POST['button_text_color'])?>" class="srevo-color-field"></p>
		    			<p><label><?php _e('Background color:', 'shortcode-revolution');?></label> <input type="text" name="button_bg_color" value="<?php echo empty($_POST['button_bg_color']) ? 'white' : esc_attr($_POST['button_bg_color'])?>" class="srevo-color-field"></p>
		    			<p><label><?php _e('Font size', 'shortcode-revolution');?></label> <input type="text" name="button_font_size" value="<?php echo empty($_POST['button_font_size']) ? '1em' : esc_attr($_POST['button_font_size']);?>" size="6"></p>
		    			<p><label><?php _e('Padding', 'shortcode-revolution');?></label> <input type="text" name="button_padding" value="<?php echo empty($_POST['button_padding']) ? '5px' : esc_attr($_POST['button_padding']);?>" size="6"></p>
		    			<p><label><?php _e('Button border radius (rounding)', 'shortcode-revolution');?></label> <input type="text" name="button_radius" value="<?php echo empty($_POST['button_radius']) ? '0px' : esc_attr($_POST['button_radius']);?>" size="6"></p>
		    			<p>	<input type="button" value="<?php _e('Refresh preview', 'srevo');?>" onclick="srevoPreviewButton(this.form);" class="button">
		    			<input type="submit" name="generate" value="<?php _e('Generate Shortcode', 'srevo');?>" class="button-primary"></p>
					</div>	    	
					
					<div style="margin-left: 25px;">
							<h3><?php _e('Preview', 'srevo');?></h3>
							<button id="srevoButtonPreview" onclick="alert('<?php _e('Demo, non functional', 'srevo');?>');return false;" class="srevo-button <?php if(!empty($_POST['button_style'])): echo esc_attr($_POST['button_style']); else: echo 'button'; endif;?> <?php echo empty($_POST['button_classes']) ? '' : esc_attr($_POST['button_classes']);?>" style='<?php if(!empty($_POST['button_text_color'])) echo 'color:'.esc_attr($_POST['button_text_color']).';';
							if(!empty($_POST['button_bg_color'])) echo 'background-color:'.esc_attr($_POST['button_bg_color']).';';
							if(!empty($_POST['button_font_size'])) echo 'font-size:'.esc_attr($_POST['button_font_size']).';';
							if(!empty($_POST['button_padding'])) echo 'padding:'.esc_attr($_POST['button_padding']).';';
							if(!empty($_POST['button_radius'])) echo 'border-radius:'.esc_attr($_POST['button_radius']).';';?>'><?php echo empty($_POST['button_text']) ? __('Demo Button', 'srevo') : esc_attr($_POST['button_text']);?></button>
					</div>	
				</div>
				
	    		<?php if(!empty($_POST['generate']) and !empty($shortcode)):?>			    
			    	<textarea cols="120" rows="10" readonly="readonly" onclick="this.select()"><?php echo $shortcode;?></textarea>
		    	<?php endif;?>	
			</form>   	
			<script type="text/javascript" >			
			document.addEventListener("DOMContentLoaded", function() {
				jQuery('.srevo-color-field').wpColorPicker();
			});		
			
			function srevoPreviewButton(frm) {
				// remove all existing classes
				document.getElementById('srevoButtonPreview').className = '';
					
				jQuery('#srevoButtonPreview').html(frm.button_text.value);
				
				jQuery('#srevoButtonPreview').addClass(frm.button_style.value);
				
				jQuery('#srevoButtonPreview').addClass(frm.button_classes.value);
				
				jQuery('#srevoButtonPreview').css({
						'color': frm.button_text_color.value, 
						'background-color': frm.button_bg_color.value,
						'font-size': frm.button_font_size.value,
						'padding': frm.button_padding.value,
						'border-radius': frm.button_radius.value,
					});
			}	
			</script> 
			
		<?php endif; // end if buttons ;
		if($tab == 'tables'):?>
			<h2><?php _e('Shortcodes for tables from CSV', 'shortcode-revolution');?></h2>
			<form method="post" enctype="multipart/form-data">
					<?php if(!empty($error)):?>
						<p class="error srevo-error"><?php echo $error;?></p>
					<?php endif;?>
	    		   <p><label><?php _e('Upload a CSV file:', 'srevo');?></label> <input type="file" name="csv" required></p>
	    		   <p><label><?php _e('Field delimiter:', 'srevo');?></label> <select name="delim">
	    		   	<option value="comma"><?php _e('Comma', 'srevo');?></option>
	    		   	<option value="semicolon" <?php if(!empty($_POST['delim']) and $_POST['delim'] == 'semicolon') echo 'selected';?>><?php _e('Semicolon', 'srevo');?></option>
	    		   	<option value="tab" <?php if(!empty($_POST['delim']) and $_POST['delim'] == 'tab') echo 'selected';?>><?php _e('Semicolon', 'tab');?></option>
	    		   </select></p>
	    		   <p><label><?php _e('Table CSS classes:', 'srevo');?></label> <input type="text" size="30" name="table_css" value="<?php echo empty($_POST['table_css']) ? '' : esc_attr($_POST['table_css']);?>"></p>
	    			
	    			<p><input type="submit" name="generate" value="<?php _e('Generate Shortcode', 'srevo');?>" class="button-primary"></p>
	    		
	    		<?php if(!empty($_POST['generate']) and !empty($shortcode)):?>			    
			    	<textarea cols="120" rows="10" readonly="readonly" onclick="this.select()"><?php echo $shortcode;?></textarea>
		    	<?php endif;?>
			</form>   	
			
		<?php endif; // end if tables ;
		if($tab == 'flashcards'):?>
			<h2><?php _e('Shortcodes for Flashcards', 'shortcode-revolution');?></h2>
			<form method="post" enctype="multipart/form-data">
					<?php if(!empty($error)):?>
						<p class="error srevo-error"><?php echo $error;?></p>
					<?php endif;?>
	    		  	
	    		  	<h2><?php _e('Flashcard Front side', 'shortcode-revolution');?></h2>
				   <p><?php wp_editor(empty($_POST['flashcard_front']) ? '' : stripslashes($_POST['flashcard_front']), "flashcardFront", ['textarea_name'=>'flashcard_front'])?></p> 	
				   	
				   <h2><?php _e('Flashcard Back side', 'shortcode-revolution');?></h2>
				   <p><?php wp_editor(empty($_POST['flashcard_back']) ? '' : stripslashes($_POST['flashcard_back']), "flashcardBack", ['textarea_name'=>'flashcard_back'])?></p> 		
				   
				   <p><label><?php _e('Width:', 'shortcode-revolution');?></label> <input type="text" name="card_width" value="<?php echo empty($_POST['card_width']) ? '300px' : esc_attr($_POST['card_width']);?>"></p>
				   
				   <p><label><?php _e('Height:', 'shortcode-revolution');?></label> <input type="text" name="card_height" value="<?php echo empty($_POST['card_height']) ? '300px' : esc_attr($_POST['card_width']);?>"></p>
				   
				   <p><label><?php _e('Border radius:', 'shortcode-revolution');?></label> <input type="text" name="card_radius" value="<?php echo empty($_POST['card_radius']) ? '0%' : esc_attr($_POST['card_radius']);?>"></p>
				   
		    		<p><label><?php _e('Front card color:', 'shortcode-revolution');?></label> <input type="text" name="card_front_color" value="<?php echo empty($_POST['card_front_color']) ? 'white' : esc_attr($_POST['card_front_color'])?>" class="srevo-color-field"></p>
		    		
		    		<p><label><?php _e('Back card color:', 'shortcode-revolution');?></label> <input type="text" name="card_back_color" value="<?php echo empty($_POST['card_back_color']) ? 'white' : esc_attr($_POST['card_back_color'])?>" class="srevo-color-field"></p>
		    		
		    			<p><label><?php _e('Padding:', 'shortcode-revolution');?></label> <input type="text" name="padding" value="<?php echo empty($_POST['padding']) ? '10px' : esc_attr($_POST['padding'])?>"></p>
	    			
	    			<p><input type="submit" name="generate" value="<?php _e('Generate Shortcode', 'srevo');?>" class="button-primary"></p>
	    		
	    		<?php if(!empty($_POST['generate']) and !empty($shortcode)):?>
	    			<p class="srevo-help"><?php _e('This shortcode should be placed only in "Text" mode of the rich text editor.', 'shortcode-revolution');?></p>			    
			    	<textarea cols="120" rows="10" readonly="readonly" onclick="this.select()"><?php echo $shortcode;?></textarea>
		    	<?php endif;?>
			</form>   	
			
			<script type="text/javascript" >			
			document.addEventListener("DOMContentLoaded", function() {
				jQuery('.srevo-color-field').wpColorPicker();
			});	
			</script>
		<?php endif; // end if flashcards ;
		if($tab == 'data'):?>
			<h2><?php _e('Data Pulling Shortcodes', 'shortcode-revolution');?></h2>
			<form method="post" enctype="multipart/form-data">
					<?php if(!empty($error)):?>
						<p class="error srevo-error"><?php echo $error;?></p>
					<?php endif;?>
	    		  	
	    		  	<h3><?php _e('User Data', 'srevo');?></h3>
	    		  	
	    		  	<p><?php _e('These shortcodes allow you to publish data and meta data regarding an user. They are good for using on profile pages, author pages, and so on','srevo');?></p>
	    		  	
	    		  	<p><?php _e('Pull data for:', 'srevo');?> <select name="user_id" onchange="srevoDataChangeUserID(this.value);">
	    		  		<option value="logged_in" <?php if(!empty($_POST['user_id']) and $_POST['user_id'] == 'logged_in') echo 'selected';?>><?php _e('The user that is logged in', 'srevo');?></option>
	    		  		<option value="specific" <?php if(!empty($_POST['user_id']) and $_POST['user_id'] == 'specific') echo 'selected';?>><?php _e('Specific user ID', 'srevo');?></option>
	    		  		<option value="get" <?php if(!empty($_POST['user_id']) and $_POST['user_id'] == 'get') echo 'selected';?>><?php _e('User ID passed as URL parameter', 'srevo');?></option>
	    		  	</select>
						<span id="dataShortcodeSpecific" style='display:<?php echo (!empty($_POST['user_id']) and $_POST['user_id'] == 'specific') ? 'inline' : 'none';?>'>
							<?php _e('ID:', 'srevo')?> <input type="text" size="6" name="specific_user_id" value="<?php echo empty($_POST['specific_user_id']) ? 0 : intval($_POST['specific_user_id'])?>">						
						</span>	   
						
						<span id="dataShortcodeGet" style='display:<?php echo (!empty($_POST['user_id']) and $_POST['user_id'] == 'get') ? 'inline' : 'none';?>'>
							<?php _e('Variable name:', 'srevo')?> <input type="text" size="6" name="var_name" value="<?php echo empty($_POST['var_name']) ? '' : esc_attr($_POST['var_name'])?>">						
						</span> 		  	
	    		  	</p>
	    		  	
	    		  	<p><?php _e('Profile field or meta value:', 'srevo');?> <select name="field">
	    		  		<optgroup label="<?php _e('All fields', 'srevo');?>">
	    		  		<option value="__ALL__" <?php if(!empty($_POST['field']) and $_POST['field'] == '__ALL__') echo 'selected'?>><?php _e('All fields', 'srevo');?></option>
	    		  		<optgroup label="<?php _e('User profile fields', 'srevo');?>">
		    		  		<option value="ID" <?php if(!empty($_POST['field']) and $_POST['field'] == 'ID') echo 'selected'?>><?php _e('ID', 'srevo');?></option>
		    		  		<option value="user_login" <?php if(!empty($_POST['field']) and $_POST['field'] == 'user_login') echo 'selected'?>><?php _e('Username (login)', 'srevo');?></option>
		    		  		<option value="user_email" <?php if(!empty($_POST['field']) and $_POST['field'] == 'user_email') echo 'selected'?>><?php _e('Email address', 'srevo');?></option>
		    		  		<option value="first_name" <?php if(!empty($_POST['field']) and $_POST['field'] == 'first_name') echo 'selected'?>><?php _e('First name', 'srevo');?></option>
		    		  		<option value="last_name" <?php if(!empty($_POST['field']) and $_POST['field'] == 'last_name') echo 'selected'?>><?php _e('Last name', 'srevo');?></option>
		    		  		<option value="display_name" <?php if(!empty($_POST['field']) and $_POST['field'] == 'display_name') echo 'selected'?>><?php _e('Display name', 'srevo');?></option>
		    		  		<option value="user_roles" <?php if(!empty($_POST['field']) and $_POST['field'] == 'user_roles') echo 'selected'?>><?php _e('User roles', 'srevo');?></option>
		    		  		<option value="user_registered" <?php if(!empty($_POST['field']) and $_POST['field'] == 'user_registered') echo 'selected'?>><?php _e('Registration date/time', 'srevo');?></option>
	    		  		</optgroup>
	    		  		<optgroup label="<?php _e('Meta data fields', 'srevo');?>">
	    		  			<?php foreach($meta_keys as $meta_key):?>
	    		  				<option value="meta_<?php echo $meta_key->meta_key?>" <?php if(!empty($_POST['field']) and $_POST['field'] == 'meta_'.$meta_key->meta_key) echo 'selected';?>><?php echo $meta_key->meta_key;?></option>
	    		  			<?php endforeach;?>
	    		  		</optgroup>	    		  		
	    		  	</select></p>
	    		  	
	    			<p><input type="submit" name="generate" value="<?php _e('Generate Shortcode', 'srevo');?>" class="button-primary"></p>
	    		
	    		<?php if(!empty($_POST['generate']) and !empty($shortcode)):?>
	    			<p class="srevo-help"><?php _e('This shortcode should be placed only in "Text" mode of the rich text editor.', 'shortcode-revolution');?></p>			    
			    	<textarea cols="120" rows="10" readonly="readonly" onclick="this.select()"><?php echo $shortcode;?></textarea>
		    	<?php endif;?>
			</form>   	
			
			<script type="text/javascript" >			
			function srevoDataChangeUserID(val) {
				jQuery('#dataShortcodeSpecific').hide();
				jQuery('#dataShortcodeGet').hide();
				
				if(val == 'specific') jQuery('#dataShortcodeSpecific').show();
				if(val == 'get') jQuery('#dataShortcodeGet').show();
			}
			</script>
		<?php endif; // end if data ;
		if($tab == 'custom'):?>
			<h2><?php _e('Custom Shortcodes', 'shortcode-revolution');?></h2>
			
			<p><?php _e('The custom shortcodes are just stored pieces of contents, HTML code, etc, which you can reuse across your site to save time', 'srevo');?></p>
			<p><?php printf(__('Each of these shortcodes allows enclosing contents. In that case using the variable %s in the shortcode box allows you to wrap the content inside a text or HTML code.', 'srevo'), '{{enclosed}}');?></p>
			
			<p><a href="admin.php?page=shortcode_revolution_custom&do=add"><?php _e('Create a new custom shortcode', 'srevo');?></a></p>
			
			<?php if(count($shortcodes)):?>
				<table class="widefat">
					<thead>
						<tr><th><?php _e("Shortcode name", 'srevo');?></th><th><?php _e('Edit', 'srevo');?></th></tr>
					</thead>
					<?php foreach($shortcodes as $shortcode):
						$class = $class ?? 'alternate';?>
						<tr class="<?php echo $class;?>">
							<td><?php echo stripslashes($shortcode->name);?></td>
							<td><a href="admin.php?page=shortcode_revolution_custom&do=edit&id=<?php echo $shortcode->id;?>"><?php _e('Edit', 'srevo');?></a></td>
						</tr>			
					<?php endforeach;?>
				</table>
			<?php endif;?>
		<?php endif;?>	
    </div> <!-- end srevo-generator wrap  -->
</div>