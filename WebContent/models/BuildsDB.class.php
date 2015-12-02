<?php
class BuildsDB {
	
	public static function getBuildsWith($budget = null, $purpose = null, $game = null, $storage = null, $mem = null, $caseColor = null) {
	
		//Returns an array of arrays with each build that complies with the parameters given
		$buildRowSets = NULL;
		$andFlag = false;
		try {
			$db = Database::getDB ();
			$query = "SELECT buildId, caseId, mboardId, cpuId, ramId, hdriveId, gpuId, powersupId FROM builds WHERE ";

			if (!is_null($budget)){
				$query = $query."(budget = :$budget) ";
				$andFlag = true;
			}
			if (!is_null($purpose)){
				if ($andFlag){
					$query = $query."AND ";
				}else{
					$andFlag = true;
				}
				$query = $query."(purpose = :$purpose) ";
			}
			if (!is_null($game)){
				if ($andFlag){
					$query = $query."AND ";
				}else{
					$andFlag = true;
				}
				$query = $query."(game = :$game) ";
			}
			if (!is_null($storage)){
				if ($andFlag){
					$query = $query."AND ";
				}else{
					$andFlag = true;
				}
				$query = $query."(storage = :$storage) ";
			}
			if (!is_null($mem)){
				if ($andFlag){
					$query = $query."AND ";
				}else{
					$andFlag = true;
				}
				$query = $query."(mem = :$mem) ";
			}
			if (!is_null($caseColor)){
				if ($andFlag){
					$query = $query."AND ";
				}else{
					$andFlag = true;
				}
				$query = $query."(caseColor = :$caseColor) ";
			}

			$statement = $db->prepare ($query);
			
			if (!is_null($budget)){
				$statement->bindParam(":$budget", $budget);
			}
			if (!is_null($purpose)){
				$statement->bindParam(":$purpose", $purpose);
			}
			if (!is_null($game)){
				$statement->bindParam(":$game", $game);
			}
			if (!is_null($storage)){
				$statement->bindParam(":$storage", $storage);
			}
			if (!is_null($mem)){
				$statement->bindParam(":$mem", $mem);
			}
			if (!is_null($caseColor)){
				$statement->bindParam(":$caseColor", $caseColor);
			}

			$statement->execute ();
			$buildRowSets = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor ();
		} catch (Exception $e) { // Not permanent error handling
			echo "garbage occured";
		}
		return $buildRowSets;
	}
	
public static function getRandomBuild() {
	
		//Returns a random build from the builds table
		$buildRowSets = NULL;
		try {
			$db = Database::getDB ();
			//$query = "SELECT * FROM builds ORDER BY RAND()";
			$query = "SELECT * FROM builds WHERE (buildId = 'build";
			$number = rand(0, 46654);
			if ($number < 10)
				$number = "0".$number;
			$query = $query.$number."')";
			$statement = $db->prepare ($query);
			$statement->execute ();
			$buildRowSets = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor ();
		} catch (Exception $e) { // Not permanent error handling
			echo "garbage occured";
		}
		if (!empty($buildRowSets)) {
			foreach ($buildRowSets as $buildRow ) {
				$prebuilt = new preBuild($buildRow);
			}
		}
		
		return $prebuilt;
	}
	
	public static function getAllBuilds() {
	
		//Returns all builds in the builds table
		$buildRowSets = NULL;
		try {
			$db = Database::getDB ();
			$query = "SELECT * FROM builds";
			$statement = $db->prepare ($query);
			$statement->execute ();
			$buildRowSets = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor ();
		} catch (Exception $e) { // Not permanent error handling
			echo "garbage occured";
		}
		return $buildRowSets;
	}
	
	/*public static function addBuild($user) {											//No need for this right now, not built yet as a result
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
	}*/

	/*public static function getBuildRowSetsBy($type = null, $value = null) {
	
		// Returns the rows of Users whose $type field has value $value
		$allowedTypes = ["userID", "username"];
		$userRowSets = NULL;
		try {
			$db = Database::getDB ();
			$query = "SELECT buildId, caseId, mboardId, cpuId, ramId, hdriveId, gpuId, powersupId FROM builds";
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
	}*/
	
	/*public static function getBuildsArray($rowSets) {
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
	
	public static function getBuildsBy($type=null, $value=null) {
		// Returns User objects whose $type field has value $value
		$userRows = UsersDB::getUserRowSetsBy($type, $value);
		return UsersDB::getUsersArray($userRows);
	}
	
	public static function getBuildValues($rowSets, $column) {
		// Returns an array of values from $column extracted from $rowSets
		$userValues = array();
		foreach ($rowSets as $userRow )  {
			$userValue = $userRow[$column];
			array_push ($userValues, $userValue);
		}
		return $userValues;
	}
	
	public static function getBuildValuesBy($column, $type=null, $value=null) {
		// Returns the $column of Users whose $type field has value $value
		$userRows = BuildsDB::getBuildRowSetsBy($type, $value);
		return BuildsDB::getBuildValues($userRows, $column);
	}*/
}
?>