<?php
// Include the database connection file
require_once('db/connection.php');

// Assuming you have a valid database connection, retrieve order details
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $np_id = $_GET['id'];
    // Query the database to retrieve more order information
    $query = "SELECT * FROM newpc WHERE NP_ID = $np_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Order confirmation ?></title>
        <link rel="stylesheet" type="text/css" href="ordercompleted.css">
    </head>
    <body>
    <h1 class="page-title">Order confirmation </h1>

    <p class="shipping-time">Estimated Shipping Time: 1-3 business days.</p>

    <!-- Button to view order details -->
    <a href="/gamepc/index.php?page=orderhistory_details&id=<?php echo $np_id; ?>" class="details-button">View Order Details</a>
    </body>
    </html>

    <?php
} else {
    // Handle the case where NP_ID is not provided or invalid
    echo "Invalid or missing order ID.";
}
?>
