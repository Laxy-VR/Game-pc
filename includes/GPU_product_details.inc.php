<?php
require_once('db/connection.php');

$productID = $_GET['id'];

// Query to fetch GPU details based on the product ID
$query = "SELECT * FROM gpu WHERE G_ID = :productID"; // Modify the table name and column names as per your database structure

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->bindParam(':productID', $productID, PDO::PARAM_INT);
$statement->execute();

// Fetch the GPU details
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the GPU was found
if (!$product) {
    // Handle the case when the GPU doesn't exist
    echo "GPU not found.";
}
?>

<h1><?php echo $product['G_name']; ?> Details</h1>
<div class="product-details">
    <img src="<?php echo $product['G_img']; ?>" alt="<?php echo $product['G_name']; ?>">
    <table>
        <tr>
            <th>Manufacturer:</th>
            <td><?php echo $product['G_Manufacturer']; ?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>€<?php echo $product['G_price']; ?></td>
        </tr>
        <tr>
            <th>Part Number:</th>
            <td><?php echo $product['G_PartNumber']; ?></td>
        </tr>
        <tr>
            <th>Chipset:</th>
            <td><?php echo $product['G_Chipset']; ?></td>
        </tr>
        <tr>
            <th>Memory:</th>
            <td><?php echo $product['G_Memory']; ?> GB</td>
        </tr>
        <tr>
            <th>Memory Type:</th>
            <td><?php echo $product['G_MemoryType']; ?></td>
        </tr>
        <tr>
            <th>Core Clock:</th>
            <td><?php echo $product['G_CoreClock']; ?></td>
        </tr>
        <tr>
            <th>Boost Clock:</th>
            <td><?php echo $product['G_BoostClock']; ?></td>
        </tr>
        <tr>
            <th>Interface:</th>
            <td><?php echo $product['G_Interface']; ?></td>
        </tr>
        <tr>
            <th>Color:</th>
            <td><?php echo $product['G_Color']; ?></td>
        </tr>
        <tr>
            <th>Frame Sync:</th>
            <td><?php echo $product['G_FrameSync']; ?></td>
        </tr>
        <tr>
            <th>Length:</th>
            <td><?php echo $product['G_Length']; ?> mm</td>
        </tr>
        <tr>
            <th>TDP:</th>
            <td><?php echo $product['G_TDP']; ?> W</td>
        </tr>
        <tr>
            <th>Case Expansion Slot Width:</th>
            <td><?php echo $product['G_CaseExpansionSlotWidth']; ?> mm</td>
        </tr>
        <tr>
            <th>Total Slot Width:</th>
            <td><?php echo $product['G_TotalSlotWidth']; ?> mm</td>
        </tr>
        <tr>
            <th>Cooling:</th>
            <td><?php echo $product['G_Cooling']; ?></td>
        </tr>
        <tr>
            <th>External Power:</th>
            <td><?php echo $product['G_ExternalPower']; ?></td>
        </tr>
        <tr>
            <th>HDMI Outputs:</th>
            <td><?php echo $product['G_HDMIOutputs']; ?></td>
        </tr>
        <tr>
            <th>DisplayPort Outputs:</th>
            <td><?php echo $product['G_DisplayPortOutputs']; ?></td>
        </tr>
    </table>
</div>
