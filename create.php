<?php 
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

// require pokemon class
require 'classes/pokemon.class.php';

// start session
session_start();

// array for pokemon stats
$stats = array();
// scan directory for files
$files = scandir('pokemons/');


function createPokemons($files){
	// include all found pokemon stats
	foreach($files as $file){
		if($file !== '.' && $file !== '..'){
			include 'pokemons/'.$file;
		}
	}

	$pokemons = array();

	foreach($stats as $pokemon){
		$name = strtolower($pokemon['name']);
		$pokemons[$name] = new Pokemon($pokemon);

		// print begin health of all pokemons
		// echo '<span style=\'color:blue;\'>'.$pokemons[$name]->name.'</span> begins the battle with <span style=\'color:#17bd54;\'>'.$pokemons[$name]->health.'</span> health.<br />';

	}
	// output pokemons
	return $pokemons;
}

$pokemons = createPokemons($files);

$_SESSION['pokemons'] = $pokemons;

 ?>