<h1><?php _e('Shortcode Revolution Help', 'shortcode-revolution')?></h1>

<p><?php _e("Shortcode Revolution is a tool that allows you to easily and reliable create various elements on your site. Dynamic elements with data, static design elements like buttons and tables, and so on. It's techically possible to create the shortcodes manually but it's much easier to use the shortcode generator from your Shortcode Revolution menu.", 'shortcode-revolution')?></p>

<h2><?php _e('Available Shortcodes', 'shortcode-revolution')?></h2>

<h3><?php _e('Post and Comments Shortcodes', 'shortcode-revolution')?></h3>

<p><?php _e('This section allows you to generate shortcodes that dynamically list posts or comments based on search criteria. You can use the shortcodes in widgets or in your custom theme pages.', 'shortcode-revolution')?></p>

<p><?php _e('The <b>posts</b> shortcode lets you search posts by IDs, categories, types, tags or phrases and display them like:', 'shortcode-revolution')?></p>

<ul>	
	<li><b><?php _e('Default / regular</b> - the posts will be listed with thumbnail, excerpt, publication time, etc. This design (and many of the other Shortcode Revolution templates) can be overridden as explained in the section "Overriding Shortcode Revolution Templates" at the end of this guide.', 'shortcode-revolution')?></li>
	<li><?php _e('<b>List</b> is a short unordered list with the post titles and links.', 'shortcode-revolution')?></li>
	<li><?php _e("<b>Carousel</b> creates a slider / carousel from the posts that respond to your criteria. We use our own custom slider code - no bloated ready sliders, so it's very light and simple.", 'shortcode-revolution')?></li>
</ul>

<p><?php _e('The <b>related posts</b> shortcode finds and displays which are related to the current or selected post. You can give relation criteria like matching tags and/or categories. The display formats are the same as with the posts shortcode. This excellent shortcode can be added at the bottom of your single post template to always display related content without using yet another plugin.', 'shortcode-revolution')?></p>

<p><?php _e('The <b>comments</b> shortcode displays comments related to a post or just most recent / best comments. The display formats are default and carousel / slider.', 'shortcode-revolution')?></p>

<h3><?php _e('Popups / Modals', 'shortcode-revolution')?></h3>

<p><?php _e('This shortcode lets you create modal windows / lightboxes with any predefined content. It generates a button to click on which appears on the place of the shortcode so you can use it anywhere in your site. This makes it super easy to create lightboxes without writing code or using more plugins.</p>
<p>The modals can contain any kind of images and media, text, other shortcodes, and so on. If your modal contains anything other than plain unformtatted text make sure to insert it in Text mode of your rich text editor (when pasting it in posts, pages, etc).', 'shortcode-revolution')?></p>

<h3><?php _e('Columns &amp; Grids', 'shortcode-revolution')?></h3>

<p><?php _e('These shortcodes let you create modern cross-browser compatible and responsive content that flows in columns or a grid.', 'shortcode-revolution')?></p>

<p><?php _e('The <b>newspaper-like option</b> creates content that automatically flows in multiple columns.', 'shortcode-revolution')?></p>

<p><?php _e('The <b>grid option</b> is more precise in the way that your content flows on the page. You choose exactly what goes into each cell of the grid - the content does not low through the cells / columns. The grid option can also use your custom template.', 'shortcode-revolution')?></p> 

<h3><?php _e('Tabs', 'shortcode-revolution')?></h3>

<p><?php _e('The tabs shortcode lets you create tabbed content where the tabs do not reload the whole page. Very easy, light and responsive.', 'shortcode-revolution')?></p>

<h3><?php _e('Buttons', 'shortcode-revolution')?></h3>

<p><?php _e('With this shortcode you can create your own design for buttons - colors, size, style, fonts, and so on. Currently buttons support only URL action (going to another page). Calling custom JS functions is coming soon.', 'shortcode-revolution')?></p>

<h3><?php _e('Tables', 'shortcode-revolution')?></h3>

<p><?php _e("The tables shortcode gives you a super easy way to turn an Excel (CSV) sheet into a HTML table. The data is loaded on the fly so you don't need to recreate the shortcode when the file contents change.", 'shortcode-revolution')?></p>

<h3><?php _e('Flashcards', 'shortcode-revolution')?></h3>

<p><?php _e('This shortcode creates nice interactive flashcards. Mostly used in education and educational games, flashcards typically ask a question and reveal the answer when clicked on them. The flashcards in Shortcode Revolution are just visual elements and do not (yet!) fire any back-end action when flipped.', 'shortcode-revolution')?></p>

<h3><?php _e('Data Shortcodes', 'shortcode-revolution')?></h3>

<p><?php _e('The data shortcodes are used to dynamically pull data from your WordPress database.', 'shortcode-revolution')?></p>

<p><?php _e('We currently support <b>user data</b> shortcode. This shortcode allows you pull data for the currently logged in user, a predefined user, or an user defined by an URL parameter. The shortcode can return data for a specific field of the user profile or use meta, or return the whole user data in a string with variables. In the latter case this is given to you as enclosed content of the shortcode and you can fully modify it before placing it anywhere in your site.', 'shortcode-revolution')?></p>

<p><a href="https://blog.calendarscripts.info/using-the-data-shortcodes-in-shortcode-revolution/" target="_blank"><?php _e('Learn more about using these shortcodes here.', 'shortcode-revolution');?></a></p>

<h3><?php _e('Custom Shortcodes', 'shortcode-revolution')?></h3>

<p><?php _e('This is an easy way to create predefined pieces of content which you can save and use anywhere. Editing the shortcode in the generator will automatically reflect all occurrences of this shortcode in your site.', 'shortcode-revolution')?></p>

<h2><?php _e('Overriding Shortcode Revolution Templates', 'shortcode-revolution')?></h2>

<p><?php _e('Some of the default designs of the shortcodes - currently for posts, comments, and grid shortcodes - can be overridden with your own versions. To do this create a folder called "shortcode-revolution" inside your WP theme folder. Copy the associated view file from our plugin to that folder and make your changes there. The plugin will use your version and your changes will not be lost when you apply updates to the plugin.', 'shortcode-revolution')?></p>

<p><?php _e('For example if you want to override the carousel for posts, copy the file views/posts-carousel.html.php and make changes to the copy.', 'shortcode-revolution')?></p>

<h2><?php _e('Help and Customziation', 'shortcode-revolution')?></h2>

<p><?php _e('If you are looking for a shortcode or a feature which is not yet available in the plugin you can contact us at <a href="mailto:support@kibokolabs.com">support@kibokolabs.com</a>. Some of the suggestions can be added to the plugin. In other cases we can offer you custom development service.', 'shortcode-revolution')?></p>
