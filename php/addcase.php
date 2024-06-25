<?php
// Include your database connection file here
require_once '../db/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $csName = $_POST["csName"];
    $csPrice = $_POST["csPrice"];
    $csManufacturer = $_POST["csManufacturer"];
    $csPartNumber = $_POST["csPartNumber"];
    $csType = $_POST["csType"];
    $csColor = $_POST["csColor"];
    $csPowerSupply = $_POST["csPowerSupply"];
    $csSidePanel = $_POST["csSidePanel"];
    $csPowerSupplyShroud = $_POST["csPowerSupplyShroud"];
    $csFrontPanelUSB = $_POST["csFrontPanelUSB"];
    $csMotherboardFormFactor = $_POST["csMotherboardFormFactor"];
    $csMaximumVideoCardLength = $_POST["csMaximumVideoCardLength"];
    $csDriveBays = $_POST["csDriveBays"];
    $csExpansionSlots = $_POST["csExpansionSlots"];
    $csDimensions = $_POST["csDimensions"];
    $csVolume = $_POST["csVolume"];
    $csImage = $_POST["csImage"];

    // Prepare SQL statement
    $sql = "INSERT INTO pc_case (CS_name,
    CS_price,
    CS_Manufacturer,
    CS_PartNumber,
    CS_Type,
    CS_Color,
    CS_PowerSupply,
    CS_SidePanel,
    CS_PowerSupplyShroud,
    CS_FrontPanelUSB,
    CS_MotherboardFormFactor,
    CS_MaximumVideoCardLength,
    CS_DriveBays,
    CS_ExpansionSlots,
    CS_Dimensions,
    CS_Volume,
    CS_img
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $csName);
        $stmt->bindParam(2, $csPrice);
        $stmt->bindParam(3, $csManufacturer);
        $stmt->bindParam(4, $csPartNumber);
        $stmt->bindParam(5, $csType);
        $stmt->bindParam(6, $csColor);
        $stmt->bindParam(7, $csPowerSupply);
        $stmt->bindParam(8, $csSidePanel);
        $stmt->bindParam(9, $csPowerSupplyShroud);
        $stmt->bindParam(10, $csFrontPanelUSB);
        $stmt->bindParam(11, $csMotherboardFormFactor);
        $stmt->bindParam(12, $csMaximumVideoCardLength);
        $stmt->bindParam(13, $csDriveBays);
        $stmt->bindParam(14, $csExpansionSlots);
        $stmt->bindParam(15, $csDimensions);
        $stmt->bindParam(16, $csVolume);
        $stmt->bindParam(17, $csImage);

        // Execute the statement
        if ($stmt->execute()) {
            // Case added successfully, redirect to caseslist.inc
            header('Location: ../?page=caseslist');
            exit; // Make sure to exit after the redirection
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
