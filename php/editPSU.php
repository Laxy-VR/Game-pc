<?php
require_once '../db/connection.php';
session_start();

$id = $_GET['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$manufacturer = $_POST['manufacturer'];
$partnumber = $_POST['partnumber'];
$type = $_POST['type'];
$efficiencyrating = $_POST['efficiencyrating'];
$wattage = $_POST['wattage'];
$length = $_POST['length'];
$modular = $_POST['modular'];
$fanless = $_POST['fanless'];
$active = $_POST['P_active'];
$image = $_POST['image'];

echo "<pre>", print_r($_POST), "</pre>";

$sql = 'UPDATE psu SET P_name = :name, P_price = :price, P_Manufacturer = :manufacturer, P_Partnumber = :partnumber, P_Type = :type, P_Efficiencyrating = :efficiencyrating, P_Wattage = :wattage, P_Length = :length, P_Modular = :modular, P_Fanless = :fanless, P_active = :active, P_img = :img WHERE P_id = :id';
$sth = $conn->prepare($sql);
$sth->bindParam(':name', $name);
$sth->bindParam(':price', $price);
$sth->bindParam(':manufacturer', $manufacturer);
$sth->bindParam(':partnumber', $partnumber);
$sth->bindParam(':type', $type);
$sth->bindParam(':efficiencyrating', $efficiencyrating);
$sth->bindParam(':wattage', $wattage);
$sth->bindParam(':length', $length);
$sth->bindParam(':modular', $modular);
$sth->bindParam(':fanless', $fanless);
$sth->bindParam(':active', $active);
$sth->bindParam(':img', $image);
$sth->bindParam(':id', $id);
$sth->execute();

header('Location: ../?page=PSUlist');

