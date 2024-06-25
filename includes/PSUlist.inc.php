<a href="/gamepc/index.php?page=addPSU" class="add-product-button">Add Product</a>
<?php
try {
    require_once('db/connection.php');
    $query = "SELECT P_ID, P_name, P_Manufacturer, P_price, P_img, P_active FROM psu";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>PSUs</h1>";
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=PSU_product_details&id=' . $row['P_ID'] . '">';
            echo "<img src=" . $row['P_img'] . ">";
            echo '<h2>' . $row['P_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['P_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['P_price'] . '</p>';
            echo '<p>Active: ' . $row['P_active'] . '</p>';
            echo '</a>';
            echo '<div class="product-actions">';
            echo '<a href="index.php?page=editPSU&id=' . $row['P_ID'] . '&category=psu" class="edit-button"><img src="images/edit.png" alt="Edit"></a>';
            echo '<a href="php/deleteproduct.php?id=' . $row['P_ID'] . '&category=psu" class="delete-button"><img src="images/delete.png" alt="Delete"></a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
