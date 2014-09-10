// Function checks if text typed in a name field is in a valid name syntax
function  validFirstName() {
	var firstName = document.getElementById('firstName');			
	var regex = /^[a-zA-Z][a-zA-Z \']*$/;
	// If the captured first name does not match the regex pattern, display an error message in red, and return false as an "error code".
	if (!regex.test(firstName.value)) {
		document.getElementById('firstNameError').innerHTML = 'The name entered is not valid. Do not use characters other than alphabets, single whitespace or apostrophes.';
		document.getElementById('firstNameError').style.color = 'red';
		return false;
	// If the captured first name matches the regex pattern, clear any error messages if they are present, and return true as a "success code".
	} else {
		document.getElementById('firstNameError').innerHTML = '';
		return true;
	}
}

// Function checks if text typed in a name field is in a valid name syntax
function  validLastName() {
	var lastName = document.getElementById('lastName');
	var regex = /^[a-zA-Z][a-zA-Z \']*$/;
	// If the captured last name does not match the regex pattern, display an error message in red, and return false as an "error code".
	if (!regex.test(lastName.value)) {
		document.getElementById('lastNameError').innerHTML = 'The name entered is not valid. Do not use characters other than alphabets, single whitespace or apostrophes.';
		document.getElementById('lastNameError').style.color = 'red';
		return false;
	// If the captured last name matches the regex pattern, clear any error messages if they are present, and return true as a "success code".
	} else {
		document.getElementById('lastNameError').innerHTML = '';
		return true;
	} 
}

// Function checks if user-input date of birth is in a valid dd/mm/yyyy format.
function validDOB() {
	var dateOfBirth = document.getElementById('dateOfBirth');
	var regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/19[0-9][0-9]$/;
	// If the captured Date of Birth does not match the regex pattern, display an error message in red, and return false as an "error code".
	if (!regex.test(dateOfBirth.value)) {
		document.getElementById('dobError').innerHTML = 'The date of birth entered is not valid. Please enter a valid date in the format dd/mm/yyyy.';
		document.getElementById('dobError').style.color = 'red';
		return false;
	// If the captured Date of Birth matches the regex pattern, clear any error messages if they are present, and return true as a "success code".
	} else {
		document.getElementById('dobError').innerHTML = '';
		return true;
	} 
}

// Function checks if user-input email is in a valid Email address format.
function validEmail() {
	var email = document.getElementById('emailAddress');
	var regex = /^[a-zA-Z0-9\.\_\-]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,4}$/;
	// If the captured Email address does not match the regex pattern, display an error message in red, and return false as an "error code".
	if (!regex.test(email.value)) {
		document.getElementById('emailError').innerHTML = 'The Email Address entered is not valid. Please enter a valid email address.';
		document.getElementById('emailError').style.color = 'red';
		return false;
	// If the captured Email Address matches the regex pattern, clear any error messages if they are present, and return true as a "success code".
	} else {
		document.getElementById('emailError').innerHTML = '';
		return true;
	} 
}

// Function checks if all field checks have been satisfied. If yes, proceed. If not, deny progress, and popup with an alert message. 
// This function is run upon pressing of the submit button.
function validInfo() {
	// Check that all field verification functions have returned true as success codes. If not, cause an alert popup box to appear with an error message, 
	// and return false to prevent redirection of the page to the "successful registration page"
	if (!(validFirstName() && validLastName() && validDOB() && validEmail())) {
		alert("Please fix any errors in your provided information before we proceed with registration.");
		return false;
	// If the field verification functions have all returned true, the user's input is valid and we allow him to proceed to the "successful registration page"
	} else {
		return true;
	}
}