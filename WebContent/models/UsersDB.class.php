<?php
class UsersDB {
	
	public static function addUser($user) {
		// Inserts the User object $user into the Users table and returns userId
		$query = "INSERT INTO users (username, password, email)
		                      VALUES(:username, :password, :email)";
		$returnId = 0;
		try {
			if (is_null($user) || $user->getErrorCount() > 0)
				throw new PDOException("Invalid User object can't be inserted");
			$db = Database::getDB ();
			$statement = $db->prepare ($query);
			$statement->bindValue(":username", $user->getUserName());
			$statement->bindValue(":password", $user->getPassword());	
			$statement->bindValue(":email", $user->getEmail());
			$statement->execute ();
			$statement->closeCursor();
			$returnId = $db->lastInsertId("userID");
		} catch (Exception $e) { // Not permanent error handling
			echo "<p>Error adding user to Users ".$e->getMessage()."</p>";
		}
		return $returnId;
	}

	public static function getUserRowSetsBy($type = null, $value = null) {
		// Returns the rows of Users whose $type field has value $value
		$allowedTypes = ["userID", "username"];
		$userRowSets = NULL;
		try {
			$db = Database::getDB ();
			$query = "SELECT userID, username, password, email FROM users";
			if (!is_null($type)) {
			    if (!in_array($type, $allowedTypes))
					throw new PDOException("$type not an allowed search criterion for Users");
			    $query = $query. " WHERE ($type = :$type)";
			    $statement = $db->prepare($query);
			    $statement->bindParam(":$type", $value);
			} else 
				$statement = $db->prepare($query);
			$statement->execute ();
			$userRowSets = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor ();
		} catch (Exception $e) { // Not permanent error handling
			echo "<p>Error getting user rows by $type: " . $e->getMessage () . "</p>";
		}
		return $userRowSets;
	}
	
	public static function getUsersArray($rowSets) {
		// Returns an array of User objects extracted from $rowSets
		$users = array();
	 	if (!empty($rowSets)) {
			foreach ($rowSets as $userRow ) {
				$user = new User($userRow);
				$user->setUserId($userRow['userID']);
				array_push ($users, $user );
			}
	 	}
		return $users;
	}
	
	public static function getUserBy($type, $value) {
		// Returns a User object whose $type field has value $value
		$allowed = ["username"];
		$user = NULL;
		try {
			if (!in_array($type, $allowed))
				throw new PDOException("$type not an allowed search criterion for User");
			$query = "SELECT * FROM users WHERE ($type = :$type)";
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":$type", $value);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new User($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user by $type: " . $e->getMessage () . "</p>";
		}
		return $user;
	}
	
	public static function getUsersBy($type=null, $value=null) {
		// Returns User objects whose $type field has value $value
		$userRows = UsersDB::getUserRowSetsBy($type, $value);
		return UsersDB::getUsersArray($userRows);
	}
	
	public static function getUserValues($rowSets, $column) {
		// Returns an array of values from $column extracted from $rowSets
		$userValues = array();
		foreach ($rowSets as $userRow )  {
			$userValue = $userRow[$column];
			array_push ($userValues, $userValue);
		}
		return $userValues;
	}
	
	public static function getUserValuesBy($column, $type=null, $value=null) {
		// Returns the $column of Users whose $type field has value $value
		$userRows = UsersDB::getUserRowSetsBy($type, $value);
		return UsersDB::getUserValues($userRows, $column);
	}
}
?>