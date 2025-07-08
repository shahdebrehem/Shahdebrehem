<?php
include 'config.php';

header("Content-Type: application/json");

$sql = "SELECT * FROM tab_api";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

echo json_encode($users);
?>