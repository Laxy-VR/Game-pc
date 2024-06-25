
<?php
require_once '../db/connection.php';
session_start();

$R_name = $_POST["R_name"];
$R_price = $_POST["R_price"];
$R_Manufacturer = $_POST["R_Manufacturer"];
$R_PartNumber = $_POST["R_PartNumber"];
$R_Speed = $_POST["R_Speed"];
$R_FormFactor = $_POST["R_FormFactor"];
$R_Modules = $_POST["R_Modules"];
$R_PricePerGB = $_POST["R_PricePerGB"];
$R_Color = $_POST["R_Color"];
$R_FirstWordLatency = $_POST["R_FirstWordLatency"];
$R_CASLatency = $_POST["R_CASLatency"];
$R_Voltage = $_POST["R_Voltage"];
$R_Timing = $_POST["R_Timing"];
$R_ECCRegistered = $_POST["R_ECCRegistered"];
$R_HeatSpreader = $_POST["R_HeatSpreader"];
$R_active = $_POST["R_active"];

// Check if an image link is provided, if not, set it to NULL
$R_img = isset($_POST["R_img"]) ? $_POST["R_img"] : null;

$sql = 'INSERT INTO ram (R_name, R_price, R_Manufacturer, R_PartNumber, R_Speed, R_FormFactor, R_Modules, R_PricePerGB, R_Color, R_FirstWordLatency, R_CASLatency, R_Voltage, R_Timing, R_ECCRegistered, R_HeatSpreader, R_img, R_active) VALUES (:R_name, :R_price, :R_Manufacturer, :R_PartNumber, :R_Speed, :R_FormFactor, :R_Modules, :R_PricePerGB, :R_Color, :R_FirstWordLatency, :R_CASLatency, :R_Voltage, :R_Timing, :R_ECCRegistered, :R_HeatSpreader, :R_img, :R_active)';
$stmt = $conn->prepare($sql);

$stmt->bindValue(':R_name', $R_name);
$stmt->bindValue(':R_price', $R_price);
$stmt->bindValue(':R_Manufacturer', $R_Manufacturer);
$stmt->bindValue(':R_PartNumber', $R_PartNumber);
$stmt->bindValue(':R_Speed', $R_Speed);
$stmt->bindValue(':R_FormFactor', $R_FormFactor);
$stmt->bindValue(':R_Modules', $R_Modules);
$stmt->bindValue(':R_PricePerGB', $R_PricePerGB);
$stmt->bindValue(':R_Color', $R_Color);
$stmt->bindValue(':R_FirstWordLatency', $R_FirstWordLatency);
$stmt->bindValue(':R_CASLatency', $R_CASLatency);
$stmt->bindValue(':R_Voltage', $R_Voltage);
$stmt->bindValue(':R_Timing', $R_Timing);
$stmt->bindValue(':R_ECCRegistered', $R_ECCRegistered);
$stmt->bindValue(':R_HeatSpreader', $R_HeatSpreader);
$stmt->bindValue(':R_active', $R_active);
$stmt->bindValue(':R_img', $R_img);

$stmt->execute();

header('Location: ../?page=RAM_list');
?>
