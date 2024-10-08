<?php
// Get the document root
$doc_root = $_SERVER['DOCUMENT_ROOT'];

// Get the application path
$uri = $_SERVER['REQUEST_URI'];
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1] . '/' . $dirs[2] . '/';

// Set the include path
set_include_path($doc_root . $app_path);

// Get common code
require_once('tags.php');
require_once($doc_root . '/Web-Aplikacii-MVC-App/model/database.php');

// Define some common functions
function display_db_error($error_message) {
    global $app_path;
    include '../../errors/db_error.php';
    exit;
}

function display_error($error_message) {
    global $app_path;
    //include '../errors/error.php';
    echo "<script type='text/javascript'>alert('$error_message');</script>";
    exit;
}

function redirect($url) {
    session_write_close();
    header("Location: " . $url);
    exit;
}

// Start session to store user and cart data
session_start();
?>
