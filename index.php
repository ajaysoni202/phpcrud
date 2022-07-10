<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:login.php');
	die();
}
$res=mysqli_query($conn,"select * from oops");
?>
<a href="add.php">Add Record</a> <br> <br>
<a href="logout.php">Logout</a> <br> <br>
<table border ="1">
	<tr>
		<th>S.No</th>
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Address</th>
		<th>Action</th>
	</tr>

	<?php 
	$i=1;
	while($row=mysqli_fetch_assoc($res)){
	?>

	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['phone']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['address']; ?></td>
		<td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> 
			&nbsp; 
			<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
		</td>
	</tr>
	<?php
	$i++;
	}
	?>

</table>