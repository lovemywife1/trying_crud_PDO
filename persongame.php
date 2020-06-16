<?php
	
	require_once "persongamemanager.php";
	
	$manager = new persongamemanager();
	// Maak een variabele van personid, maakt het makkelijker om in de linkjes te gebruiken
	$personid = $_GET["id"];
	
	// Check of een verwijder link is aangeklikt
	if(isset($_GET["koppelid"])) {
		$manager->delete($_GET["koppelid"]);
		
		header("location:persongame.php?id=$personid");
	}
	
	// Check of een toevoeg link is aangeklikt
	if(isset($_GET["gameid"])) {
		$manager->insert($_GET["gameid"], $_GET["id"]);
		
		header("location:persongame.php?id=$personid");
	}
	
	// Haal de huidge stand van zaken op uit de database
	$persongames = $manager->getPersonGames($_GET["id"]);
	$remainingGames = $manager->getRemainingGames($_GET["id"]);
	
?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	</head>
	<body>
		<h2>Games van persoon:</h2>
		<table class="table table-striped">
			<thead class="table-dark">
				<th>Id</th>
				<th>Naam</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					foreach($persongames as $persongame) {
						echo "<tr>";
						echo "<td>$persongame->gameid</td>";
						echo "<td>$persongame->gamename</td>";
						echo "<td><a href='persongame.php?id=$personid&koppelid=$persongame->koppelid' class='btn btn-danger'>x</a></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		
		<h2>Overige games:</h2>
		<table class="table table-striped">
			<thead class="table-dark">
				<th>Id</th>
				<th>Naam</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					foreach($remainingGames as $game) {
						echo "<tr>";
						echo "<td>$game->id</td>";
						echo "<td>$game->name</td>";
						echo "<td><a href='persongame.php?id=$personid&gameid=$game->id' class='btn btn-primary'>+</a></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		
	</body>
</html>