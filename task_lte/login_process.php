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
            'user_name' => $user['user_name']
        ];
        header("Location: index.php");
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