<?php
require_once('db/connection.php');

$cpu = []; // Initialize the $cpu array

if (isset($_GET['id'])) {
    $cpuId = $_GET['id'];

    // Query to fetch CPU details by ID
    $query = "SELECT * FROM cpu WHERE C_ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $cpuId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $cpu = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle the case where the CPU with the specified ID was not found
    }
}
?>


<h1>Edit CPU</h1>
<div class="form-container">
    <form action="php/CPUedit.php" method="POST" enctype="multipart/form-data">
        <label for="C_name">Name:</label>
        <input type="text" id="C_name" name="C_name" required value="<?php echo htmlspecialchars($cpu['C_name']); ?>"><br><br>

        <label for="C_price">Price:</label>
        <input type="number" id="C_price" name="C_price" step="0.01" required value="<?php echo htmlspecialchars($cpu['C_price']); ?>"><br><br>

        <label for="C_Manufacturer">Manufacturer:</label>
        <input type="text" id="C_Manufacturer" name="C_Manufacturer" value="<?php echo htmlspecialchars($cpu['C_Manufacturer']); ?>"><br><br>

        <label for="C_PartNumber">Part Number:</label>
        <input type="text" id="C_PartNumber" name="C_PartNumber" value="<?php echo htmlspecialchars($cpu['C_PartNumber']); ?>"><br><br>

        <label for="C_CoreCount">Core Count:</label>
        <input type="number" id="C_CoreCount" name="C_CoreCount" required value="<?php echo htmlspecialchars($cpu['C_CoreCount']); ?>"><br><br>

        <label for="C_PerformanceCoreClock">Performance Core Clock:</label>
        <input type="text" id="C_PerformanceCoreClock" name="C_PerformanceCoreClock" value="<?php echo htmlspecialchars($cpu['C_PerformanceCoreClock']); ?>"><br><br>

        <label for="C_PerformanceBoostClock">Performance Boost Clock:</label>
        <input type="text" id="C_PerformanceBoostClock" name="C_PerformanceBoostClock" value="<?php echo htmlspecialchars($cpu['C_PerformanceBoostClock']); ?>"><br><br>

        <label for="C_TDP">TDP:</label>
        <input type="number" id="C_TDP" name="C_TDP" required value="<?php echo htmlspecialchars($cpu['C_TDP']); ?>"><br><br>

        <label for="C_Series">Series:</label>
        <input type="text" id="C_Series" name="C_Series" value="<?php echo htmlspecialchars($cpu['C_Series']); ?>"><br><br>

        <label for="C_Microarchitecture">Microarchitecture:</label>
        <input type="text" id="C_Microarchitecture" name="C_Microarchitecture" value="<?php echo htmlspecialchars($cpu['C_Microarchitecture']); ?>"><br><br>

        <label for="C_CoreFamily">Core Family:</label>
        <input type="text" id="C_CoreFamily" name="C_CoreFamily" value="<?php echo htmlspecialchars($cpu['C_CoreFamily']); ?>"><br><br>

        <label for="C_Socket">Socket:</label>
        <input type="text" id="C_Socket" name="C_Socket" value="<?php echo htmlspecialchars($cpu['C_Socket']); ?>"><br><br>

        <label for="C_IntegratedGraphics">Integrated Graphics:</label>
        <input type="text" id="C_IntegratedGraphics" name="C_IntegratedGraphics" value="<?php echo htmlspecialchars($cpu['C_IntegratedGraphics']); ?>"><br><br>

        <label for="C_MaxSupportedMemory">Max Supported Memory:</label>
        <input type="text" id="C_MaxSupportedMemory" name="C_MaxSupportedMemory" value="<?php echo htmlspecialchars($cpu['C_MaxSupportedMemory']); ?>"><br><br>

        <label for="C_ECCSupport">ECC Support:</label>
        <input type="text" id="C_ECCSupport" name="C_ECCSupport" value="<?php echo htmlspecialchars($cpu['C_ECCSupport']); ?>"><br><br>

        <label for="C_IncludesCooler">Includes Cooler:</label>
        <input type="text" id="C_IncludesCooler" name="C_IncludesCooler" value="<?php echo htmlspecialchars($cpu['C_IncludesCooler']); ?>"><br><br>

        <label for="C_Packaging">Packaging:</label>
        <input type="text" id="C_Packaging" name="C_Packaging" value="<?php echo htmlspecialchars($cpu['C_Packaging']); ?>"><br><br>

        <label for="C_PerformanceL1Cache">Performance L1 Cache:</label>
        <input type="text" id="C_PerformanceL1Cache" name="C_PerformanceL1Cache" value="<?php echo htmlspecialchars($cpu['C_PerformanceL1Cache']); ?>"><br><br>

        <label for="C_PerformanceL2Cache">Performance L2 Cache:</label>
        <input type="text" id="C_PerformanceL2Cache" name="C_PerformanceL2Cache" value="<?php echo htmlspecialchars($cpu['C_PerformanceL2Cache']); ?>"><br><br>

        <label for="C_L3Cache">L3 Cache:</label>
        <input type="text" id="C_L3Cache" name="C_L3Cache" value="<?php echo htmlspecialchars($cpu['C_L3Cache']); ?>"><br><br>

        <label for="C_Lithography">Lithography:</label>
        <input type="number" id="C_Lithography" name="C_Lithography" required value="<?php echo htmlspecialchars($cpu['C_Lithography']); ?>"><br><br>

        <label for="C_IncludesCPUCooler">Includes CPU Cooler:</label>
        <input type="text" id="C_IncludesCPUCooler" name="C_IncludesCPUCooler" value="<?php echo htmlspecialchars($cpu['C_IncludesCPUCooler']); ?>"><br><br>

        <label for="C_SimultaneousMultithreading">Simultaneous Multithreading:</label>
        <input type="text" id="C_SimultaneousMultithreading" name="C_SimultaneousMultithreading" value="<?php echo htmlspecialchars($cpu['C_SimultaneousMultithreading']); ?>"><br><br>

        <label class="form-label">Active:</label>
        <div class="radio-group">
            <label for="C_active_yes" class="radio-label">
                <input type="radio" id="C_active_yes" class="radio-input" name="C_active" value="Yes" <?php if($cpu['C_active'] == 'Yes') echo 'checked'; ?>>
                Yes
            </label>

            <label for="C_active_no" class="radio-label">
                <input type="radio" id="C_active_no" class="radio-input" name="C_active" value="No" <?php if($cpu['C_active'] == 'No') echo 'checked'; ?>>
                No
            </label>
        </div>


        <label for="C_img">Image:</label>
        <input type="text" id="C_img" name="C_img" value="<?php echo htmlspecialchars($cpu['C_img']); ?>"><br><br>

        <input type="hidden" name="C_ID" value="<?php echo $cpu['C_ID']; ?>">
        <input type="submit" value="Update CPU">
    </form>
</div>
