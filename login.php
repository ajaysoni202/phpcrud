<?php 
include('db.php');
if(isset($_POST['submit'])){
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	$result=mysqli_query($conn,"select * from user where username='$username' and password='$password'");
	if(mysqli_num_rows($result)>0){
		$_SESSION['IS_LOGIN']='yes';
		header('location:index.php');
		die();
	}else{
		echo "Please Enter Valid Credintial";
	}
}
?>
<form method="post">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="textbox" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>

