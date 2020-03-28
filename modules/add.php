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

function insertPokemon($database, $input){

	// Insert pokemon
	$database->insert('pokemon', $input);
}


 ?>