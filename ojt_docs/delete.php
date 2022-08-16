<?php 
include 'connection.php';

if (isset($_GET['deleteId'])) {
	$id = $_GET['deleteId'];

	$mySql = "DELETE FROM `tb_docs` WHERE id=$id";
	$result = mysqli_query($conn, $mySql);

	if($result){
		header('location:index.php');
	} else {
		die(mysqli_error($conn));
	}
}



 ?>