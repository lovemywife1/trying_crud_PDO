<?php

	require_once "personmanager.php";
	
	
	$pm = new personmanager();

	if(isset($_GET["id"])) {
		$pm->delete($_GET["id"]);
		header("location: index.php");
	}

	$persons = $pm->getAll();

?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	</head>
	<body>
		<a class="mt-2 mb-2 btn btn-primary" href="insertperson.php">INSERT</a>
	
		<table class="table table-striped">
			<thead class="table-dark">
				<th>Id</th>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Aktief</th>
				<th>Land</th>
				<th></th>
				<th></th>
				<th></th>
			</thead>
			<tbody>	
				<?php
					foreach($persons as $person) {
						echo "<tr>";
						echo "<td>$person->id</td>";
						echo "<td>$person->firstname</td>";
						echo "<td>$person->lastname</td>";
						echo "<td>$person->is_active</td>";
						echo "<td>$person->country</td>";
						
						echo "<td><a href='persongame.php?id=$person->id'>Games</a></td>";
						
						echo "<td><a href='index.php?id=$person->id'>Delete</a></td>";
						
						echo "<td><a href='editperson.php?id=$person->id'>Edit</a></td>";
						echo "</tr>";
					}
				
				?>
			</tbody>
		</table>
	</body>
</html>