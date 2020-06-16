<?php

	require_once "database.php";

	class countrymanager {
		public function getAll() {
			global $con;
			
			$statement = $con->prepare("SELECT * FROM country");
			$statement->execute();
			
			return $statement->fetchAll(PDO::FETCH_OBJ);
		}
	}

?>