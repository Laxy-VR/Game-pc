<?php
// Include your database connection file here
require_once '../db/connection.php';
session_start();
$userid = $_SESSION['userid'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve part IDs and user ID (set to 1 for testing)
    $C_ID = $_POST["C_ID"] ?? 1;
    $CC_ID = $_POST["CC_ID"] ?? random_int(1, 4);
    $G_ID = $_POST["G_ID"] ?? random_int(1, 4);
    $MB_ID = $_POST["MB_ID"] ?? random_int(3, 4);
    $CS_ID = $_POST["CS_ID"] ?? random_int(1, 4);
    $P_ID = $_POST["P_ID"] ?? 1;
    $R_ID = $_POST["R_ID"] ?? 1;
    $S_ID = $_POST["S_ID"] ?? 1;
    $NP_price = $_POST["NP_price"] ?? 1;
    $basket = $_POST["basket"] ?? 'Yes'; // Default to 'No'
    $history = $_POST["history"] ?? 'No'; // Default to 'No'
    $U_ID = $userid;
    $currentTime = date("H:i d-m-Y");

    // Prepare SQL statement
    $sql = "INSERT INTO newpc (
        C_ID, CC_ID, G_ID, MB_ID, CS_ID, P_ID, R_ID, S_ID, NP_price, basket, history, U_ID, ordertime) 
VALUES (:C_ID, :CC_ID, :G_ID, :MB_ID, :CS_ID, :P_ID, :R_ID, :S_ID, :NP_price, :basket, :history, :U_ID, :ordertime)";

    try {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':C_ID', $C_ID);
        $stmt->bindParam(':CC_ID', $CC_ID);
        $stmt->bindParam(':G_ID', $G_ID);
        $stmt->bindParam(':MB_ID', $MB_ID);
        $stmt->bindParam(':CS_ID', $CS_ID);
        $stmt->bindParam(':P_ID', $P_ID);
        $stmt->bindParam(':R_ID', $R_ID);
        $stmt->bindParam(':S_ID', $S_ID);
        $stmt->bindParam(':NP_price', $NP_price);
        $stmt->bindParam(':basket', $basket);
        $stmt->bindParam(':history', $history);
        $stmt->bindParam(':U_ID', $U_ID);
        $stmt->bindParam(':ordertime', $currentTime);

        // Execute the statement
        if ($stmt->execute()) {
            // After inserting the new record, you can fetch the latest NP_ID
            $id = $conn->lastInsertId();

            // PC added successfully, you can redirect to a confirmation page if needed
            header("Location: ../index.php?page=orderconfirmation&np_id=$id");
            // exit();
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
