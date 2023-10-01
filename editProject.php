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


        if($_GET['action']==6)
        {            
            $id1=$_GET['id'];
            $query="SELECT * FROM `tbl_project` WHERE `id`='$id1'";
            $stmt=mysqli_query($con,$query);
            $row=mysqli_fetch_array($stmt);
                $scheme=$row['project'];
                $budget=$row['budget'];
                $sdate=$row['sdate'];
                $edate=$row['edate'];
                
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Project - Admin</title>
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

        </div>
        <div id="layoutSidenav_content">
            <main  style="padding: 15px;">
                <!-- start form add new admin -->
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Update Project</h5>

                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                                        <div class="row mb-4">
                                            <label for="name" class="col-sm-2 col-form-label">Project Name</label>
                                            <div class="col-sm-10">
                                                <input id="name" value="<?php echo$scheme; ?>" name="name" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="sdate" class="col-sm-2 col-form-label">Start Date</label>
                                            <div class="col-sm-10">
                                                <input id="sdate" value="<?php echo$sdate; ?>" name="sdate" type="date" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="edate" class="col-sm-2 col-form-label">End Date</label>
                                            <div class="col-sm-10">
                                                <input id="edate" value="<?php echo$edate; ?>" name="edate" type="date" class="form-control" required>
                                            </div>
                                        </div>   
                                        
                                        <div class="row mb-4">
                                            <label for="budget" class="col-sm-2 col-form-label">Budget</label>
                                            <div class="col-sm-10">
                                                <input id="budget" value="<?php echo$budget; ?>" name="budget" type="text" class="form-control" required>
                                            </div>
                                        </div>                                       

                                        <div class="row mb-3">
                                            <center>
                                                <div class="col-sm-10">
                                                    <button id="submit" name="submit" type="submit" class="btn btn-primary"><i class="fa-solid fa-puzzle-piece"></i>&nbsp;Update Scheme</button>
                                                </div>                                                
                                            </center>
                                        </div>

                                    </form><!-- End General Form Elements -->



                                    <?php
                                    if (isset($_POST['submit'])) 
                                    {
                                        // Sanitize and retrieve the POST data
                                        $scheme =  $_POST['name'];
                                        $sdate =  $_POST['sdate'];
                                        $edate =  $_POST['edate'];
                                        $budget =  $_POST['budget'];
                                        //check username email and emp_id
                                        $res = mysqli_query($con, "UPDATE `tbl_project` SET `project`='$scheme',`sdate`='$sdate',`edate`='$edate', `budget`='$budget',`status`='0' WHERE `id`='$id1'");
                                        if ($res) {                                           
                                                echo "<script>                
                                                   swal({
                                                       icon: 'success',
                                                       title: 'Success',
                                                       text: 'Updated Successfully!',
                                                       }).then(function() {
                                                           window.location = 'addProject.php';
                                                       });                        
                                                       </script>";
                                                       //header('location: addScheme.php');
                                            } 
                                            else {
                                                echo "
                                                   <script>                
                                                       swal({
                                                           icon: 'info',
                                                           title:'Failed',
                                                           text: 'System Error!',
                                                           }).then(function() {
                                                           window.location = 'addProject.php';
                                                           });                        
                                                           </script>";
                                                          // header('location: addScheme.php');
                                            }
                                    }
                                    

                                    ///////////////////////////////

                                    ?>


                                </div>
                            </div>

                        </div>



                       



                    </div>
                </section>
                <!-- end form -->
            </main>
            

            <?php require('footer.php'); ?>


</body>

</html>