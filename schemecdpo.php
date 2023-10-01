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
    <title>Scheme - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">


    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>


</head>

<body class="sb-nav-fixed">

<?php require('header.php'); ?>

        </div>
        <div id="layoutSidenav_content">
            <main style="padding: 15px;">
      <!-- start table -->

      <div class="card mb-4">
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
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Scheme</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Status</th>

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
                                        
                                    </tr>
                                    ";   
                                    else  
                                    echo"
                                        <td><span class='badge bg-danger'> Deactivated </span></td>
                                        
                                    </tr>
                                    ";     
                                    $beneficary1++;  
                                            
                                    } 
                                ?>            
                                </tbody>
                            </table>
                        </div>
                    </div>


      <!-- end table -->

            </main>
            

           <?php require('footer.php'); ?>




</body>

</html>