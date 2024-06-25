<?php
require_once '../db/connection.php';
session_start();

$MB_name = $_POST["MB_name"];
$MB_price = $_POST["MB_price"];
$MB_Manufacturer = $_POST["MB_Manufacturer"];
$MB_PartNumber = $_POST["MB_PartNumber"];
$MB_SocketCPU = $_POST["MB_SocketCPU"];
$MB_FormFactor = $_POST["MB_FormFactor"];
$MB_Chipset = $_POST["MB_Chipset"];
$MB_MemoryMax = $_POST["MB_MemoryMax"];
$MB_MemoryType = $_POST["MB_MemoryType"];
$MB_MemorySlots = $_POST["MB_MemorySlots"];
$MB_MemorySpeed = $_POST["MB_MemorySpeed"];
$MB_Color = $_POST["MB_Color"];
//$MB_active = $_POST["MB_active"];
$MB_img = $_POST["MB_img"];

//// Check if an image file was uploaded
// $targetDirectory = "uploads/"; // Adjust this to your desired directory
// $targetFile = $targetDirectory . basename($_FILES["MB_img"]["name"]);
//
// if (move_uploaded_file($_FILES["MB_img"]["tmp_name"], $targetFile)) {

$sql = "INSERT INTO motherboard (MB_name, MB_price, MB_Manufacturer, MB_PartNumber, MB_SocketCPU, MB_FormFactor, MB_Chipset, MB_MemoryMax, MB_MemoryType, MB_MemorySlots, MB_MemorySpeed, MB_Color, MB_img)
VALUES (:MB_name, :MB_price, :MB_Manufacturer, :MB_PartNumber, :MB_SocketCPU, :MB_FormFactor, :MB_Chipset, :MB_MemoryMax, :MB_MemoryType, :MB_MemorySlots, :MB_MemorySpeed, :MB_Color, :MB_img)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':MB_name', $MB_name);
$stmt->bindParam(':MB_price', $MB_price);
$stmt->bindParam(':MB_Manufacturer', $MB_Manufacturer);
$stmt->bindParam(':MB_PartNumber', $MB_PartNumber);
$stmt->bindParam(':MB_SocketCPU', $MB_SocketCPU);
$stmt->bindParam(':MB_FormFactor', $MB_FormFactor);
$stmt->bindParam(':MB_Chipset', $MB_Chipset);
$stmt->bindParam(':MB_MemoryMax', $MB_MemoryMax);
$stmt->bindParam(':MB_MemoryType', $MB_MemoryType);
$stmt->bindParam(':MB_MemorySlots', $MB_MemorySlots);
$stmt->bindParam(':MB_MemorySpeed', $MB_MemorySpeed);
$stmt->bindParam(':MB_Color', $MB_Color);
$stmt->bindParam(':MB_img', $MB_img);
//$stmt->bindParam(':MB_active', $MB_active);

$stmt->execute();
header('Location: ../?page=MBlist');

?>