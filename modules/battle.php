<?php 

require 'classes/pokemon.class.php';

session_start();

function getPokemon($database, $id){
	
	// Build SQL
	$sql = "
		SELECT 
			pokemon.id,
			pokemon.name,
			pokemon.hp,
			pokemon.health,
			pokemon.damage,
			types.type,
			types.weakness,
			types.resistance
		FROM 
			pokemon,
			types
		WHERE 1 = 1
			AND pokemon.type_id = types.id
			AND pokemon.id 		= ".$id
	;

	// Get rows
	$results = $database->getRows($sql);

	// Output
	return $results[0];

}

function getAttacks($database, $pokemon){

	// Build SQL
	$sql = "
		SELECT 
			attacks.name,
			attacks.damage,
			types.type
		FROM 
			pokemon,
			types,
			attacks,
			link_attacks
		WHERE 1 = 1
			AND attacks.type_id 		= types.id
			AND link_attacks.attack_id 	= attacks.id
			AND link_attacks.pokemon_id	= ".$pokemon."
			AND pokemon.id 				= ".$pokemon
	;

	// Get rows
	$results = $database->getRows($sql);

	// Output
	return $results;
}

function createPokemon($data){

	// Make pokemon
	$pokemon = new Pokemon($data);

	// Output
	return $pokemon;
}


 ?>