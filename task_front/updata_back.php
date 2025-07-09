<?php
include 'start.php';

if(isset($_POST['update'])){
    $id   = intval($_POST['id']);
    $name = $_POST['name'];
    $age  = $_POST['age'];

    $sql = "UPDATE tab_api SET name='$name', age='$age' WHERE id=$id";

    if($conn->query($sql)){
        // تم التعديل بنجاح — يرجع للعرض
        header("Location: view_page.php");
        exit();
    } else {
        echo "<h3 style='color:red'>❌ Failed to update user.</h3>";
        echo "<a href='view_page.php'>↩ Back</a>";
    }
} else {
    header("Location: view_page.php");
    exit();
}
?>