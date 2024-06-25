<?php
// Ensure you have the product ID

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
WHERE n.basket = 'No'";
    $stmt = $conn->prepare($query);
// Execute the query
    $stmt->execute();
//// Fetch the product details
//$product = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($stmt->rowCount() == 0) {
    echo 'There are no orders.';
    } else {
        echo "<h1>Overview orders</h1>";
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $timestamp = $row['ordertime'];      // retrieve time from databae
// Convert the timestamp
            $formattedTimestamp = date("H:i d-m-Y", strtotime($timestamp));
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=overview_order_admin_details&id=' . $row['NP_ID'] . '">';
//            echo "<img src=" . $row['_img'] . ">";
            echo '<h2>' . $row['CS_name'] . '</h2>';
//            echo '<p>Manufacturer: ' . $row['MB_Manufacturer'] . '</p>';
//            echo '<p>Price: €' . $row['MB_price'] . '</p>';
//            echo '<p>Active: ' . $row['MB_active'] . '</p>';
//            echo '</a>';
//            echo '<div class="product-actions">';
//            echo '<a href="index.php?page=editMB&id=' . $row['MB_ID'] . '&category=motherboard" class="edit-button"><img src="images/edit.png" alt="Edit"></a>';
//            echo '<a href="php/deleteproduct.php?id=' . $row['MB_ID'] . '&category=motherboard" class="delete-button"><img src="images/delete.png" alt="Delete"></a>';
//            echo '</div>';
            echo '<a>Ordered by: ' . $row['firstname'] . '.</a>';
            echo '<a> Date of order: ' . $formattedTimestamp . '</a>';

            echo '</div>';
        }
    }

