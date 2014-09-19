<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Anti-zombie Symposium</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<?php include("./functions.php"); ?>
</head>

<body>
	<header>
		<div class="logo-header">
			<a href="./index.php"><img src="./assets/zombieBanner.png"></a>
	    </div>
	    <div class="navbar">
            <ul>
                <li><a href="./program.html">Program</a></li>
                <li><a href="./contact.html">Contact Us</a></li>
                <li><a href="./standards.html">Codes and standards</a></li>
            </ul>
        </div>
	</header>
	<div class="intro-text">
	    
		<?php			
			$conn = openConnection();	
						
			// Capture the contents of filled fields in the application form
			$firstName = $_POST["firstName"];
       		$lastName = $_POST["lastName"];
       		$emailAddress = $_POST["emailAddress"];
       		$dateOfBirth = $_POST["dateOfBirth"];
       		// For Date of Birth, only need the Year of birth.
       		$yearOfBirth = substr($dateOfBirth, -4);

			echo "<br />";
			
			// Check the database if an entry for the applicant exists, and if he is banned. Display failure message if True.
			if (isBanned($firstName, $lastName, $emailAddress)) {
				echo "<h1>Registration Unsuccessful - No-show policy</h1>
				<h2>Details: </h2>";
				echo "<p>Dear Mr. ". $lastName .", last year you didn't turn up to present your talk. You cannot register this year!</p>";
			// Check the database if an entry for the applicant exists, and he is not banned. Display failure message if True, as well as list of participants.
			} elseif (alreadyExists($firstName, $lastName, $emailAddress)) {
				echo "<h1>You have already registered!</h1>
				<h2>Details: </h2>";
				echo "<p>Dear Mr. ". $lastName .", you have already registered for the symposium! You may only register once.</p>";
				include("./registrants.php");
			// At this point, we can be sure that a DB entry does not exist for this participant. Create an entry in the DB, and display entered details, as well as list of participants.
			} else {
				$regDate = date("#Y-m-d#");
				$sqlQuery = "INSERT INTO Registration (GivenName, FamilyName, Email, RegDate, Banned) VALUES ('$firstName', '$lastName', '$emailAddress', $regDate, False);";
				$result = odbc_exec($conn,$sqlQuery);

				echo "<h1>Registration Successful!</h1>
				<p>You will hear from us shortly.</p>
				<h2>Details: </h2>";
				echo "<strong>Name: </strong>" . $firstName . " " . $lastName . "<br>" .
				"<strong>Date of Birth: </strong>xx/xx/" . $yearOfBirth . "<br>" .
				"<strong>Email Address: </strong>" . $emailAddress . "<br>";
				include("./registrants.php");
			}
			
			// Possible Alternate approach? 
			/*
			$bannedQuery = "SELECT * FROM Registration
						WHERE Banned = True
						AND (GivenName LIKE \"" . $firstName . "\"
						AND FamilyName LIKE \"" . $lastName . "\"
						OR EmailAddress LIKE \"" . $emailAddress . "\");
						";
			*/
		?>
	</div>
</body>
<hr>
<footer>
	<strong>Created by Nicholas Ho / z3422527</strong>
</footer>
</html>


