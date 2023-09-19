<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="signup-box">
		<h2>Add Product</h2>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="user-box">
				<input type="text" name="productname" required="">
				<label>Product Name</label>
			</div>
            <div class="user-box">
				<input type="file" name="image" required="">
				<label>Image</label>
			</div>
            <div class="user-box">
				<input type="number" name="price" required="">
				<label>Price</label>
			</div>
			<button type="submit" name="submit">Add</button>
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
    $productname = mysqli_real_escape_string($conn, $_POST['productname']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);


    // Insert data into database
    $sql = "INSERT INTO product (name, image_url,price) VALUES ('$productname', '$image', '$price')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
