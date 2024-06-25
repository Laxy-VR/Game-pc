<a href="/gamepc/index.php?page=addMB" class="add-product-button">Add Product</a>
<?php
try {
    require_once('db/connection.php');
    $query = "SELECT MB_ID, MB_name, MB_Manufacturer, MB_price, MB_img, MB_active FROM motherboard";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>Motherboards</h1>";
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=MB_product_details&id=' . $row['MB_ID'] . '">';
            echo "<img src=" . $row['MB_img'] . ">";
            echo '<h2>' . $row['MB_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['MB_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['MB_price'] . '</p>';
            echo '<p>Active: ' . $row['MB_active'] . '</p>';
            echo '</a>';
            echo '<div class="product-actions">';
            echo '<a href="index.php?page=editMB&id=' . $row['MB_ID'] . '&category=motherboard" class="edit-button"><img src="images/edit.png" alt="Edit"></a>';
            echo '<a href="php/deleteproduct.php?id=' . $row['MB_ID'] . '&category=motherboard" class="delete-button"><img src="images/delete.png" alt="Delete"></a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

