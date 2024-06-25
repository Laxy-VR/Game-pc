<?php
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT G_ID, G_name, G_Manufacturer, G_price, G_img, G_active FROM gpu";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>GPUs</h1>"; // If no GPUs are found, display a message
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=GPU_product_details&id=' . $row['G_ID'] . '">';
            echo "<img src=" . $row['G_img'] . ">";
            echo '<h2>' . $row['G_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['G_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['G_price'] . '</p>';
            // Add a form with a hidden input to submit the selected GPU ID to 'newpc'
            echo '<form action="php/addpc_gpu.php" method="POST">';
            echo '<input type="hidden" name="selected_gpu" value="' . $row['G_ID'] . '">';
            echo '<button type="submit" name="select_gpu">Select</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

?>
