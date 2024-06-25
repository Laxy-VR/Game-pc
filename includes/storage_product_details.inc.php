<?php
require_once('db/connection.php');

$productID = $_GET['id'];

// Query to fetch storage product details based on the product ID
$query = "SELECT * FROM storage WHERE S_ID = :productID"; // Modify the table name and column names as per your database structure

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->bindParam(':productID', $productID, PDO::PARAM_INT);
$statement->execute();

// Fetch the storage product details
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the storage product was found
if (!$product) {
    // Handle the case when the storage product doesn't exist
    echo "Storage product not found.";
}
?>

<h1><?php echo $product['S_name']; ?> Details</h1>
<div class="product-details">
    <img src="<?php echo $product['S_img']; ?>" alt="<?php echo $product['S_name']; ?>">
    <table>
        <tr>
            <th>Manufacturer:</th>
            <td><?php echo $product['S_Manufacturer']; ?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>€<?php echo $product['S_price']; ?></td>
        </tr>
        <tr>
            <th>Part Number:</th>
            <td><?php echo $product['S_PartNumber']; ?></td>
        </tr>
        <tr>
            <th>Capacity:</th>
            <td><?php echo $product['S_Capacity']; ?></td>
        </tr>
        <tr>
            <th>Price per GB:</th>
            <td><?php echo $product['S_PricePerGB']; ?></td>
        </tr>
        <tr>
            <th>Type:</th>
            <td><?php echo $product['S_Type']; ?></td>
        </tr>
        <tr>
            <th>Cache:</th>
            <td><?php echo $product['S_Cache']; ?></td>
        </tr>
        <tr>
            <th>Form Factor:</th>
            <td><?php echo $product['S_FormFactor']; ?></td>
        </tr>
        <tr>
            <th>Interface:</th>
            <td><?php echo $product['S_Interface']; ?></td>
        </tr>
        <tr>
            <th>NVME:</th>
            <td><?php echo $product['S_NVME']; ?></td>
        </tr>
        <tr>
            <th>Active:</th>
            <td><?php echo ($product['S_active'] == 'Yes' ? 'Yes' : 'No'); ?></td>
        </tr>
    </table>
</div>
