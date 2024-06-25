<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['Id'];
    $deliveryMethod = $_POST['delivery_method'];
    $termsAccepted = isset($_POST['terms_accept']) && $_POST['terms_accept'] === 'Y';

    // Check if a delivery option is selected and terms are accepted
    if ($termsAccepted) {
        // Redirect to orderpayment.inc with the $id
        header("Location: ../index.php?page=orderpayment&np_id=$id");
    }
}
?>