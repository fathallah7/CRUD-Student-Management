<?php 

include 'db.php';


$id = $_GET['id'];
$sql = " DELETE FROM `users` WHERE id = $id ";
$result = mysqli_query($conn , $sql);
if ($result) {
    header("Location:index.php?msg=Record Deleted");
}
else {
    echo "Failed :" . mysqli_error($conn);
}


?>