<!DOCTYPE html>
<html>
<head>
    <title>Add RAM Card</title>
</head>
<body>
<h1>Add RAM Card</h1>
<div class="form-container">
    <form action="php/addram.php" method="POST" enctype="multipart/form-data">
        <label for="R_name">Name:</label>
        <input type="text" id="R_name" name="R_name" required><br><br>

        <label for="R_price">Price:</label>
        <input type="number" id="R_price" name="R_price" step="0.01" required><br><br>

        <label for="R_Manufacturer">Manufacturer:</label>
        <input type="text" id="R_Manufacturer" name="R_Manufacturer"><br><br>

        <label for="R_PartNumber">Part Number:</label>
        <input type="text" id="R_PartNumber" name="R_PartNumber"><br><br>

        <label for="R_Speed">Speed:</label>
        <input type="text" id="R_Speed" name="R_Speed"><br><br>

        <label for="R_FormFactor">Form Factor:</label>
        <input type="text" id="R_FormFactor" name="R_FormFactor"><br><br>

        <label for="R_Modules">Modules:</label>
        <input type="text" id="R_Modules" name="R_Modules"><br><br>

        <label for="R_PricePerGB">Price Per GB:</label>
        <input type="number" id="R_PricePerGB" name="R_PricePerGB" step="0.001"><br><br>

        <label for="R_Color">Color:</label>
        <input type="text" id="R_Color" name="R_Color"><br><br>

        <label for="R_FirstWordLatency">First Word Latency:</label>
        <input type="number" id="R_FirstWordLatency" name="R_FirstWordLatency" step="0.001"><br><br>

        <label for="R_CASLatency">CAS Latency:</label>
        <input type="number" id="R_CASLatency" name="R_CASLatency"><br><br>

        <label for="R_Voltage">Voltage:</label>
        <input type="number" id="R_Voltage" name="R_Voltage" step="0.01"><br><br>

        <label for="R_Timing">Timing:</label>
        <input type="text" id="R_Timing" name="R_Timing"><br><br>

        <label for="R_ECCRegistered">ECC Registered:</label>
        <input type="text" id="R_ECCRegistered" name="R_ECCRegistered"><br><br>

        <label for="R_HeatSpreader">Heat Spreader:</label>
        <input type="text" id="R_HeatSpreader" name="R_HeatSpreader"><br><br>

        <label class="form-label">Active:</label>
        <div class="radio-group">
            <label for="R_active_yes" class="radio-label">
                <input type="radio" id="R_active_yes" class="radio-input" name="R_active" value="Yes" checked>
                Yes
            </label>

            <label for="R_active_no" class="radio-label">
                <input type="radio" id="R_active_no" class="radio-input" name="R_active" value="No">
                No
            </label>
        </div>

        <label for="R_img">Image:</label>
        <input type="text" id="R_img" name="R_img"><br><br>

        <input type="submit" value="Add RAM Card">
    </form>
</div>
</body>
</html>
