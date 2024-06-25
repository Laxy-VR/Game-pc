<?php
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT CC_ID, CC_name, CC_Manufacturer, CC_price, CC_img, CC_active FROM cpu_cooler";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>CPU Coolers</h1>";
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=CPU_cooler_product_details&id=' . $row['CC_ID'] . '">';
            echo "<img src=" . $row['CC_img'] . ">";
            echo '<h2>' . $row['CC_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['CC_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['CC_price'] . '</p>';
            // Add a form with a hidden input to submit the selected CPU cooler ID to 'newpc'
            echo '<form action="php/addpc_cpu_cooler.php" method="POST">';
            echo '<input type="hidden" name="selected_cpu_cooler" value="' . $row['CC_ID'] . '">';
            echo '<button type="submit" name="select_cpu_cooler">Select</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

?>
