<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../db/connection.php';

        // Retrieve data from the form
        $R_ID = $_POST['R_ID']; // Get RAM ID
        $R_name = $_POST['R_name'];
        $R_price = $_POST['R_price'];
        $R_Manufacturer = $_POST['R_Manufacturer'];
        $R_PartNumber = $_POST['R_PartNumber'];
        $R_Speed = $_POST['R_Speed'];
        $R_FormFactor = $_POST['R_FormFactor'];
        $R_Modules = $_POST['R_Modules'];
        $R_PricePerGB = $_POST['R_PricePerGB'];
        $R_Color = $_POST['R_Color'];
        $R_FirstWordLatency = $_POST['R_FirstWordLatency'];
        $R_CASLatency = $_POST['R_CASLatency'];
        $R_Voltage = $_POST['R_Voltage'];
        $R_Timing = $_POST['R_Timing'];
        $R_ECCRegistered = $_POST['R_ECCRegistered'];
        $R_HeatSpreader = $_POST['R_HeatSpreader'];
        $R_img = $_POST['R_img'];
        $R_active = $_POST['R_active'];

        // Update data in the database
        $query = "UPDATE ram SET R_name = :R_name, R_price = :R_price, R_Manufacturer = :R_Manufacturer, R_PartNumber = :R_PartNumber, R_Speed = :R_Speed, R_FormFactor = :R_FormFactor, R_Modules = :R_Modules, R_PricePerGB = :R_PricePerGB, R_Color = :R_Color, R_FirstWordLatency = :R_FirstWordLatency, R_CASLatency = :R_CASLatency, R_Voltage = :R_Voltage, R_Timing = :R_Timing, R_ECCRegistered = :R_ECCRegistered, R_HeatSpreader = :R_HeatSpreader, R_img = :R_img, R_active = :R_active WHERE R_ID = :R_ID";

        $statement = $conn->prepare($query);
        $statement->bindParam(':R_name', $R_name);
        $statement->bindParam(':R_price', $R_price);
        $statement->bindParam(':R_Manufacturer', $R_Manufacturer);
        $statement->bindParam(':R_PartNumber', $R_PartNumber);
        $statement->bindParam(':R_Speed', $R_Speed);
        $statement->bindParam(':R_FormFactor', $R_FormFactor);
        $statement->bindParam(':R_Modules', $R_Modules);
        $statement->bindParam(':R_PricePerGB', $R_PricePerGB);
        $statement->bindParam(':R_Color', $R_Color);
        $statement->bindParam(':R_FirstWordLatency', $R_FirstWordLatency);
        $statement->bindParam(':R_CASLatency', $R_CASLatency);
        $statement->bindParam(':R_Voltage', $R_Voltage);
        $statement->bindParam(':R_Timing', $R_Timing);
        $statement->bindParam(':R_ECCRegistered', $R_ECCRegistered);
        $statement->bindParam(':R_HeatSpreader', $R_HeatSpreader);
        $statement->bindParam(':R_img', $R_img);
        $statement->bindParam(':R_active', $R_active);
        $statement->bindParam(':R_ID', $R_ID); // Bind RAM ID

        $statement->execute();

        // Redirect to a success page or display a success message
        header("Location: ../index.php?page=RAM_list");
        exit();
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
