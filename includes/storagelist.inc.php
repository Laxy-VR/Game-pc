<a href="/gamepc/index.php?page=addStorage" class="add-product-button">Add Product</a>
<?php
try {
    require_once('db/connection.php');
    $query = "SELECT S_ID, S_name, S_Manufacturer, S_price, S_img, S_active FROM storage";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>Storage Devices</h1>";
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=storage_product_details&id=' . $row['S_ID'] . '">';
            echo "<img src=" . $row['S_img'] . ">";
            echo '<h2>' . $row['S_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['S_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['S_price'] . '</p>';
            echo '<p>Active: ' . ($row['S_active'] == 'Yes' ? 'Yes' : 'No') . '</p>';
            echo '</a>';
            echo '<div class="product-actions">';
            echo '<a href="/gamepc/index.php?page=storage_edit&id=' . $row['S_ID'] . '&category=storage" class="edit-button"><img src="images/edit.png" alt="Edit"></a>';
            echo '<a href="php/deleteproduct.php?id=' . $row['S_ID'] . '&category=storage" class="delete-button"><img src="images/delete.png" alt="Delete"></a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
