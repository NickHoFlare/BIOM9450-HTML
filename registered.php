<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Anti-zombie Symposium</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
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
			$firstName = $_POST["firstName"];
       		$lastName = $_POST["lastName"];
       		$emailAddress = $_POST["emailAddress"];
       		$dateOfBirth = $_POST["dateOfBirth"];
       		$yearOfBirth = substr($dateOfBirth, -4);
       		$johnnyRegex = "/^[Jj]ohnny$/";
       		$noShowRegex = "/^[Nn]oshow$/";

       		if (preg_match($johnnyRegex, $firstName) && preg_match($noShowRegex, $lastName)) {
       			echo "<h1>Registration Unsuccessful - No-show policy</h1>
					<p>You will hear from us shortly.</p>
					<h2>Details: </h2>";
				echo "<p>Dear Mr. Noshow, last year you didn't turn up to present your talk. You cannot register this year!</p>";
       		} else {
       			echo "<h1>Registration Successful!</h1>
					<p>You will hear from us shortly.</p>
					<h2>Details: </h2>";
       			echo "<strong>Name: </strong>" . $firstName . " " . $lastName . "<br>" .
       				"<strong>Date of Birth: </strong>xx/xx/" . $yearOfBirth . "<br>" .
       				"<strong>Email Address: </strong>" . $emailAddress . "<br>";
       		}
		?>

	</div>
</body>
<hr>
<footer>
	<strong>Created by Nicholas Ho / z3422527</strong>
</footer>
</html>
