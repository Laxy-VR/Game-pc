<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../db/connection.php';

        // Retrieve data from the form
        $G_name = $_POST['G_name'];
        $G_price = $_POST['G_price'];
        $G_Manufacturer = $_POST['G_Manufacturer'];
        $G_PartNumber = $_POST['G_PartNumber'];
        $G_Chipset = $_POST['G_Chipset'];
        $G_Memory = $_POST['G_Memory'];
        $G_MemoryType = $_POST['G_MemoryType'];
        $G_CoreClock = $_POST['G_CoreClock'];
        $G_BoostClock = $_POST['G_BoostClock'];
        $G_Interface = $_POST['G_Interface'];
        $G_Color = $_POST['G_Color'];
        $G_FrameSync = $_POST['G_FrameSync'];
        $G_Length = $_POST['G_Length'];
        $G_TDP = $_POST['G_TDP'];
        $G_CaseExpansionSlotWidth = $_POST['G_CaseExpansionSlotWidth'];
        $G_TotalSlotWidth = $_POST['G_TotalSlotWidth'];
        $G_Cooling = $_POST['G_Cooling'];
        $G_ExternalPower = $_POST['G_ExternalPower'];
        $G_HDMIOutputs = $_POST['G_HDMIOutputs'];
        $G_DisplayPortOutputs = $_POST['G_DisplayPortOutputs'];
        $G_img = $_POST['G_img'];
        $G_active = $_POST['G_active'];

        // Insert data into the database
        $query = "INSERT INTO gpu (G_name, G_price, G_Manufacturer, G_PartNumber, G_Chipset, G_Memory, G_MemoryType, G_CoreClock, G_BoostClock, G_Interface, G_Color, G_FrameSync, G_Length, G_TDP, G_CaseExpansionSlotWidth, G_TotalSlotWidth, G_Cooling, G_ExternalPower, G_HDMIOutputs, G_DisplayPortOutputs, G_img, G_active) VALUES (:G_name, :G_price, :G_Manufacturer, :G_PartNumber, :G_Chipset, :G_Memory, :G_MemoryType, :G_CoreClock, :G_BoostClock, :G_Interface, :G_Color, :G_FrameSync, :G_Length, :G_TDP, :G_CaseExpansionSlotWidth, :G_TotalSlotWidth, :G_Cooling, :G_ExternalPower, :G_HDMIOutputs, :G_DisplayPortOutputs, :G_img, :G_active)";

        $statement = $conn->prepare($query);
        $statement->bindParam(':G_name', $G_name);
        $statement->bindParam(':G_price', $G_price);
        $statement->bindParam(':G_Manufacturer', $G_Manufacturer);
        $statement->bindParam(':G_PartNumber', $G_PartNumber);
        $statement->bindParam(':G_Chipset', $G_Chipset);
        $statement->bindParam(':G_Memory', $G_Memory);
        $statement->bindParam(':G_MemoryType', $G_MemoryType);
        $statement->bindParam(':G_CoreClock', $G_CoreClock);
        $statement->bindParam(':G_BoostClock', $G_BoostClock);
        $statement->bindParam(':G_Interface', $G_Interface);
        $statement->bindParam(':G_Color', $G_Color);
        $statement->bindParam(':G_FrameSync', $G_FrameSync);
        $statement->bindParam(':G_Length', $G_Length);
        $statement->bindParam(':G_TDP', $G_TDP);
        $statement->bindParam(':G_CaseExpansionSlotWidth', $G_CaseExpansionSlotWidth);
        $statement->bindParam(':G_TotalSlotWidth', $G_TotalSlotWidth);
        $statement->bindParam(':G_Cooling', $G_Cooling);
        $statement->bindParam(':G_ExternalPower', $G_ExternalPower);
        $statement->bindParam(':G_HDMIOutputs', $G_HDMIOutputs);
        $statement->bindParam(':G_DisplayPortOutputs', $G_DisplayPortOutputs);
        $statement->bindParam(':G_img', $G_img);
        $statement->bindParam(':G_active', $G_active);

        $statement->execute();

        // Redirect to a success page or display a success message
        header("Location: ../index.php?page=GPUlist");
        exit();
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
