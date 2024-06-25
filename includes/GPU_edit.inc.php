<?php
require_once('db/connection.php');

$gpu = []; // Initialize the $gpu array

if (isset($_GET['id'])) {
    $gpuId = $_GET['id'];

    // Query to fetch GPU details by ID
    $query = "SELECT * FROM gpu WHERE G_ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $gpuId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $gpu = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle the case where the GPU with the specified ID was not found
    }
}
?>

<h1>Edit GPU</h1>
<div class="form-container">
    <form action="php/GPUedit.php" method="POST" enctype="multipart/form-data">
        <label for="G_name">Name:</label>
        <input type="text" id="G_name" name="G_name" required value="<?php echo htmlspecialchars($gpu['G_name']); ?>"><br><br>

        <label for="G_price">Price:</label>
        <input type="number" id="G_price" name="G_price" step="0.01" required value="<?php echo htmlspecialchars($gpu['G_price']); ?>"><br><br>

        <label for="G_Manufacturer">Manufacturer:</label>
        <input type="text" id="G_Manufacturer" name="G_Manufacturer" value="<?php echo htmlspecialchars($gpu['G_Manufacturer']); ?>"><br><br>

        <label for="G_PartNumber">Part Number:</label>
        <input type="text" id="G_PartNumber" name="G_PartNumber" value="<?php echo htmlspecialchars($gpu['G_PartNumber']); ?>"><br><br>

        <label for="G_Chipset">Chipset:</label>
        <input type="text" id="G_Chipset" name="G_Chipset" value="<?php echo htmlspecialchars($gpu['G_Chipset']); ?>"><br><br>

        <label for="G_Memory">Memory:</label>
        <input type="number" id="G_Memory" name="G_Memory" required value="<?php echo htmlspecialchars($gpu['G_Memory']); ?>"><br><br>

        <label for="G_MemoryType">Memory Type:</label>
        <input type="text" id="G_MemoryType" name="G_MemoryType" value="<?php echo htmlspecialchars($gpu['G_MemoryType']); ?>"><br><br>

        <label for="G_CoreClock">Core Clock:</label>
        <input type="text" id="G_CoreClock" name="G_CoreClock" value="<?php echo htmlspecialchars($gpu['G_CoreClock']); ?>"><br><br>

        <label for="G_BoostClock">Boost Clock:</label>
        <input type="text" id="G_BoostClock" name="G_BoostClock" value="<?php echo htmlspecialchars($gpu['G_BoostClock']); ?>"><br><br>

        <label for="G_Interface">Interface:</label>
        <input type="text" id="G_Interface" name="G_Interface" value="<?php echo htmlspecialchars($gpu['G_Interface']); ?>"><br><br>

        <label for="G_Color">Color:</label>
        <input type="text" id="G_Color" name="G_Color" value="<?php echo htmlspecialchars($gpu['G_Color']); ?>"><br><br>

        <label for="G_FrameSync">Frame Sync:</label>
        <input type="text" id="G_FrameSync" name="G_FrameSync" value="<?php echo htmlspecialchars($gpu['G_FrameSync']); ?>"><br><br>

        <label for="G_Length">Length:</label>
        <input type="number" id="G_Length" name="G_Length" required value="<?php echo htmlspecialchars($gpu['G_Length']); ?>"><br><br>

        <label for="G_TDP">TDP:</label>
        <input type="number" id="G_TDP" name="G_TDP" required value="<?php echo htmlspecialchars($gpu['G_TDP']); ?>"><br><br>

        <label for="G_CaseExpansionSlotWidth">Case Expansion Slot Width:</label>
        <input type="number" id="G_CaseExpansionSlotWidth" name="G_CaseExpansionSlotWidth" required value="<?php echo htmlspecialchars($gpu['G_CaseExpansionSlotWidth']); ?>"><br><br>
        <label for="G_TotalSlotWidth">Total Slot Width:</label>
        <input type="number" id="G_TotalSlotWidth" name="G_TotalSlotWidth" required value="<?php echo htmlspecialchars($gpu['G_TotalSlotWidth']); ?>"><br><br>

        <label for="G_Cooling">Cooling:</label>
        <input type="text" id="G_Cooling" name="G_Cooling" value="<?php echo htmlspecialchars($gpu['G_Cooling']); ?>"><br><br>

        <label for="G_ExternalPower">External Power:</label>
        <input type="text" id="G_ExternalPower" name="G_ExternalPower" value="<?php echo htmlspecialchars($gpu['G_ExternalPower']); ?>"><br><br>

        <label for="G_HDMIOutputs">HDMI Outputs:</label>
        <input type="number" id="G_HDMIOutputs" name="G_HDMIOutputs" required value="<?php echo htmlspecialchars($gpu['G_HDMIOutputs']); ?>"><br><br>

        <label for="G_DisplayPortOutputs">DisplayPort Outputs:</label>
        <input type="number" id="G_DisplayPortOutputs" name="G_DisplayPortOutputs" required value="<?php echo htmlspecialchars($gpu['G_DisplayPortOutputs']); ?>"><br><br>
        <label class="form-label">Active:</label>
        <div class="radio-group">
            <label for="C_active_yes" class="radio-label">
                <input type="radio" id="G_active_yes" class="radio-input" name="G_active" value="Yes" <?php if($gpu['G_active'] == 'Yes') echo 'checked'; ?>>
                Yes
            </label>

            <label for="C_active_no" class="radio-label">
                <input type="radio" id="G_active_no" class="radio-input" name="G_active" value="No" <?php if($gpu['G_active'] == 'No') echo 'checked'; ?>>
                No
            </label>
        </div>
        <label for="G_img">Image:</label>
        <input type="text" id="G_img" name="G_img" value="<?php echo htmlspecialchars($gpu['G_img']); ?>"><br><br>

        <input type="hidden" name="G_ID" value="<?php echo $gpu['G_ID']; ?>">
        <input type="submit" value="Update GPU">
    </form>
</div>
