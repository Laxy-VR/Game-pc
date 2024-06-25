<a href="/gamepc/index.php?page=addCPU" class="add-product-button">Add Product</a>
<?php
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT C_ID, C_name, C_Manufacturer, C_price, C_img, C_active FROM cpu";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>CPUs</h1>";
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=CPU_product_details&id=' . $row['C_ID'] . '">';
            echo "<img src=" . $row['C_img'] . ">";
            echo '<h2>' . $row['C_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['C_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['C_price'] . '</p>';
            echo '<p>Active: ' . ($row['C_active'] == 'Yes' ? 'Yes' : 'No') . '</p>';
            echo '</a>';
            echo '<div class="product-actions">';
            echo '<a href="/gamepc/index.php?page=CPU_edit&id=' . $row['C_ID'] . '&category=cpu" class="edit-button"><img src="images/edit.png" alt="Edit"></a>';
            echo '<a href="php/deleteproduct.php?id=' . $row['C_ID'] . '&category=cpu" class="delete-button"><img src="images/delete.png" alt="Delete"></a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

?>
