<?php
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT MB_ID, MB_name, MB_Manufacturer, MB_price, MB_img, MB_active FROM motherboard";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>Motherboards</h1>"; // If no motherboards are found, display a message
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=Motherboard_product_details&id=' . $row['MB_ID'] . '">';
            echo "<img src=" . $row['MB_img'] . " alt='Motherboard Image'>";
            echo '<h2>' . $row['MB_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['MB_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['MB_price'] . '</p>';
            // Add a form with a hidden input to submit the selected Motherboard ID to 'newpc'
            echo '<form action="php/addpc_motherboard.php" method="POST">';
            echo '<input type="hidden" name="selected_motherboard" value="' . $row['MB_ID'] . '">';
            echo '<button type="submit" name="select_motherboard">Select</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
