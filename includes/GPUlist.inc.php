<a href="/gamepc/index.php?page=addGPU" class="add-product-button">Add Product</a>
<?php
try {
    require_once('db/connection.php');
    $query = "SELECT G_ID, G_name, G_Manufacturer, G_price, G_img, G_active FROM gpu";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>GPUs</h1>";
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=GPU_product_details&id=' . $row['G_ID'] . '">';
            echo "<img src=" . $row['G_img'] . ">";
            echo '<h2>' . $row['G_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['G_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['G_price'] . '</p>';
            echo '<p>Active: ' . ($row['G_active'] == 'Yes' ? 'Yes' : 'No') . '</p>';
            echo '</a>';
            echo '<div class="product-actions">';
            echo '<a href="/gamepc/index.php?page=GPU_edit&id=' . $row['G_ID'] . '&category=gpu" class="edit-button"><img src="images/edit.png" alt="Edit"></a>';
            echo '<a href="php/deleteproduct.php?id=' . $row['G_ID'] . '&category=gpu" class="delete-button"><img src="images/delete.png" alt="Delete"></a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
