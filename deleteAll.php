<?php

include 'db.php';
session_start();

$query = "TRUNCATE TABLE users";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
    $_SESSION['msg'] = "All Data Deleted";
    exit();
} else {
    echo "Error truncating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
