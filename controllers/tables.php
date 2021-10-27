<?php
// Tabs
class ShortcodeRevolutionTables {
	
	// Creates a table from a CSV
	public static function table($atts) {
		// check data source
		$contents = wp_remote_get(esc_url_raw($atts['data_source']));
		
		if(empty($contents)) return __('Invalid data source', 'srevo');
		
		// now parse the CSV into a table
		switch($atts['delimiter']) {
			case 'tab': $delim = "\t"; break;
			case 'semicolon': $delim = ';'; break;
			case 'comma': default: $delim = ','; break;
		}
		
		$html = '';
		
		if (($handle = fopen($_FILES['csv']['tmp_name'], "r")) !== FALSE) {
			$html = '<table class="'.esc_attr($atts['css_classes']).'">'; 
			 	
		    while (($data = fgetcsv($handle, 10000, $delim)) !== FALSE) {	    	  
		    	  $row++;	
		        if(empty($data)) continue;			  			  
		       
              if($row == 1) {
              	 $html .= '<thead>
              	 <tr>';
					 
					 foreach($data as $d) {
					 	// NYI
					 }		              	 
              	  
              	 $html .= '</tr>
              	 </thead>
              	 <tbody>';
              	 continue;
              }		       
		       
		    } // end while
			  
			 $html .= '</tbody></table>';
		} // end if $handle
		
		return $html;
	} // end button
}