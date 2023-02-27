<?php
include "../config/config.php";

$conn = mysqli_connect('localhost', 'root', '', 'db_wbapp');
$id = $_GET['user_id'];
$sql = "DELETE FROM tbl_users WHERE user_id = $id";
$result = mysqli_query($conn, $sql);

if($result){
	echo "Deleted a record successfully";
	header("location: ../main.php?page=settings");
}
else {
	echo "Failed";
}
?>