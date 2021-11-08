<?php
// Tabs
class ShortcodeRevolutionFlashcards {	
	// Generates a flashcard
	public static function card($atts, $contents = '') {
		// the two sides of the flascard will be separated by a <!--split--> tag in the contents of the shortcode
		wp_enqueue_script(
			'jquery.flip',
			SREVO_URL.'lib/jquery.flip.min.js',
			['jquery'],
			'1.1.2');
			
		// params NYI	
		$width = empty($atts['width']) ? '' : esc_attr($atts['width']);
			
		$flashcard .= "<div class='srevo-flashcard' style='width:" . $width . ";height:" . $height . "border-radius:" . $border_radius . "%;'><div class='srevo-flashcard-front front' style='background-color:" . $color . ";border-radius:" . $border_radius . "%;color:".$text_color.";font-size:".$text_size."px;'>" . $front_answer . "</div>
			<div class='srevo-flashcard-back back' style='background-color:" . $back_color . ";border-radius:" . $border_radius. "%;color:".$back_text_color.";font-size:".$back_text_size."px;'>" . $back_answer . "</div></div>";		
			
		$flashcard . ='<script>
			jQuery(".srevo-flashcard").flip({trigger: "manual"});
		</script>';		
			
		return $flashcard;			
	} // end button
}