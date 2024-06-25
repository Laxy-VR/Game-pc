<?php
require_once('db/connection.php');

$productID = $_GET['id'];

// Query to fetch RAM card details based on the product ID
$query = "SELECT * FROM ram WHERE R_ID = :productID"; // Modify the table name and column names as per your database structure

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->bindParam(':productID', $productID, PDO::PARAM_INT);
$statement->execute();

// Fetch the RAM card details
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the RAM card was found
if (!$product) {
    // Handle the case when the RAM card doesn't exist
    echo "RAM card not found.";
}
?>

<h1><?php echo $product['R_name']; ?> Details</h1>
<div class="product-details">
    <img src="<?php echo $product['R_img']; ?>" alt="<?php echo $product['R_name']; ?>">
    <table>
        <tr>
            <th>Manufacturer:</th>
            <td><?php echo $product['R_Manufacturer']; ?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>€<?php echo $product['R_price']; ?></td>
        </tr>
        <tr>
            <th>Part Number:</th>
            <td><?php echo $product['R_PartNumber']; ?></td>
        </tr>
        <tr>
            <th>Speed:</th>
            <td><?php echo $product['R_Speed']; ?></td>
        </tr>
        <tr>
            <th>Form Factor:</th>
            <td><?php echo $product['R_FormFactor']; ?></td>
        </tr>
        <tr>
            <th>Modules:</th>
            <td><?php echo $product['R_Modules']; ?></td>
        </tr>
        <tr>
            <th>Price Per GB:</th>
            <td>€<?php echo $product['R_PricePerGB']; ?></td>
        </tr>
        <!-- Add more RAM card details here -->
    </table>
</div>
