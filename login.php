<?php
// cURL in PHP
$username = $_POST['username'];
$password = $_POST['password'];


if($username === '' || $password === '') { // Detect if any form field is empty
	echo json_encode('Error');
}
else { // Send data using cURL
	
	$formData = "ucid=".$username."&pass=".$password;
	$cSession = curl_init();
	curl_setopt($cSession, CURLOPT_URL, "https://web.njit.edu/~tmd24/CS490/checkAndPass.php");
	curl_setopt($cSession, CURLOPT_POST, TRUE);
	curl_setopt($cSession, CURLOPT_POSTFIELDS, $formData);
	curl_setopt($cSession, CURLOPT_RETURNTRANSFER, FALSE);
	$cResult = curl_exec($cSession);
	curl_close($cSession);
	/*echo json_encode("njitLoginSucceeded".$cResult.njitLoginSucceeded.",backendLoginSucceeded".$cResult.backendLoginSucceeded); // Send cURL result back to Javascript*/
	// echo json_encode('Correct: <br>Username:'.$username.'<br>Password:'.$password);
}

/*
receiveJSON() { // Receive JSON object
var responseData = JSON.parse(string);
var NJIT = responseData.njitLoginSucceeded;
var BACKEND = responseData.backendLoginSucceeded;
}
*/
?>