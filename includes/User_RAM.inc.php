<?php
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT R_ID, R_name, R_Manufacturer, R_price, R_img, R_active FROM ram";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>RAM</h1>"; // If no RAM modules are found, display a message
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=RAM_product_details&id=' . $row['R_ID'] . '">';
            echo "<img src=" . $row['R_img'] . " alt='RAM Image'>";
            echo '<h2>' . $row['R_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['R_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['R_price'] . '</p>';
            // Add a form with a hidden input to submit the selected RAM ID to 'newpc'
            echo '<form action="php/addpc_ram.php" method="POST">';
            echo '<input type="hidden" name="selected_ram" value="' . $row['R_ID'] . '">';
            echo '<button type="submit" name="select_ram">Select</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
