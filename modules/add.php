<?php 

function getTypes($database){

	// Build SQL
	$sql = "
		SELECT 
			types.id,
			types.type,
			types.weakness,
			types.resistance
		FROM 
			types
	";

	// Get rows
	$results = $database->getRows($sql);

	// Output
	return $results;
}

function getPokemons($database){

		// Build SQL
		$sql = "
			SELECT 
				pokemon.id,
				pokemon.name
			FROM 
				pokemon
		";

		// Get rows
		$results = $database->getRows($sql);

		// Output
		return $results;
}

function insertPokemon($database, $input){

	// Insert pokemon
	$database->insert('pokemon', $input);
}

function insertAttack($database, $input){

	// Attack array
	$attack 			= array();
	$attack['name'] 	= $input['name'];
	$attack['type'] 	= $input['type'];
	$attack['damage']	= $input['damage'];

	// Insert pokemon
	$database->insert('attacks', $attack);

	// Build SQL
	$sql = "
		SELECT 
			attacks.id
		FROM 
			attacks
		ORDER BY 
			attacks.id DESC
		LIMIT 1
	";

	// Get rows
	$results = $database->getRows($sql);
	$results = $results[0]['id'];

	// Link array
	$link 				= array();
	$link['attack_id'] 	= $results;
	$link['pokemon_id'] = $input['pokemon'];

	// Insert pokemon
	$database->insert('link_attacks', $link);
}


 ?>