<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:login.php');
	die();
}
if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$phone=mysqli_real_escape_string($conn,$_POST['phone']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$address=mysqli_real_escape_string($conn,$_POST['address']);

	mysqli_query($conn,"insert into oops(name,email,phone,address) values('$name','$email','$phone','$address')");
	header('location:index.php');
	die();
}
?>

<a href="logout.php">Logout</a> <br> <br>
<form method="post">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="textbox" name="name"/></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="textbox" name="phone"/></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email"/></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="textbox" name="address"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit"/></td>
		</tr>
	</table>
</form>