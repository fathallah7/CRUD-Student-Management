<?php
$host = 'localhost';
$username = 'abdullah';  // تصحيح اسم المتغير ليكون واضحًا
$password = '1234';
$dbName = 'crud';

$conn = mysqli_connect($host, $username, $password, $dbName);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

?>
