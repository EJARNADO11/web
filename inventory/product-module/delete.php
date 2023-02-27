<?php
include "../config/config.php";

$conn = mysqli_connect('localhost', 'root', '', 'db_wbapp');
$id = $_GET['prod_id'];
$sql = "DELETE FROM tbl_product WHERE prod_id = $id";
$result = mysqli_query($conn, $sql);

if($result){
	echo "Deleted a record successfully";
	header("location: ../index.php?page=products");
}
else {
	echo "Failed";
}
?>