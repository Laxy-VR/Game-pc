<?php
$id = $_GET['id'];
$sql = 'SELECT * FROM gpu WHERE G_ID = :id';
$sth = $conn->prepare($sql);
$sth->bindParam(':id', $id);
$sth->execute();
$result = $sth->fetch();
?>

<h1>Bewerk Product</h1>
<div class="form-container">
<form action="php/editproduct.php" method="POST">
    <div class="input-group">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?=$result["G_Name"]?>">
    </div>
    <div class="input-group">
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?=$result["G_Price"]?>">
    </div>
    <div class="input-group">
        <label for="manufacturer">Mannufacturer:</label>
        <input type="text" name="manufacturer" value="<?=$result["G_Manufacturer"]?>">
    </div>
    <div class="input-group">
        <label for="partnumber">Partnumber:</label>
        <input type="text"  name="partnumber" value="<?=$result["G_PartNumber"]?>">
    </div>
    <div class="input-group">
        <label for="chipset">Chipset:</label>
        <input type="text"  name="chipset" value="<?=$result["G_Chipset"]?>">
    </div>
    <div class="input-group">
        <label for="memory">Memory:</label>
        <input type="text"  name="memory" value="<?=$result["G_Memory"]?>">
    </div>
    <div class="input-group">
        <label for="memorytype">Memorytype:</label>
        <input type="text"  name="memorytype" value="<?=$result["G_MemoryType"]?>">
    </div>
    <div class="input-group">
        <label for="coreclock">Coreclock:</label>
        <input type="text"  name="coreclock" value="<?=$result["G_CoreClock"]?>">
    </div>
    <div class="input-group">
        <label for="boostclock">Boostclock:</label>
        <input type="text" name="boostclock" value="<?=$result["G_BoostClock"]?>">
    </div>
    <div class="input-group">
        <label for="interface">Interface:</label>
        <input type="text" name="interface" value="<?=$result["G_Interface"]?>">
    </div>
    <div class="input-group">
        <label for="color">Color:</label>
        <input type="text" name="color" value="<?=$result["G_Color"]?>">
    </div>
    <div class="input-group">
        <label for="framesync">Framesync:</label>
        <input type="text" name="framesync" value="<?=$result["G_FrameSync"]?>">
    </div>
    <div class="input-group">
        <label for="length">Length:</label>
        <input type="text" name="length" value="<?=$result["G_Length"]?>">
    </div>
    <div class="input-group">
        <label for="tdp">TDP:</label>
        <input type="text" name="tdp" value="<?=$result["G_TDP"]?>">
    </div>
    <div class="input-group">
        <label for="cooling">Cooling:</label>
        <input type="text" name="cooling" value="<?=$result["G_Cooling"]?>">
    </div>
    <div class="input-group">
        <label for="image">Image:</label>
        <input type="text" name="image" value="<?=$result["G_img"]?>">
    </div>
    <div class="input-group">
        <label for="GPU_active">Active</label>
        <fieldset id="GPU_active">
            <input type="radio" id="GPU_yes" name="GPU_active" value="Yes">
            <label for="GPU_yes">Yes</label>
            <input type="radio" id="GPU_no" name="GPU_active" value="No">
            <label for="GPU_no">No</label>
        </fieldset>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="submit">Bewerken</button>
    </div>
</form>
</div>
