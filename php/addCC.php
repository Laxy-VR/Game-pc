<?php
require_once '../db/connection.php';
session_start();

$ccName = $_POST["ccName"];
$ccPrice = $_POST["ccPrice"];
$ccManufacturer = $_POST["ccManufacturer"];
$ccModel = $_POST["ccModel"];
$ccPartNumber = $_POST["ccPartNumber"];
$ccFanRPM = $_POST["ccFanRPM"];
$ccNoiseLevel = $_POST["ccNoiseLevel"];
$ccColor = $_POST["ccColor"];
$ccHeight = $_POST["ccHeight"];
$ccCPUSocket = $_POST["ccCPUSocket"];
$ccWaterCooled = $_POST["ccWaterCooled"];
$ccFanless = $_POST["ccFanless"];
$ccImage = isset($_POST["ccImage"]) ? $_POST["ccImage"] : null;

$sql = 'INSERT INTO cpu_cooler (CC_name, CC_price, CC_Manufacturer, CC_Model, CC_PartNumber, CC_FanRPM, CC_NoiseLevel, CC_Color, CC_Height, CC_CPUSocket, CC_WaterCooled, CC_Fanless, CC_img, CC_active) VALUES (:CC_name, :CC_price, :CC_Manufacturer, :CC_Model, :CC_PartNumber, :CC_FanRPM, :CC_NoiseLevel, :CC_Color, :CC_Height, :CC_CPUSocket, :CC_WaterCooled, :CC_Fanless, :CC_img, :CC_active)';
$stmt = $conn->prepare($sql);

$stmt->bindValue(':CC_name', $ccName);
$stmt->bindValue(':CC_price', $ccPrice);
$stmt->bindValue(':CC_Manufacturer', $ccManufacturer);
$stmt->bindValue(':CC_Model', $ccModel);
$stmt->bindValue(':CC_PartNumber', $ccPartNumber);
$stmt->bindValue(':CC_FanRPM', $ccFanRPM);
$stmt->bindValue(':CC_NoiseLevel', $ccNoiseLevel);
$stmt->bindValue(':CC_Color', $ccColor);
$stmt->bindValue(':CC_Height', $ccHeight);
$stmt->bindValue(':CC_CPUSocket', $ccCPUSocket);
$stmt->bindValue(':CC_WaterCooled', $ccWaterCooled);
$stmt->bindValue(':CC_Fanless', $ccFanless);
$stmt->bindValue(':CC_img', $ccImage);
$stmt->bindValue(':CC_active', 'Yes'); // Assuming you want to set CC_active to 'Yes' by default

$stmt->execute();

header('Location: ../?page=CClist');
?>
