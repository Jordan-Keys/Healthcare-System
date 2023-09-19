<!DOCTYPE html>
<html>
<head>
	<title>Customer Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-box">
		<h2>Login</h2>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="user-box">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="user-box">
				<input type="password" name="password" required="">
				<label>Password</label>
			</div>
            <div class="container">
			<button type="submit" name="submit" href="http://localhost/Web%20Project%20Group%202%20BSE/Home%20PAGE/">Login</button>
            </div>
		</form>
	</div>
</body>
</html>

<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['submit'])) {
	// Database configuration
	$host = 'localhost'; // Host name
	$username = 'root'; // Mysql username
	$password = ''; // Mysql password
	$dbname = 'LOGIN'; // Database name

	// Connect to the database
	$conn = mysqli_connect($host, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Get the username and password from the form and sanitize them
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Query the database to check if the username and password match
	$sql = "SELECT * FROM Username WHERE name = '$username'";
	$result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
	    // login successful, set session variable and redirect to another page
	    $_SESSION['username'] = $username;
	    header('Location: http://localhost/Web%20Project%20Group%202%20BSE/Home%20PAGE/');
	    exit;
    } else {
	    // login unsuccessful, show error message
	    echo "Invalid username or password.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>
