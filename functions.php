<?php
	// This function opens the connection to the database. Returns a reference to the open connection.
	function openConnection() {
		$conn = odbc_connect('z3422527', '', '',SQL_CUR_USE_ODBC);
		return $conn;
	}
	
	// This function opens a connection to the database and checks if the 
	// name and email of a provided applicant matches any of the banned entries of the database.
	// Return True if Yes.
	function isBanned($given, $last, $email, $conn) {
		$regQueries = "SELECT * FROM Registration";
		$applicants = odbc_exec($conn,$regQueries);

		
		while(odbc_fetch_row($applicants)) {
			$dbGiven = strtolower(odbc_result($applicants,"GivenName"));
			$dbLast = strtolower(odbc_result($applicants,"FamilyName"));
			$dbEmail = strtolower(odbc_result($applicants,"Email"));
			$banned = odbc_result($applicants,"Banned");
			
			if ((($dbGiven == strtolower($given) && 
				$dbLast == strtolower($last)) || 
				$dbEmail == strtolower($email)) &&
				$banned) {
				return true;
			}
		}
		return false;
	}
	
	// This function opens a connection to the database and checks if the 
	// name and email of a provided applicant matches any of the unbanned entries of the database.
	// Return True if Yes.
	function alreadyExists($given, $last, $email, $conn) {
		$regQueries = "SELECT * FROM Registration";
		$applicants = odbc_exec($conn,$regQueries);

		while(odbc_fetch_row($applicants)) {
			$dbGiven = strtolower(odbc_result($applicants,"GivenName"));
			$dbLast = strtolower(odbc_result($applicants,"FamilyName"));
			$dbEmail = strtolower(odbc_result($applicants,"Email"));
			$banned = odbc_result($applicants,"Banned");
			
			if ((($dbGiven == strtolower($given) && 
				$dbLast == strtolower($last)) || 
				$dbEmail == strtolower($email)) &&
				!$banned) {
				return true;
			}
		}
		return false;
	}
?>