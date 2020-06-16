<?php

	require_once "database.php";

	class persongamemanager {
		public function getPersonGames($aId) {
			$sql = "SELECT
						game.name AS gamename,
						game.id AS gameid,
						person_game.id AS koppelid
					FROM
						person_game
						LEFT JOIN game ON person_game.game_id = game.id
					WHERE
						person_game.person_id = ?";
			
			global $con;
			$stmt = $con->prepare($sql);
			$stmt->bindValue(1, $aId);
			$stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		
		public function getRemainingGames($aId) {
			$sql = "SELECT
						game.name,
						game.id
					FROM
						game
					WHERE
						game.id NOT IN (SELECT game_id FROM person_game WHERE person_id = ?)";
						
			global $con;
			$stmt = $con->prepare($sql);
			$stmt->bindValue(1, $aId);
			$stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		
		public function insert($aGameId, $aPersonId) {
			global $con;
			$stmt = $con->prepare("INSERT INTO person_game(person_id, game_id) VALUES(?, ?)");
			$stmt->bindValue(1, $aPersonId);
			$stmt->bindValue(2, $aGameId);
			$stmt->execute();
		}
		
		public function delete($aId) {
			global $con;
			$stmt = $con->prepare("DELETE FROM person_game WHERE id = ?");
			$stmt->bindValue(1, $aId);
			$stmt->execute();
		}
	}

?>