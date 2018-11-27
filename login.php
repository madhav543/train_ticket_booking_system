<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Rail ticket booking</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<h2>Login</h2>
</div>

<form method="post" action="login.php">
<!-- Display Validation errors here -->
<?php include('errors.php'); ?>

<div class="input-group">
<label>Username</label>
<input type="text" name="username">
</div>

<div class="input-group">
<label>Password</label>
<input type="text" name="password">
</div>


<div class="input-group">
<button type="submit" name="login" class="btn">Login</button>
</div>

<p>
No account? <a href="register.php">Sign up</a>
</p>

</form>

</body>
</html>
