<?php
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT P_ID, P_name, P_Manufacturer, P_price, P_img, P_active FROM psu";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>PSUs</h1>"; // If no PSUs are found, display a message
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=PSU_product_details&id=' . $row['P_ID'] . '">';
            echo "<img src=" . $row['P_img'] . " alt='PSU Image'>";
            echo '<h2>' . $row['P_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['P_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['P_price'] . '</p>';
            // Add a form with a hidden input to submit the selected PSU ID to 'newpc'
            echo '<form action="php/addpc_psu.php" method="POST">';
            echo '<input type="hidden" name="selected_psu" value="' . $row['P_ID'] . '">';
            echo '<button type="submit" name="select_psu">Select</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
