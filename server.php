<?php
	session_start();
	$username = "";
	$email = "";
	$errors = array();

	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'register');

	// If the registration button is clicked
	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

	
	// Ensure that form fields are filled properly
	if (empty($username)) {
		array_push($errors, "username is required");
	}

	if (empty($email)) {
		array_push($errors, "email is required");
	}

	if (empty($password_1)) {
		array_push($errors, "password_1 is required");
	}

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
		

	// If there are no errors, save user to database	
	if (count($errors) == 0) {
		$password = md5($password_1); // Encrypt password before storing in database (security)
		$sql = "INSERT INTO users (username, email, password)
			VALUES ('$username', '$email', '$password')";
		mysqli_query($db, $sql);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php'); // Redirect to home page
	}
    }

//log user in from login page
if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

	
	// Ensure that form fields are filled properly
	if (empty($username)) {
		array_push($errors, "username is required");
	}

	if (empty($password)) {
		array_push($errors, "password is required");
	}

	if(count($errors) == 0 ) {
		$password = md5($password); // Encrypt password before comparing with that from database
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) == 1) {

			// log user in
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php'); // Redirect to home page

	     }else{
		  array_push($errors, "Wrong username/password");
		 // header('location: login.php');
	     }
      }
}




//logout
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}

?>	














