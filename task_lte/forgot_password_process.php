<?php
include("login_start.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $User_Name = $_POST['username'];

    $sql = "SELECT * FROM Data_LTE WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $User_Name);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        session_start();
        $_SESSION['reset_user'] = $User_Name; // نحفظ الاسم لاستخدامه في الصفحة التانية
        header("Location: recover-password.php");
        exit();
    } else {
        session_start();
        $_SESSION['error'] = "No account found with that username.";
        header("Location: forgot-password.php");
        exit();
    }
}
?>