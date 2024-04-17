
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Database.php";

$db = new Database();   

$realisations=$db->selectAll('Realisation');
$competences=$db->selectAll('Competences');
$croix=$db->selectAll('Real_comp');

echo (json_encode(["realisations"=>$realisations,"competences"=>$competences,"croix"=>$croix]));
