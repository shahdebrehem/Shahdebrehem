<?php
include 'start.php';

if(isset($_POST['delete'])){
    $id = intval($_POST['id']);

    $check = $conn->query("SELECT * FROM tab_api WHERE id=$id");

    if($check && $check->num_rows > 0){
        $delete = $conn->query("DELETE FROM tab_api WHERE id=$id");
        if($delete){
            $message = "✅ User with ID $id has been deleted successfully.";
        } else {
            $message = "❌ Failed to delete user with ID $id.";
        }
    } else {
        $message = "⚠ No user found with ID $id.";
    }
} else {
    header("Location: view_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete User Message</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; text-align: center;}
        .modal {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center;
        }
        .modal-content {
            background: #fff3cd; color: #856404; padding: 20px 30px;
            border-radius: 8px; box-shadow: 0 0 10px #333; text-align: center;
        }
        .modal-content button {
            margin-top: 15px; padding: 8px 20px; background: #007BFF; color: #fff;
            border: none; border-radius: 6px; cursor: pointer;
        }
    </style>
</head>
<body>

<div class="modal" id="msgModal">
    <div class="modal-content">
        <h3><?php echo $message; ?></h3>
        <button onclick="closeModal()">Cancel</button>
    </div>
</div>

<script>
function closeModal(){
    window.location.href = "view_page.php";
}
</script>

</body>
</html>