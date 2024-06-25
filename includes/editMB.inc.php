<?php

$id = $_GET['id'];
$sql = 'SELECT * FROM motherboard WHERE MB_ID = :id';
$sth = $conn->prepare($sql);
$sth->bindParam(':id', $id);
$sth->execute();
$result = $sth->fetch();
?>
<h1>Edit Product</h1>
<div class="form-container">
<form action="php/editMB.php?id=<?=$id?>" method="POST">
    <div class="input-group">
        <label for="name">Name:</label>
        <input type="text" name="MB_name" value="<?=$result["MB_name"]?>">
    </div>
    <div class="input-group">
        <label for="price">Price:</label>
        <input type="text" name="MB_price" value="<?=$result["MB_price"]?>">
    </div>
    <div class="input-group">
        <label for="manufacturer">Manufacturer:</label>
        <input type="text" name="MB_Manufacturer" value="<?=$result["MB_Manufacturer"]?>">
    </div>
    <div class="input-group">
        <label for="partnumber">Partnumber:</label>
        <input type="text"  name="MB_PartNumber" value="<?=$result["MB_PartNumber"]?>">
    </div>
    <div class="input-group">
        <label for="SocketCPU">Socket CPU:</label>
        <input type="text"  name="MB_SocketCPU" value="<?=$result["MB_SocketCPU"]?>">
    </div>
    <div class="input-group">
        <label for="FormFactor">Form Factor:</label>
        <input type="text"  name="MB_FormFactor" value="<?=$result["MB_FormFactor"]?>">
    </div>
    <div class="input-group">
        <label for="Chipset">Chipset:</label>
        <input type="text"  name="MB_Chipset" value="<?=$result["MB_Chipset"]?>">
    </div>
    <div class="input-group">
        <label for="MemoryMax">Maximum Memory:</label>
        <input type="text"  name="MB_MemoryMax" value="<?=$result["MB_MemoryMax"]?>">
    </div>
    <div class="input-group">
        <label for="MemoryType">Memory Type:</label>
        <input type="text"  name="MB_MemoryType" value="<?=$result["MB_MemoryType"]?>">
    </div>
    <div class="input-group">
        <label for="MemorySlots">Memory Slots:</label>
        <input type="number"  name="MB_MemorySlots" value="<?=$result["MB_MemorySlots"]?>">
    </div>
    <div class="input-group">
        <label for="MemorySpeed">Memory Speed:</label>
        <input type="text"  name="MB_MemorySpeed" value="<?=$result["MB_MemorySpeed"]?>">
    </div>
    <div class="input-group">
        <label for="Color">Color:</label>
        <input type="text"  name="MB_Color" value="<?=$result["MB_Color"]?>">
    </div>
    <div class="input-group">
        <label for="Image">Image:</label>
        <input type="text"  name="MB_img" value="<?=$result["MB_img"]?>">
    </div>
    <label class="form-label">Active:</label>
    <div class="radio-group">
        <label for="MB_active_yes" class="radio-label">
            <input type="radio" id="MB_active_yes" class="radio-input" name="MB_active" value="Yes" <?php if($result['MB_active'] == 'Yes') echo 'checked'; ?>>
            Yes
        </label>

        <label for="MB_active_no" class="radio-label">
            <input type="radio" id="MB_active_no" class="radio-input" name="MB_active" value="No" <?php if($result['MB_active'] == 'No') echo 'checked'; ?>>
            No
        </label>
    </div>


    <div class="input-group">
        <button type="submit" class="btn" name="submit">Bewerken</button>
    </div>
</form>
</div>