<?php
require_once('db/connection.php');

$ramCard = []; // Initialize the $ramCard array

if (isset($_GET['id'])) {
    $ramCardId = $_GET['id'];

    // Query to fetch RAM Card details by ID
    $query = "SELECT * FROM ram WHERE R_ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $ramCardId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $ramCard = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle the case where the RAM Card with the specified ID was not found
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit RAM Card</title>
</head>
<body>
<h1>Edit RAM Card</h1>
<div class="form-container">
    <form action="php/RAMedit.php" method="POST" enctype="multipart/form-data">
        <label for="R_name">Name:</label>
        <input type="text" id="R_name" name="R_name" required value="<?php echo htmlspecialchars($ramCard['R_name']); ?>"><br><br>

        <label for="R_price">Price:</label>
        <input type="number" id="R_price" name="R_price" step="0.01" required value="<?php echo htmlspecialchars($ramCard['R_price']); ?>"><br><br>

        <label for="R_Manufacturer">Manufacturer:</label>
        <input type="text" id="R_Manufacturer" name="R_Manufacturer" value="<?php echo htmlspecialchars($ramCard['R_Manufacturer']); ?>"><br><br>

        <label for="R_PartNumber">Part Number:</label>
        <input type="text" id="R_PartNumber" name="R_PartNumber" value="<?php echo htmlspecialchars($ramCard['R_PartNumber']); ?>"><br><br>

        <label for="R_Speed">Speed:</label>
        <input type="text" id="R_Speed" name="R_Speed" value="<?php echo htmlspecialchars($ramCard['R_Speed']); ?>"><br><br>

        <label for="R_FormFactor">Form Factor:</label>
        <input type="text" id="R_FormFactor" name="R_FormFactor" value="<?php echo htmlspecialchars($ramCard['R_FormFactor']); ?>"><br><br>

        <label for="R_Modules">Modules:</label>
        <input type="text" id="R_Modules" name="R_Modules" value="<?php echo htmlspecialchars($ramCard['R_Modules']); ?>"><br><br>

        <label for="R_PricePerGB">Price Per GB:</label>
        <input type="number" id="R_PricePerGB" name="R_PricePerGB" step="0.001" value="<?php echo htmlspecialchars($ramCard['R_PricePerGB']); ?>"><br><br>

        <label for="R_Color">Color:</label>
        <input type="text" id="R_Color" name="R_Color" value="<?php echo htmlspecialchars($ramCard['R_Color']); ?>"><br><br>

        <label for="R_FirstWordLatency">First Word Latency:</label>
        <input type="number" id="R_FirstWordLatency" name="R_FirstWordLatency" step="0.001" value="<?php echo htmlspecialchars($ramCard['R_FirstWordLatency']); ?>"><br><br>

        <label for="R_CASLatency">CAS Latency:</label>
        <input type="number" id="R_CASLatency" name="R_CASLatency" value="<?php echo htmlspecialchars($ramCard['R_CASLatency']); ?>"><br><br>

        <label for="R_Voltage">Voltage:</label>
        <input type="number" id="R_Voltage" name="R_Voltage" step="0.01" value="<?php echo htmlspecialchars($ramCard['R_Voltage']); ?>"><br><br>

        <label for="R_Timing">Timing:</label>
        <input type="text" id="R_Timing" name="R_Timing" value="<?php echo htmlspecialchars($ramCard['R_Timing']); ?>"><br><br>

        <label for="R_ECCRegistered">ECC Registered:</label>
        <input type="text" id="R_ECCRegistered" name="R_ECCRegistered" value="<?php echo htmlspecialchars($ramCard['R_ECCRegistered']); ?>"><br><br>

        <label for="R_HeatSpreader">Heat Spreader:</label>
        <input type="text" id="R_HeatSpreader" name="R_HeatSpreader" value="<?php echo htmlspecialchars($ramCard['R_HeatSpreader']); ?>"><br><br>

        <label class="form-label">Active:</label>
        <div class="radio-group">
            <label for="R_active_yes" class="radio-label">
                <input type="radio" id="R_active_yes" class="radio-input" name="R_active" value="Yes" <?php if($ramCard['R_active'] == 'Yes') echo 'checked'; ?>>
                Yes
            </label>

            <label for="R_active_no" class="radio-label">
                <input type="radio" id="R_active_no" class="radio-input" name="R_active" value="No" <?php if($ramCard['R_active'] == 'No') echo 'checked'; ?>>
                No
            </label>
        </div>

        <label for="R_img">Image:</label>
        <input type="text" id="R_img" name="R_img" value="<?php echo htmlspecialchars($ramCard['R_img']); ?>"><br><br>

        <input type="hidden" name="R_ID" value="<?php echo $ramCard['R_ID']; ?>">
        <input type="submit" value="Update RAM Card">
    </form>
</div>
</body>
</html>