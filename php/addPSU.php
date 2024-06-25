<?php
require_once '../db/connection.php';
session_start();


$name = $_POST["P_name"];
$price = $_POST["P_price"];
$manufacturer = $_POST["P_Manufacturer"];
$partNumber = $_POST["P_PartNumber"];
$type = $_POST["P_Type"];
$efficiencyRating = $_POST["P_EfficiencyRating"];
$wattage = $_POST["P_Wattage"];
$length = $_POST["P_Length"];
$modular = $_POST["P_Modular"];
$fanless = $_POST["P_Fanless"];
$img = $_POST["P_img"];
//$active = $_POST["P_active"];

echo "<pre>", print_r($_POST), "</pre>";

$sql = 'INSERT INTO psu (P_name, P_price, P_Manufacturer, P_PartNumber, P_Type, P_EfficiencyRating, P_Wattage, P_Length, P_Modular, P_Fanless, P_img) VALUES (:P_name, :P_price, :P_Manufacturer, :P_PartNumber, :P_Type, :P_EfficiencyRating, :P_Wattage, :P_Length, :P_Modular, :P_Fanless, :P_img)';
$stmt = $conn->prepare($sql);

$stmt->bindParam(':P_name', $name);
$stmt->bindParam(':P_price', $price);
$stmt->bindParam(':P_Manufacturer', $manufacturer);
$stmt->bindParam(':P_PartNumber', $partNumber);
$stmt->bindParam(':P_Type', $type);
$stmt->bindParam(':P_EfficiencyRating', $efficiencyRating);
$stmt->bindParam(':P_Wattage', $wattage);
$stmt->bindParam(':P_Length', $length);
$stmt->bindParam(':P_Modular', $modular);
$stmt->bindParam(':P_Fanless', $fanless);
$stmt->bindParam(':P_img', $img);
//$stmt->bindParam(':P_active', $active);

$stmt->execute();

header('Location: ../?page=PSUlist');

