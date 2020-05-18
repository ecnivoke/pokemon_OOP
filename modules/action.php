<?php 

// Require classes
require '../classes/pokemon.class.php';
require '../classes/kipfilet.class.php';

session_start();

// Pokemon of the current player
$current = $_SESSION['pokemons'][$_SESSION['turn']];

// Set turn to other player
$_SESSION['turn'] = $_SESSION['turn'] == 'player_1' ? 'player_2' : 'player_1';

// Pokemon of the enemy player
$enemy = $_SESSION['pokemons'][$_SESSION['turn']];

// Get attack name
$atk = $_GET['atk'];

// Attack!!!!
$message = $current->attack($atk, $enemy);

// Set attack log
$_SESSION['attack_log'][] = $message;

// Redirect to battle page
header('Location: ../index.php?p=battle');


 ?>