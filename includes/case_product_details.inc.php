<?php
require_once('db/connection.php');

$productID = $_GET['id'];

// Query to fetch product details based on the product ID
$query = "SELECT * FROM pc_case WHERE CS_ID = :productID"; // Modify the table name and column names as per your database structure

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->bindParam(':productID', $productID, PDO::PARAM_INT);
$statement->execute();

// Fetch the product details
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the product was found
if (!$product) {
    // Handle the case when the product doesn't exist
    echo "Product not found.";
}
?>
<h1><?php echo $product['CS_name']; ?> Details</h1>
<div class="product-details">
    <div class="image-container">
    <img src="<?php echo $product['CS_img']; ?>" alt="<?php echo $product['CS_name']; ?>">
    </div>
    <table>
        <tr>
            <th>Merk:</th>
            <td><?php echo $product['CS_Manufacturer']; ?>
        </tr>
        <tr>
            <th>Prijs:</th>
            <td> €<?php echo $product['CS_price']; ?></p></td>
        </tr>
        <tr>
            <th>Brand:</th>
            <td><?php echo $product['CS_Manufacturer']; ?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>€<?php echo $product['CS_price']; ?></td>
        </tr>
        <tr>
            <th>Part Number:</th>
            <td><?php echo $product['CS_PartNumber']; ?></td>
        </tr>
        <tr>
            <th>Type:</th>
            <td><?php echo $product['CS_Type']; ?></td>
        </tr>
        <tr>
            <th>Color:</th>
            <td><?php echo $product['CS_Color']; ?></td>
        </tr>
        <tr>
            <th>Power Supply:</th>
            <td><?php echo $product['CS_PowerSupply']; ?></td>
        </tr>
        <tr>
            <th>Side Panel:</th>
            <td><?php echo $product['CS_SidePanel']; ?></td>
        </tr>
        <tr>
            <th>Power Supply Shroud:</th>
            <td><?php echo $product['CS_PowerSupplyShroud']; ?></td>
        </tr>
        <tr>
            <th>Front Panel USB:</th>
            <td><?php echo $product['CS_FrontPanelUSB']; ?></td>
        </tr>
        <tr>
            <th>Motherboard Form Factor:</th>
            <td><?php echo $product['CS_MotherboardFormFactor']; ?></td>
        </tr>
        <tr>
            <th>Maximum Video Card Length:</th>
            <td><?php echo $product['CS_MaximumVideoCardLength']; ?></td>
        </tr>
        <tr>
            <th>Drive Bays:</th>
            <td><?php echo $product['CS_DriveBays']; ?></td>
        </tr>
        <tr>
            <th>Expansion Slots:</th>
            <td><?php echo $product['CS_ExpansionSlots']; ?></td>
        </tr>
        <tr>
            <th>Dimensions:</th>
            <td><?php echo $product['CS_Dimensions']; ?></td>
        </tr>
        <tr>
            <th>Volume:</th>
            <td><?php echo $product['CS_Volume']; ?></td>
        </tr>

    </table>
    <div class="back-button-container">
        <a href="index.php?page=caseslist" class="back-button">Terug</a>
    </div>
</div>

