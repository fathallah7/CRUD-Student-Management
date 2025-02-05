<?php 

include 'db.php';
session_start();

$id = $_GET['id'];
$sql = " DELETE FROM `users` WHERE id = $id ";
$result = mysqli_query($conn , $sql);
if ($result) {
    header("Location:index.php");
    $_SESSION['msg'] = "One User Deleted";
}
else {
    echo "Failed :" . mysqli_error($conn);
}

?>
