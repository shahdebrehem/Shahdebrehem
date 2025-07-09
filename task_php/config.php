<?php
$host="localhost";
$user_name="root";
$password="";
$db_name="data_api";

$conn=new mysqli($host,$user_name,$password,$db_name);
if($conn->connect_error)
{
    die("Connection Failed :".$conn->connect_error);
}
?>
