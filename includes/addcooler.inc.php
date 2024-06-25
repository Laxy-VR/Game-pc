

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Cooler</title>
</head>
<body>
<h1>Add New Cooler</h1>
<div class="form-container">
    <form action="php/add_cooler.php" method="POST" enctype="multipart/form-data">
        <label for="CC_name">Name:</label>
        <input type="text" id="CC_name" name="CC_name" required><br><br>

        <label for="CC_price">Price:</label>
        <input type="number" id="CC_price" name="CC_price" step="0.01" required><br><br>

        <label for="CC_Manufacturer">Manufacturer:</label>
        <input type="text" id="CC_Manufacturer" name="CC_Manufacturer" maxlength="255" required><br><br>

        <label for="CC_Model">Model:</label>
        <input type="text" id="CC_Model" name="CC_Model" maxlength="255" required><br><br>

        <label for="CC_PartNumber">Part Number:</label>
        <input type="text" id="CC_PartNumber" name="CC_PartNumber" maxlength="255" required><br><br>

        <label for="CC_FanRPM">Fan RPM:</label>
        <input type="text" id="CC_FanRPM" name="CC_FanRPM" maxlength="255" required><br><br>

        <label for="CC_NoiseLevel">Noise Level:</label>
        <input type="text" id="CC_NoiseLevel" name="CC_NoiseLevel" maxlength="255" required><br><br>

        <label for="CC_Color">Color:</label>
        <input type="text" id="CC_Color" name="CC_Color" maxlength="255" required><br><br>

        <label for="CC_Height">Height:</label>
        <input type="number" id="CC_Height" name="CC_Height" required><br><br>

        <label for="CC_CPUSocket">CPU Socket:</label>
        <input type="text" id="CC_CPUSocket" name="CC_CPUSocket" maxlength="255" required><br><br>

        <label for="CC_WaterCooled">Water Cooled:</label>
        <select id="CC_WaterCooled" name="CC_WaterCooled" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select><br><br>

        <label for="CC_Fanless">Fanless:</label>
        <select id="CC_Fanless" name="CC_Fanless" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select><br><br>

        <label for="CC_img">Image link:</label>
        <input type="url" id="CC_img" name="CC_img" maxlength="255" pattern="https?://.+"><br><br>

        <input type="submit" value="Add Cooler">
    </form>
</div>
</body>
</html>
