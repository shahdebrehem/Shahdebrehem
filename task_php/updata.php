<?php
include 'config.php';

if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['age'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $age  = $_GET['age'];

    $check = "SELECT * FROM tab_api WHERE id = $id";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        $sql = "UPDATE tab_api SET name='$name', age='$age' WHERE id=$id";

        if ($conn->query($sql)) {
            echo "User with ID $id updated successfully.";
        } else {
            echo "Failed to update user.";
        }
    } else {
        echo "No user found with ID $id.";
    }

} else {
    echo "Please enter 'id', 'name', and 'age' in the URL.";
}
?>