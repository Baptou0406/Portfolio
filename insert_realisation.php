<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Database.php";

$database = new Database();

$realisation = $_POST["realisation"];
$table = "Realisation";



$insertedId = $database->newRealisation($table, $realisation);