<?php

include 'db.php';





$query = "TRUNCATE TABLE users";
$result = mysqli_query($conn, $query);


if ($result) {
    header("Location: index.php?msg=allDeleted");
    exit();
} else {
    echo "Error truncating table: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
