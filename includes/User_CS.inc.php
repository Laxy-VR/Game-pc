<?php
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT CS_ID, CS_name, CS_Manufacturer, CS_price, CS_img, CS_active FROM `pc_case`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        echo "<h1>Cases</h1>"; // If no cases are found, display a message
    } else {
        echo '<div class="product-list">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product">';
            echo '<a href="/gamepc/index.php?page=Case_product_details&id=' . $row['CS_ID'] . '">';
            echo "<img src=" . $row['CS_img'] . " alt='PC Case Image'>";
            echo '<h2>' . $row['CS_name'] . '</h2>';
            echo '<p>Manufacturer: ' . $row['CS_Manufacturer'] . '</p>';
            echo '<p>Price: €' . $row['CS_price'] . '</p>';
            // Add a form with a hidden input to submit the selected Case ID to 'newpc'
            echo '<form action="php/addpc_case.php" method="POST">';
            echo '<input type="hidden" name="selected_case" value="' . $row['CS_ID'] . '">';
            echo '<button type="submit" name="select_case">Select</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
