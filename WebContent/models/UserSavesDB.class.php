<?php
class UserSavesDB {
	
	public static function addUserSave($userId, $buildId) {
		// Inserts the Course object $course into the UserSaves table and returns status code
		$query = "INSERT INTO usersaves (userId, buildId)
		                      VALUES(:userId, :buildId)";
		$returnId = 0;
		try {
			if (is_null($userId) || $userId < 1 || is_null($buildId) || $buildId < 1)
				throw new PDOException("Invalid UserSave entry can't be inserted");
			$userSaves = UserSavesDB::getUserSavesBy('userId', $userId);
			if (!is_null($userSaves) && !empty($userSaves)){
				foreach ($userSaves as $userSave) {
					if ($userSave['buildId'] == $buildId){
						throw new PDOException("Duplicate userSave list entry can't be inserted");
					}
				}
			}
			$db = Database::getDB ();
			$statement = $db->prepare ($query);
			$statement->bindValue(":userId", $userId);
			$statement->bindValue(":buildId", $buildId);
			$statement->execute ();
			$statement->closeCursor();
			//$returnId = $db->lastInsertId("userSaveId");
		} catch (Exception $e) { // Not permanent error handling
			echo "<p>Error adding userSavelist entry to UserSave ".$e->getMessage()."</p>";
			$returnId = -1;
		}
		return $returnId;
	}
	
	public static function removeUserSave($userId, $buildId) {
		// Removes the Course object $course from the UserSaves table and returns status code
		$query = "DELETE FROM usersaves WHERE `userId`=:userId AND `buildId`=:buildId";
		$returnId = 0;
		try {
			if (is_null($userId) || $userId < 1 || is_null($buildId) || $buildId < 1)
				throw new PDOException("Invalid UserSave entry can't be removed");
			$db = Database::getDB ();
			$statement = $db->prepare ($query);
			$statement->bindValue(":userId", $userId);
			$statement->bindValue(":buildId", $buildId);
			$statement->execute ();
			$statement->closeCursor();
			//$returnId = $db->lastInsertId("userSaveId");
		} catch (Exception $e) { // Not permanent error handling
			echo "<p>Error removing userSavelist entry to UserSave ".$e->getMessage()."</p>";
			$returnId = -1;
		}
		return $returnId;
	}

	public static function getUserSaveRowSetsBy($type = null, $value = null) {
		// Returns the rows of UserSaves whose $type field has value $value
		$allowedTypes = ["userId", "buildId"];
		$userSaveRowSets = NULL;
		try {
			$db = Database::getDB ();
			$query = "SELECT userId, buildId FROM usersaves";
			if (!is_null($type)) {
			    if (!in_array($type, $allowedTypes))
					throw new PDOException("$type not an allowed search criterion for UserSave");
			    $query = $query. " WHERE ($type = :$type)";
			    $statement = $db->prepare($query);
			    $statement->bindParam(":$type", $value);
			} else 
				$statement = $db->prepare($query);
			$statement->execute ();
			$userSaveRowSets = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor ();
		} catch (Exception $e) { // Not permanent error handling
			echo "<p>Error getting userSavelist rows by $type: " . $e->getMessage () . "</p>";
		}
		return $userSaveRowSets;
	}
	
	public static function getUserSavesArray($rowSets) {
		// Returns an array of UserSaves extracted from $rowSets
		$userSaves = array();
	 	if (!empty($rowSets)) {
			foreach ($rowSets as $userSaveRow ) {
				$userSave = $userSaveRow;
				//$userSave = new Course($userSaveRow);
				//$userSave->setUserSaveId($userSaveRow['userSaveId']);
				array_push ($userSaves, $userSave );
			}
	 	}
		return $userSaves;
	}
	
	public static function getUserSavesBy($type=null, $value=null) {
		// Returns UserSave objects whose $type field has value $value
		$userSaveRows = UserSavesDB::getUserSaveRowSetsBy($type, $value);
		return UserSavesDB::getUserSavesArray($userSaveRows);
	}
	
	public static function getUserSaveValues($rowSets, $column) {
		// Returns an array of values from $column extracted from $rowSets
		$userSaveValues = array();
		foreach ($rowSets as $userSaveRow )  {
			$userSaveValue = $userSaveRow[$column];
			array_push ($userSaveValues, $userSaveValue);
		}
		return $userSaveValues;
	}
	
	public static function getUserSaveValuesBy($column, $type=null, $value=null) {
		// Returns the $column of UserSaves whose $type field has value $value
		$userSaveRows = UserSavesDB::getUserSaveRowSetsBy($type, $value);
		return UserSavesDB::getUserSaveValues($userSaveRows, $column);
	}
}
?>