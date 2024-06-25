<h1>Add New GPU</h1>
<div class="form-container">
    <form action="php/GPU_add.php" method="POST" enctype="multipart/form-data">
        <label for="G_name">Name:</label>
        <input type="text" id="G_name" name="G_name" required><br><br>

        <label for="G_price">Price:</label>
        <input type="number" id="G_price" name="G_price" step="0.01" required><br><br>

        <label for="G_Manufacturer">Manufacturer:</label>
        <input type="text" id="G_Manufacturer" name="G_Manufacturer"><br><br>

        <label for="G_PartNumber">Part Number:</label>
        <input type="text" id="G_PartNumber" name="G_PartNumber"><br><br>

        <label for="G_Chipset">Chipset:</label>
        <input type="text" id="G_Chipset" name="G_Chipset"><br><br>

        <label for="G_Memory">Memory (GB):</label>
        <input type="number" id="G_Memory" name="G_Memory" required><br><br>

        <label for="G_MemoryType">Memory Type:</label>
        <input type="text" id="G_MemoryType" name="G_MemoryType"><br><br>

        <label for="G_CoreClock">Core Clock:</label>
        <input type="text" id="G_CoreClock" name="G_CoreClock"><br><br>

        <label for="G_BoostClock">Boost Clock:</label>
        <input type="text" id="G_BoostClock" name="G_BoostClock"><br><br>

        <label for="G_Interface">Interface:</label>
        <input type="text" id="G_Interface" name="G_Interface"><br><br>

        <label for="G_Color">Color:</label>
        <input type="text" id="G_Color" name="G_Color"><br><br>

        <label for="G_FrameSync">Frame Sync:</label>
        <input type="text" id="G_FrameSync" name="G_FrameSync"><br><br>

        <label for="G_Length">Length (mm):</label>
        <input type="number" id="G_Length" name="G_Length" required><br><br>

        <label for="G_TDP">TDP (W):</label>
        <input type="number" id="G_TDP" name="G_TDP" required><br><br>

        <label for="G_CaseExpansionSlotWidth">Case Expansion Slot Width (mm):</label>
        <input type="number" id="G_CaseExpansionSlotWidth" name="G_CaseExpansionSlotWidth" required><br><br>

        <label for="G_TotalSlotWidth">Total Slot Width (mm):</label>
        <input type="number" id="G_TotalSlotWidth" name="G_TotalSlotWidth" required><br><br>

        <label for="G_Cooling">Cooling:</label>
        <input type="text" id="G_Cooling" name="G_Cooling"><br><br>

        <label for="G_ExternalPower">External Power:</label>
        <input type="text" id="G_ExternalPower" name="G_ExternalPower"><br><br>

        <label for="G_HDMIOutputs">HDMI Outputs:</label>
        <input type="number" id="G_HDMIOutputs" name="G_HDMIOutputs" required><br><br>

        <label for="G_DisplayPortOutputs">DisplayPort Outputs:</label>
        <input type="number" id="G_DisplayPortOutputs" name="G_DisplayPortOutputs" required><br><br>

        <label for="G_img">Image URL:</label>
        <input type="text" id="G_img" name="G_img"><br><br>

        <label for="G_active">Active:</label>
        <input type="text" id="G_active" name="G_active" required><br><br>

        <input type="submit" value="Add GPU">
    </form>
</div>
