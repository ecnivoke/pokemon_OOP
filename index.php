<?php 

// Require library
require 'library.php';

// Get page, default: choose
$page = !isset($_GET['p']) ? 'home' : $_GET['p'];

// Require module
require 'modules/'.$page.'.php';
// Include template
include 'public_html/'.$page.'.tpl.php';
