<?php
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
require_once('db/connection.php');

$cpuCooler = []; // Initialize the $cpuCooler array

if (isset($_GET['id'])) {
    $cpuCoolerId = $_GET['id'];

    // Query to fetch CPU Cooler details by ID
    $query = "SELECT * FROM cpu_cooler WHERE CC_ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $cpuCoolerId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $cpuCooler = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle the case where the CPU Cooler with the specified ID was not found
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit CPU Cooler</title>
</head>
<body>
<h1>Edit CPU Cooler</h1>
<div class="form-container">
    <form action="php/CCedit.php" method="POST" enctype="multipart/form-data">
        <label for="CC_name">Name:</label>
        <input type="text" id="CC_name" name="CC_name" required value="<?php echo htmlspecialchars($cpuCooler['CC_name']); ?>"><br><br>

        <label for="CC_price">Price:</label>
        <input type="number" id="CC_price" name="CC_price" step="0.01" required value="<?php echo htmlspecialchars($cpuCooler['CC_price']); ?>"><br><br>

        <label for="CC_Manufacturer">Manufacturer:</label>
        <input type="text" id="CC_Manufacturer" name="CC_Manufacturer" value="<?php echo htmlspecialchars($cpuCooler['CC_Manufacturer']); ?>"><br><br>

        <label for="CC_Model">Model:</label>
        <input type="text" id="CC_Model" name="CC_Model" value="<?php echo htmlspecialchars($cpuCooler['CC_Model']); ?>"><br><br>

        <label for="CC_FanRPM">Fan RPM:</label>
        <input type="text" id="CC_FanRPM" name="CC_FanRPM" value="<?php echo htmlspecialchars($cpuCooler['CC_FanRPM']); ?>"><br><br>

        <label for="CC_NoiseLevel">Noise Level:</label>
        <input type="text" id="CC_NoiseLevel" name="CC_NoiseLevel" value="<?php echo htmlspecialchars($cpuCooler['CC_NoiseLevel']); ?>"><br><br>

        <label for="CC_Color">Color:</label>
        <input type="text" id="CC_Color" name="CC_Color" value="<?php echo htmlspecialchars($cpuCooler['CC_Color']); ?>"><br><br>

        <label for="CC_Height">Height:</label>
        <input type="number" id="CC_Height" name="CC_Height" required value="<?php echo htmlspecialchars($cpuCooler['CC_Height']); ?>"><br><br>

        <label for="CC_CPUSocket">CPU Socket:</label>
        <input type="text" id="CC_CPUSocket" name="CC_CPUSocket" value="<?php echo htmlspecialchars($cpuCooler['CC_CPUSocket']); ?>"><br><br>

        <label for="CC_WaterCooled">Water Cooled:</label>
        <input type="text" id="CC_WaterCooled" name="CC_WaterCooled" value="<?php echo htmlspecialchars($cpuCooler['CC_WaterCooled']); ?>"><br><br>

        <label for="CC_Fanless">Fanless:</label>
        <input type="text" id="CC_Fanless" name="CC_Fanless" value="<?php echo htmlspecialchars($cpuCooler['CC_Fanless']); ?>"><br><br>

        <label class="form-label">Active:</label>
        <div class="radio-group">
            <label for="CC_active_yes" class="radio-label">
                <input type="radio" id="CC_active_yes" class="radio-input" name="CC_active" value="Yes" <?php if($cpuCooler['CC_active'] == 'Yes') echo 'checked'; ?>>
                Yes
            </label>

            <label for="CC_active_no" class="radio-label">
                <input type="radio" id="CC_active_no" class="radio-input" name="CC_active" value="No" <?php if($cpuCooler['CC_active'] == 'No') echo 'checked'; ?>>
                No
            </label>
        </div>

        <label for="CC_img">Image:</label>
        <input type="text" id="CC_img" name="CC_img" value="<?php echo htmlspecialchars($cpuCooler['CC_img']); ?>"><br><br>

        <input type="hidden" name="CC_ID" value="<?php echo $cpuCooler['CC_ID']; ?>">
        <input type="submit" value="Update CPU Cooler">
    </form>
</div>
</body>
</html>
