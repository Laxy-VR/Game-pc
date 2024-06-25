<?php
$id = $_GET['id'];
$sql = 'SELECT * FROM psu WHERE P_ID = :id';
$sth = $conn->prepare($sql);
$sth->bindParam(':id', $id);
$sth->execute();
$result = $sth->fetch();
?>

    <h1>Edit Product</h1>
    <form action="php/editPSU.php?id=<?=$id?>" method="POST">
        <div class="input-group">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?=$result["P_name"]?>">
        </div>
        <div class="input-group">
            <label for="price">Price:</label>
            <input type="text" name="price" value="<?=$result["P_price"]?>">
        </div>
        <div class="input-group">
            <label for="manufacturer">Manufacturer:</label>
            <input type="text" name="manufacturer" value="<?=$result["P_Manufacturer"]?>">
        </div>
        <div class="input-group">
            <label for="partnumber">Partnumber:</label>
            <input type="text"  name="partnumber" value="<?=$result["P_PartNumber"]?>">
        </div>
        <div class="input-group">
            <label for="Type">type:</label>
            <input type="text"  name="type" value="<?=$result["P_Type"]?>">
        </div>
        <div class="input-group">
            <label for="efficienccyrating">Efficiencyrating:</label>
            <input type="text"  name="efficiencyrating" value="<?=$result["P_EfficiencyRating"]?>">
        </div>
        <div class="input-group">
            <label for="Wattage">Wattage:</label>
            <input type="text"  name="wattage" value="<?=$result["P_Wattage"]?>">
        </div>
        <div class="input-group">
            <label for="Length">Length:</label>
            <input type="text"  name="length" value="<?=$result["P_Length"]?>">
        </div>
        <div class="input-group">
            <label for="Modular">Modular:</label>
            <input type="text" name="modular" value="<?=$result["P_Modular"]?>">
        </div>
        <div class="input-group">
            <label for="fanless">Fanless:</label>
            <input type="text" name="fanless" value="<?=$result["P_Fanless"]?>">
        </div>
        <div class="input-group">
            <label for="image">Image:</label>
            <input type="text" name="image" value="<?=$result["P_img"]?>">
        </div>
        <label class="form-label">Active:</label>
        <div class="radio-group">
            <label for="P_active_yes" class="radio-label">
                <input type="radio"  class="radio-input" name="P_active" value="Yes" <?php if($result['R_active'] == 'Yes') echo 'checked'; ?>>
                Yes
            </label>

            <label for="P_active_no" class="radio-label">
                <input type="radio" class="radio-input" name="P_active" value="No" <?php if($result['P_active'] == 'No') echo 'checked'; ?>>
                No
            </label>
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="submit">Bewerken</button>
        </div>
    </form>
<?php
