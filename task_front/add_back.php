<?php
include 'start.php';

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $age  = $_POST['age'];

    $sql = "INSERT INTO tab_api (name, age) VALUES ('$name', '$age')";
    if($conn->query($sql)) {
        // لما الإضافة تنجح — يحول على صفحة العرض
        header("Location: view_page.php");
        exit();
    } else {
        echo "Failed to Add.";
        echo "<br><a href='add_form.php'>Back</a>";
    }
}
?>