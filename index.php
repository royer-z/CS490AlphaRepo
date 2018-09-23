<?php
// JSON formatting
// cURL in PHP

if (isset($_POST["submit"])) { // Retrieving data from form
	$username = $_POST["username"];
	$password = $_POST["password"];
	//echo("U: $username");
	//echo("P: $password");
	$formData->username = $username; // Creating a JSON object
	$formData->password = $password;
	$formData = json_encode($formData);
	//echo($formData);
	$cSession = curl_init(); // Send JSON object using cURL
	curl_setopt($cSession, CURLOPT_URL, "https://web.njit.edu/~tmd24/CS490/checkAndPass.php");
	curl_setopt($cSession, CURLOPT_POST, TRUE);
	curl_setopt($cSession, CURLOPT_POSTFIELDS, $formData);
	curl_setopt($cSession, CURLOPT_RETURNTRANSFER, TRUE);
	$cResult = curl_exec($cSession);
	$curl_close($cSession);
	echo($cResult);
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Screen (Alpha)</title>
	<script>
		// Change HTML output
	</script>
</head>

<body>
	<form action="index.php" method="post">
		UCID:<br>
		<input  type="text" name="username"><br>
		Password:<br>
		<input type="password" name="password"><br><br>
		<input type="submit" name="submit" value="Login">
	</form>
	<p id="result">Result:</p>
</body>
</html>