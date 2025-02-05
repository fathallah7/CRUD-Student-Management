<?php

include 'db.php';
session_start();


$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['send'])) {
    $pName2 = $_POST['name'];
    $pEmail2 = $_POST['email'];
    $pPhone2 = $_POST['phone'];

    $updateQuery = "UPDATE users SET name='$pName2', email='$pEmail2', phone='$pPhone2' WHERE id=$id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: index.php");
        $_SESSION['msg'] = "Information Updated";
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5 p-4" style="border:solid 4px #566787; border-radius:15px;">
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div>
            <img src="css/logo.png" alt="logo" width="75px">
        </div>
        <div>
            <h2 style="text-align: center; margin:15px 0 5px 0"><b>Student Management System</b></h2>
            <h4 style="text-align: center; margin:0 0 15px 0"><b>CRUD</b></h4>
        </div>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="firstName" class="form-control form-control-lg" placeholder="Enter name" name="name" value="<?php echo $row['name']; ?>"/>
                    <label class="form-label" for="firstName">Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="tel" id="phoneNumber" class="form-control form-control-lg" placeholder="Enter phone number" name="phone" value="<?php echo $row['phone']; ?>"/>
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-1 pb-1">
                <div class="form-outline">
                    <input type="email" id="emailAddress" class="form-control form-control-lg" placeholder="Enter email" name="email" value="<?php echo $row['email']; ?>"/>
                    <label class="form-label" for="emailAddress">Email</label>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-md-12 mb-1 pb-1">
                    <div class="form-outline">
                        <input class="btn btn-lg btn-success w-100 mb-2" style="background-color: #566787;" type="submit" value="Save" name="send"/>
                        <a href="index.php" class="btn btn-lg btn-danger w-100">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
