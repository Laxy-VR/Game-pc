<?php
require_once('db/connection.php');

$productID = $_GET['id'];

// Query to fetch GPU details based on the product ID
$query = "SELECT * FROM psu WHERE P_ID = :productID"; // Modify the table name and column names as per your database structure

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->bindParam(':productID', $productID, PDO::PARAM_INT);
$statement->execute();

// Fetch the GPU details
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the GPU was found
if (!$product) {
    // Handle the case when the GPU doesn't exist
    echo "PSU not found.";
}
?>

<h1><?php echo $product['P_name']; ?> Details</h1>
<div class="product-details">
    <img src="<?php echo $product['P_img']; ?>" alt="<?php echo $product['P_name']; ?>">
    <table>
        <tr>
            <th>Manufacturer:</th>
            <td><?php echo $product['P_Manufacturer']; ?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>€<?php echo $product['P_price']; ?></td>
        </tr>
        <tr>
            <th>Part Number:</th>
            <td><?php echo $product['P_PartNumber']; ?></td>
        </tr>
        <tr>
            <th>Type:</th>
            <td><?php echo $product['P_Type']; ?></td>
        </tr>
        <tr>
            <th>EfficiencyRating:</th>
            <td><?php echo $product['P_EfficiencyRating']; ?> GB</td>
        </tr>
        <tr>
            <th>Wattage:</th>
            <td><?php echo $product['P_Wattage']; ?></td>
        </tr>
        <tr>
            <th>Length:</th>
            <td><?php echo $product['P_Length']; ?></td>
        </tr>
        <tr>
            <th>Modular:</th>
            <td><?php echo $product['P_Modular']; ?></td>
        </tr>
        <tr>
            <th>Fanless:</th>
            <td><?php echo $product['P_Fanless']; ?></td>
        </tr>
        <tr>
            <th>Active:</th>
            <td><?php echo $product['P_active']; ?></td>
        </tr>
    </table>
</div>
