<?php
include('db.php');
if (!isset($_SESSION['is_login'])) {
    header('location: index.php');
    die();
} 
if (!isset($_SESSION['ch18'])) {
    header('location: survey.php');
    exit();
} 
else {

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
    <title>Survey - Admin</title>
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
                                    <h5 class="card-title">IAF Tablet Distribution Status Survey</h5>

                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Scheme</label>
                                        <div class="col-sm-10">
                                            <select id="scheme" name="scheme" class="form-select" aria-label="Default select example" required>
                                            <option value="" disabled selected>Select Scheme</option>
                                            <?php
                                                // Assuming $con is your database connection
                                                $query = "SELECT * FROM tbl_scheme WHERE status='0'";
                                                $stmt = mysqli_query($con, $query);
                                                while($row = mysqli_fetch_array($stmt)) {
                                                echo "<option value='".$row['scheme']."'>".$row['scheme']."</option>";       
                                                } 
                                            ?>                      
                                            </select>
                                        </div>
                                        </div>


                                        <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Project</label>
                                        <div class="col-sm-10">
                                            <select id="project" name="project" class="form-select" aria-label="Default select example" required>
                                            <option value="" disabled selected>Select Project</option>
                                            <?php
                                                // Assuming $con is your database connection
                                                $query = "SELECT * FROM tbl_project WHERE status='0'";
                                                $stmt = mysqli_query($con, $query);
                                                while($row = mysqli_fetch_array($stmt)) {
                                                echo "<option value='".$row['project']."'>".$row['project']."</option>";       
                                                } 
                                            ?>                      
                                            </select>
                                        </div>
                                        </div>


                                    

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Month</label>
                                            <div class="col-sm-10">
                                                <select id="month" name="month" class="form-select" aria-label="Default select example" required>
                                                    <option value="" disabled selected>Select Type </option>
                                                    <option value="Jan">January</option>
                                                    <option value="Feb">February</option>
                                                    <option value="Mar">March</option>
                                                    <option value="Apr">April</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">June</option>
                                                    <option value="Jul">July</option>
                                                    <option value="Aug">August</option>
                                                    <option value="Sep">September</option>
                                                    <option value="Oct">October</option>
                                                    <option value="Nov">November</option>
                                                    <option value="Dec">December</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">District</label>
                                        <div class="col-sm-10">
                                            <select id="districtSelect" name="districtSelect" class="form-select" aria-label="Default select example" required>
                                            <option disabled value="" selected>Select District</option>
                                            <?php
                                                // Assuming $con is your database connection
                                                $query = "SELECT * FROM tbl_district";
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
                                                    <option disabled value=""  selected>Select Block</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Sector</label>
                                            <div class="col-sm-10">
                                                <select id="sectorSelect" name="sectorSelect" class="form-select" aria-label="Default select example" required>
                                                    <option value="" disabled selected>Select Sector</option>
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
                                            blockSelect.innerHTML = '<option disabled value="" selected>Select Block</option>';

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
                                            sectorSelect.innerHTML = '<option disabled value="" selected>Select Sector</option>';

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



                                        <div class="row mb-4">
                                            <h5>Stage One Survey</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv1" class="col-sm-2 col-form-label">Pregnant Women Enroll (Target)</label>
                                            <div class="col-sm-10">
                                                <input id="opv1" placeholder="Enter Number" name="opv1" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv2" class="col-sm-2 col-form-label">Pregnant Women Recived IAF Tablets 180 (Achievement)</label>
                                            <div class="col-sm-10">
                                                <input id="opv2" placeholder="Enter Number" name="opv2" type="number" class="form-control" required>
                                            </div>
                                        </div>   
                                        
                                        <div class="row mb-4">
                                            <h5>Stage Two Survey</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv3" class="col-sm-2 col-form-label">Nursing Women Enroll (Target)</label>
                                            <div class="col-sm-10">
                                                <input id="opv3" placeholder="Enter Number" name="opv3" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv4" class="col-sm-2 col-form-label">Nursing Women Recived IAF Tablets 180 (Achievement)</label>
                                            <div class="col-sm-10">
                                                <input id="opv4" placeholder="Enter Number" name="opv4" type="number" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <h5>Stage Three Survey</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv5" class="col-sm-2 col-form-label">School Girl Enroll (Target)</label>
                                            <div class="col-sm-10">
                                                <input id="opv5" placeholder="Enter Number" name="opv5" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv6" class="col-sm-2 col-form-label">School Girl Recived IAF Tablets (Achievement)</label>
                                            <div class="col-sm-10">
                                                <input id="opv6" placeholder="Enter Number" name="opv6" type="number" class="form-control" required>
                                            </div>
                                        </div>
                                        

                                        <div class="row mb-3">
                                            <center>
                                                <div class="col-sm-10">
                                                    <button id="submit" name="submit" type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
                                                </div>
                                            </center>
                                        </div>

                                    </form><!-- End General Form Elements -->



                                    <?php
                                    if (isset($_POST['submit'])) {
                                        // Sanitize and retrieve the POST data
                                        $scheme  =  mysqli_real_escape_string($con, $_POST['scheme']);
                                        $project =  mysqli_real_escape_string($con, $_POST['project']);
                                        $month   =  mysqli_real_escape_string($con, $_POST['month']);
                                        
                                        $opv1    =  mysqli_real_escape_string($con, $_POST['opv1']);
                                        $opv2    =  mysqli_real_escape_string($con, $_POST['opv2']);

                                        $opv3    =  mysqli_real_escape_string($con, $_POST['opv3']);
                                        $opv4    =  mysqli_real_escape_string($con, $_POST['opv4']);

                                        $opv5    =  mysqli_real_escape_string($con, $_POST['opv5']);
                                        $opv6    =  mysqli_real_escape_string($con, $_POST['opv6']);

                                        
                                        $district1 =  $_POST['districtSelect'];
                                        $block1 =  $_POST['blockSelect'];
                                        $sector1 =  $_POST['sectorSelect'];

                                        date_default_timezone_set("Asia/Calcutta");
                                        $date_now = date("Y-m-d");

                                        //insert data query
                                        $res = mysqli_query($con, "INSERT INTO `17_ifa`(`project`, `scheme`, `month`, `district`, `block`, `sector`, `pregnant_women_enroll`, `pregnant_women_iaf_180`, `nursing_women_enroll`, `nursing_women_iaf_180`, `girl_enroll`, `girl_iaf`, `date`, `submitted`, `submitedID`) VALUES ('$project','$scheme','$month','$district1','$block1','$sector1','$opv1','$opv2','$opv3','$opv4','$opv5','$opv6','$date_now','$name', '$id')");


                                        if ($res) {
                                            unset($_SESSION['ch18']);
                                            //inserted successfully                                            
                                                echo "<script>                
                                                   swal({
                                                       icon: 'success',
                                                       title: 'Success',
                                                       text: 'Survey Successfully Added!',
                                                       }).then(function() {
                                                           window.location = 'survey.php';
                                                       });                        
                                                       </script>";
                                            } 
                                        else 
                                        {
                                                echo "
                                                   <script>                
                                                       swal({
                                                           icon: 'info',
                                                           title:'Failed',
                                                           text: 'Unable to add survey!',
                                                           }).then(function() {
                                                           window.location = 'survey.php';
                                                           });                        
                                                           </script>";
                                            }
                                        }                                    
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