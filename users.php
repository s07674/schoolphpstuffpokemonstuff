<?php 

	include('config/db_connect.php');

	// write query for all users
	$sql = 'SELECT firstName, lastName, id FROM users ORDER BY date_Created';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Users!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($user as $user): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($user['id']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $user['firstName'].' '.$user['lastName']) as $name): ?>
									<li><?php echo htmlspecialchars($name); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="#">more info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>