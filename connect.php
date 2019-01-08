<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";

// Linking to the databse
$dbname = 'myblog';
$connection_pointer = new mysqli($servername, $username, $password, $dbname);

if ($connection_pointer->connect_error) {
    die("Connection failed: " . $connection_pointer->connect_error );
} 

define('root_path', realpath(dirname(__FILE__)));
define('base_url', 'http://localhost/my_blog/');

?>