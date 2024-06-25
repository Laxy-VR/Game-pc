<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../db/connection.php';

        // Retrieve data from the form
        $CC_ID = $_POST['CC_ID']; // Get CPU Cooler ID
        $CC_name = $_POST['CC_name'];
        $CC_price = $_POST['CC_price'];
        $CC_Manufacturer = $_POST['CC_Manufacturer'];
        $CC_Model = $_POST['CC_Model'];
        $CC_PartNumber = $_POST['CC_PartNumber'];
        $CC_FanRPM = $_POST['CC_FanRPM'];
        $CC_NoiseLevel = $_POST['CC_NoiseLevel'];
        $CC_Color = $_POST['CC_Color'];
        $CC_Height = $_POST['CC_Height'];
        $CC_CPUSocket = $_POST['CC_CPUSocket'];
        $CC_WaterCooled = $_POST['CC_WaterCooled'];
        $CC_Fanless = $_POST['CC_Fanless'];
        $CC_img = $_POST['CC_img'];
        $CC_active = $_POST['CC_active'];

        // Update data in the database
        $query = "UPDATE cpu_cooler SET 
            CC_name = :CC_name, 
            CC_price = :CC_price, 
            CC_Manufacturer = :CC_Manufacturer, 
            CC_Model = :CC_Model, 
            CC_PartNumber = :CC_PartNumber, 
            CC_FanRPM = :CC_FanRPM, 
            CC_NoiseLevel = :CC_NoiseLevel, 
            CC_Color = :CC_Color, 
            CC_Height = :CC_Height, 
            CC_CPUSocket = :CC_CPUSocket, 
            CC_WaterCooled = :CC_WaterCooled, 
            CC_Fanless = :CC_Fanless, 
            CC_img = :CC_img, 
            CC_active = :CC_active 
            WHERE CC_ID = :CC_ID";

        $statement = $conn->prepare($query);
        $statement->bindParam(':CC_name', $CC_name);
        $statement->bindParam(':CC_price', $CC_price);
        $statement->bindParam(':CC_Manufacturer', $CC_Manufacturer);
        $statement->bindParam(':CC_Model', $CC_Model);
        $statement->bindParam(':CC_PartNumber', $CC_PartNumber);
        $statement->bindParam(':CC_FanRPM', $CC_FanRPM);
        $statement->bindParam(':CC_NoiseLevel', $CC_NoiseLevel);
        $statement->bindParam(':CC_Color', $CC_Color);
        $statement->bindParam(':CC_Height', $CC_Height);
        $statement->bindParam(':CC_CPUSocket', $CC_CPUSocket);
        $statement->bindParam(':CC_WaterCooled', $CC_WaterCooled);
        $statement->bindParam(':CC_Fanless', $CC_Fanless);
        $statement->bindParam(':CC_img', $CC_img);
        $statement->bindParam(':CC_active', $CC_active);
        $statement->bindParam(':CC_ID', $CC_ID); // Bind CPU Cooler ID

        $statement->execute();

        // Redirect to a success page or display a success message
        header("Location: ../index.php?page=CClist");
        exit();
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
