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
			types.resistance,
			attacks.name 		AS attack_name,
			attacks.damage
		FROM 
			pokemon,
			types,
			attacks,
			link_attacks
		WHERE 1 = 1
			AND pokemon.type_id = types.id
			AND pokemon.id 		= link_attacks.pokemon_id
			AND attacks.id 		= link_attacks.attack_id
			AND pokemon.id 		= ".$id
	;

	// Get rows
	$results = $database->getRows($sql);

	// Output
	return $results[0];

}

function createPokemon($data){

	// Make pokemon
	$pokemon = new Pokemon($data);

	// Output
	return $pokemon;
}


 ?>