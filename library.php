<?php 

require 'classes/database.class.php';

// define database
$conf					= array();
$conf['servername'] 	= 'localhost';
$conf['database_name'] 	= 'pokemon_oop';
$conf['username'] 		= 'root';
$conf['password'] 		= '';

$database 	= new Database($conf);








function d($debug, $highlight = true, $hidden = false){
	// Highlight debug string
	if($highlight){
		$debug = highlight_string('<?php '.print_r($debug, true).' ?>', true);
		$debug = str_replace(array('&lt;?php&nbsp;','?&gt;'), '', $debug);
	}
	else {
		$debug = print_r($debug, true);
	}

	// Check if debug is hidden
	print($hidden ? "<!--\r\n" : "");

	// Print input
	print("<pre style='text-align: left;'>\r\n");
	print($debug);
	print("</pre>\r\n");

	// Seperate debug call
	print("<hr />\r\n");

	// Check if debug is hidden
	print($hidden ? "-->\r\n" : "");

	// Flush input
	flush();
}

 ?>