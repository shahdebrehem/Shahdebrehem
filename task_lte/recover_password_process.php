<?php
include("login_start.php");
session_start();

if (!isset($_SESSION['reset_user'])) {
    header("Location: forgot-password.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass1 = $_POST['password'];
    $pass2 = $_POST['confirm_password'];

   if ($pass1 !== $pass2) {
    $_SESSION['error'] = "Passwords do not match. Please try again.";
    header("Location: recover-password.php");
    exit();
}

    // تحديث كلمة المرور
    $hashed_pass = password_hash($pass1, PASSWORD_DEFAULT);
    $username = $_SESSION['reset_user'];

    $sql = "UPDATE Data_LTE SET password = ? WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed_pass, $username);
      header("Location: login.php");

    if ($stmt->execute()) {
        // حذف الجلسة المؤقتة
        unset($_SESSION['reset_user']);
        header("Location: login.php");
        exit();
    } else {
        echo "An error occurred while updating the password. Please try again later.";
    }
}
?>