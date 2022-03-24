<?php 
require_once "dbconnect.php";
require_once "header.php";
$id = $_SESSION['userid'];
$sql = "SELECT * FROM user WHERE user_id= '$id'";
$query = querySQL($sql);
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>User Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<section class="user">
		<div class="user_info">
			<h2>User ID: <?= $row['user_id'] ?></h2>
			<h2>Full Name: <?= $row['fullname'] ?></h2>
			<h2>User Email: <?= $row['email'] ?></h2>
			<a class="userButton" href="profile.php?edit=<?php echo $row['user_id'];?>">Edit</a>
		</div>
		<?php 
		if(isset($_GET['edit'])){
			if($_GET['edit']==$_SESSION['userid']){
				echo	'<form method="POST" class="userUpdate">
						<input type="text" class="input-field" name="fullname" placeholder="Full name">
						<input type="email" class="input-field" name="email" placeholder="Email" >
						<button class="updateSubmit" type="submit" name ="update">Update</button>
						<a class="userButton" href="./profile.php">Cancel</a></form>';
			}
		}
		if(isset($_POST['update'])){
			$id = $_SESSION['userid'];
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$sql2="UPDATE user SET fullname = '$fullname', email ='$email' WHERE user_id = '$id';";
			$query2=querySQL($sql2);
			header("location:./profile.php");
		}
		 ?>
	</section>
</body>
</html>
