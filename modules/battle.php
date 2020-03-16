<?php 

require 'classes/pokemon.class.php';

function getPokemon($database){

	// Get pokemon id
	$id = $_GET['poke'];
	
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
			attacks.name,
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
	";

	// Get rows
	$results = $database->getRows($sql);

	// Output
	return $results;

}

function makePokemon(){


}




 ?>