<?php
if(!defined('ABSPATH')) exit;

// Tables
class ShortcodeRevolutionTables extends ShortcodeRevolutionShortcode {
	
	// Creates a table from a CSV
	public static function table($atts)  {
		self :: load_css();
		
		// now parse the CSV into a table
		switch($atts['delimiter']) {
			case 'tab': $delim = "\t"; break;
			case 'semicolon': $delim = ';'; break;
			case 'comma': default: $delim = ','; break;
		}
		
		$html = '';
		$row = 0;
		if (($handle = fopen(esc_url_raw($atts['data_source']), "r")) !== FALSE) {
			$html = '<table class="'.esc_attr($atts['css_classes']).'">'; 
			 	
		    while (($data = fgetcsv($handle, 10000, $delim)) !== FALSE) {	    	  
		    	  $row++;	
		        if(empty($data)) continue;			  			  
		       
              if($row == 1) {
              	 $html .= '<thead>
              	 <tr>';
					 
					 foreach($data as $d) {
					 	$html .= '<th>'.esc_attr($d).'</th>';
					 }		              	 
              	  
              	 $html .= '</tr>
              	 </thead>
              	 <tbody>';
              	 continue;
              }		       
		        
		        // table cells after the first row
		        if(empty($class)) $class = 'alternate';
		        else $class = '';
		        $html .= '<tr class="'.$class.'">';

				  foreach($data as $d) {
				  	  $html .= '<td>'.esc_attr($d).'</td>';
				  }		        
		        
		        $html .= '</tr>';
		    } // end while
			  
			 $html .= '</tbody></table>';
		} // end if $handle
		
		return $html;
	} // end button
}