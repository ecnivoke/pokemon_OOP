<?php 

// Require library
require 'library.php';

// Get page, default: choose
$page = !isset($_GET['p']) ? 'home' : $_GET['p'];

// Set module
$module = $page;

// Re-use module
if($page == 'add_atk'){
	$module = 'add';
}

// Require module
require 'modules/'.$module.'.php';
// Include template
include 'public_html/'.$page.'.tpl.php';
