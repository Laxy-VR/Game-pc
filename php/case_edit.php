<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../db/connection.php';

        // Retrieve data from the form
        $CS_ID = $_POST['CS_ID']; // Get PC Case ID
        $CS_name = $_POST['CS_name'];
        $CS_price = $_POST['CS_price'];
        $CS_Manufacturer = $_POST['CS_Manufacturer'];
        $CS_PartNumber = $_POST['CS_PartNumber'];
        $CS_Type = $_POST['CS_Type'];
        $CS_Color = $_POST['CS_Color'];
        $CS_PowerSupply = $_POST['CS_PowerSupply'];
        $CS_SidePanel = $_POST['CS_SidePanel'];
        $CS_PowerSupplyShroud = $_POST['CS_PowerSupplyShroud'];
        $CS_FrontPanelUSB = $_POST['CS_FrontPanelUSB'];
        $CS_MotherboardFormFactor = $_POST['CS_MotherboardFormFactor'];
        $CS_MaximumVideoCardLength = $_POST['CS_MaximumVideoCardLength'];
        $CS_DriveBays = $_POST['CS_DriveBays'];
        $CS_ExpansionSlots = $_POST['CS_ExpansionSlots'];
        $CS_Dimensions = $_POST['CS_Dimensions'];
        $CS_Volume = $_POST['CS_Volume'];
        $CS_img = $_POST['CS_img'];
        $CS_active = $_POST['CS_active'];

        // Update data in the database
        $query = "UPDATE pc_case SET 
            CS_name = :CS_name, 
            CS_price = :CS_price, 
            CS_Manufacturer = :CS_Manufacturer, 
            CS_PartNumber = :CS_PartNumber, 
            CS_Type = :CS_Type, 
            CS_Color = :CS_Color, 
            CS_PowerSupply = :CS_PowerSupply, 
            CS_SidePanel = :CS_SidePanel, 
            CS_PowerSupplyShroud = :CS_PowerSupplyShroud, 
            CS_FrontPanelUSB = :CS_FrontPanelUSB, 
            CS_MotherboardFormFactor = :CS_MotherboardFormFactor, 
            CS_MaximumVideoCardLength = :CS_MaximumVideoCardLength, 
            CS_DriveBays = :CS_DriveBays, 
            CS_ExpansionSlots = :CS_ExpansionSlots, 
            CS_Dimensions = :CS_Dimensions, 
            CS_Volume = :CS_Volume, 
            CS_img = :CS_img, 
            CS_active = :CS_active 
            WHERE CS_ID = :CS_ID";

        $statement = $conn->prepare($query);
        $statement->bindParam(':CS_name', $CS_name);
        $statement->bindParam(':CS_price', $CS_price);
        $statement->bindParam(':CS_Manufacturer', $CS_Manufacturer);
        $statement->bindParam(':CS_PartNumber', $CS_PartNumber);
        $statement->bindParam(':CS_Type', $CS_Type);
        $statement->bindParam(':CS_Color', $CS_Color);
        $statement->bindParam(':CS_PowerSupply', $CS_PowerSupply);
        $statement->bindParam(':CS_SidePanel', $CS_SidePanel);
        $statement->bindParam(':CS_PowerSupplyShroud', $CS_PowerSupplyShroud);
        $statement->bindParam(':CS_FrontPanelUSB', $CS_FrontPanelUSB);
        $statement->bindParam(':CS_MotherboardFormFactor', $CS_MotherboardFormFactor);
        $statement->bindParam(':CS_MaximumVideoCardLength', $CS_MaximumVideoCardLength);
        $statement->bindParam(':CS_DriveBays', $CS_DriveBays);
        $statement->bindParam(':CS_ExpansionSlots', $CS_ExpansionSlots);
        $statement->bindParam(':CS_Dimensions', $CS_Dimensions);
        $statement->bindParam(':CS_Volume', $CS_Volume);
        $statement->bindParam(':CS_img', $CS_img);
        $statement->bindParam(':CS_active', $CS_active);
        $statement->bindParam(':CS_ID', $CS_ID); // Bind PC Case ID

        $statement->execute();

        // Redirect to a success page or display a success message
        header("Location: ../index.php?page=caseslist");
        exit();
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
