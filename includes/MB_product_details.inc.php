<?php
require_once('db/connection.php');

$productID = $_GET['id'];

// Query to fetch GPU details based on the product ID
$query = "SELECT * FROM motherboard WHERE MB_ID = :productID"; // Modify the table name and column names as per your database structure

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->bindParam(':productID', $productID, PDO::PARAM_INT);
$statement->execute();

// Fetch the GPU details
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the GPU was found
if (!$product) {
    // Handle the case when the motherboard doesn't exist
    echo "Motherboard not found.";
}
?>

<h1><?php echo $product['MB_name']; ?> Details</h1>
<div class="product-details">
    <img src="<?php echo $product['MB_img']; ?>" alt="<?php echo $product['MB_name']; ?>">
    <table>
        <tr>
            <th>Manufacturer:</th>
            <td><?php echo $product['MB_Manufacturer']; ?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>€<?php echo $product['MB_price']; ?></td>
        </tr>
        <tr>
            <th>Part Number:</th>
            <td><?php echo $product['MB_PartNumber']; ?></td>
        </tr>
        <tr>
            <th>Type:</th>
            <td><?php echo $product['MB_SocketCPU']; ?></td>
        </tr>
        <tr>
            <th>Formfactor:</th>
            <td><?php echo $product['MB_FormFactor']; ?> GB</td>
        </tr>
        <tr>
            <th>Chipset:</th>
            <td><?php echo $product['MB_Chipset']; ?></td>
        </tr>
        <tr>
            <th>Memorymax:</th>
            <td><?php echo $product['MB_MemoryMax']; ?></td>
        </tr>
        <tr>
            <th>Memorytype:</th>
            <td><?php echo $product['MB_MemoryType']; ?></td>
        </tr>
        <tr>
            <th>Memoryslots:</th>
            <td><?php echo $product['MB_MemorySlots']; ?></td>
        </tr>
        <tr>
            <th>Memoryspeed:</th>
            <td><?php echo $product['MB_MemorySpeed']; ?></td>
        </tr>
        <tr>
            <th>Color:</th>
            <td><?php echo $product['MB_Color']; ?></td>
        </tr>
        <tr>
            <th>Active:</th>
            <td><?php echo $product['MB_active']; ?></td>
        </tr>
    </table>
</div>
