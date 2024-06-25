<?php
require_once('db/connection.php');
// Ensure you have the product ID
$productID = $_GET['id'];

try {
    require_once('db/connection.php');
    $query = "SELECT *
FROM newpc n
INNER JOIN pc_case p ON p.CS_ID = n.CS_ID
INNER JOIN motherboard m ON m.MB_ID = n.MB_ID
INNER JOIN cpu c ON c.C_ID = n.C_ID
INNER JOIN cpu_cooler cc ON cc.CC_ID = n.CC_ID
INNER JOIN gpu g ON g.G_ID = n.G_ID
INNER JOIN psu ps ON ps.P_ID = n.P_ID
INNER JOIN ram r ON r.R_ID = n.R_ID
INNER JOIN storage s ON s.S_ID = n.S_ID
INNER JOIN users u ON u.U_ID = n.U_ID
WHERE n.NP_ID = :id AND n.basket = 'No'";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $productID); // Ensure $userid is defined
// Execute the query
    $stmt->execute();
//// Fetch the product details
//$product = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($stmt->rowCount() === 0) {
        echo "<h1>Motherboards</h1>";
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $timestamp = $row['ordertime'];
            // retrieve time from databae
// Convert the timestamp
            $formattedTimestamp = date("H:i d-m-Y", strtotime($timestamp));
            echo "<h1>Details</h1>";
            echo "<div class='product-details'>";
            echo "<table>";
            echo "<img src=" . $row['CS_img'] . ">";
            echo "<tr><th>CPU:</th><td>" . $row['C_name'] . "</td></tr>";
            echo "<tr><th>CPU cooler:</th><td>€" . $row['CC_name'] . "</td></tr>";
            echo "<tr><th>GPU:</th><td>" . $row['G_Name'] . "</td></tr>";
            echo "<tr><th>Motherboard:</th><td>" . $row['MB_name'] . "</td></tr>";
            echo "<tr><th>PSU:</th><td>" . $row['P_name'] . " GB</td></tr>";
            echo "<tr><th>Ram:</th><td>" . $row['R_name'] . "</td></tr>";
            echo "<tr><th>Storage:</th><td>" . $row['S_name'] . "</td></tr>";
            echo "<tr><th>Ordered by:</th><td>" . $row['firstname'] . "</td></tr>";
            echo "<tr><th>Date of order:</th><td>" . $formattedTimestamp . "</td></tr>";
            echo "</table></div>";
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

//// Check if the product was found
//if ($product) {
//// Display the product details

//} else {
//// Handle the case when the product doesn't exist
//echo "Product not found.";
//}
