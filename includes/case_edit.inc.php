<?php
require_once('db/connection.php');

$case = []; // Initialize the $case array

if (isset($_GET['id'])) {
    $caseId = $_GET['id'];

    // Query to fetch case details by ID
    $query = "SELECT * FROM pc_case WHERE CS_ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $caseId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $case = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle the case where the case with the specified ID was not found
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit PC Case</title>
</head>
<body>
<h1>Edit PC Case</h1>
<div class="form-container">
    <form action="php/case_edit.php" method="POST" enctype="multipart/form-data">
        <label for="CS_name">Name:</label>
        <input type="text" id="CS_name" name="CS_name" required value="<?php echo htmlspecialchars($case['CS_name']); ?>"><br><br>

        <label for="CS_price">Price:</label>
        <input type="number" id="CS_price" name="CS_price" step="0.01" required value="<?php echo htmlspecialchars($case['CS_price']); ?>"><br><br>

        <label for="CS_Manufacturer">Manufacturer:</label>
        <input type="text" id="CS_Manufacturer" name="CS_Manufacturer" value="<?php echo htmlspecialchars($case['CS_Manufacturer']); ?>"><br><br>

        <label for="CS_PartNumber">Part Number:</label>
        <input type="text" id="CS_PartNumber" name="CS_PartNumber" value="<?php echo htmlspecialchars($case['CS_PartNumber']); ?>"><br><br>

        <label for="CS_Type">Type:</label>
        <input type="text" id="CS_Type" name="CS_Type" value="<?php echo htmlspecialchars($case['CS_Type']); ?>"><br><br>

        <label for="CS_Color">Color:</label>
        <input type="text" id="CS_Color" name="CS_Color" value="<?php echo htmlspecialchars($case['CS_Color']); ?>"><br><br>

        <label for="CS_PowerSupply">Power Supply:</label>
        <input type="text" id="CS_PowerSupply" name="CS_PowerSupply" value="<?php echo htmlspecialchars($case['CS_PowerSupply']); ?>"><br><br>

        <label for="CS_SidePanel">Side Panel:</label>
        <input type="text" id="CS_SidePanel" name="CS_SidePanel" value="<?php echo htmlspecialchars($case['CS_SidePanel']); ?>"><br><br>

        <label for="CS_PowerSupplyShroud">Power Supply Shroud:</label>
        <input type="text" id="CS_PowerSupplyShroud" name="CS_PowerSupplyShroud" value="<?php echo htmlspecialchars($case['CS_PowerSupplyShroud']); ?>"><br><br>

        <label for="CS_FrontPanelUSB">Front Panel USB:</label>
        <input type="text" id="CS_FrontPanelUSB" name="CS_FrontPanelUSB" value="<?php echo htmlspecialchars($case['CS_FrontPanelUSB']); ?>"><br><br>

        <label for="CS_MotherboardFormFactor">Motherboard Form Factor:</label>
        <input type="text" id="CS_MotherboardFormFactor" name="CS_MotherboardFormFactor" value="<?php echo htmlspecialchars($case['CS_MotherboardFormFactor']); ?>"><br><br>

        <label for="CS_MaximumVideoCardLength">Maximum Video Card Length:</label>
        <input type="text" id="CS_MaximumVideoCardLength" name="CS_MaximumVideoCardLength" value="<?php echo htmlspecialchars($case['CS_MaximumVideoCardLength']); ?>"><br><br>

        <label for="CS_DriveBays">Drive Bays:</label>
        <input type="text" id="CS_DriveBays" name="CS_DriveBays" value="<?php echo htmlspecialchars($case['CS_DriveBays']); ?>"><br><br>

        <label for="CS_ExpansionSlots">Expansion Slots:</label>
        <input type="text" id="CS_ExpansionSlots" name="CS_ExpansionSlots" value="<?php echo htmlspecialchars($case['CS_ExpansionSlots']); ?>"><br><br>

        <label for="CS_Dimensions">Dimensions:</label>
        <input type="text" id="CS_Dimensions" name="CS_Dimensions" value="<?php echo htmlspecialchars($case['CS_Dimensions']); ?>"><br><br>

        <label for="CS_Volume">Volume:</label>
        <input type="text" id="CS_Volume" name="CS_Volume" value="<?php echo htmlspecialchars($case['CS_Volume']); ?>"><br><br>

        <label class="form-label">Active:</label>
        <div class="radio-group">
            <label for="CS_active_yes" class="radio-label">
                <input type="radio" id="CS_active_yes" class="radio-input" name="CS_active" value="Yes" <?php if($case['CS_active'] == 'Yes') echo 'checked'; ?>>
                Yes
            </label>

            <label for="CS_active_no" class="radio-label">
                <input type="radio" id="CS_active_no" class="radio-input" name="CS_active" value="No" <?php if($case['CS_active'] == 'No') echo 'checked'; ?>>
                No
            </label>
        </div>

        <label for="CS_img">Image:</label>
        <input type="text" id="CS_img" name="CS_img" value="<?php echo htmlspecialchars($case['CS_img']); ?>"><br><br>

        <input type="hidden" name="CS_ID" value="<?php echo $case['CS_ID']; ?>">
        <input type="submit" value="Update PC Case">
    </form>
</div>
</body>
</html>
