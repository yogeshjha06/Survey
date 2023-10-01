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
    <title>Add New Admin - Admin</title>
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
            <main style="padding: 15px;">
                <!-- start form add new admin -->
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Add New Admin</h5>

                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                                        <div class="row mb-4">
                                            <label for="name" class="col-sm-2 col-form-label">Admin Name</label>
                                            <div class="col-sm-10">
                                                <input id="name" name="name" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input id="phone" name="phone" type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input id="email" name="email" type="email" class="form-control" required>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Designation</label>
                                            <div class="col-sm-10">
                                                <select id="designation" name="designation" class="form-select" aria-label="Default select example" required>
                                                    <option value="" selected>Select Type </option>
                                                    <option value="Sector">Sector</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">District</label>
                                        <div class="col-sm-10">
                                            <select id="districtSelect" name="districtSelect" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>Select District</option>
                                            <?php
                                                // Assuming $con is your database connection
                                                $query = "SELECT * FROM tbl_district WHERE district_code='$district'";
                                                $stmt = mysqli_query($con, $query);
                                                while($row = mysqli_fetch_array($stmt)) {
                                                echo "<option value='".$row['district_code']."'>".$row['district_name']."</option>";       
                                                } 
                                            ?>                      
                                            </select>
                                        </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Block</label>
                                            <div class="col-sm-10">
                                                <select id="blockSelect" name="blockSelect" class="form-select" aria-label="Default select example" required>
                                                    <option value="" selected>Select Block</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Sector</label>
                                            <div class="col-sm-10">
                                                <select id="sectorSelect" name="sectorSelect" class="form-select" aria-label="Default select example" required>
                                                    <option value="" selected>Select Sector</option>
                                                </select>
                                            </div>
                                        </div>

                                        <script>
                                        // Get references to the dropdowns
                                        const districtSelect = document.getElementById('districtSelect');
                                        const blockSelect = document.getElementById('blockSelect');
                                        const sectorSelect = document.getElementById('sectorSelect');

                                        // Function to populate the block dropdown based on district selection
                                        function populateBlockDropdown(selectedDistrict) {
                                            // Clear existing options in the block dropdown
                                            blockSelect.innerHTML = '<option value="" selected>Select Block</option>';

                                            // Fetch blocks associated with the selected district from the server using AJAX
                                            if (selectedDistrict !== '') {
                                                fetch('get_blocks.php?district_code=' + selectedDistrict)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        data.forEach(block => {
                                                            const option = document.createElement('option');
                                                            option.value = block.block_code;
                                                            option.textContent = block.block_name;
                                                            blockSelect.appendChild(option);
                                                        });
                                                    })
                                                    .catch(error => console.error('Error fetching blocks:', error));
                                            }
                                        }

                                        // Function to populate the sector dropdown based on district and block selections
                                        function populateSectorDropdown(selectedDistrict, selectedBlock) {
                                            // Clear existing options in the sector dropdown
                                            sectorSelect.innerHTML = '<option value="" selected>Select Sector</option>';

                                            // Fetch sectors associated with the selected district and block from the server using AJAX
                                            if (selectedDistrict !== '' && selectedBlock !== '') {
                                                fetch('get_sectors.php?district_code=' + selectedDistrict + '&block_code=' + selectedBlock)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        data.forEach(sector => {
                                                            const option = document.createElement('option');
                                                            option.value = sector.sector_code;
                                                            option.textContent = sector.sector_name;
                                                            sectorSelect.appendChild(option);
                                                        });
                                                    })
                                                    .catch(error => console.error('Error fetching sectors:', error));
                                            }
                                        }

                                        // Add event listeners to the district and block dropdowns
                                        districtSelect.addEventListener('change', () => {
                                            const selectedDistrict = districtSelect.value;
                                            populateBlockDropdown(selectedDistrict);
                                        });

                                        blockSelect.addEventListener('change', () => {
                                            const selectedDistrict = districtSelect.value;
                                            const selectedBlock = blockSelect.value;
                                            populateSectorDropdown(selectedDistrict, selectedBlock);
                                        });
                                        </script>



                                        <div class="row mb-3">
                                            <center>
                                                <div class="col-sm-10">
                                                    <button id="submit" name="submit" type="submit" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i>&nbsp;Add Admin</button>
                                                </div>
                                            </center>
                                        </div>

                                    </form><!-- End General Form Elements -->



                                    <?php
                                    if (isset($_POST['submit'])) {
                                        // Sanitize and retrieve the POST data
                                        $name11 =  $_POST['name'];
                                        $phone11 =  $_POST['phone'];
                                        $email11 =  $_POST['email'];
                                        $designation11 =  $_POST['designation'];

                                        $district11 =  $_POST['districtSelect'];
                                        $block11 =  $_POST['blockSelect'];
                                        $sector11 =  $_POST['sectorSelect'];
                                        //check username email and emp_id
                                        $res = mysqli_query($con, "SELECT * FROM `tbl_login` WHERE email='$email11'");
                                        if (mysqli_num_rows($res) > 0) {
                                            //user already present
                                            echo "
                                               <script>                
                                                   swal({
                                                       icon: 'error',
                                                       title: 'Aborted',
                                                       text: 'User already present in our database!',
                                                       }).then(function() {
                                                           window.location = 'addcdpo.php';
                                                       });                        
                                               </script>";
                                        } else {
                                            date_default_timezone_set("Asia/Calcutta");
                                            $date_now = date("Y-m-d");
                                            //insert data query
                                            $sql = "INSERT INTO `tbl_login`( `officerName`, `officerMObile`, `email`, `designation`, `password`, `urole`, `dcodeb`, `bcode`, `sector`) VALUES ('$name11','$phone11','$email11', '$designation11', '$phone11' , '$designation11', '$district11', '$block11', '$sector11')";
                                            $result = $con->query($sql);
                                            if ($result) {
                                                echo "<script>                
                                                   swal({
                                                       icon: 'success',
                                                       title: 'Success',
                                                       text: 'New Admin Successfully Added!',
                                                       }).then(function() {
                                                           window.location = 'addcdpo.php';
                                                       });                        
                                                       </script>";
                                            } else {
                                                echo "
                                                   <script>                
                                                       swal({
                                                           icon: 'info',
                                                           title:'Failed',
                                                           text: 'Unable to add new admin!',
                                                           }).then(function() {
                                                           window.location = 'addcdpo.php';
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


                    </div>
                </section>
                <!-- end form -->
            </main>
            

            <?php require('footer.php'); ?>


</body>

</html>