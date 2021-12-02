<?php 
// contains little procedural functions to output various HTML strings
// safe redirect
function srevo_redirect($url, $args = "") {
	// prepend some variable(s) to the URL
	if(!empty($args) and is_array($args)) $url = add_query_arg($args, $url);
	
	echo "<meta http-equiv='refresh' content='0;url=$url' />"; 
	exit;
}

function srevo_redirect_datetotime($date) {
	list($year, $month, $day) = explode("-",$date);
	return mktime(1, 0, 0, $month, $day, $year);
}

// enqueue the localized and themed datepicker
function srevo_enqueue_datepicker() {
	$locale_url = get_option('srevo_locale_url');	
	wp_enqueue_script('jquery-ui-datepicker');	
	if(!empty($locale_url)) {
		// extract the locale
		$parts = explode("datepicker-", $locale_url);
		$sparts = explode(".js", $parts[1]);
		$locale = $sparts[0];
		wp_enqueue_script('jquery-ui-i18n-'.$locale, $locale_url, array('jquery-ui-datepicker'));
	}
	$css_url = get_option('srevo_datepicker_css');
	if(empty($css_url)) $css_url = SREVO_URL . '/jquery-ui.css';
	wp_enqueue_style('jquery-style', $css_url);
}


// strip tags when user is not allowed to use unfiltered HTML
// keep some safe tags on
function srevo_strip_tags($content) {
   if(!current_user_can('unfiltered_html')) {
		$content = strip_tags($content, '<b><i><em><u><a><p><br><div><span><hr><font><img>');
	}
	
	$content = wp_encode_emoji($content);
	
	return $content;
}

// makes sure all values in array are ints. Typically used to sanitize POST data from multiple checkboxes
function srevo_int_array($value) {
   if(empty($value) or !is_array($value)) return array();
   $value = array_filter($value, 'intval');
   return $value;
}


// output responsive table CSS in admin pages (and not only)
function srevo_resp_table_css($screen_width = 600) {
	?>
/* Credits:
 This bit of code: Exis | exisweb.net/responsive-tables-in-wordpress
 Original idea: Dudley Storey | codepen.io/dudleystorey/pen/Geprd */
  
@media screen and (max-width: <?php echo $screen_width?>px) {
    table.arigato-pro-table {width:100%;}
    table.arigato-pro-table thead {display: none;}
    table.arigato-pro-table tr:nth-of-type(2n) {background-color: inherit;}
    table.arigato-pro-table tr td:first-child {background: #f0f0f0; font-weight:bold;font-size:1.3em;}
    table.arigato-pro-table tbody td {display: block;  text-align:center;}
    table.arigato-pro-table tbody td:before { 
        content: attr(data-th); 
        display: block;
        text-align:center;  
    }
}
	<?php
} // end bftpro_resp_table_css()

function srevo_resp_table_js() {
	?>
/* Credits:
This bit of code: Exis | exisweb.net/responsive-tables-in-wordpress
Original idea: Dudley Storey | codepen.io/dudleystorey/pen/Geprd */
  
var headertext = [];
var headers = document.querySelectorAll("thead");
var tablebody = document.querySelectorAll("tbody");

for (var i = 0; i < headers.length; i++) {
	headertext[i]=[];
	for (var j = 0, headrow; headrow = headers[i].rows[0].cells[j]; j++) {
	  var current = headrow;
	  headertext[i].push(current.textContent);
	  }
} 

for (var h = 0, tbody; tbody = tablebody[h]; h++) {
	for (var i = 0, row; row = tbody.rows[i]; i++) {
	  for (var j = 0, col; col = row.cells[j]; j++) {
	    col.setAttribute("data-th", headertext[h][j]);
	  } 
	}
}
<?php
} // end bftpro_resp_table_js

function srevo_unique_cnt() {
	// ensure unque ID
	if(empty($_POST['srevo_unique_cnt'])) $_POST['srevo_unique_cnt'] = 1;
	else $_POST['srevo_unique_cnt'] = intval($_POST['srevo_unique_cnt']) + 1; 
	$unique_cnt = intval($_POST['srevo_unique_cnt']);
	
	return $unique_cnt;
}