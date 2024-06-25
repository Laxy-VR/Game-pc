<h1>Add New CPU Cooler</h1>
<div class="form-container">
    <form action="php/addCC.php" method="POST" enctype="multipart/form-data">
        <label for="ccName">Name:</label>
        <input type="text" id="ccName" name="ccName" required><br><br>

        <label for="ccPrice">Price:</label>
        <input type="number" id="ccPrice" name="ccPrice" step="0.01" required><br><br>

        <label for="ccManufacturer">Manufacturer:</label>
        <input type="text" id="ccManufacturer" name="ccManufacturer" maxlength="255" required><br><br>

        <label for="ccModel">Model:</label>
        <input type="text" id="ccModel" name="ccModel" maxlength="255" required><br><br>

        <label for="ccPartNumber">Part Number:</label>
        <input type="text" id="ccPartNumber" name="ccPartNumber" maxlength="255" required><br><br>

        <label for="ccFanRPM">Fan RPM:</label>
        <input type="text" id="ccFanRPM" name="ccFanRPM" maxlength="255" required><br><br>

        <label for="ccNoiseLevel">Noise Level:</label>
        <input type="text" id="ccNoiseLevel" name="ccNoiseLevel" maxlength="255" required><br><br>

        <label for="ccColor">Color:</label>
        <input type="text" id="ccColor" name="ccColor" maxlength="255" required><br><br>

        <label for="ccHeight">Height:</label>
        <input type="number" id="ccHeight" name="ccHeight" required><br><br>

        <label for="ccCPUSocket">CPU Socket:</label>
        <input type="text" id="ccCPUSocket" name="ccCPUSocket" maxlength="255" required><br><br>

        <label for="ccWaterCooled">Water Cooled:</label>
        <input type="text" id="ccWaterCooled" name="ccWaterCooled" maxlength="3" required><br><br>

        <label for="ccFanless">Fanless:</label>
        <input type="text" id="ccFanless" name="ccFanless" maxlength="3" required><br><br>

        <label for="ccImage">Image link:</label>
        <input type="url" id="ccImage" name="ccImage" maxlength="255" pattern="https?://.+"><br><br>

        <input type="submit" value="Add CPU Cooler">
    </form>
</div>
</body>
</html>
