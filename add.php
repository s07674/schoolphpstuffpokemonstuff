<?php

	include('config/db_connect.php');

	$uname = $password = '';
	$errors = array('user_name' => '', 'password' => '');

	if(isset($_POST['submit'])){
		

		// check firstName
		if(empty($_POST['user_name'])){
			$errors['user_name'] = 'A username  is required';
		} else{
			$uname = $_POST['user_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $uname)){
				$errors['user_name'] = 'First Name must be letters and spaces only';
			}
		}
		

		// check password
		if(empty($_POST['password'])){
			$errors['password'] = 'An password is required';
		} else{
			$password = $_POST['password'];
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			
			$uname = mysqli_real_escape_string($conn, $_POST['user_name']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			
			// create sql
			$sql = "INSERT INTO users(user_name,password) VALUES('$uname','$password')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

			
		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Create an Account</h4>
		<form class="white" action="add.php" method="POST">
			<label>Your Username</label>
			<input type="text" name="user_name" placeholder="Username" value="<?php echo htmlspecialchars($uname) ?>">
			<div class="red-text"><?php echo $errors['user_name']; ?></div>
			<label>Your Password</label>
			<input type="password" name="password" placeholder= "Password" value="<?php echo htmlspecialchars($password) ?>">
			<div class="red-text"><?php echo $errors['password']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>