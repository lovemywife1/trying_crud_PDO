<?php

	require_once "database.php";

	class personmanager {
		public function getById($id) {
			global $con;
			
			$statement = $con->prepare("SELECT * FROM person WHERE id= ?");
			
			$statement->bindValue(1, $id);
			$statement->execute();
			
			return $statement->fetchObject();
		}
		
		public function getAll() {
			global $con;
			
			$statement = $con->prepare("SELECT person.id, person.firstname, person.lastname, person.is_active, country.name AS country FROM person LEFT JOIN country ON person.country_id = country.id");
			
			$statement->execute();
			
			return $statement->fetchAll(PDO::FETCH_OBJ);
		}
		
		public function insert($firstname, $lastname, $isactive, $country_id) {
			global $con;
			
			$statement = $con->prepare("INSERT INTO person(firstname, lastname, is_active, country_id) VALUES(?, ?, ?, ?)");
			
			$statement->bindValue(1, $firstname);
			$statement->bindValue(2, $lastname);
			$statement->bindValue(3, $isactive);
			$statement->bindValue(4, $country_id);
			
			$statement->execute();
		}
		
		public function delete($id) {
			global $con;
			
			$statement = $con->prepare("DELETE FROM person WHERE id = ?");
			$statement->bindValue(1, $id);
			
			$statement->execute();
		}
		
		public function update($firstname, $lastname, $isactive, $country_id, $id) {
			global $con;
			
			$statement = $con->prepare("UPDATE person SET firstname=?, lastname=?, is_active=?, country_id=? WHERE id=?");
			
			$statement->bindValue(1, $firstname);
			$statement->bindValue(2, $lastname);
			$statement->bindValue(3, $isactive);
			$statement->bindValue(4, $country_id);
			$statement->bindValue(5, $id);
			
			$statement->execute();
		}
	}
	

?>