<?php
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT S_ID, S_name, S_Manufacturer, S_price, S_img, S_active FROM storage";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>Storage</h1>"; // If no storage devices are found, display a message
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=Storage_product_details&id=' . $row['S_ID'] . '">';
            echo "<img src=" . $row['S_img'] . " alt='Storage Image'>";
            echo '<h2>' . $row['S_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['S_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['S_price'] . '</p>';
            // Add a form with a hidden input to submit the selected Storage ID to 'newpc'
            echo '<form action="php/addpc_storage.php" method="POST">';
            echo '<input type="hidden" name="selected_storage" value="' . $row['S_ID'] . '">';
            echo '<button type="submit" name="select_storage">Select</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
