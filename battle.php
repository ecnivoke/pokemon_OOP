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

require 'classes/pokemon.class.php';

// array for pokemon stats
$stats = array();
// scan directory for files
$files = scandir('pokemons/');
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

// begin the battle
// echo '<br />';
// $pokemons['charmander']->attack('punch', $pokemons['rob']);

// echo '<br />';
// $pokemons['rob']->attack('nier trap', $pokemons['charmander']);

// d($pokemons);

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	if(!empty($_GET['data'])){

		$data = $_GET['data'];
		$data = json_decode($data);

		/*** DATA EXAMPLE
			{
				"func":"attack",
				"args":{
					"pokemon":"Charmander",
					"enemy":"Rob",
					"attack":"slap"
				}
			} 
		***/
		switch($data->func){
			case 'attack':
				$poke = strtolower($data->args->pokemon); 	// pokemon name
				$att  = $data->args->attack; 				// attack name
				$enem = strtolower($data->args->enemy);		// enemy name

				// attack the enemy
				$pokemons[$poke]->attack($att, $pokemons[$enem]);
			break;
		}

		

	}

}

 ?>