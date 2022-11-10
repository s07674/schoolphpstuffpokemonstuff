<?php 

	include('config/db_connect.php');
    if(isset($_POST['submit'])) {
        $pokemonNumber = $_POST['pokemonChosen'];
    
    $pokedex_number = $pokemonNumber;



	// write query for all users
	$sql = "SELECT * FROM `pokemon` WHERE pokedex_number = '$pokedex_number'";

    $result = mysqli_query($conn, $sql);

    $chosenpokemon = mysqli_fetch_assoc($result);
    
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
	<!-- if chosenpokemon exisits prints the data below -->
		<?php if($chosenpokemon): ?>
		<!-- Name displays the name in html and the php code will find the name in the chosenpokemon name -->
			<p class='paragraph'> <b><u>Name : <?php echo $chosenpokemon['name']; ?></u></b></h4> </p>
			<div class = "col-md-4">

			
			</div>
			<h4><img src="legendary/<?php echo htmlspecialchars($chosenpokemon['type1']); ?>.png"style="width:100px;height:140px;"><img src="legendary/<?php echo htmlspecialchars($chosenpokemon['type2']); ?>.png"style="width:100px;height:140px;"></h4> 
			<h4><img src="images/<?php echo htmlspecialchars($chosenpokemon['name']); ?>.png"style="width:700px;height:700px;"></h4>
			<img src="images/<?php echo htmlspecialchars($chosenpokemon['generation']); ?>.png"style="width:850px;height:150px;">
			
			<p class='paragraph2'>Pokedex Number : <?php echo $chosenpokemon['pokedex_number']; ?> </p>
			<p class='paragraph2'>Health Points<img src="legendary/health.png"style="width:40px;height:40px;"> : <?php echo $chosenpokemon['hp']; ?> </p>
			<p class='paragraph2'>Speed <img src="legendary/speed.png"style="width:40px;height:40px;">: <?php echo $chosenpokemon['speed']; ?></p>
			<p class='paragraph2'>Attack<img src="legendary/attack.png"style="width:40px;height:40px;"> : <?php echo $chosenpokemon['attack']; ?></p>
			<p class='paragraph2'>Defense<img src="legendary/defense.png"style="width:40px;height:40px;"> : <?php echo $chosenpokemon['defense']; ?></p>
			<p class='paragraph2'>Abilities <img src="legendary/abilities.png"style="width:40px;height:40px;"> : <?php echo $chosenpokemon['abilities']; ?></p>
			<p class='paragraph2'>Special Attack<img src="legendary/specialattack.png"style="width:40px;height:40px;"> : <?php echo $chosenpokemon['sp_attack']; ?></p>
			<p class='paragraph2'>Special Defense<img src="legendary/specialdefense.png"style="width:40px;height:40px;"> : <?php echo $chosenpokemon['sp_defense']; ?></p>
			<h4> <img src="legendary/<?php echo htmlspecialchars($chosenpokemon['is_legendary']); ?>.png"style="width:750px;height:250px;"></h4>		
			<a class="paragraph" href="fight.php?pokedex_number=<?php echo $chosenpokemon['pokedex_number'] ?>"> <p class='paragraph4'>FIGHT!</p></a> 

			<!-- ADD IN THE REMAINING DATA YOU WISH TO DISPLAY -->
			
		<?php else: ?>
			<h5>No such chosenpokemon exists.</h5>
			<img src="legendary/skull.png"style="width:400px;height:400px;">
		<?php endif ?>
	</div>


	<body>
		<a href="http://localhost/Pokedex/chosenpokemon.php" target="_blank">	
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