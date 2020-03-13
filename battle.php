<?php 

// print rules
// names: 	<span style=\'color:blue;\'></span>
// damage: 	<span style=\'color:red;\'></span>
// health: 	<span style=\'color:#17bd54;\'></span>
// attacks:<span style=\'color:#bf62b1;\'></span>

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

require 'classes/pokemon.class.php';

// array for pokemon stats
$stats = array();

// include pokemons and their stats
include 'pokemons/charmander.php';
include 'pokemons/rob.php';

$pokemons = array();

foreach($stats as $pokemon){
	$name = strtolower($pokemon['name']);
	$pokemons[$name] = new Pokemon($pokemon);

	// print begin health of all pokemons
	// echo '<span style=\'color:blue;\'>'.$pokemons[$name]->name.'</span> begins the battle with <span style=\'color:#17bd54;\'>'.$pokemons[$name]->health.'</span> health.<br />';

}
// begin the battle
echo '<br />';
// $pokemons['charmander']->attack('punch', $pokemons['rob']);

echo '<br />';
// $pokemons['rob']->attack('nier trap', $pokemons['charmander']);

// d($pokemons);

 ?>