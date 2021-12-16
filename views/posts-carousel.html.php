<?php defined( 'ABSPATH' ) || exit; ?>

<?php /* Thanks to: https://cabrerahector.com/javascript/how-to-make-an-image-slider-with-jquery-from-scratch/ */ ?>

<div class="srevo-posts srevo-posts-carousel" id="srevo-slideshow-container<?php echo $post->ID?>">

	<?php if ( count($posts) ) : ?>
			<p align="center"><a href="#" id="btn-prev">&lt;&lt;&lt;</a>&nbsp;<a href="#" id="btn-next">&gt;&gt;&gt;</a></p>
			<ul class="srevo-posts-ul srevo-carousel" id="srevo-slideshow<?php echo $post->ID?>">
	 
				<?php foreach($posts as $p):
				   $post = $p;
					setup_postdata($post);
					$background_image =  has_post_thumbnail( $p->ID )  ?  get_the_post_thumbnail_url($p->ID) : ''; 
					$excerpt = get_the_excerpt($p->ID);?>
				<li id="srevo-post-id-<?php echo $p->ID?>" style="background-image: url(<?php echo esc_attr($background_image);?>);">
				
				   <?php if(!empty($excerpt)):?>					
					<div class="srevo-post-excerpt">
						<?php echo apply_filters('the_content', $excerpt); ?>
					</div>				
					<?php endif;?>
					
					<a href="<?php echo get_permalink($p->ID); ?>">
	                <span class="srevo-post-link"><?php echo get_the_title($p->ID); ?></span>
	            </a>
	         
				</li>
			
				<?php endforeach; ?>
			</ul>
			
	<?php endif;
	wp_reset_postdata();  ?>

</div>

<style type="text/css">
#srevo-slideshow-container<?php echo $post->ID?> {
    overflow: hidden;
    position: relative;
    width: 100%;
    height: 300px;
}

#srevo-slideshow-container<?php echo $post->ID?> #srevo-slideshow<?php echo $post->ID?> {
    overflow: hidden;
    position: relative;
    top: 0;
    left: 0;
    margin: 0;
    padding: 0;
    height: 100%;
}

#srevo-slideshow-container<?php echo $post->ID?> #srevo-slideshow<?php echo $post->ID?> li {
    display: inline;
    float: left;
    margin: 0;
    padding: 0;
    list-style: none;
    height: 100%;
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: cover;
}

#srevo-slideshow-container<?php echo $post->ID?> #srevo-slideshow<?php echo $post->ID?> li a {
    position: relative;
    display: block;
    width: 100%;
    height: 100%;
    color: #ffffff;
    transition: color 0.2s ease-in;
}
 
#srevo-slideshow-container<?php echo $post->ID?> #srevo-slideshow<?php echo $post->ID?> li a:hover {
    color: #ef233c;
}

/* Position our caption at the bottom right corner of the slide */
 #srevo-slideshow-container<?php echo $post->ID?> #srevo-slideshow<?php echo $post->ID?> li a span {
     display: inline-block;     
     text-align: right;
     width: 100%;
     bottom: 6em;
     padding: 0.75em 1.5em;
     font-size: 1.3em;      
     background: rgba(0, 0, 0, 0.8);
 }
 
#srevo-slideshow-container<?php echo $post->ID?> #srevo-slideshow<?php echo $post->ID?> li div {
     display: inline-block;
     position: relative;
     left: 0;
     top: 0;
     color: white;
     padding: 0.75em 1.5em;
     font-size: 1em;
     background: #000000; /* fallback for old browsers */
     background: rgba(0, 0, 0, 0.3);
 }
</style>

<script>

    jQuery(function($){
 
        var slider = $("#srevo-slideshow<?php echo $post->ID?>"), // cache the slider object for later use
            item_width = slider.parent().outerWidth(), // get the width of the container for later use
            timer = null; // will reference our autoplay() timer
 
        // Adjust the slider when/if the window gets resized
        $( window ).on( "resize", adjust );
        adjust();
 
        // We have more than one slide,
        // let's add the pagination buttons
        if ( slider.children("li").length > 1 ) {
 
            // Add previous/next buttons
            //slider.parent().append("<a href=\"#\" id=\"btn-prev\">&lt;&lt;</a><a href=\"#\" id=\"btn-next\">&gt;&gt;></a>");
 
            // Handle clicks on the next button
            slider.parent().on("click", "a#btn-prev", function(e){
                e.preventDefault();
 
                slider.children("li:last").prependTo( slider );
                slider.css("left", -item_width);
 
                slider.animate({
                    left: 0
                }, 300, "swing");
            });
 
            // Handle clicks on the previous button
            slider.parent().on("click", "a#btn-next", function(e){
                e.preventDefault();

                slider.animate({
                    left: -item_width
                }, 300, "swing", function(){
                    slider.children("li:first").appendTo( slider );
                    slider.css("left", 0);
                });
            });
        }
 
        // Autoplay
        autoplay();
 
        // Pause/resume autoplay on hover in/out
        slider.hover(function(){
            if ( timer ) {
                clearInterval(timer);
                timer = null;
            }
        }, function(){
            autoplay();
        });
 
        // Helpers
        function autoplay(){
            if ( $("a#btn-next").length ) {
            	 if(typeof timer != 'undefined') clearInterval(timer); 
                timer = setInterval(function(){
                    $("a#btn-next").trigger("click");
                }, 5000);
            }
        }
 
        function adjust(){
            item_width = slider.parent().outerWidth();
            slider.children("li").width( item_width ).parent().width( item_width * slider.children("li").length );
        }
 
    });
</script>