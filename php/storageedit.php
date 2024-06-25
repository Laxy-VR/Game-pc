<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../db/connection.php';

        // Retrieve data from the form
        $S_ID = $_POST['S_ID']; // Get Storage ID
        $S_name = $_POST['S_name'];
        $S_price = $_POST['S_price'];
        $S_Manufacturer = $_POST['S_Manufacturer'];
        $S_Capacity = $_POST['S_Capacity'];
        $S_Type = $_POST['S_Type'];
        $S_Cache = $_POST['S_Cache'];
        $S_PricePerGB = $_POST['S_PricePerGB'];
        $S_FormFactor = $_POST['S_FormFactor'];
        $S_Interface = $_POST['S_Interface'];
        $S_NVME = $_POST['S_NVME'];
        $S_img = $_POST['S_img'];
        $S_active = $_POST['S_active'];

        // Update data in the database
        $query = "UPDATE storage SET S_name = :S_name, S_price = :S_price, S_Manufacturer = :S_Manufacturer, S_Capacity = :S_Capacity, S_Type = :S_Type, S_Cache = :S_Cache, S_PricePerGB = :S_PricePerGB, S_FormFactor = :S_FormFactor, S_Interface = :S_Interface, S_NVME = :S_NVME, S_img = :S_img, S_active = :S_active WHERE S_ID = :S_ID";

        $statement = $conn->prepare($query);
        $statement->bindParam(':S_name', $S_name);
        $statement->bindParam(':S_price', $S_price);
        $statement->bindParam(':S_Manufacturer', $S_Manufacturer);
        $statement->bindParam(':S_Capacity', $S_Capacity);
        $statement->bindParam(':S_Type', $S_Type);
        $statement->bindParam(':S_Cache', $S_Cache);
        $statement->bindParam(':S_PricePerGB', $S_PricePerGB);
        $statement->bindParam(':S_FormFactor', $S_FormFactor);
        $statement->bindParam(':S_Interface', $S_Interface);
        $statement->bindParam(':S_NVME', $S_NVME);
        $statement->bindParam(':S_img', $S_img);
        $statement->bindParam(':S_active', $S_active);
        $statement->bindParam(':S_ID', $S_ID); // Bind Storage ID

        $statement->execute();

        // Redirect to a success page or display a success message
        header("Location: ../index.php?page=StorageList");
        exit();
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
