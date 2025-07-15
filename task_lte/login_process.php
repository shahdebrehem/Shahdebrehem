<?php
session_start();
include("login_start.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $User_Name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM Data_LTE WHERE user_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $User_Name);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $pass === $user['password']) {
        $_SESSION['username'] = $User_Name;
        header("Location:index.php");
        exit();
    } else {
        $_SESSION['error'] = "Incorrect password or username";
        header("Location: login.php");
        exit();
    }
}
?>