<?php
if ($_SESSION['role'] !== 'user') {
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
            // Add a form with a hidden input to submit the selected CPU ID to 'newpc'
            echo '<form action="php/addpc_cpu.php" method="POST">';
            echo '<input type="hidden" name="selected_cpu" value="' . $row['C_ID'] . '">';
            echo '<button type="submit" name="select_cpu">Select</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();

}
