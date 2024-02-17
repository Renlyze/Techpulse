<?php
$hostname = 'localhost';
$username = '3205ftperez';
$password = '052103';
$database = 'techpulsedb';
$port = '3306';


$connection = mysqli_connect($hostname, $username, $password, $database, $port);


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
