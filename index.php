<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!------------------------------------------------------------------------------------------>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!------------------------------------------------------------------------------------------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!------------------------------------------------------------------------------------------>
</head>

<body>


    <?php
    // <!--------------------------------------CONNICTION---------------------------------------------------->
    include 'db.php';
    include 'msg.php';


    // <!--------------------------------------START  INSERT Operation---------------------------------------------------->
    if (isset($_POST['send'])) {

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {

            $pName = $_POST['name'];
            $pEmail = $_POST['email'];
            $pPhone = $_POST['phone'];
            $pSend = $_POST['send'];
            $query = "INSERT INTO `users`(`name`, `email`, `phone`) VALUES ('$pName','$pEmail','$pPhone')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['msg'] = "New User Added";
                header("Location: index.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Fill All Informations";
            header("Location: index.php");
            exit();
        }
    }

    // <!--------------------------------------END  INSERT Operation---------------------------------------------------->
    ?>




    <!--------------------------------------------START FORM---------------------------------------------->
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
        <form action="index.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" id="firstName" class="form-control form-control-lg" placeholder="Enter Your name" name="name" />
                        <label class="form-label" for="firstName">Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div data-mdb-input-init class="form-outline">
                        <input type="tel" id="phoneNumber" class="form-control form-control-lg" placeholder="Enter Your Phone Number" name="phone" />
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-1 pb-1">
                    <div data-mdb-input-init class="form-outline">
                        <input type="email" id="emailAddress" class="form-control form-control-lg" placeholder="Enter Your Email" name="email" />
                        <label class="form-label" for="emailAddress">Email</label>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-12 mb-1 pb-1">
                        <div data-mdb-input-init class="form-outline">
                            <input data-mdb-ripple-init class="btn btn-lg btn-success w-100 " style="background-color: #566787;" type="submit" value="Submit" name="send" />
                        </div>
                    </div>
                </div>
                <div>
                </div>
        </form>
    </div>
    </div>
    <!-------------------------------------------END FORM----------------------------------------------->




    <!-------------------------------------------START TABLE----------------------------------------------->
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Manage Students</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#firstName" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>
                        <a href="deleteAll.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all data?');">
                            <i class="material-icons">&#xE15C;</i> <span>Delete</span>
                        </a>

                    </div>
                </div>
            </div>


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <!-------------------------------------------START READ DATA----------------------------------------------->
                    <?php
                    $sql = "SELECT * FROM users";
                    $result2 = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result2)) {
                    ?>
                        <tr>
                            <td> <?php echo $row['id']; ?> </td>
                            <td> <?php echo $row['name']; ?> </td>
                            <td> <?php echo $row['email']; ?> </td>
                            <td> <?php echo $row['phone']; ?> </td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                                <a href="deleteOne.php?id=<?php echo $row['id']; ?>" class="delete" data-toggle="modal" onclick="return confirm('Are you sure you want to delete all data?');">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <!-------------------------------------------END READ DATA----------------------------------------------->
                </tbody>
            </table>
        </div>
    </div>
    <!-------------------------------------------END TABLE----------------------------------------------->




    <p style="text-align: center; margin-top:40px;">BY Abdullah Fathallah</p>
</body>

</html>
