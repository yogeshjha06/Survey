<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <style>
        body {
            background-color: #F8F8FF;
        }
    </style>
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/img/gov.png">
</head>

<body>
</body>

</html>
<?php
include('db.php');


//logout button action
$logout = $_GET['logout'];
if ($logout == 1) {

    $q1="UPDATE `tbl_login` SET `online`='0' WHERE `id`='$_SESSION[id]'";
    $s1=mysqli_query($con,$q1);
    
    unset($_SESSION['is_login']);
    session_destroy();    
    header('location: index.php');
    die();
}
//login data validation
if (isset($_POST['login'])) {
    if (isset($_SESSION['is_login'])) {
        header('location: dashboard.php');
    }

    $username = $_POST['username'];
    $pass = $_POST['password'];

    // Query to check user credentials
    $query = "SELECT * FROM tbl_login WHERE email = '$username' AND password = '$pass'";
    $stmt = mysqli_query($con, $query);

    // Check if a matching row is found
    if (mysqli_num_rows($stmt)) {
        // echo "Login successful!";

        while ($row = mysqli_fetch_array($stmt)) {
            //verified user
            $_SESSION['is_login'] = true;
            $_SESSION['id'] = $row['id'];
            // $_SESSION['uname'] = $row['user_email'];
            // $_SESSION['user_phone'] = $row['user_phone'];
            // $_SESSION['address'] = $row['user_address'];
            // $_SESSION['designation'] = $row['user_designation'];
            // $_SESSION['role'] = $row['role'];
        }
        // echo $_SESSION['name'];
        header("Location: dashboard.php");
    } else {
        echo "<script>
                
                swal({
                icon: 'info',
                title: 'Sorry!',
                text: 'Invalid Credentials. please try again.',
                type: 'ERROR'
                }).then(function() {
                    window.location = 'index.php';
                });
                
                </script>";
    }
}

        //find my username
        // if (isset($_POST['signup'])) {
        //     if (isset($_SESSION['is_login'])) {
        //         header('location:home.php');
        //         die();
        //     }
        //     $empid = $_POST['emp_id'];
        //     $email = $_POST['email'];
        //     //find employee
        //     if (mysqli_num_rows(sqlsrv_query($con, "SELECT * FROM `admin_login` WHERE emp_id='$empid'")) > 0) {
        //         //verify employee id with employee email
        //         $res1 = sqlsrv_query($con, "SELECT * FROM `admin_login` WHERE emp_id='$empid' AND email='$email'");
        //         if (mysqli_num_rows($res1) > 0) {
        //             //finding user name of client
        //             while ($row = mysqli_fetch_array($res1)) {
        //                 $user = $row['username'];
        //                 $name = $row['name'];
        //             }
        //             //echo user name
        //             echo "<script>
        //         swal({
        //         icon: 'success',
        //         title: 'Found You!',
        //         text: 'HI, $name your username is $user',
        //         type: 'SUCCESS'
        //         }).then(function() {
        //             window.location = 'login.php';
        //         });

        //         </script>";
        //             //empty array
        //             $_POST = array();
        //         } else {
        //             //employee id is true but email is false
        //             echo "<script>

        //         swal({
        //         icon: 'info',
        //         title: 'Sorry!',
        //         text: 'Your Email is not correct. please try again.',
        //         type: 'SUCCESS'
        //         }).then(function() {
        //             window.location = 'login.php';
        //         });

        //         </script>";
        //         }
        //     } else {
        //         //employee id is false
        //         echo "<script>

        //     swal({
        //     icon: 'error',
        //     title: 'Invalid Employee Id',
        //     text: 'We, are unable to find you, please try again or contact us.',
        //     type: 'ERROR'
        //     }).then(function() {
        //         window.location = 'login.php';
        //     });

        //     </script>";
        //     }
        // }
