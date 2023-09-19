<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="signup-box">
        <h2>Sign Up</h2>
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
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="date" name="dob" required="">
                <label>Date of Birth</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Create Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="verify_password" required="">
                <label>Verify Password</label>
            </div>
            <button type="submit" name="submit">Sign Up</button><br>
            <a href="" class="none">Already have an account?</a>
            <br>
            <a href="http://localhost/phpmyadmin/Web%20Project%20Group%202%20BSE/Customer%20login/index.php">Login here</a>
        </form>
    </div>
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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $verify_password = mysqli_real_escape_string($conn, $_POST['verify_password']);

    // Check if password and verify password match
    if ($password !== $verify_password) {
        echo "Error: Passwords do not match.";
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into database
    $sql = "INSERT INTO customer_signup (first_name, last_name, username, date_of_birth, password) VALUES ('$first_name', '$last_name', '$username', '$dob', '$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>