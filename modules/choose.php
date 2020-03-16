<?php 

function getPokemons($database){
	// Set todays date
	$today = date('Y-m-d H:i:s');

	// Build SQL query
	$sql = "
		SELECT 
			pokemon.id,
			pokemon.name,
			types.type
		FROM 
			pokemon,
			types
		WHERE 1 = 1
			AND pokemon.type_id = types.id
	";

	// Get rows
	$results = $database->getRows($sql);

	// Output
	return $results;

}


 ?>
