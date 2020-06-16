<?php
	
	require_once "personmanager.php";
	require_once "countrymanager.php";
	
	$cm = new countrymanager();
	$countries = $cm->getAll();
	
	if($_POST) {
		$pm = new personmanager();
		$pm->insert($_POST["firstname"], $_POST["lastname"], isset($_POST["isactive"]) ? 1 : 0, $_POST["countryid"]);
		
		header("location: index.php");
	}
	
?>

<html>
	<body>	
		<form method="post">
			Voornaam: <input type="text" name="firstname" /><br/>
			Achternaam: <input type="text" name="lastname" /><br/>
			Is active <input type="checkbox" name="isactive" value="XXX" /><br/>
			Land: <select name="countryid">
				<?php
					foreach($countries as $country) {
						echo "<option value='$country->id'>$country->name</option>";
					}
				
				?>
			
			</select><br/>
			<input type="submit" value="VERSTUREN">
		</form>
	</body>

</html>
