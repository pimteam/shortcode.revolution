<h1>Shortcode Revolution Help</h1>

<p>Shortcode Revolution is a tool that allows you to easily and reliable create various elements on your site. Dynamic elements with data, static design elements like buttons and tables, and so on.
It's techically possible to create the shortcodes manually but it's much easier to use the shortcode generator from your Shortcode Revolution menu.</p>

<h2>Available Shortcodes</h2>

<h3>Post and Comments Shortcodes</h3>

<p>This section allows you to generate shortcodes that dynamically list posts or comments based on search criteria. You can use the shortcodes in widgets or in your custom theme pages.</p>

<p>The <b>posts</b> shortcode lets you search posts by IDs, categories, types, tags or phrases and display them like:</p>

<ul>	
	<li><b>Default / regular</b> - the posts will be listed with thumbnail, excerpt, publication time, etc. This design (and many of the other Shortcode Revolution templates) can be overridden as explained in the section "Overriding Shortcode Revolution Templates" at the end of this guide.</li>
	<li><b>List</b> is a short unordered list with the post titles and links.</li>
	<li><b>Carousel</b> creates a slider / carousel from the posts that respond to your criteria. We use our own custom slider code - no bloated ready sliders, so it's very light and simple.</li>
</ul>

<p>The <b>related posts</b> shortcode finds and displays which are related to the current or selected post. You can give relation criteria like matching tags and/or categories. The display formats are the same as with the posts shortcode. This excellent shortcode can be added at the bottom of your single post template to always display related content without using yet another plugin.</p>

<p>The <b>comments</b> shortcode displays comments related to a post or just most recent / best comments. The display formats are default and carousel / slider.</p>

<h3>Popups / Modals</h3>

<p>This shortcode lets you create modal windows / lightboxes with any predefined content. It generates a button to click on which appears on the place of the shortcode so you can use it anywhere in your site. This makes it super easy to create lightboxes without writing code or using more plugins.</p>
<p>The modals can contain any kind of images and media, text, other shortcodes, and so on. If your modal contains anything other than plain unformtatted text make sure to insert it in Text mode of your rich text editor (when pasting it in posts, pages, etc).</p>

<h3>Columns &amp; Grids</h3>

<p>These shortcodes let you create modern cross-browser compatible and responsive content that flows in columns or a grid.</p>

<p>The <b>newspaper-like option</b> creates content that automatically flows in multiple columns.</p>

<p>The <b>grid option</b> is more precise in the way that your content flows on the page. You choose exactly what goes into each cell of the grid - the content does not low through the cells / columns. The grid option can also use your custom template.</p> 

<h3>Tabs</h3>

<p>The tabs shortcode lets you create tabbed content where the tabs do not reload the whole page. Very easy, light and responsive.</p>

<h3>Buttons</h3>

<p>With this shortcode you can create your own design for buttons - colors, size, style, fonts, and so on. Currently buttons support only URL action (going to another page). Calling custom JS functions is coming soon.</p>

<h3>Tables</h3>

<p>The tables shortcode gives you a super easy way to turn an Excel (CSV) sheet into a HTML table. The data is loaded on the fly so you don't need to recreate the shortcode when the file contents change.</p>

<h3>Flashcards</h3>

<p>This shortcode creates nice interactive flashcards. Mostly used in education and educational games, flashcards typically ask a question and reveal the answer when clicked on them. The flashcards in Shortcode Revolution are just visual elements and do not (yet!) fire any back-end action when flipped.</p>

<h3>Data Shortcodes</h3>

<p>The data shortcodes are used to dynamically pull data from your WordPress database.</p>

<p>We currently support <b>user data</b> shortcode. This shortcode allows you pull data for the currently logged in user, a predefined user, or an user defined by an URL parameter. The shortcode can return data for a specific field of the user profile or use meta, or return the whole user data in a string with variables. In the latter case this is given to you as enclosed content of the shortcode and you can fully modify it before placing it anywhere in your site.</p>

<h3>Custom Shortcodes</h3>

<p>This is an easy way to create predefined pieces of content which you can save and use anywhere. Editing the shortcode in the generator will automatically reflect all occurrences of this shortcode in your site.</p>

<h2>Overriding Shortcode Revolution Templates</h2>
