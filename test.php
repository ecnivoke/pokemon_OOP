<?php 

$ajax = $_REQUEST['func'];
$args = $_REQUEST['data'];

switch($ajax){
	case 'test':
		test($args);
	break;

	default:
		echo 'nee';
	break;
}

function test($data){
	$msg = 'yes dit werkt';
	echo ($msg);
}

 ?>