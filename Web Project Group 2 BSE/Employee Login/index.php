<!DOCTYPE html>
<html>
<head>
	<title>Employee Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-box">
		<h2>Login as Employee</h2>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="user-box">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="user-box">
				<input type="password" name="password" required="">
				<label>Password</label>
			</div>
			<button type="submit" name="submit" >Login</button>
		</form>
	</div>
</body>
</html>

<?php
// Database configuration
$host = 'localhost'; // Host name
$username = 'root'; // Mysql username
$password = ''; // Mysql password
$dbname = 'WebE'; // Database name

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
	// Get the username and password from the form
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Query the database to check if the username and password match
	$sql = "SELECT * FROM employee WHERE login_token = '$username' AND password = '$password'";
	$result = mysqli_query($conn, $sql);
    
      if(mysqli_num_rows($result) > 0) {
	    // login successful, set session variable and redirect to another page
	    $_SESSION['username'] = $username;
	    header('Location: http://localhost/phpmyadmin/Web%20Group[2]/Home%20PAGE/index.html');
	    exit;
    } else {
	    // login unsuccessful, show error message
	    echo "Invalid username or password.";
    }

    // Close database connection
    mysqli_close($conn);
?>


