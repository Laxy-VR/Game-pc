<?php
require_once('db/connection.php');

$storage = []; // Initialize the $storage array

if (isset($_GET['id'])) {
    $storageId = $_GET['id'];

    // Query to fetch storage details by ID
    $query = "SELECT * FROM storage WHERE S_ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $storageId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $storage = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle the case where the storage with the specified ID was not found
    }
}
?>

<h1>Edit Storage</h1>
<div class="form-container">
    <form action="php/storageedit.php" method="POST" enctype="multipart/form-data">
        <label for="S_name">Name:</label>
        <input type="text" id="S_name" name="S_name" required value="<?php echo htmlspecialchars($storage['S_name']); ?>"><br><br>

        <label for="S_price">Price:</label>
        <input type="number" id="S_price" name="S_price" step="0.01" required value="<?php echo htmlspecialchars($storage['S_price']); ?>"><br><br>

        <label for="S_Manufacturer">Manufacturer:</label>
        <input type="text" id="S_Manufacturer" name="S_Manufacturer" value="<?php echo htmlspecialchars($storage['S_Manufacturer']); ?>"><br><br>

        <label for="S_Capacity">Capacity (GB/TB):</label>
        <input type="text" id="S_Capacity" name="S_Capacity" value="<?php echo htmlspecialchars($storage['S_Capacity']); ?>"><br><br>

        <label for="S_Type">Type:</label>
        <input type="text" id="S_Type" name="S_Type" value="<?php echo htmlspecialchars($storage['S_Type']); ?>"><br><br>

        <label for="S_Cache">Cache (MB/GB):</label>
        <input type="text" id="S_Cache" name="S_Cache" value="<?php echo htmlspecialchars($storage['S_Cache']); ?>"><br><br>

        <label for="S_PricePerGB">Price Per GB:</label>
        <input type="number" id="S_PricePerGB" name="S_PricePerGB" step="0.001" required value="<?php echo htmlspecialchars($storage['S_PricePerGB']); ?>"><br><br>

        <label for="S_FormFactor">Form Factor:</label>
        <input type="text" id="S_FormFactor" name="S_FormFactor" value="<?php echo htmlspecialchars($storage['S_FormFactor']); ?>"><br><br>

        <label for="S_Interface">Interface:</label>
        <input type="text" id="S_Interface" name="S_Interface" value="<?php echo htmlspecialchars($storage['S_Interface']); ?>"><br><br>

        <label for="S_NVME">NVME:</label>
        <input type="text" id="S_NVME" name="S_NVME" value="<?php echo htmlspecialchars($storage['S_NVME']); ?>"><br><br>

        <label for="S_img">Image:</label>
        <input type="text" id="S_img" name="S_img" value="<?php echo htmlspecialchars($storage['S_img']); ?>"><br><br>

        <label for="S_active">Active:</label>
        <input type="text" id="S_active" name="S_active" required value="<?php echo htmlspecialchars($storage['S_active']); ?>"><br><br>

        <input type="hidden" name="S_ID" value="<?php echo $storage['S_ID']; ?>">
        <input type="submit" value="Update Storage">
    </form>
</div>
