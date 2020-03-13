<?php 
/***
*
*	New pokemon
*
***/
$stats[]			= array();
$stats[0]['name']	= 'Charmander'; // name
$stats[0]['damage'] = 50; 			// damage
$stats[0]['hp']		= 10; 			// hp
$stats[0]['type'] 	= 'fire'; 		// type

// Attack 1
$stats[0]['attacks'] = array();
$stats[0]['attacks']['punch']			= array();
$stats[0]['attacks']['punch']['name'] 	= 'punch';	// name
$stats[0]['attacks']['punch']['type'] 	= 'fire';	// type
$stats[0]['attacks']['punch']['damage'] = 1000;		// damage
// Attack 2
$stats[0]['attacks']['slap']			= array();
$stats[0]['attacks']['slap']['name'] 	= 'slap';	//name
$stats[0]['attacks']['slap']['type'] 	= 'normal';	// type
$stats[0]['attacks']['slap']['damage'] 	= 10;		// damage

 ?>