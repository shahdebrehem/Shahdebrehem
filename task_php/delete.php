<?php
include 'config.php';

// Check if 'id' exists in URL parameters
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if ID exists in database
    $check = "SELECT * FROM tab_api WHERE id = $id";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        // If found → delete it
        $sql = "DELETE FROM tab_api WHERE id = $id";

        if ($conn->query($sql)) {
            echo "User with ID $id deleted successfully.";
        } else {
            echo "Failed to delete user.";
        }
    } else {
        echo "No user found with ID $id.";
    }
} else {
    echo "Please enter 'id' in the URL.";
}
?>