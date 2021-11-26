<?php
if(!defined('ABSPATH')) exit;

// Flashcards
class ShortcodeRevolutionFlashcards extends ShortcodeRevolutionShortcode {	
	// Generates a flashcard
	public static function card($atts, $contents = '') {
		self :: load_css();
		
		// the two sides of the flascard will be separated by a <!--split--> tag in the contents of the shortcode
		wp_enqueue_script(
			'jquery.flip',
			SREVO_URL.'lib/jquery.flip.min.js',
			['jquery'],
			'1.1.2');
			
		if(empty($contents) or !strstr($contents, '<!-- split -->')) return "";
		list($front_side, $back_side) = explode('<!-- split -->', $contents);	
			
		// params 
		$width = empty($atts['width']) ? '300px' : esc_attr($atts['width']);
		$height = empty($atts['height']) ? '300px' : esc_attr($atts['height']);
		$border_radius = empty($atts['border_radius']) ? '0' : esc_attr($atts['border_radius']);
		$color = empty($atts['front_color']) ? 'white' : esc_attr($atts['front_color']);
		$back_color = empty($atts['back_color']) ? 'white' : esc_attr($atts['back_color']);
		$padding = empty($atts['padding']) ? '10px;' : esc_attr($atts['padding']);
			
		$flashcard = '';	
		$flashcard .= "<div class='srevo-flashcard' style='cursor:pointer; width:" . $width . ";height:" . $height . "border-radius:" . $border_radius . "%;' onclick=\"jQuery(this).flip('toggle');\"><div class='srevo-flashcard-front front' style='padding: ".$padding.";background-color:" . $color . ";border-radius:" . $border_radius . ";'>" . $front_side . "</div>
			<div class='srevo-flashcard-back back' style='padding: ".$padding.";background-color:" . $back_color . ";border-radius:" . $border_radius. ";'>" . $back_side . "</div></div>";		
			
		$flashcard .= '<script>
		jQuery(function(){
			jQuery(".srevo-flashcard").flip({trigger: "manual"});
		});			
		</script>';		
			
		return $flashcard;			
	} // end button
}