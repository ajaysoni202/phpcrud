<?php
include 'db.php';
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:login.php');
	die();
}
$id=mysqli_real_escape_string($conn,$_GET['id']);
if($id ==''){
	header('location:index.php');
	die();
}
mysqli_query($conn,"delete from oops where id ='$id'");
header('location:index.php');
die();

?>