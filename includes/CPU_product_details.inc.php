<?php
require_once('db/connection.php');

$productID = $_GET['id'];

// Query to fetch CPU details based on the product ID
$query = "SELECT * FROM cpu WHERE C_ID = :productID"; // Modify the table name and column names as per your database structure

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->bindParam(':productID', $productID, PDO::PARAM_INT);
$statement->execute();

// Fetch the CPU details
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the CPU was found
if (!$product) {
    // Handle the case when the CPU doesn't exist
    echo "CPU not found.";
}
?>

<h1><?php echo $product['C_name']; ?> Details</h1>
<div class="product-details">
    <div class="image-container">
    <img src="<?php echo $product['C_img']; ?>" alt="<?php echo $product['C_name']; ?>">
    </div>
    <table>
        <tr>
            <th>Manufacturer:</th>
            <td><?php echo $product['C_Manufacturer']; ?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>€<?php echo $product['C_price']; ?></td>
        </tr>
        <tr>
            <th>Core Count:</th>
            <td><?php echo $product['C_CoreCount']; ?></td>
        </tr>
        <tr>
            <th>Core Clock:</th>
            <td><?php echo $product['C_PerformanceCoreClock']; ?></td>
        </tr>
        <tr>
            <th>Boost Clock:</th>
            <td><?php echo $product['C_PerformanceBoostClock']; ?></td>
        </tr>
        <tr>
            <th>TDP:</th>
            <td><?php echo $product['C_TDP']; ?> W</td>
        </tr>
        <tr>
            <th>Series:</th>
            <td><?php echo $product['C_Series']; ?></td>
        </tr>
        <tr>
            <th>Microarchitecture:</th>
            <td><?php echo $product['C_Microarchitecture']; ?></td>
        </tr>
        <tr>
            <th>Core Family:</th>
            <td><?php echo $product['C_CoreFamily']; ?></td>
        </tr>
        <tr>
            <th>Socket:</th>
            <td><?php echo $product['C_Socket']; ?></td>
        </tr>
        <tr>
            <th>Integrated Graphics:</th>
            <td><?php echo $product['C_IntegratedGraphics']; ?></td>
        </tr>
        <tr>
            <th>Max Supported Memory:</th>
            <td><?php echo $product['C_MaxSupportedMemory']; ?></td>
        </tr>
        <tr>
            <th>ECC Support:</th>
            <td><?php echo $product['C_ECCSupport']; ?></td>
        </tr>
        <tr>
            <th>Includes Cooler:</th>
            <td><?php echo $product['C_IncludesCooler']; ?></td>
        </tr>
        <tr>
            <th>Packaging:</th>
            <td><?php echo $product['C_Packaging']; ?></td>
        </tr>
        <tr>
            <th>L1 Cache:</th>
            <td><?php echo $product['C_PerformanceL1Cache']; ?></td>
        </tr>
        <tr>
            <th>L2 Cache:</th>
            <td><?php echo $product['C_PerformanceL2Cache']; ?></td>
        </tr>
        <tr>
            <th>L3 Cache:</th>
            <td><?php echo $product['C_L3Cache']; ?></td>
        </tr>
        <tr>
            <th>Lithography:</th>
            <td><?php echo $product['C_Lithography']; ?> nm</td>
        </tr>
        <tr>
            <th>Includes CPU Cooler:</th>
            <td><?php echo $product['C_IncludesCPUCooler']; ?></td>
        </tr>
        <tr>
            <th>Simultaneous Multithreading:</th>
            <td><?php echo $product['C_SimultaneousMultithreading']; ?></td>
        </tr>
    </table>
    <div class="back-button-container">
        <a href="index.php?page=CPUlist" class="back-button">back</a>
    </div>
</div>
