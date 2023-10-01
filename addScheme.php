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
<!DOCTYPE html>
<html lang="en">

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

        </div>
        <div id="layoutSidenav_content">
            <main  style="padding: 15px;">
                <!-- start form add new admin -->
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Add New Scheme</h5>

                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                                        <div class="row mb-4">
                                            <label for="name" class="col-sm-2 col-form-label">Scheme Name</label>
                                            <div class="col-sm-10">
                                                <input id="name" name="name" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="sdate" class="col-sm-2 col-form-label">Start Date</label>
                                            <div class="col-sm-10">
                                                <input id="sdate" name="sdate" type="date" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="edate" class="col-sm-2 col-form-label">End Date</label>
                                            <div class="col-sm-10">
                                                <input id="edate" name="edate" type="date" class="form-control" required>
                                            </div>
                                        </div>                                       

                                        <div class="row mb-3">
                                            <center>
                                                <div class="col-sm-10">
                                                    <button id="submit" name="submit" type="submit" class="btn btn-primary"><i class="fa-solid fa-puzzle-piece"></i>&nbsp;Add Scheme</button>
                                                </div>
                                            </center>
                                        </div>

                                    </form><!-- End General Form Elements -->



                                    <?php
                                    if (isset($_POST['submit'])) {
                                        // Sanitize and retrieve the POST data
                                        $scheme =  $_POST['name'];
                                        $sdate =  $_POST['sdate'];
                                        $edate =  $_POST['edate'];
                                        
                                        //check username email and emp_id
                                        $res = mysqli_query($con, "SELECT * FROM `tbl_scheme` WHERE scheme='$scheme'");
                                        if (mysqli_num_rows($res) > 0) {
                                            //user already present
                                            echo "
                                               <script>                
                                                   swal({
                                                       icon: 'error',
                                                       title: 'Aborted',
                                                       text: 'Scheme already present in our database!',
                                                       }).then(function() {
                                                           window.location = 'addScheme.php';
                                                       });                        
                                               </script>";
                                        } else {
                                            // date_default_timezone_set("Asia/Calcutta");
                                            // $date_now = date("Y-m-d");
                                            //insert data query
                                            $sql = "INSERT INTO `tbl_scheme`(`scheme`, `sdate`, `edate`) VALUES ('$scheme','$sdate','$edate')";
                                            $result = $con->query($sql);
                                            if ($result) {
                                                echo "<script>                
                                                   swal({
                                                       icon: 'success',
                                                       title: 'Success',
                                                       text: 'New Scheme Successfully Added!',
                                                       }).then(function() {
                                                           window.location = 'addScheme.php';
                                                       });                        
                                                       </script>";
                                            } else {
                                                echo "
                                                   <script>                
                                                       swal({
                                                           icon: 'info',
                                                           title:'Failed',
                                                           text: 'Unable to add new scheme!',
                                                           }).then(function() {
                                                           window.location = 'addScheme.php';
                                                           });                        
                                                           </script>";
                                            }
                                        }
                                    }

                                    ///////////////////////////////

                                    ?>


                                </div>
                            </div>

                        </div>


<div  style="padding: 12px;">
                        <div class="card mb-4" >
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Scheme List 
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Scheme</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Scheme</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    
                                    
                                <?php
                                    $query = "SELECT * FROM `tbl_scheme` ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        echo"
                                        <tr>
                                        <th scope='row'><a href='#'>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['sdate']."</td>
                                        <td>".$row['edate']."</td>";
                                        if($row['status'] == '0')
                                        echo"
                                        <td><span class='badge bg-success'> Active </span></td>
                                        <td><a href='schemeStatus.php?id=$row[id]&action=10' class='btn btn-outline-dark'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Change Status</a>&nbsp;
                                        <a href='editScheme.php?id=$row[id]&action=6' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                    </tr>
                                    ";   
                                    else  
                                    echo"
                                        <td><span class='badge bg-danger'> Deactivated </span></td>
                                        <td><a href='schemeStatus.php?id=$row[id]&action=1' class='btn btn-outline-warning'><i class='fa-solid fa-marker'></i>&nbsp; Change Status</a>
                                        &nbsp;
                                        <a href='editScheme.php?id=$row[id]&action=6' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                                        </td>
                                    </tr>
                                    ";     
                                    $beneficary1++;  
                                            
                                    } 
                                ?>            
                                </tbody>
                            </table>
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