<?php 

require_once('create.php');

// begin the battle
// echo '<br />';
// $pokemons['charmander']->attack('punch', $pokemons['rob']);

// echo '<br />';
// $pokemons['charmander']->attack('punch', $pokemons['rob']);

// echo '<br />';
// $pokemons['charmander']->attack('punch', $pokemons['rob']);

// echo '<br />';
// $pokemons['rob']->attack('nier trap', $pokemons['charmander']);

// d($pokemons);



if($_SERVER['REQUEST_METHOD'] == 'GET'){

	if(!empty($_GET['data'])){

		$data = $_GET['data'];
		$data = json_decode($data);

		$create = $data->args->create;
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
				$_SESSION['pokemons'][$poke]->attack($att, $pokemons[$enem]);
			break;
		}

	}

}


 ?>
