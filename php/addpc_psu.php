<?php
session_start(); // Start the session to use session variables

// Ensure the user is allowed to perform the action
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

// Check if the form was submitted
if (isset($_POST['select_psu'])) {
    require_once('../db/connection.php'); // Include your database connection script

    $selectedPsuID = $_POST['selected_psu']; // Get the selected PSU ID from the form
    $userId = $_SESSION['userid']; // Get the user's ID from the session

    try {
        // First, check if there's already a record for the user
        $checkQuery = "SELECT NP_ID FROM newpc WHERE U_ID = :userId AND basket = 'No' AND history = 'No'";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $checkStmt->execute();
        $existingRecord = $checkStmt->fetch();

        if ($existingRecord) {
            // If a record exists, update it with the selected PSU ID
            $updateQuery = "UPDATE newpc SET P_ID = :selectedPsuID WHERE NP_ID = :npId";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bindParam(':selectedPsuID', $selectedPsuID, PDO::PARAM_INT);
            $updateStmt->bindParam(':npId', $existingRecord['NP_ID'], PDO::PARAM_INT);
            $updateStmt->execute();
        } else {
            // If no record exists, insert a new one
            $insertQuery = "INSERT INTO newpc (U_ID, P_ID, basket, history) VALUES (:userId, :selectedPsuID, 'No', 'No')";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $insertStmt->bindParam(':selectedPsuID', $selectedPsuID, PDO::PARAM_INT);
            $insertStmt->execute();
        }

        // Redirect to the new PC order page
        header("Location: ../index.php?page=ordernewpc");
        exit();

    } catch (PDOException $e) {
        // Catch and display any database-related errors
        echo "Database error: " . $e->getMessage();
        exit;
    }
} else {
    // If the form hasn't been submitted, redirect back to the PSU selection page
    header("Location: ../index.php?page=psu");
    exit();
}
?>
