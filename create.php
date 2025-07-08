<?php
include 'config.php';

if(isset($_GET['name']) && isset($_GET['age'])) {
    $name = $_GET['name'];
    $age  = $_GET['age'];

    $sql = "INSERT INTO tab_api (name, age) VALUES ('$name', '$age')";

    if($conn->query($sql)) {
        echo "User added successfully.";
    } else {
        echo "Failed to add user.";
    }
} else {
    echo "Please provide 'name' and 'age' parameters in the URL.";
}
?>