# Shortcode Revolution

Shortcode Revolution is a tool that allows you to easily and reliable create various elements on your site. Dynamic elements with data, static design elements like buttons and tables, and so on. It's technically possible to create the shortcodes manually but it's much easier to use the shortcode generator from your Shortcode Revolution menu.

[See some live demos here.](https://blog.calendarscripts.info/shortcode-revolution-for-wordpress/ "Description and demos of the shortcodes")

= Available Shortcodes =

**Post and Comments Shortcodes**

This section allows you to generate shortcodes that dynamically list posts or comments based on search criteria. You can use the shortcodes in widgets or in your custom theme pages.

The posts shortcode lets you search posts by IDs, categories, types, tags or phrases and display them like:

- Default / regular - the posts will be listed with thumbnail, excerpt, publication time, etc. This design (and many of the other Shortcode Revolution templates) can be overridden as explained in the section "Overriding Shortcode Revolution Templates" at the end of this guide.
- List is a short unordered list with the post titles and links.
- Carousel creates a slider / carousel from the posts that respond to your criteria. We use our own custom slider code - no bloated ready sliders, so it's very light and simple.
The related posts shortcode finds and displays which are related to the current or selected post. You can give relation criteria like matching tags and/or categories. The display formats are the same as with the posts shortcode. This excellent shortcode can be added at the bottom of your single post template to always display related content without using yet another plugin.

The comments shortcode displays comments related to a post or just most recent / best comments. The display formats are default and carousel / slider.

**Popups / Modals**

This shortcode lets you create modal windows / lightboxes with any predefined content. It generates a button to click on which appears on the place of the shortcode so you can use it anywhere in your site. This makes it super easy to create lightboxes without writing code or using more plugins.

The modals can contain any kind of images and media, text, other shortcodes, and so on. If your modal contains anything other than plain unformtatted text make sure to insert it in Text mode of your rich text editor (when pasting it in posts, pages, etc).

**Columns & Grids**

These shortcodes let you create modern cross-browser compatible and responsive content that flows in columns or a grid.

The newspaper-like option creates content that automatically flows in multiple columns.

The grid option is more precise in the way that your content flows on the page. You choose exactly what goes into each cell of the grid - the content does not low through the cells / columns. The grid option can also use your custom template.

**Tabs**

The tabs shortcode lets you create tabbed content where the tabs do not reload the whole page. Very easy, light and responsive.

**Buttons**

With this shortcode you can create your own design for buttons - colors, size, style, fonts, and so on. Currently buttons support only URL action (going to another page). Calling custom JS functions is coming soon.

**Tables**

The tables shortcode gives you a super easy way to turn an Excel (CSV) sheet into a HTML table. The data is loaded on the fly so you don't need to recreate the shortcode when the file contents change.

**Flashcards**

This shortcode creates nice interactive flashcards. Mostly used in education and educational games, flashcards typically ask a question and reveal the answer when clicked on them. The flashcards in Shortcode Revolution are just visual elements and do not (yet!) fire any back-end action when flipped.

**Data Shortcodes**

The data shortcodes are used to dynamically pull data from your WordPress database.

We currently support user data shortcode. This shortcode allows you pull data for the currently logged in user, a predefined user, or an user defined by an URL parameter. The shortcode can return data for a specific field of the user profile or use meta, or return the whole user data in a string with variables. In the latter case this is given to you as enclosed content of the shortcode and you can fully modify it before placing it anywhere in your site.

**Custom Shortcodes**

This is an easy way to create predefined pieces of content which you can save and use anywhere. Editing the shortcode in the generator will automatically reflect all occurrences of this shortcode in your site.

**Overriding Shortcode Revolution Templates**

Some of the default designs of the shortcodes - currently for posts, comments, and grid shortcodes - can be overridden with your own versions. To do this create a folder called "shortcode-revolution" inside your WP theme folder. Copy the associated view file from our plugin to that folder and make your changes there. The plugin will use your version and your changes will not be lost when you apply updates to the plugin.

For example if you want to override the carousel for posts, copy the file views/posts-carousel.html.php and make changes to the cop

## Installation

Nothing special here, just the regular WordPress plugin installation as shown [here](https://www.wpbeginner.com/beginners-guide/step-by-step-guide-to-install-a-wordpress-plugin-for-beginners/ "How to install a WordPress plugin").

## Features

* Shortcode generator which allows you visually to prepare your shortcodes.
* Shortcodes for posts and commments.
* Shortcodes for popups and modals (lightboxes).
* Columns and grids.
* Buttons and tabs.
* Tables from a CSV.
* Flashcards.
* Data shortcodes pulling data from user profile.
* Open source code that allows customization.
* Localization-ready .pot template file available.
* PHP 6, PHP 7, PHP 8 Compatible.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[GPL2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)