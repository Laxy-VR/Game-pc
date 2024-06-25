<?php
require_once('db/connection.php');

$productID = $_GET['id'];

// Query to fetch CPU Cooler details based on the product ID
$query = "SELECT * FROM cpu_cooler WHERE CC_ID = :productID"; // Modify the table name and column names as per your database structure

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->bindParam(':productID', $productID, PDO::PARAM_INT);
$statement->execute();

// Fetch the CPU Cooler details
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the CPU Cooler was found
if (!$product) {
    // Handle the case when the CPU Cooler doesn't exist
    echo "CPU Cooler not found.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['CC_name']; ?> Details</title>
</head>
<body>
<h1><?php echo $product['CC_name']; ?> Details</h1>
<div class="product-details">
    <img src="<?php echo $product['CC_img']; ?>" alt="<?php echo $product['CC_name']; ?>">
    <table>
        <tr>
            <th>Manufacturer:</th>
            <td><?php echo $product['CC_Manufacturer']; ?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>€<?php echo $product['CC_price']; ?></td>
        </tr>
        <tr>
            <th>Model:</th>
            <td><?php echo $product['CC_Model']; ?></td>
        </tr>
        <tr>
            <th>Part Number:</th>
            <td><?php echo $product['CC_PartNumber']; ?></td>
        </tr>
        <tr>
            <th>Fan RPM:</th>
            <td><?php echo $product['CC_FanRPM']; ?></td>
        </tr>
        <tr>
            <th>Noise Level:</th>
            <td><?php echo $product['CC_NoiseLevel']; ?></td>
        </tr>
        <tr>
            <th>Color:</th>
            <td><?php echo $product['CC_Color']; ?></td>
        </tr>
        <tr>
            <th>Height:</th>
            <td><?php echo $product['CC_Height']; ?> mm</td>
        </tr>
        <tr>
            <th>CPU Socket:</th>
            <td><?php echo $product['CC_CPUSocket']; ?></td>
        </tr>
        <tr>
            <th>Water Cooled:</th>
            <td><?php echo $product['CC_WaterCooled']; ?></td>
        </tr>
        <tr>
            <th>Fanless:</th>
            <td><?php echo $product['CC_Fanless']; ?></td>
        </tr>
        <!-- Add more CPU Cooler details here as needed -->
    </table>
</div>
</body>
</html>
