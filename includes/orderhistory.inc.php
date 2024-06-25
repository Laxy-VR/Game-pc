<?php
$userid = $_SESSION['userid'];
    require_once('db/connection.php');
$query = "SELECT n.U_ID, n.CS_ID, n.MB_ID, n.NP_ID, p.CS_ID, p.CS_name, m.MB_ID, m.MB_name
          FROM newpc n
          INNER JOIN pc_case p ON p.CS_ID = n.CS_ID
          INNER JOIN motherboard m ON m.MB_ID = n.MB_ID
          WHERE n.U_ID = :userid AND n.basket = 'No'";
$stmt = $conn->prepare($query);
$stmt->bindParam(':userid', $userid); // Adjust the parameter type if necessary
$stmt->execute();

    if ($stmt->rowCount() === 0) {
        echo 'There are no orders.';
    } else {
        echo "<h1>Orderhistory</h1>";
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=orderhistory_details&id=' . $row['NP_ID'] . '">';
//            echo "<img src=" . $row['_img'] . ">";
            echo '<h2>' . $row['CS_name'] . '</h2>';
//            echo '<p>Manufacturer: ' . $row['MB_Manufacturer'] . '</p>';
//            echo '<p>Price: €' . $row['MB_price'] . '</p>';
//            echo '<p>Active: ' . $row['MB_active'] . '</p>';
            echo '</a>';
            echo '<div class="product-actions">';;
            echo '</div>';
            echo '</div>';
        }
    }





//    $query = "SELECT p.CS_ID, p.CS_name, n.U_ID, n.CS_ID, n.NP_ID
//              FROM newpc n
//              LEFT JOIN pc_case p
//              ON p.CS_ID = n.CS_ID
//              WHERE n.U_ID = :userid";