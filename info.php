<?php 

	include('config/db_connect.php');

	// check GET request id param
	if(isset($_GET['pokedex_number'])){
		
		// escape sql chars
		$pokedex_number = mysqli_real_escape_string($conn, $_GET['pokedex_number']);

		// make sql
		$sql = "SELECT * FROM pokemon WHERE pokedex_number = '$pokedex_number'";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$pokemon = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&display=swap" rel="stylesheet">	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>

	<?php include('templates/header.php'); ?>

	<div class="container center">
	<!-- if pokemon exisits prints the data below -->
		<?php if($pokemon): ?>
		<!-- Name displays the name in html and the php code will find the name in the pokemon name -->
			<p class='paragraph'> <b><u>Name : <?php echo $pokemon['name']; ?></u></b></h4> </p>
			<div class = "col-md-4">

				<a href = "wishlist.php?id=<?php echo $_GET['id']?>" class="btn btn-default btn-xs pull-left"><i class="fa fa-heart" aria-hidden="true"></i>wishlist</a>
			
			</div>
			<h4><img src="legendary/<?php echo htmlspecialchars($pokemon['type1']); ?>.png"style="width:100px;height:140px;"><img src="legendary/<?php echo htmlspecialchars($pokemon['type2']); ?>.png"style="width:100px;height:140px;"></h4> 
			<h4><img src="images/<?php echo htmlspecialchars($pokemon['name']); ?>.png"style="width:700px;height:700px;"></h4>
			<img src="images/<?php echo htmlspecialchars($pokemon['generation']); ?>.png"style="width:850px;height:150px;">
			
			<p class='paragraph2'>Pokedex Number : <?php echo $pokemon['pokedex_number']; ?> </p>
			<p class='paragraph2'>Health Points<img src="legendary/health.png"style="width:40px;height:40px;"> : <?php echo $pokemon['hp']; ?> </p>
			<p class='paragraph2'>Speed <img src="legendary/speed.png"style="width:40px;height:40px;">: <?php echo $pokemon['speed']; ?></p>
			<p class='paragraph2'>Attack<img src="legendary/attack.png"style="width:40px;height:40px;"> : <?php echo $pokemon['attack']; ?></p>
			<p class='paragraph2'>Defense<img src="legendary/defense.png"style="width:40px;height:40px;"> : <?php echo $pokemon['defense']; ?></p>
			<p class='paragraph2'>Height (m)<img src="legendary/height.png"style="width:40px;height:40px;"> : <?php echo $pokemon['height_m']; ?></p>
			<p class='paragraph2'>Abilities <img src="legendary/abilities.png"style="width:40px;height:40px;"> : <?php echo $pokemon['abilities']; ?></p>
			<p class='paragraph2'>Percentage Male<img src="legendary/percent.png"style="width:40px;height:40px;"> : <?php echo $pokemon['percentage_male']; ?></p>
			<p class='paragraph2'>Special Attack<img src="legendary/specialattack.png"style="width:40px;height:40px;"> : <?php echo $pokemon['sp_attack']; ?></p>
			<p class='paragraph2'>Special Defense<img src="legendary/specialdefense.png"style="width:40px;height:40px;"> : <?php echo $pokemon['sp_defense']; ?></p>
			<p class='paragraph2'>Weight (kg)<img src="legendary/weight.png"style="width:40px;height:40px;"> : <?php echo $pokemon['weight_kg']; ?></p>
			<h4> <img src="legendary/<?php echo htmlspecialchars($pokemon['is_legendary']); ?>.png"style="width:750px;height:250px;"></h4>		
			<a class="paragraph" href="fight.php?pokedex_number=<?php echo $pokemon['pokedex_number'] ?>"> <p class='paragraph4'>FIGHT!</p></a> 

			<!-- ADD IN THE REMAINING DATA YOU WISH TO DISPLAY -->
			
		<?php else: ?>
			<h5>No such pokemon exists.</h5>
			<img src="legendary/skull.png"style="width:400px;height:400px;">
		<?php endif ?>
	</div>


	<body>
		<a href="http://localhost/Pokedex/pokemon.php" target="_blank">	
		<button
			style="
				background-color:#00BAFF;
				color: rgb(255, 255, 255);
				border-radius: 8px;
				height: 50px;
				width: 200px;
				font-size: 18px;
				font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
				margin-top: 2050px;
    			margin-left: 0px;
    			position:absolute;
     			top:0;
     			left:0;

				"
		
		
		>Home</button>
	</body>
	<?php include('templates/footer.php'); ?>

</html>