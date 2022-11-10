<?php 

	include('config/db_connect.php');
	session_start();
	// write query for all users
	$sql = 'SELECT * FROM `pokemon`;';




	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$pokemon = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>

	
	<?php include('templates/header.php'); ?>
<head>
	<style>
		h1 {
			text-decoration-line: underline;
    		text-decoration-color: #777;
			text-decoration-style: solid;
			
		}
		form{
		width: 500px;
		border: 2px solid#ccc;
		padding: 30px;
		background: #fff;
		border-radius: 15px;
		}
		input {
		display: block;
		border: 2px solid #ccc;
		width: 95%;
		padding: 10px;
		margin: 10px auto;
		}
		label {
		color: #888;
		font-size: large;
		padding: 10px;
		}


	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
	<div class="container">
		<div class="row">
<form name = "pokedexnumber" action="search.php" method="post">
	<label> Pokedex number of the pokemon you want: <input type="text" name="pokemonChosen"/></label>
	<label><input type="submit" name="submit" value="Find Pokemon"></label>

</form>
	<a style="color: #777;"  href="account.php"><h1>Hello, <?php echo $_SESSION['user_name']; ?> </h1></a><br>

			<?php foreach($pokemon as $pokemon): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<!-- The following will show the name and image -->
							<h6>Name: <?php echo htmlspecialchars($pokemon['name']); ?></h6>
							<img src="images/<?php echo htmlspecialchars($pokemon['name']); ?>.png"style="width:300px;height:300px;">
							<!-- Add in the additional information here -->
							<p class="paragraph3">Pokedex Number : <?php echo $pokemon['pokedex_number']; ?> </p>
							<img src="images/<?php echo htmlspecialchars($pokemon['generation']); ?>.png"style="width:250px;height:50px;">		

						</div>
						<div class="card-action right-align">
							<b> <a class="brand-text" href="info.php?pokedex_number=<?php echo $pokemon['pokedex_number'] ?>"
							style = 'color:#00BAFF' >more info</a> </b>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>