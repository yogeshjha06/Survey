<?php
include('db.php');
if (!isset($_SESSION['is_login'])) {
    header('location: index.php');
    die();
} else {

    $id = $_SESSION['id'];
    //code to fetch all details of user
    $query = "SELECT * FROM tbl_login WHERE id='$id'";
    $stmt = mysqli_query($con, $query);
    $row = mysqli_fetch_array($stmt); {

        $name = $row['officerName'];
        $email = $row['email'];
        $phone = $row['officerMObile'];

        $address = $row['bcode'] . ", " . $row['dcodeb'];
        $designation = $row['designation'];
        $role = $row['urole'];

        $id = $row[0];

        $password = $row['password'];

        $district = $row['dcodeb'];
        $block = $row['bcode'];
        $sector = $row['sector']; //sector name

    }
}
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add New Scheme - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">


    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
</head>
<body class="sb-nav-fixed">

<?php require('header.php'); ?>

<?php require('footer.php'); ?>
</body>
</html>
<?php
include('db.php');
if(isset($_GET['action']))
{
    if($_GET['action']==10)
    {
        $sql="UPDATE `tbl_scheme` SET `status` = '1' WHERE `id` = ".$_GET['id'].";";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>                
            swal({
                icon: 'success',
                title: 'Success',
                text: 'Deactivated Successfully!',
                }).then(function() {
                    window.location = 'listScheme.php';
                });                        
                </script>";
        }
        else
        {
            echo "<script>                
            swal({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong!',
                }).then(function() {
                    window.location = 'listScheme.php';
                });                        
                </script>";
        }
    }
    if($_GET['action']==1)
    {
        $sql="UPDATE `tbl_scheme` SET `status` = '0' WHERE `id` = ".$_GET['id'].";";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>                
            swal({
                icon: 'success',
                title: 'Success',
                text: 'Activated Successfully!',
                }).then(function() {
                    window.location = 'listScheme.php';
                });                        
                </script>";
        }
        else
        {
            echo "<script>                
            swal({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong!',
                }).then(function() {
                    window.location = 'listScheme.php';
                });                        
                </script>";
        }
    }
}
?>
