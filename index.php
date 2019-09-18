<?php  include('server.php');

if (isset($_GET['update'])) {
	$id = $_GET['update'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM user_table WHERE id=$id");
	$n = mysqli_fetch_array($record);
	$name = $n['name'];
	$surname = $n['surname'];
	$email = $n['email'];
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hw1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Email</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>

		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['surname']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td>
					<a href="index.php?update=<?php echo $row['id']; ?>" class="edit_btn" >Update</a>
				</td>
				<td>
					<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>

	<form method="post" action="server.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Surname</label>
			<input type="text" name="surname" value="<?php echo $surname; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
		

			
		</div>
	</form>
</body>
</html>