<?php
session_start();
include("login_start.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST['first_name']);
    $second_name = trim($_POST['second_name']);
    $pass = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $agreed = isset($_POST['terms']);
    $role_name = $_POST['role'];

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

    $role_sql = "SELECT id_role FROM tab_role WHERE name_role = ?";
    $role_stmt = $conn->prepare($role_sql);
    $role_stmt->bind_param("s", $role_name);
    $role_stmt->execute();
    $role_result = $role_stmt->get_result();

    if ($role_result->num_rows == 0) {
        $_SESSION['error'] = "Invalid role selected.";
        header("Location: register.php");
        exit();
    }

    $role_row = $role_result->fetch_assoc();
    $role_id = $role_row['id_role'];
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    $insert_sql = "INSERT INTO Data_LTE (user_name, password, role_id) VALUES (?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ssi", $full_name, $hashed_pass, $role_id);

    if ($insert_stmt->execute()) {
        $_SESSION['user'] = [
            'Id' => $conn->insert_id,
            'user_name' => $full_name,
            'role_id' => $role_id
        ];

        // ✅ توجيه حسب الدور
        switch ($role_id) {
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
                header("Location:register.php");
                break;
        }
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: register.php");
        exit();
    }
}
?>