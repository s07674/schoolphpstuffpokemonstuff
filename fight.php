<?php 

	include('config/db_connect.php');

	// check GET request id param
	if(isset($_GET['pokedex_number'])){
		
		// escape sql chars
		$pokedex_number = mysqli_real_escape_string($conn, $_GET['pokedex_number']);
		$against = rand(1, 801);


		// make sql
		$sql = "SELECT * FROM pokemon WHERE pokedex_number = '$pokedex_number'";
		$sql2 = "SELECT * FROM pokemon WHERE pokedex_number = '$against'";

		// get the query result
		$result = mysqli_query($conn, $sql);
		$result2 = mysqli_query($conn, $sql2);

		// fetch result in array format
		$pokemon = mysqli_fetch_assoc($result);
		$pokemon2 = mysqli_fetch_assoc($result2);
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_close($conn);
		$against_hp = $pokemon2['hp'];
		$pokemon_hp = $pokemon['hp'];
		$against_attack = $pokemon2['attack'];
		$pokemon_attack = $pokemon['attack'];
		$pokemon_defense = $pokemon['defense'];
		$against_defense = $pokemon2['defense'];



		$against_result = ($against_hp - (($pokemon_attack - ($against_defense/2)))/10);
		$pokemon_result = ($pokemon_hp - (($against_attack - ($pokemon_defense/2)))/10);
		



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
	<table>
  <tr>
    <th><p class='paragraph'> <b><u>Name : <?php echo $pokemon['name']; ?></u></b></h4> </p></th>
    <th><p class='paragraph'> <b><u>Name : <?php echo $pokemon2['name']; ?></u></b></h4> </p></th>
  </tr>
<tr>
	<th><h4><img src="legendary/<?php echo htmlspecialchars($pokemon['type1']); ?>.png"style="width:100px;height:140px;"><img src="legendary/<?php echo htmlspecialchars($pokemon['type2']); ?>.png"style="width:100px;height:140px;"></h4></th>
	<th><h4><img src="legendary/<?php echo htmlspecialchars($pokemon2['type1']); ?>.png"style="width:100px;height:140px;"><img src="legendary/<?php echo htmlspecialchars($pokemon2['type2']); ?>.png"style="width:100px;height:140px;"></h4></th>

</tr>

 <tr>  
	<th><h4><img src="images/<?php echo htmlspecialchars($pokemon['name']); ?>.png"style="width:170px;height:170px;"></h4></th>
	<th><h4><img src="images/<?php echo htmlspecialchars($pokemon2['name']); ?>.png"style="width:170px;height:170px;"></h4></th>

</tr>
  <tr>
    <td><p class='paragraph2'>Pokedex Number : <?php echo $pokemon['pokedex_number']; ?> </p></td>
	<td><p class='paragraph2'>Pokedex Number : <?php echo $pokemon2['pokedex_number']; ?> </p></td>
  </tr>
  <tr>
  	<td><p class='paragraph2'>Health Points<img src="legendary/health.png"style="width:40px;height:40px;"> : <?php echo $pokemon['hp']; ?> </p></td>
	<td><p class='paragraph2'>Health Points<img src="legendary/health.png"style="width:40px;height:40px;"> : <?php echo $pokemon2['hp']; ?> </p></td>

  </tr>
  <tr>
	<td><p class='paragraph2'>Speed <img src="legendary/speed.png"style="width:40px;height:40px;">: <?php echo $pokemon['speed']; ?></p></td>
	<td><p class='paragraph2'>Speed <img src="legendary/speed.png"style="width:40px;height:40px;">: <?php echo $pokemon2['speed']; ?></p></td>
</tr>
	<tr>
	<td><p class='paragraph2'>Attack<img src="legendary/attack.png"style="width:40px;height:40px;"> : <?php echo $pokemon['attack']; ?></p></td>
	<td><p class='paragraph2'>Attack<img src="legendary/attack.png"style="width:40px;height:40px;"> : <?php echo $pokemon2['attack']; ?></p></td>
</tr>
	<tr>
	<td><p class='paragraph2'>Defense<img src="legendary/defense.png"style="width:40px;height:40px;"> : <?php echo $pokemon['defense']; ?></p></td>
	<td><p class='paragraph2'>Defense<img src="legendary/defense.png"style="width:40px;height:40px;"> : <?php echo $pokemon2['defense']; ?></p></td>
</tr>
<tr>
	<td><?php echo $pokemon_result; ?></td>
	<td><?php echo $against_result; ?></td>

</tr>
<tr>
<?php if($pokemon_result > $against_result): ?>	
	
	<td><img src="legendary/winner.png"style="width:180px;height:120px;"></td>
	<td><img src="legendary/loser.png"style="width:240px;height:120px;"></td>
<?php else: ?>
	<td><img src="legendary/loser.png"style="width:240px;height:120px;"></td>
	<td><img src="legendary/winner.png"style="width:180px;height:120px;"></td>
	<?php endif?>
</tr>



</table>



	<!-- if pokemon exisits prints the data below -->
		<?php if($pokemon): ?>
			<?php if($pokemon2): ?>
		<!-- Name displays the name in html and the php code will find the name in the pokemon name -->
		<!-- ADD IN THE REMAINING DATA YOU WISH TO DISPLAY -->
			
		<?php else: ?>
			<h5>No such pokemon exists.</h5>
			<img src="legendary/skull.png"style="width:400px;height:400px;">
		<?php endif ?>
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