<?php 

// require pokemon class
require 'classes/pokemon.class.php';

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

$_SESSION['pokemons'] 	= $pokemons;

 ?>