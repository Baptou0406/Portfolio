<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Database.php";

$database = new Database();

$id_real = $_POST["real"];
$id_comp = $_POST["comp"];
$table = "Real_comp";

$insertedId = $database->deleteCroix($table, $id_real, $id_comp);