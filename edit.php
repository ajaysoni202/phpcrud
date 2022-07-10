<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:login.php');
	die();
}
$id=mysqli_real_escape_string($conn,$_GET['id']);
if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$phone=mysqli_real_escape_string($conn,$_POST['phone']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$address=mysqli_real_escape_string($conn,$_POST['address']);

	mysqli_query($conn,"update oops set name='$name',phone='$phone',email='$email',address='$address' where id='$id'");
	header('location:index.php');
	die();
}

$res=mysqli_query($conn,"select * from oops where id ='$id'");

if(mysqli_num_rows($res)==0){
	header('location:index.php');
	die();
}
$row=mysqli_fetch_assoc($res);
	$name=mysqli_real_escape_string($conn,$row['name']);
	$phone=mysqli_real_escape_string($conn,$row['phone']);
	$email=mysqli_real_escape_string($conn,$row['email']);
	$address=mysqli_real_escape_string($conn,$row['address']);
?>
<a href="logout.php">Logout</a> <br> <br>
<form method="post">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="textbox" name="name" value="<?php echo $name; ?>"/></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="textbox" name="phone" value="<?php echo $phone; ?>"/></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" value="<?php echo $email; ?>"/></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="textbox" name="address" value="<?php echo $address; ?>"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit"/></td>
		</tr>
	</table>
</form> 