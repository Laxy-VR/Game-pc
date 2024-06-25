<h1>Add New Storage</h1>
<div class="form-container">
    <form action="php/storage_add.php" method="POST" enctype="multipart/form-data">
        <label for="S_name">Name:</label>
        <input type="text" id="S_name" name="S_name" required><br><br>

        <label for="S_price">Price:</label>
        <input type="number" id="S_price" name="S_price" step="0.01" required><br><br>

        <label for="S_Manufacturer">Manufacturer:</label>
        <input type="text" id="S_Manufacturer" name="S_Manufacturer"><br><br>

        <label for="S_PartNumber">Part Number:</label>
        <input type="text" id="S_PartNumber" name="S_PartNumber"><br><br>

        <label for="S_Capacity">Capacity:</label>
        <input type="text" id="S_Capacity" name="S_Capacity"><br><br>

        <label for="S_PricePerGB">Price Per GB:</label>
        <input type="number" id="S_PricePerGB" name="S_PricePerGB" step="0.001"><br><br>

        <label for="S_Type">Type:</label>
        <input type="text" id="S_Type" name="S_Type"><br><br>

        <label for="S_Cache">Cache:</label>
        <input type="text" id="S_Cache" name="S_Cache"><br><br>

        <label for="S_FormFactor">Form Factor:</label>
        <input type="text" id="S_FormFactor" name="S_FormFactor"><br><br>

        <label for="S_Interface">Interface:</label>
        <input type="text" id="S_Interface" name="S_Interface"><br><br>

        <label for="S_NVME">NVME:</label>
        <input type="text" id="S_NVME" name="S_NVME"><br><br>

        <label for="S_img">Image URL:</label>
        <input type="text" id="S_img" name="S_img"><br><br>

        <label for="S_active">Active:</label>
        <input type="text" id="S_active" name="S_active" required><br><br>

        <input type="submit" value="Add Storage">
    </form>
</div>
