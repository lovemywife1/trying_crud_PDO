<?php
	
	require_once "personmanager.php";
	require_once "countrymanager.php";
	
	$cm = new countrymanager();
	$countries = $cm->getAll();
	
	$pm = new personmanager();
	
	$person = $pm->getById($_GET["id"]);
	var_dump($person);
	
	if($_POST) {
		$pm = new personmanager();
		$pm->update($_POST["firstname"], $_POST["lastname"], isset($_POST["isactive"]) ? 1 : 0, $_POST["countryid"], $_GET["id"]);
		
		header("location: index.php");
	}
	
?>

<html>
	<body>	
		<form method="post">
			Voornaam: <input type="text" name="firstname" value="<?php echo $person->firstname; ?>" /><br/>
			Achternaam: <input type="text" name="lastname" value="<?php echo $person->lastname; ?>" /><br/>
			Is active <input <?php echo $person->is_active == 1 ? " checked ": ""; ?> type="checkbox" name="isactive"  value="XXX" /><br/>
			Land: <select name="countryid">
				<?php
					foreach($countries as $country) {
						if($person->country_id == $country->id) {
							echo "<option selected value='$country->id'>$country->name</option>";
						}
						else {
							echo "<option value='$country->id'>$country->name</option>";
						}
					}
				
				?>
			
			</select><br/>
			<input type="submit" value="VERSTUREN">
		</form>
	</body>

</html>
