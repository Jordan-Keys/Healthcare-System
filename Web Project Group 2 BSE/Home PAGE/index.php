<?php
session_start();
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";  
$dbname = "PHARMACY2";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Query the database for product information
$sql = "SELECT Product.id, Product.name, Price.price, ProductImages.image_url
        FROM Product
        JOIN Price ON Product.id = Price.product_id
        JOIN ProductImages ON Product.id = ProductImages.product_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="http://localhost/Web%20Project%20Group%202%20BSE/Home%20PAGE/">Home</a></li>
        <li><a href="/cart">Cart</a></li>
        <li><a href="http://localhost/Web%20Project%20Group%202%20BSE/Customer%20login/">login</a></li>
        <li><a href="http://localhost/Web%20Project%20Group%202%20BSE/Home%20PAGE/">Inventory</a></li>
        <li><a href="http://localhost/Web%20Project%20Group%202%20BSE/Mainpage/">Booking</a></li>
      </ul>
    </nav>
  </header>

  <main>
      <h1>Inventory</h1>
    <?php 
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="product-card">
              <img src="http://localhost' . $row['image_url'] . '" alt="Product Image">
              <h3>' . $row['name'] . '</h3>
              <p class="price">' . $row['price'] . '</p>
              <button>ADD TO CART</button>
            </div>';
    }
    ?>
  </main>
<!--
  <footer>
    <ul>
      <li><a href="/about">About</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/privacy">Privacy</a></li>
    </ul>
  </footer>
-->
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
