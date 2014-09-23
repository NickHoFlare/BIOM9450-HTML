<h2>List of registered participants:</h2>
<?php
	// Get the results of the query for the list of registered participants who are not banned.
	$notBanned = "SELECT * FROM Registration WHERE Banned=FALSE;";
	$registrants = odbc_exec($conn,$notBanned);

	echo "<table class=\"program-table\" border=\"2\">";
	echo "<tr><th>S/N</th><th>Name of Registrant</th></tr>";
	
	// Make a serial number for each entry of the table.
	$i = 1;
	// For each row of the results of the query, print the serial number and the name of the registrant.
	while(odbc_fetch_row($registrants)){	
		$dbGiven = odbc_result($registrants,"GivenName");
		$dbLast = odbc_result($registrants,"FamilyName");
		echo "<tr><td>".$i."</td>";
		echo "<td>" . $dbGiven . " " .$dbLast. "</td></tr>";
		$i++;
	}
	echo "</table>";
?>