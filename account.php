<?php
	include('config/db_connect.php');
    session_start();
    include('db_conn.php');
	$fname = $lname = $email = $birthday = '';
	$errors = array('fname' => '', 'lname' => '', 'email' => '', 'birthday' => '', 'user_name' => '');

	if(isset($_POST['submit'])){
		
			$fname = mysqli_real_escape_string($conn, $_POST['fname']);
			$lname = mysqli_real_escape_string($conn, $_POST['lname']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
            $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
            $uname = mysqli_real_escape_string($conn, $_SESSION['user_name']);
			// create sql
			$sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', birthday = '$birthday' WHERE user_name = '$_SESSION[user_name]'";


			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

			
		}
?>

<!DOCTYPE html>
<button onclick="window.location.href = 'pokemon.php';">Pokédex</button>
<button onclick="window.location.href = 'index.php';">Login to another account</button>
<html>
    <head>
        <style>
            button {
                float : left;
                background: #555;
                padding: 10px 15px;
                color: #fff;
                border-radius: 5px;
                margin-right: 10px;
                border: none;
            }
            button:hover{
                opacity: .7;
            }
            
            body {
                background : #1690A7;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container {
                width: 500px;
                clear: both;
            }

            .container input {
                width: 100%;
                clear: both;
            }
            form{
                width: 500px;
                border: 5px solid#ccc;
                align: center;
                padding: 35px;
                background: #fff;
                border-radius: 15px;
                float: inline-end;
            }
            </style>

        <h1 style="color: #Dbdbdc;"> <br><br>Hello, <?php echo $_SESSION['user_name']; ?> how are you today? <br>This is your account page </h1>
        <h1 style="color : #123abc;"><br>Want to add some more details?</h1>
        <div class = "container">    
        
        
        <form action="account.php" method="POST">
                <label>Your First Name</label>
                <input type="text" name="fname" placeholder="First Name" value="<?php echo htmlspecialchars($fname) ?>">
                <div class="red-text"><?php echo $errors['fname']; ?></div>
                <label>Your Last Name</label>
                <input type="text" name="lname" placeholder= "Last Name" value="<?php echo htmlspecialchars($lname) ?>">
                <div class="red-text"><?php echo $errors['lname']; ?></div>
                <label>Email</label>
                <input type="text" name="email" placeholder= "Email" value="<?php echo htmlspecialchars($email) ?>">
                <div class="red-text"><?php echo $errors['email']; ?></div>
                <label>Birthday</label>
                <input type="date" name="birthday" value="<?php echo htmlspecialchars($birthday) ?>">
                <div class="red-text"><?php echo $errors['birthday']; ?></div>
                <button type="submit" name="submit" value="Submit" class="btn brand z-depth-0">Submit</button>
                <button type="reset" value="Reset">Reset</button>
		</form>
        </div>


</head>

</html>

