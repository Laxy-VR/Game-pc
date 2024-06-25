
<h1>Add New Case</h1>
<div class="form-container">
<form action="php/addcase.php" method="POST" enctype="multipart/form-data">
    <label for="csName">Name:</label>
    <input type="text" id="csName" name="csName" required><br><br>

    <label for="csPrice">Price:</label>
    <input type="number" id="csPrice" name="csPrice" step="0.01" required><br><br>

    <label for="csManufacturer">Manufacturer:</label>
    <input type="text" id="csManufacturer" name="csManufacturer" maxlength="255 " required><br><br>

    <label for="csPartNumber">Part Number:</label>
    <input type="text" id="csPartNumber" name="csPartNumber" maxlength="255" required><br><br>

    <label for="csType">Type:</label>
    <input type="text" id="csType" name="csType" maxlength="255" required><br><br>

    <label for="csColor">Color:</label>
    <input type="text" id="csColor" name="csColor" maxlength="255" required><br><br>

    <label for="csPowerSupply">Power Supply:</label>
    <input type="text" id="csPowerSupply" name="csPowerSupply" maxlength="255" required><br><br>

    <label for="csSidePanel">Side Panel:</label>
    <input type="text" id="csSidePanel" name="csSidePanel" maxlength="255" required><br><br>

    <label for="csPowerSupplyShroud">Power Supply Shroud:</label>
    <input type="text" id="csPowerSupplyShroud" name="csPowerSupplyShroud" maxlength="255" required><br><br>

    <label for="csFrontPanelUSB">Front Panel USB:</label>
    <input type="text" id="csFrontPanelUSB" name="csFrontPanelUSB" maxlength="255" required><br><br>

    <label for="csMotherboardFormFactor">Motherboard Form Factor:</label>
    <input type="text" id="csMotherboardFormFactor" name="csMotherboardFormFactor" maxlength="255" required><br><br>

    <label for="csMaximumVideoCardLength">Maximum Video Card Length:</label>
    <input type="number" id="csMaximumVideoCardLength" name="csMaximumVideoCardLength" maxlength="255" required><br><br>

    <label for="csDriveBays">Drive Bays:</label>
    <input type="number" id="csDriveBays" name="csDriveBays" maxlength="255" required><br><br>

    <label for="csExpansionSlots">Expansion Slots:</label>
    <input type="number" id="csExpansionSlots" name="csExpansionSlots" maxlength="255" required><br><br>

    <label for="csDimensions">Dimensions:</label>
    <input type="text" id="csDimensions" name="csDimensions" maxlength="255" required><br><br>

    <label for="csVolume">Volume:</label>
    <input type="number" id="csVolume" name="csVolume" maxlength="255" required><br><br>

    <label for="csImage">Image link:</label>
    <input type="url" id="csImage" name="csImage" maxlength="255" pattern="https?://.+"><br><br>


    <input type="submit" value="Add Case">
</form>
</div>
</body>
</html>
