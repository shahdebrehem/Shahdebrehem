<?php
session_start();
include("login_start.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST['first_name']);
    $second_name = trim($_POST['second_name']);
    $pass = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $agreed = isset($_POST['terms']);

    if (!$agreed) {
        $_SESSION['error'] = "You must agree to the terms.";
        header("Location: register.php");
        exit();
    }

    if ($pass !== $confirm) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: register.php");
        exit();
    }

    $full_name = $first_name . ' ' . $second_name;

    $check_sql = "SELECT * FROM Data_LTE WHERE user_name = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $full_name);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $_SESSION['error'] = "This username is already taken.";
        header("Location: register.php");
        exit();
    }

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    $insert_sql = "INSERT INTO Data_LTE (user_name, password) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ss", $full_name, $hashed_pass);

    if ($insert_stmt->execute()) {
        $_SESSION['user'] = [
            'Id' => $conn->insert_id,
            'user_name' => $full_name
        ];
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: register.php");
        exit();
    }
}
?>