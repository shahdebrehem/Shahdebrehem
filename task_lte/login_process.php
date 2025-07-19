<?php
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

    if ($user && password_verify($pass, $user['password'])) {
        session_start();
        $_SESSION['user'] = [
            'Id' => $user['Id'],
            'user_name' => $user['user_name'],
            'role_id' => $user['role_id'] // 🆕 خزنا الدور في السيشن
        ];

        // 🧠 التوجيه بناءً على قيمة role_id
        switch ($user['role_id']) {
            case 3:
                header("Location: project-edit.php");
                break;
            case 2:
                header("Location: project-add.php");
                break;
            case 4:
                header("Location: index.php");
                break;
            default:
                header("Location: register.php"); // صفحة عامة أو افتراضية
                break;
        }

        exit();
    } else {
        $errorMessage = "Incorrect Username or Password";

        echo '
        <form id="redirectForm" method="post" action="login.php">
            <input type="hidden" name="error" value="' . htmlspecialchars($errorMessage) . '">
        </form>
        <script>document.getElementById("redirectForm").submit();</script>
        ';
        exit();
    }
}
?>