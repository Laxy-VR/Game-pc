<h1>Add New PSU</h1>
<div class="form-container">
    <form action="php/addPSU.php" method="POST" enctype="multipart/form-data">
        <label for="P_name">Name:</label>
        <input type="text" id="P_name" name="P_name" required><br><br>

        <label for="P_price">Price:</label>
        <input type="number" id="P_price" name="P_price" step="0.01" required><br><br>

        <label for="P_Manufacturer">Manufacturer:</label>
        <input type="text" id="P_Manufacturer" name="P_Manufacturer" required><br><br>

        <label for="P_PartNumber">Part Number:</label>
        <input type="text" id="P_PartNumber" name="P_PartNumber" required><br><br>

        <label for="P_Type">Type:</label>
        <input type="text" id="P_Type" name="P_Type"><br><br>

        <label for="P_EfficiencyRating">Efficiency Rating:</label>
        <input type="text" id="P_EfficiencyRating" name="P_EfficiencyRating"><br><br>

        <label for="P_Wattage">Wattage:</label>
        <input type="number" id="P_Wattage" name="P_Wattage"><br><br>

        <label for="P_Length">Length:</label>
        <input type="text" id="P_Length" name="P_Length"><br><br>

        <label for="P_Modular">Modular:</label>
        <input type="text" id="P_Modular" name="P_Modular"><br><br>

        <label for="P_Fanless">Fanless:</label>
        <input type="text" id="P_Fanless" name="P_Fanless"><br><br>

        <label for="P_img">Image:</label>
        <input type="text" id="P_img" name="P_img"><br><br>

<!--        <label for="P_active">Active:</label>-->
<!--        <fieldset id="P_active">-->
<!--            <input type="radio" id="active_yes" name="P_active" value="Yes" required>-->
<!--            <label for="active_yes">Yes</label>-->
<!---->
<!--            <input type="radio" id="active_no" name="P_active" value="No">-->
<!--            <label for="active_no">No</label>-->
<!--        </fieldset><br><br>-->

        <input type="submit" value="Add Motherboard">
    </form>
</div>