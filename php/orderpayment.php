<?php
require_once '../db/connection.php';
if (isset($_POST['payment_method'])) {
    $selectedPaymentMethod = $_POST['payment_method'];
    $id = $_POST['id'];

    $query = "UPDATE newpc SET basket = 'No', ordertime = NOW() WHERE NP_ID = $id";

    if ($selectedPaymentMethod === 'ideal' || $selectedPaymentMethod === 'paypal') {
        try {
            $query = "UPDATE newpc SET basket = 'No', ordertime = NOW() WHERE NP_ID = :id";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: ../index.php?page=ordercompleted&id=$id");
            } else {
                echo "Error executing query.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    } else {
        echo "Invalid payment method selected.";
    }
} else {
    echo "Please select a payment method.";
}
?>
