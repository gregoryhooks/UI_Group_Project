<?php
class PartsDB {

	public static function getPartRowSetsBy($table = null, $typeid = null, $id = null) {
		// Returns the rows of Parts whose $type field has value $value
		$partRowSets = NULL;
		try {
			$db = Database::getDB ();
			//$query = "SELECT * FROM :$table WHERE (";//= :$id)";
			//$query = "SELECT * FROM harddrives WHERE (hdriveId = $id)";
			//"harddrives", "hdriveId", "1hdd05"

			//if (strcmp($typeid, "hdriveId") == 0)
			//	$query = $query."hdriveId";
			
			//$query = $query." = :$id)";
			
			//$query = "SELECT * FROM harddrives WHERE (hdriveId = '1hdd05')";
			$query = "SELECT * FROM ".$table." WHERE (".$typeid." = '".$id."')";
				
			$statement = $db->prepare($query);
			//$statement->bindParam(":$table", $table);
			//$statement->bindParam(":$typeid", $typeid);
			//$statement->bindParam(":$id", $id);
			$statement->execute ();
			
			$partRowSets = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor ();
		} catch (Exception $e) { // Not permanent error handling
			echo "<p>Error getting part rows by $type: " . $e->getMessage () . "</p>";
		}
		return $partRowSets;
	}
	
}
?>