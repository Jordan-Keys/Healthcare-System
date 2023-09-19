<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="signup-box">
		<h2>Add Employee</h2>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="user-box">
				<input type="text" name="first_name" required="">
				<label>First Name</label>
			</div>
			<div class="user-box">
				<input type="text" name="last_name" required="">
				<label>Last Name</label>
			</div>
            <div class="user-box">
				<input type="number" name="salary" required="">
				<label>Salary</label>
			</div>
            <div class="user-box">
				<input type="text" name="token" required="">
				<label>Login Token</label>
			</div>
			<div class="user-box">
				<input type="date" name="dob" required="">
				<label>Date of Birth</label>
			</div>
            
			<div class="user-box">
				<input type="password" name="verify_password" required="">
				<label>Set Password</label>
			</div>
			<button type="submit" name="submit">Register</button>
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

// Connect to database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $token = mysqli_real_escape_string($conn, $_POST['token']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into database
    $sql = "INSERT INTO employee (first_name, last_name, login_token, salary, password) VALUES ('$first_name', '$last_name', '$token', '$salary', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
