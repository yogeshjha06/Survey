<?php
include('db.php');
if (!isset($_SESSION['is_login'])) {
    header('location: index.php');
    die();
} else {
    ob_start();
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
    <title>Survey Record - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">

    <!-- excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .scrollable-container {
            white-space: nowrap; /* Prevent text from wrapping */
            overflow-x: auto; /* Enable horizontal scrolling */
            padding-top: 2px;
            padding-bottom: 5px;
           
        }

        /* Style for individual buttons */
        .scrollable-button {
            display: inline-block; /* Display buttons in a row */
            padding: 5px 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            cursor: pointer;
            margin-right: 2px;
        }

       /* Style for the scrollbar */
       .scrollable-container::-webkit-scrollbar {
            width: 2px; 
            height: 7px;
        }
        .scrollable-container::-webkit-scrollbar-track {
            background-color: #f1f1f1; 
        }
        .scrollable-container::-webkit-scrollbar-thumb {
            background-color: #c8e4fa; 
            border-radius: 10px;
        }
        .scrollable-container::-webkit-scrollbar-thumb:hover {
            background-color: #6CB4EE;
        }

    </style>
</head>

<body class="sb-nav-fixed">

<?php require('header.php'); ?>

        </div>
        <div id="layoutSidenav_content">
            <main style="padding: 15px;">
            <center>
            <h5 style="padding: 5px 10px;
                                        background-color: #6CB4EE; 
                                        border: 1px solid #dee2e6; 
                                        border-radius: 5px; 
                                        color: white;
                                        cursor: pointer;                                    
                                        ">MASTER REPORT DATA</h5>
            </center>
            <div class="scrollable-container">
                <div class="scrollable-button" id="t1">T1, T2, Booster</div>
                <div class="scrollable-button" id="anc">ANC</div>
                <div class="scrollable-button" id="ins">Institutional Delivery</div>
                <div class="scrollable-button" id="bcg">BCG</div>
                <div class="scrollable-button" id="opv">OPV</div>
                <div class="scrollable-button" id="penta">PENTA</div>
                <div class="scrollable-button" id="rota">ROTA</div>
                <div class="scrollable-button" id="pcv">PCV</div>
                <div class="scrollable-button" id="ipv">IPV</div>
                <div class="scrollable-button" id="mr">MR/JE</div>
                <div class="scrollable-button" id="imu">Immunization</div>
                <div class="scrollable-button" id="cb">Child Birth</div>
                <div class="scrollable-button" id="bd">Birth/Death</div>

                <div class="scrollable-button" id="vh">VHSND</div>
                <div class="scrollable-button" id="snp">SNP</div>
                <div class="scrollable-button" id="mal">Mal Nutrition</div>
                <div class="scrollable-button" id="mtc">MTC</div>
                <div class="scrollable-button" id="ifa">IFA</div>

                <div class="scrollable-button" id="1">Beneficiary (0-3 years)</div>
                <div class="scrollable-button" id="2">Beneficiary (3-6 years)</div>
                <div class="scrollable-button" id="3">Beneficiary (14-18 years)</div>
                <div class="scrollable-button" id="infra">Infrastructure</div>
            </div>
<br>
            <script>
                        $(document).ready(function(){
                        $("#t1").click(function() {
                            var targetDiv = $("#GFG");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#anc").click(function() {
                            var targetDiv = $("#GFG1");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#ins").click(function() {
                            var targetDiv = $("#GFG2");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });



                    $(document).ready(function(){
                        $("#bcg").click(function() {
                            var targetDiv = $("#GFG3");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#opv").click(function() {
                            var targetDiv = $("#GFG4");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#penta").click(function() {
                            var targetDiv = $("#GFG5");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });
                    $(document).ready(function(){
                        $("#rota").click(function() {
                            var targetDiv = $("#GFG6");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#pcv").click(function() {
                            var targetDiv = $("#GFG7");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#ipv").click(function() {
                            var targetDiv = $("#GFG8");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#mr").click(function() {
                            var targetDiv = $("#GFG9");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#imu").click(function() {
                            var targetDiv = $("#GFG10");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#cb").click(function() {
                            var targetDiv = $("#GFG11");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#bd").click(function() {
                            var targetDiv = $("#GFG12");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#vh").click(function() {
                            var targetDiv = $("#GFG13");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#snp").click(function() {
                            var targetDiv = $("#GFG14");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });
                    $(document).ready(function(){
                        $("#mal").click(function() {
                            var targetDiv = $("#GFG15");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });
                    $(document).ready(function(){
                        $("#mtc").click(function() {
                            var targetDiv = $("#GFG16");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#ifa").click(function() {
                            var targetDiv = $("#GFG17");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });
                    $(document).ready(function(){
                        $("#1").click(function() {
                            var targetDiv = $("#GFG18");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#2").click(function() {
                            var targetDiv = $("#GFG19");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });


                    $(document).ready(function(){
                        $("#3").click(function() {
                            var targetDiv = $("#GFG20");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });

                    $(document).ready(function(){
                        $("#infra").click(function() {
                            var targetDiv = $("#GFG21");
                            $('html, body').animate({
                                scrollTop: targetDiv.offset().top
                            }, 500); // Scroll smoothly to the target div
                        });
                    });
                    

            </script>
            
            <section class="section">
            <div class="row">
        
<!-------- T1/T2/Booster start  -------------->
            <div class="col-lg-12">
              <!-- master beneficiary table start -->
             <div class="card recent-sales overflow-auto">
             

             
             <div id="GFG">
               <div  class="card-body">
                <h5 class="card-title">T1, T2, Booster Survey  
                  <span>| 
                  <button id="downloadExcelButton" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>
                  </span></h5>
               <table id="datatablesSimple"  class="table table-borderless datatable">
                    <thead>
                      <tr>
                                        <th>Sn</th>
                                        <th>Scheme</th>
                                        <th>Project</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Block</th>
                                        <th scope="col">Sector</th>
                                        <th>Total Pregnant Women</th>
                                        <th>TT1 Target</th>
                                        <th>TT1 Achived</th>
                                        <th>TT1 Percent</th>
                                        <th>TT2 Target</th>
                                        <th>TT2 Achived</th>
                                        <th>TT1 Percent</th>
                                        <th>TT Booster Target</th>
                                        <th>TT Booster Achived</th>
                                        <th>TT1 Percent</th>
                                        <th>Date</th> 
                                        <th>Action</th> 
                                        <th>Archive</th> 
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `1_immunization` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $tt1_target = $row['tt1_target'];
                                        $tt1_achieved = $row['tt1_achieved'];
                                        $tt1_percent = ($tt1_achieved/$tt1_target)*100;
                                        $tt1_percent = round($tt1_percent, 2);

                                        $tt2_target = $row['tt2_target'];
                                        $tt2_achieved = $row['tt2_achieved'];
                                        $tt2_percent = ($tt2_achieved/$tt2_target)*100;
                                        $tt2_percent = round($tt2_percent, 2);

                                        $ttbooster_target = $row['ttbooster_target'];
                                        $ttbooster_achieved = $row['ttboster_achieved'];
                                        $ttbooster_percent = ($ttbooster_achieved/$ttbooster_target)*100;
                                        $ttbooster_percent = round($ttbooster_percent, 2);

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['schemename']."</td>
                                        <td>".$row['projectName']."</td>
                                        <td>".$row['month']."</td>
                                        <td>".$row['forYear']."</td>
                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>
                                        <td>".$row['reg_preg_women']."</td>
                                        <td>".$row['tt1_target']."</td>
                                        <td>".$row['tt1_achieved']."</td>
                                        <td>".$tt1_percent." %"."</td>
                                        <td>".$row['tt2_target']."</td>
                                        <td>".$row['tt2_achieved']."</td>
                                        <td>".$tt2_percent." %"."</td>
                                        <td>".$row['ttbooster_target']."</td>
                                        <td>".$row['ttboster_achieved']."</td>
                                        <td>".$ttbooster_percent." %"."</td>
                                        <td>".$row['submittedOn']."</td>

                                        <td>
                                        <a href='surveyedit.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&action=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('downloadExcelButton').addEventListener('click', () => {
                        const table = document.getElementById('datatablesSimple');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 't1_t2_booster_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>
                  </table>
                  </div>
               </div>

           </div><!-- survey master data end -->
            </div>



            <!-------- T1/T2/Booster END  -------------->



            <!-------- ANC Start  -------------->

           <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG1">
               <div  class="card-body">
                <h5 class="card-title">ANC Survey  <span>| 
                <button id="downloadSurvey" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="tableSurvey" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">ANC 1 (Target)</th>
                                    <th scope="col">ANC 1 (Achived)</th>
                                    <th scope="col">ANC 1 (Percent)</th>
                                    <th scope="col">ANC 2 (Target)</th>
                                    <th scope="col">ANC 2 (Achived)</th>
                                    <th scope="col">ANC 2 (Percent)</th>
                                    <th scope="col">ANC 3 (Target)</th>
                                    <th scope="col">ANC 3 (Achived)</th>
                                    <th scope="col">ANC 3 (Percent)</th>
                                    <th scope="col">ANC 4 (Target)</th>
                                    <th scope="col">ANC 4 (Achived)</th>
                                    <th scope="col">ANC 4 (Percent)</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `01_anc` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $anc1           = $row['anc_due'];
                                        $anc1_done      = $row['anc_done'];
                                        $anc1_percent   = ($anc1_done/$anc1)*100;
                                        $anc1_percent   = round($anc1_percent, 2);

                                        $anc2           = $row['anc2'];
                                        $anc2_done      = $row['anc2_done'];
                                        $anc2_percent   = ($anc2_done/$anc2)*100;
                                        $anc2_percent   = round($anc2_percent, 2);

                                        $anc3           = $row['anc3'];
                                        $anc3_done      = $row['anc3_done'];
                                        $anc3_percent   = ($anc3_done/$anc3)*100;
                                        $anc3_percent   = round($anc3_percent, 2);

                                        $anc4           = $row['anc4'];
                                        $anc4_done      = $row['anc4_done'];
                                        $anc4_percent   = ($anc4_done/$anc4)*100;
                                        $anc4_percent   = round($anc4_percent, 2);

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];


                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$anc1."</td>
                                        <td>".$anc1_done."</td>
                                        <td>".$anc1_percent." %"."</td>

                                        <td>".$anc2."</td>
                                        <td>".$anc2_done."</td>
                                        <td>".$anc2_percent." %"."</td>

                                        <td>".$anc3."</td>
                                        <td>".$anc3_done."</td>
                                        <td>".$anc3_percent." %"."</td>

                                        <td>".$anc4."</td>
                                        <td>".$anc4_done."</td>
                                        <td>".$anc4_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit1.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&anc=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('downloadSurvey').addEventListener('click', () => {
                        const table = document.getElementById('tableSurvey');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'ANC_Survey_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
           </div>

            <!-------- ANC End  -------------->

            <!-------- Institutional Delivery Survey Start  -------------->
             <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG2">
               <div  class="card-body">
                <h5 class="card-title">Institutional Delivery Survey  <span>| 
                <button id="download2" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table2" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">Institutional Delivery (Target)</th>
                                    <th scope="col">Institutional Delivery (Achived)</th>
                                    <th scope="col">Institutional Delivery (Percent)</th>
                                    <th scope="col">Assisted  Birth (SBA) </th>
                                    <th scope="col">Non Assisted  Birth</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `02_delivery` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $anc1           = $row['target'];
                                        $anc1_done      = $row['archived'];
                                        $anc1_percent   = ($anc1_done/$anc1)*100;
                                        $anc1_percent   = round($anc1_percent, 2);

                                        $anc2           = $row['skill'];
                                        $anc2_done      = $row['non_assisted'];
                                        $anc2_percent   = $anc2_done+$anc2;

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$anc1."</td>
                                        <td>".$anc1_done."</td>
                                        <td>".$anc1_percent." %"."</td>

                                        <td>".$anc2."</td>
                                        <td>".$anc2_done."</td>
                                        <td>".$anc2_percent."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit2.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&ins=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download2').addEventListener('click', () => {
                        const table = document.getElementById('table2');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'institutional_delivery_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>

            <!-------- Institutional Delivery Survey End  -------------->




            <!-------- BCG Survey Start  -------------->

             <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG3">
               <div  class="card-body">
                <h5 class="card-title">BCG Survey  <span>| 
                <button id="download3" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table3" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">BCG (Target)&nbsp;</th>
                                    <th scope="col">BCG (Achived)</th>
                                    <th scope="col">BCG (Percent)</th>

                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `03_bcg` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $anc1           = $row['bcg1'];
                                        $anc1_done      = $row['bcg2'];
                                        $anc1_percent   = ($anc1_done/$anc1)*100;
                                        $anc1_percent   = round($anc1_percent, 2);

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$anc1."</td>
                                        <td>".$anc1_done."</td>
                                        <td>".$anc1_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit3.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&BCG=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download3').addEventListener('click', () => {
                        const table = document.getElementById('table3');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'bcg_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>
            <!-------- BCG Survey END  -------------->

            <!-------- OPV 0-3 Start  -------------->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG4">
               <div  class="card-body">
                <h5 class="card-title">OPV Survey  <span>| 
                <button id="download4" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table4" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">OPV-0 (Target)</th>
                                    <th scope="col">OPV-0 (Achived)</th>
                                    <th scope="col">OPV-0 (Percent)</th>

                                    <th scope="col">OPV-1 (Target)</th>
                                    <th scope="col">OPV-1 (Achived)</th>
                                    <th scope="col">OPV-1 (Percent)</th>

                                    <th scope="col">OPV-2 (Target)</th>
                                    <th scope="col">OPV-2 (Achived)</th>
                                    <th scope="col">OPV-2 (Percent)</th>

                                    <th scope="col">OPV-3 (Target)</th>
                                    <th scope="col">OPV-3 (Achived)</th>
                                    <th scope="col">OPV-3 (Percent)</th>

                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `04_opv` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $opv0           = $row['opv0'];
                                        $opv0_done      = $row['opv0_done'];
                                        $opv0_percent   = ($opv0_done/$opv0)*100;
                                        $opv0_percent   = round($opv0_percent, 2);

                                        $opv1           = $row['opv1'];
                                        $opv1_done      = $row['opv1_done'];
                                        $opv1_percent   = ($opv1_done/$opv1)*100;
                                        $opv1_percent   = round($opv1_percent, 2);

                                        $opv2           = $row['opv2'];
                                        $opv2_done      = $row['opv2_done'];
                                        $opv2_percent   = ($opv2_done/$opv2)*100;
                                        $opv2_percent   = round($opv2_percent, 2);

                                        $opv3           = $row['opv3'];
                                        $opv3_done      = $row['opv3_done'];
                                        $opv3_percent   = ($opv3_done/$opv3)*100;
                                        $opv3_percent   = round($opv3_percent, 2);

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$opv0."</td>
                                        <td>".$opv0_done."</td>
                                        <td>".$opv0_percent." %"."</td>

                                        <td>".$opv1."</td>
                                        <td>".$opv1_done."</td>
                                        <td>".$opv1_percent." %"."</td>

                                        <td>".$opv2."</td>
                                        <td>".$opv2_done."</td>
                                        <td>".$opv2_percent." %"."</td>

                                        <td>".$opv3."</td>
                                        <td>".$opv3_done."</td>
                                        <td>".$opv3_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit4.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&opv=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download4').addEventListener('click', () => {
                        const table = document.getElementById('table4');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'opv_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>
            <!-------- OPV 0-3 END  -------------->



            <!-------- PENTA 1-2-3 START  -------------->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG5">
               <div  class="card-body">
                <h5 class="card-title">PENTA Survey  <span>| 
                <button id="download5" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table5" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">PENTA-1 (Target)</th>
                                    <th scope="col">PENTA-1 (Achived)</th>
                                    <th scope="col">PENTA-1 (Percent)</th>

                                    <th scope="col">PENTA-2 (Target)</th>
                                    <th scope="col">PENTA-2 (Achived)</th>
                                    <th scope="col">PENTA-2 (Percent)</th>

                                    <th scope="col">PENTA-3 (Target)</th>
                                    <th scope="col">PENTA-3 (Achived)</th>
                                    <th scope="col">PENTA-3 (Percent)</th>

                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `05_penta` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $opv0           = $row['penta1'];
                                        $opv0_done      = $row['penta1_done'];
                                        $opv0_percent   = ($opv0_done/$opv0)*100;
                                        $opv0_percent   = round($opv0_percent, 2);

                                        $opv1           = $row['penta2'];
                                        $opv1_done      = $row['penta2_done'];
                                        $opv1_percent   = ($opv1_done/$opv1)*100;
                                        $opv1_percent   = round($opv1_percent, 2);

                                        $opv2           = $row['penta3'];
                                        $opv2_done      = $row['penta3_done'];
                                        $opv2_percent   = ($opv2_done/$opv2)*100;
                                        $opv2_percent   = round($opv2_percent, 2);

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$opv0."</td>
                                        <td>".$opv0_done."</td>
                                        <td>".$opv0_percent." %"."</td>

                                        <td>".$opv1."</td>
                                        <td>".$opv1_done."</td>
                                        <td>".$opv1_percent." %"."</td>

                                        <td>".$opv2."</td>
                                        <td>".$opv2_done."</td>
                                        <td>".$opv2_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit5.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&penta=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download5').addEventListener('click', () => {
                        const table = document.getElementById('table5');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'penta_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>

            <!-------- PENTA END  -------------->
            
            <!-------- ROTA START  -------------->
            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG6">
               <div  class="card-body">
                <h5 class="card-title">ROTA Survey  <span>| 
                <button id="download6" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table6" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">ROTA VIRUS-1 (Target)</th>
                                    <th scope="col">ROTA VIRUS-1 (Achived)</th>
                                    <th scope="col">ROTA VIRUS-1 (Percent)</th>

                                    <th scope="col">ROTA VIRUS-2 (Target)</th>
                                    <th scope="col">ROTA VIRUS-2 (Achived)</th>
                                    <th scope="col">ROTA VIRUS-2 (Percent)</th>

                                    <th scope="col">ROTA VIRUS-3 (Target)</th>
                                    <th scope="col">ROTA VIRUS-3 (Achived)</th>
                                    <th scope="col">ROTA VIRUS-3 (Percent)</th>

                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `06_rota` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $opv0           = $row['rota1'];
                                        $opv0_done      = $row['rota1_done'];
                                        $opv0_percent   = ($opv0_done/$opv0)*100;
                                        $opv0_percent   = round($opv0_percent, 2);

                                        $opv1           = $row['rota2'];
                                        $opv1_done      = $row['rota2_done'];
                                        $opv1_percent   = ($opv1_done/$opv1)*100;
                                        $opv1_percent   = round($opv1_percent, 2);

                                        $opv2           = $row['rota3'];
                                        $opv2_done      = $row['rota3_done'];
                                        $opv2_percent   = ($opv2_done/$opv2)*100;
                                        $opv2_percent   = round($opv2_percent, 2);

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$opv0."</td>
                                        <td>".$opv0_done."</td>
                                        <td>".$opv0_percent." %"."</td>

                                        <td>".$opv1."</td>
                                        <td>".$opv1_done."</td>
                                        <td>".$opv1_percent." %"."</td>

                                        <td>".$opv2."</td>
                                        <td>".$opv2_done."</td>
                                        <td>".$opv2_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit6.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&rota=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download6').addEventListener('click', () => {
                        const table = document.getElementById('table6');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'rota_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div> 
            <!-------- ROTA END  -------------->

            <!----- pcv ---->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG7">
               <div  class="card-body">
                <h5 class="card-title">PCV Survey  <span>| 
                <button id="download7" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table7" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">PCV-1 (Target)</th>
                                    <th scope="col">PCV-1 (Achived)</th>
                                    <th scope="col">PCV-1 (Percent)</th>

                                    <th scope="col">PCV-2 (Target)</th>
                                    <th scope="col">PCV-2 (Achived)</th>
                                    <th scope="col">PCV-2 (Percent)</th>

                                    <th scope="col">PCV-BOOSTER (Target)</th>
                                    <th scope="col">PCV-BOOSTER (Achived)</th>
                                    <th scope="col">PCV-BOOSTER (Percent)</th>

                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `07_pcv` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $opv0           = $row['pcv1'];
                                        $opv0_done      = $row['pcv1_done'];
                                        $opv0_percent   = ($opv0_done/$opv0)*100;
                                        $opv0_percent   = round($opv0_percent, 2);

                                        $opv1           = $row['pcv2'];
                                        $opv1_done      = $row['pcv2_done'];
                                        $opv1_percent   = ($opv1_done/$opv1)*100;
                                        $opv1_percent   = round($opv1_percent, 2);

                                        $opv2           = $row['pcv3'];
                                        $opv2_done      = $row['pcv3_done'];
                                        $opv2_percent   = ($opv2_done/$opv2)*100;
                                        $opv2_percent   = round($opv2_percent, 2);

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$opv0."</td>
                                        <td>".$opv0_done."</td>
                                        <td>".$opv0_percent." %"."</td>

                                        <td>".$opv1."</td>
                                        <td>".$opv1_done."</td>
                                        <td>".$opv1_percent." %"."</td>

                                        <td>".$opv2."</td>
                                        <td>".$opv2_done."</td>
                                        <td>".$opv2_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit7.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&pcv=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download7').addEventListener('click', () => {
                        const table = document.getElementById('table7');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'pcv_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div> 

            <!---- pcv end ---->



            <!---- ipv start ---->
            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG8">
               <div  class="card-body">
                <h5 class="card-title">IPV Survey  <span>| 
                <button id="download8" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table8" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">IPV-1 (Target)</th>
                                    <th scope="col">IPV-1 (Achived)</th>
                                    <th scope="col">IPV-1 (Percent)</th>

                                    <th scope="col">IPV-2 (Target)</th>
                                    <th scope="col">IPV-2 (Achived)</th>
                                    <th scope="col">IPV-2 (Percent)</th>

                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `08_ipv` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $opv0           = $row['ipv1'];
                                        $opv0_done      = $row['ipv1_done'];
                                        $opv0_percent   = ($opv0_done/$opv0)*100;
                                        $opv0_percent   = round($opv0_percent, 2);

                                        $opv1           = $row['ipv2'];
                                        $opv1_done      = $row['ipv2_done'];
                                        $opv1_percent   = ($opv1_done/$opv1)*100;
                                        $opv1_percent   = round($opv1_percent, 2);


                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$opv0."</td>
                                        <td>".$opv0_done."</td>
                                        <td>".$opv0_percent." %"."</td>

                                        <td>".$opv1."</td>
                                        <td>".$opv1_done."</td>
                                        <td>".$opv1_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit8.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&ipv=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download8').addEventListener('click', () => {
                        const table = document.getElementById('table8');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'ipv_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div> 

            <!---- ipv end ---->
            
            
            <!---- mr start  ---->


            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG9">
               <div  class="card-body">
                <h5 class="card-title">MR JE VAT-A Survey  <span>| 
                <button id="download9" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table9" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">MR-1 (Target)</th>
                                    <th scope="col">MR-1 (Achived)</th>
                                    <th scope="col">MR-1 (Percent)</th>
                                    <th scope="col">MR-2 (Target)</th>
                                    <th scope="col">MR-2 (Achived)</th>
                                    <th scope="col">MR-2 (Percent)</th>

                                    <th scope="col">JE-1 (Target)</th>
                                    <th scope="col">JE-1 (Achived)</th>
                                    <th scope="col">JE-1 (Percent)</th>
                                    <th scope="col">JE-2 (Target)</th>
                                    <th scope="col">JE-2 (Achived)</th>
                                    <th scope="col">JE-2 (Percent)</th>

                                    <th scope="col">VAT A -1 (Target)</th>
                                    <th scope="col">VAT A -1 (Achived)</th>
                                    <th scope="col">VAT A -1 (Percent)</th>
                                    <th scope="col">VAT A -2 (Target)</th>
                                    <th scope="col">VAT A -2 (Achived)</th>
                                    <th scope="col">VAT A -2 (Percent)</th>

                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `09_mr` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $opv0           = $row['mr1'];
                                        $opv0_done      = $row['mr1_done'];
                                        $opv0_percent   = ($opv0_done/$opv0)*100;
                                        $opv0_percent   = round($opv0_percent, 2);
                                        $opv1           = $row['mr2'];
                                        $opv1_done      = $row['mr2_done'];
                                        $opv1_percent   = ($opv1_done/$opv1)*100;
                                        $opv1_percent   = round($opv1_percent, 2);


                                        $opv2           = $row['je1'];
                                        $opv2_done      = $row['je1_done'];
                                        $opv2_percent   = ($opv0_done/$opv0)*100;
                                        $opv2_percent   = round($opv0_percent, 2);
                                        $opv3           = $row['je2'];
                                        $opv3_done      = $row['je2_done'];
                                        $opv3_percent   = ($opv1_done/$opv1)*100;
                                        $opv3_percent   = round($opv1_percent, 2);

                                        $opv4           = $row['va1'];
                                        $opv4_done      = $row['va1_done'];
                                        $opv4_percent   = ($opv0_done/$opv0)*100;
                                        $opv4_percent   = round($opv0_percent, 2);
                                        $opv5           = $row['va2'];
                                        $opv5_done      = $row['va2_done'];
                                        $opv5_percent   = ($opv1_done/$opv1)*100;
                                        $opv5_percent   = round($opv1_percent, 2);


                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$opv0."</td>
                                        <td>".$opv0_done."</td>
                                        <td>".$opv0_percent." %"."</td>
                                        <td>".$opv1."</td>
                                        <td>".$opv1_done."</td>
                                        <td>".$opv1_percent." %"."</td>

                                        <td>".$opv2."</td>
                                        <td>".$opv2_done."</td>
                                        <td>".$opv2_percent." %"."</td>
                                        <td>".$opv3."</td>
                                        <td>".$opv3_done."</td>
                                        <td>".$opv3_percent." %"."</td>

                                        <td>".$opv4."</td>
                                        <td>".$opv4_done."</td>
                                        <td>".$opv4_percent." %"."</td>
                                        <td>".$opv5."</td>
                                        <td>".$opv5_done."</td>
                                        <td>".$opv5_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit9.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&mr=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download9').addEventListener('click', () => {
                        const table = document.getElementById('table9');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'mr_je_vatA_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div> 
            <!---- mr end ---->

            <!---- full immunization start ---->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG10">
               <div  class="card-body">
                <h5 class="card-title">Full Immunization Survey  <span>| 
                <button id="download10" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

               <table id="table10" class="table table-borderless datatable">
                    <thead>
                      <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Scheme</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Month</th>

                                    <th scope="col">District</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Sector</th>

                                    <th scope="col">Full Immunization (Target)</th>
                                    <th scope="col">Full Immunization (Achived)</th>
                                    <th scope="col">Full Immunization (Percent)</th>

                                    <th scope="col">Date</th>
                                    <th scope="col">Submitted By</th>         
                                    <th scope="col">Action</th>   
                                    <th scope="col">Archive</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                    $query = "SELECT * FROM `10_full` WHERE `submitedID`='$id' ORDER BY id DESC";
                                    $stmt = mysqli_query($con, $query);

                                $beneficary1=1;
                                // Fetch and display the results
                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC))     
                                    {   

                                        $opv0           = $row['full'];
                                        $opv0_done      = $row['full1'];
                                        $opv0_percent   = ($opv0_done/$opv0)*100;
                                        $opv0_percent   = round($opv0_percent, 2);

                                        $dis            =   $row['district'];
                                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                                        $row0=mysqli_fetch_array($d1);
                                        $dis=$row0['district_name'];

                                        $blo            =   $row['block'];
                                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                                        $row1=mysqli_fetch_array($d2);
                                        $blo=$row1['block_name'];

                                        $sec            =   $row['sector'];
                                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                                        $row2=mysqli_fetch_array($d3);
                                        $sec=$row2['sector_Name'];

                                        echo"
                                        <tr>
                                        <th scope='row'><a href=''>".$beneficary1."</a></th>
                                        <td>".$row['scheme']."</td>
                                        <td>".$row['project']."</td>
                                        <td>".$row['month']."</td>

                                        <td>".$dis."</td>
                                        <td>".$blo."</td>
                                        <td>".$sec."</td>

                                        <td>".$opv0."</td>
                                        <td>".$opv0_done."</td>
                                        <td>".$opv0_percent." %"."</td>

                                        <td>".$row['date']."</td>
                                        <td>".$row['submitted']."</td>

                                        <td>
                                        <a href='surveyedit10.php?id=$row[id]' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a></td>
                                        <td>
                                        <a href='delete.php?id=$row[id]&full=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a></td>
                                    
                                    </tr>
                                    ";                                       
                                    $beneficary1++;  
                                            
                                    } 
                                ?>                        
                    </tbody>

                    <script>
                    document.getElementById('download10').addEventListener('click', () => {
                        const table = document.getElementById('table10');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'full_immunization_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div> 

            <!---- full immunization end ---->

            <!---- child start ---->


            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG11">
               <div  class="card-body">
                <h5 class="card-title">Child Birth Survey  <span>| 
                <button id="download11" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table11" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Live Births Male</th>
                    <th scope="col" >Live Births Female</th>
                    <th scope="col" >Total Live Births</th>

                    <th scope="col" >Low Birth Weight Male</th>
                    <th scope="col" >Low Birth Weight Female</th>
                    <th scope="col" >Total Low Birth Weight</th>

                    <th scope="col" >Still Births Male</th>
                    <th scope="col" >Still Births Female</th>
                    <th scope="col" >Total Still Births</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `11_child` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        $opv0           = $row['m1'];
                        $opv0_done      = $row['f1'];
                        $opv0_percent   = ($opv0_done+$opv0);

                        $opv1           = $row['m2'];
                        $opv1_done      = $row['f2'];
                        $opv1_percent   = ($opv1_done+$opv1);

                        $opv2           = $row['m3'];
                        $opv2_done      = $row['f3'];
                        $opv2_percent   = ($opv2_done+$opv2);

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $opv0 . "</td>
                        <td>" . $opv0_done . "</td>
                        <td>" . $opv0_percent . "</td>

                        <td>" . $opv1 . "</td>
                        <td>" . $opv1_done . "</td>
                        <td>" . $opv1_percent . "</td>

                        <td>" . $opv2 . "</td>
                        <td>" . $opv2_done . "</td>
                        <td>" . $opv2_percent . "</td>

                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit11.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&child=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download11').addEventListener('click', () => {
                        const table = document.getElementById('table11');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'child_birth_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div> 


            <!---- child end ---->

            <!---- birth death start ---->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG12">
               <div  class="card-body">
                <h5 class="card-title">Birth & Death Survey  <span>| 
                <button id="download12" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table12" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Number of Children Born Live</th>
                    <th scope="col" >Number of Children Reported For Birth Certificate</th>
                    <th scope="col" >Number of Deaths In The Host Area</th>

                    <th scope="col" >Number of Dead Persons Reported For Death Certificate</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `12_birth_death` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $row['live_born'] . "</td>
                        <td>" . $row['birth_certificate'] . "</td>
                        <td>" . $row['death'] . "</td>
                        <td>" . $row['death_certificate'] . "</td>

                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit12.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&dead=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download12').addEventListener('click', () => {
                        const table = document.getElementById('table12');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'Birth_Death_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div> 

            <!---- birth death end ---->


            <!------ vhsnd start ------->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG13">
               <div  class="card-body">
                <h5 class="card-title">VHSND Survey  <span>| 
                <button id="download13" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table13" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Anganwadi Centers (Target)</th>
                    <th scope="col" >VHSND Conducted (Achivement)</th>
                    <th scope="col" >Percent</th>

                    <th scope="col" >Beneficiaries availed services ( Health Checkup, Immunization, THR etc.)</th>
                    <th scope="col" >Beneficiaries counselled on Health and Nutrition</th>

                    <th scope="col" >LS</th>
                    <th scope="col" >CDPO</th>
                    <th scope="col" >MOIC</th>
                    <th scope="col" >CDPO + MOIC</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `13_vhsnd` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        $opv0           = $row['angbanri'];
                        $opv0_done      = $row['vhsnd'];
                        $opv0_percent   = ($opv0_done/$opv0)*100;
                        $opv0_percent   = round($opv0_percent, 2);

                        $opv1           = $row['beneficiaries1'];
                        $opv1_done      = $row['beneficiaries2'];
                        $opv1_percent   = $row['ls'];

                        $opv2           = $row['cdpo'];
                        $opv2_done      = $row['moic'];
                        $opv2_percent   = ($opv2_done+$opv2);

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $opv0 . "</td>
                        <td>" . $opv0_done . "</td>
                        <td>" . $opv0_percent . "%</td>

                        <td>" . $opv1 . "</td>
                        <td>" . $opv1_done . "</td>
                        <td>" . $opv1_percent . "</td>

                        <td>" . $opv2 . "</td>
                        <td>" . $opv2_done . "</td>
                        <td>" . $opv2_percent . "</td>

                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit13.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&vs=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download13').addEventListener('click', () => {
                        const table = document.getElementById('table13');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'vhsnd_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>

            <!------ vhsnd end ------->

            <!------ snp start  ------->


            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG14">
               <div  class="card-body">
                <h5 class="card-title">SNP Survey  <span>| 
                <button id="download14" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table14" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Children Enroll (3-6 years) (Target)</th>
                    <th scope="col" >Children HCM (Achivement)</th>
                    <th scope="col" >Percent</th>

                    <th scope="col" >Children Enroll (6-3 years) (Target)</th>
                    <th scope="col" >Children THR (Achivement)</th>
                    <th scope="col" >Percent</th>


                    <th scope="col" >Pregnant Women Enroll (Target)</th>
                    <th scope="col" >Pregnant Women THR (Achivement)</th>
                    <th scope="col" >Percent</th>

                    <th scope="col" >Nursing Mother (Target)</th>
                    <th scope="col" >Nursing Mother THR (Achivement)</th>
                    <th scope="col" >Percent</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `14_snp` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        $opv0           = $row['chld1'];
                        $opv0_done      = $row['child1_done'];
                        $opv0_percent   = ($opv0_done/$opv0)*100;
                        $opv0_percent   = round($opv0_percent, 2);

                        $opv1           = $row['child2'];
                        $opv1_done      = $row['child2_done'];
                        $opv1_percent   = ($opv1_done/$opv1)*100;
                        $opv1_percent   = round($opv1_percent, 2);

                        $opv2           = $row['women1'];
                        $opv2_done      = $row['women1_done'];
                        $opv2_percent   = ($opv2_done/$opv2)*100;
                        $opv2_percent   = round($opv2_percent, 2);

                        $opv3           = $row['women2'];
                        $opv3_done      = $row['women2_done'];
                        $opv3_percent   = ($opv3_done/$opv3)*100;
                        $opv3_percent   = round($opv3_percent, 2);

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $opv0 . "</td>
                        <td>" . $opv0_done . "</td>
                        <td>" . $opv0_percent . "%</td>

                        <td>" . $opv1 . "</td>
                        <td>" . $opv1_done . "</td>
                        <td>" . $opv1_percent . "%</td>

                        <td>" . $opv2 . "</td>
                        <td>" . $opv2_done . "</td>
                        <td>" . $opv2_percent . "%</td>

                        <td>" . $opv3 . "</td>
                        <td>" . $opv3_done . "</td>
                        <td>" . $opv3_percent . "%</td>

                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit14.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&snp=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download14').addEventListener('click', () => {
                        const table = document.getElementById('table14');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'snp_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>


            <!------ snp end ------->


            <!------ Mal Nutrition Start ------->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG15">
               <div  class="card-body">
                <h5 class="card-title">Mal Nutrition Survey  <span>| 
                <button id="download15" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table15" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Children Enroll (0-6 month)</th>
                    <th scope="col" >Children Enroll (0-5 year)</th>
                    <th scope="col" >Total Children Enroll For Weight Measurement</th>

                    <th scope="col" >Total Children Enroll For Height Measurement</th>
                    <th scope="col" >Margin Undernourished Children</th>
                    <th scope="col" >Total Undernourished Children (Treated)</th>


                    <th scope="col" >Total Children Referred (For MTC) From Center</th>
                    <th scope="col" >Total Children Admitted In MTC Center</th>
                    <th scope="col" >Children Follow-Up Who are Admitted In MTC Center</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `15_mal_nutrition` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $row['0_6_Month_children'] . "</td>
                        <td>" . $row['0_5_Year_children'] . "</td>
                        <td>" . $row['wt_total_child'] . "</td>

                        <td>" . $row['ht_total_child'] . "</td>
                        <td>" . $row['undernourished_child'] . "</td>
                        <td>" . $row['undernourished_child_treated'] . "</td>

                        <td>" . $row['mtc'] . "</td>
                        <td>" . $row['mtc_enroll'] . "</td>
                        <td>" . $row['mtc_follow_up'] . "</td>


                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit15.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&mal=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download15').addEventListener('click', () => {
                        const table = document.getElementById('table15');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'mal_nutritions_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>

            <!------ Mal Nutrition end ------->
            <!------ MTC Start ------->


            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG16">
               <div  class="card-body">
                <h5 class="card-title">MTC Survey  <span>| 
                <button id="download16" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table16" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >MTC Name</th>
                    <th scope="col" >Total No of Bed</th>
                    <th scope="col" >No of Bed Occupied</th>

                    <th scope="col" >Occupied Percentage</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `16_mtc` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        $opv3           = $row['total_bed'];
                        $opv3_done      = $row['occupied_bed'];
                        $opv3_percent   = ($opv3_done/$opv3)*100;
                        $opv3_percent   = round($opv3_percent, 2);

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $row['name_mtc'] . "</td>
                        <td>" . $row['total_bed'] . "</td>
                        <td>" . $row['occupied_bed'] . "</td>
                        <td>" . $opv3_percent . "%</td>


                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit16.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&mtc=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download16').addEventListener('click', () => {
                        const table = document.getElementById('table16');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'mtc_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>


             <!--------- mtc end ---------->
           
           
           
             <!----- IFA Start ---------->
                    


            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG17">
               <div  class="card-body">
                <h5 class="card-title">IFA Tablet Distribution Survey  <span>| 
                <button id="download17" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table17" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Pregnant Women Enroll (Target)</th>
                    <th scope="col" >Pregnant Women Recived IAF Tablets 180 (Achievement)</th>
                    <th scope="col" >Percentage</th>

                    <th scope="col" >Nursing Women Enroll (Target)</th>
                    <th scope="col" >Nursing Women Recived IAF Tablets 180 (Achievement)</th>
                    <th scope="col" >Percentage</th>

                    <th scope="col" >School Girl Enroll (Target)</th>
                    <th scope="col" >School Girl Recived IAF Tablets (Achievement)</th>
                    <th scope="col" >Percentage</th>


                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `17_ifa` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        $opv1           = $row['pregnant_women_enroll'];
                        $opv1_done      = $row['pregnant_women_iaf_180'];
                        $opv1_percent   = ($opv1_done/$opv1)*100;
                        $opv1_percent   = round($opv1_percent, 2);

                        $opv2           = $row['nursing_women_enroll'];
                        $opv2_done      = $row['nursing_women_iaf_180'];
                        $opv2_percent   = ($opv2_done/$opv2)*100;
                        $opv2_percent   = round($opv2_percent, 2);

                        $opv3           = $row['girl_enroll'];
                        $opv3_done      = $row['girl_iaf'];
                        $opv3_percent   = ($opv3_done/$opv3)*100;
                        $opv3_percent   = round($opv3_percent, 2);

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $opv1 . "</td>
                        <td>" . $opv1_done . "</td>
                        <td>" . $opv1_percent . "%</td>

                        <td>" . $opv2 . "</td>
                        <td>" . $opv2_done . "</td>
                        <td>" . $opv2_percent . "%</td>

                        <td>" . $opv3 . "</td>
                        <td>" . $opv3_done . "</td>
                        <td>" . $opv3_percent . "%</td>

                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit17.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&ifa=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download17').addEventListener('click', () => {
                        const table = document.getElementById('table17');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'IFA_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>

            <!------- IFA End -------->


            <!------- Beneficary 1 Start -------->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG18">
               <div  class="card-body">
                <h5 class="card-title">Beneficiary Details Survey (0-3 years)<span>| 
                <button id="download18" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table18" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Number of Male As Per Survey Data (0-6 Month)</th>
                    <th scope="col" >Number of Female As Per Survey Data (0-6 Month)</th>
                    <th scope="col" >Total</th>
                    <th scope="col" >Number of Male In Anganwadi Center (0-6 Month)</th>
                    <th scope="col" >Number of Female In Anganwadi Center (0-3 Month)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Number of Male As Per Survey Data (0 Month - 6 Years)</th>
                    <th scope="col" >Number of Female As Per Survey Data (0 Month - 6 Years)</th>
                    <th scope="col" >Total</th>
                    <th scope="col" >Number of Male In Anganwadi Center (0 Month - 6 Years)</th>
                    <th scope="col" >Number of Female In Anganwadi Center (0 Month - 6 Years)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Number of Male As Per Survey Data (1-2 Years)</th>
                    <th scope="col" >Number of Female As Per Survey Data (1-2 Years)</th>
                    <th scope="col" >Total</th>
                    <th scope="col" >Number of Male In Anganwadi Center (1-2 Years)</th>
                    <th scope="col" >Number of Female In Anganwadi Center (1-2 Years)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Number of Male As Per Survey Data (2-3 Years)</th>
                    <th scope="col" >Number of Female As Per Survey Data (2-3 Years)</th>
                    <th scope="col" >Total</th>
                    <th scope="col" >Number of Male In Anganwadi Center (2-3 Years)</th>
                    <th scope="col" >Number of Female In Anganwadi Center (2-3 Years)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `18_beneficiary` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $row['m1'] . "</td>
                        <td>" . $row['f1'] . "</td>
                        <td>" . $row['m1'] + $row['f1'] . "</td>
                        <td>" . $row['m2'] . "</td>
                        <td>" . $row['f2'] . "</td>
                        <td>" . $row['m2'] + $row['f2'] . "</td>

                        <td>" . $row['m3'] . "</td>
                        <td>" . $row['f3'] . "</td>
                        <td>" . $row['m3'] + $row['f3'] . "</td>
                        <td>" . $row['m4'] . "</td>
                        <td>" . $row['f4'] . "</td>
                        <td>" . $row['m4'] + $row['f4'] . "</td>

                        <td>" . $row['m5'] . "</td>
                        <td>" . $row['f5'] . "</td>
                        <td>" . $row['m5'] + $row['f5'] . "</td>
                        <td>" . $row['m6'] . "</td>
                        <td>" . $row['f6'] . "</td>
                        <td>" . $row['m6'] + $row['f6'] . "</td>

                        <td>" . $row['m7'] . "</td>
                        <td>" . $row['f7'] . "</td>
                        <td>" . $row['m7'] + $row['f7'] . "</td>
                        <td>" . $row['m8'] . "</td>
                        <td>" . $row['f8'] . "</td>
                        <td>" . $row['m8'] + $row['f8'] . "</td>

                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit18.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&b=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download18').addEventListener('click', () => {
                        const table = document.getElementById('table18');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'Beneficary(0-3)_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>
            <!------- Beneficary 1 End -------->

            <!------- Beneficary 2 Start -------->


            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG19">
               <div  class="card-body">
                <h5 class="card-title">Beneficiary Details Survey (3-6 years)<span>| 
                <button id="download19" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table19" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Number of Male As Per Survey Data (3-4 Years)</th>
                    <th scope="col" >Number of Female As Per Survey Data (3-4 Years)</th>
                    <th scope="col" >Total</th>
                    <th scope="col" >Number of Male In Anganwadi Center (3-4 Years)</th>
                    <th scope="col" >Number of Female In Anganwadi Center (3-4 Years)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Number of Male As Per Survey Data (4-5 Years)</th>
                    <th scope="col" >Number of Female As Per Survey Data (4-5 Years)</th>
                    <th scope="col" >Total</th>
                    <th scope="col" >Number of Male In Anganwadi Center (4-5 Years)</th>
                    <th scope="col" >Number of Female In Anganwadi Center (4-5 Years)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Number of Male As Per Survey Data (4-6 Years)</th>
                    <th scope="col" >Number of Female As Per Survey Data (4-6 Years)</th>
                    <th scope="col" >Total</th>
                    <th scope="col" >Number of Male In Anganwadi Center (4-6 Years)</th>
                    <th scope="col" >Number of Female In Anganwadi Center (4-6 Years)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `19_beneficiary_3_6` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $row['m1'] . "</td>
                        <td>" . $row['f1'] . "</td>
                        <td>" . $row['m1'] + $row['f1'] . "</td>
                        <td>" . $row['m2'] . "</td>
                        <td>" . $row['f2'] . "</td>
                        <td>" . $row['m2'] + $row['f2'] . "</td>

                        <td>" . $row['m3'] . "</td>
                        <td>" . $row['f3'] . "</td>
                        <td>" . $row['m3'] + $row['f3'] . "</td>
                        <td>" . $row['m4'] . "</td>
                        <td>" . $row['f4'] . "</td>
                        <td>" . $row['m4'] + $row['f4'] . "</td>

                        <td>" . $row['m5'] . "</td>
                        <td>" . $row['f5'] . "</td>
                        <td>" . $row['m5'] + $row['f5'] . "</td>
                        <td>" . $row['m6'] . "</td>
                        <td>" . $row['f6'] . "</td>
                        <td>" . $row['m6'] + $row['f6'] . "</td>

                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit20.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&infra=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download19').addEventListener('click', () => {
                        const table = document.getElementById('table19');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'Beneficary(3-6)_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>

            <!------- Beneficary 2 End -------->










             <!------- Beneficary 3 Start -------->


             <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG20">
               <div  class="card-body">
                <h5 class="card-title">Beneficiary Details Survey (Adolscent)<span>| 
                <button id="download20" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table20" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Number of Male As Per Survey Data (14-18 Years)</th>
                    <th scope="col" >Number of Female As Per Survey Data (14-18 Years)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Number of Male In Anganwadi Center (14-18 Years)</th>
                    <th scope="col" >Number of Female In Anganwadi Center (14-18 Years)</th>
                    <th scope="col" >Total</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `20_beneficiary_adol` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $row['m1'] . "</td>
                        <td>" . $row['f1'] . "</td>
                        <td>" . $row['m1'] + $row['f1'] . "</td>
                        <td>" . $row['m2'] . "</td>
                        <td>" . $row['f2'] . "</td>
                        <td>" . $row['m2'] + $row['f2'] . "</td>

                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit20.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&adol=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download20').addEventListener('click', () => {
                        const table = document.getElementById('table20');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'Beneficary(adolscent)_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>

            <!------- Beneficary 3 End -------->

            <!------- Infrastructure Start -------->

            <div style="padding-top: 10px;" class="col-lg-12">
              <!-- master data table start -->
             <div class="card recent-sales overflow-auto">
             

             <div  id="GFG21">
               <div  class="card-body">
                <h5 class="card-title">Infrastructure Survey<span>| 
                <button id="download21" style="border-radius: 30px; height: 35px;" class="btn btn-outline-primary float-end"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download</button>  
                </span></h5>

                <table id="table21" class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col" >Sn</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Project</th>
                    <th scope="col">Month</th>

                    <th scope="col">District</th>
                    <th scope="col">Block</th>
                    <th scope="col">Sector</th>

                    <th scope="col" >Number of AWC</th>
                    <th scope="col" >Number of Government Building</th>
                    <th scope="col" >Number of Rented AWH/AWW Building</th>

                    <th scope="col" >Number of Rented AWH/AWW Building (Other)</th>
                    <th scope="col" >School</th>
                    <th scope="col" >Group/Panchyat (Other)</th>

                    <th scope="col" >Open Area</th>
                    <th scope="col" >Drinking Water Zone</th>
                    <th scope="col" >Toilet</th>

                    <th scope="col" >Rain Water Hearvesting</th>
                    <th scope="col" >Power Supply</th>

                    <th scope="col" >Date</th>
                    <th scope="col" >Submitted By</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Archive</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `21_infra` WHERE `submitedID`='$id' ORDER BY id DESC";
                    $stmt = mysqli_query($con, $query);

                    $beneficary1 = 1;
                    // Fetch and display the results
                    while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                        

                        $dis            =   $row['district'];
                        $d1=mysqli_query($con,"SELECT * FROM `tbl_district` WHERE `district_code`='$dis'");
                        $row0=mysqli_fetch_array($d1);
                        $dis=$row0['district_name'];

                        $blo            =   $row['block'];
                        $d2=mysqli_query($con,"SELECT * FROM `tbl_block` WHERE `block_code`='$blo'");
                        $row1=mysqli_fetch_array($d2);
                        $blo=$row1['block_name'];

                        $sec            =   $row['sector'];
                        $d3=mysqli_query($con,"SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sec'");
                        $row2=mysqli_fetch_array($d3);
                        $sec=$row2['sector_Name'];

                    echo "
                    <tr>
                        <td>" . $beneficary1 . "</td>

                        <td>" . $row['scheme'] . "</td>
                        <td>" . $row['project'] . "</td>
                        <td>" . $row['month'] . "</td>
                        
                        <td>" . $dis . "</td>
                        <td>" . $blo . "</td>
                        <td>" . $sec . "</td>

                        <td>" . $row['total_awc'] . "</td>
                        <td>" . $row['gov_building'] . "</td>
                        <td>" . $row['rent_building'] + $row['f1'] . "</td>
                        <td>" . $row['other_rent'] . "</td>
                        <td>" . $row['school'] . "</td>
                        <td>" . $row['panchyat'] + $row['f2'] . "</td>

                        <td>" . $row['open_area'] . "</td>
                        <td>" . $row['water'] . "</td>
                        <td>" . $row['toilet'] + $row['f1'] . "</td>
                        <td>" . $row['rain_water'] . "</td>
                        <td>" . $row['electricity'] . "</td>


                        <td>" . $row['date'] . "</td>
                        <td>" . $row['submitted'] . "</td>
                        <td>
                        <a href='surveyedit21.php?id=" . $row['id'] . "' class='btn btn-outline-success'><i class='fa-regular fa-pen-to-square'></i> &nbsp; Edit</a>
                        </td>
                        <td>
                        <a href='delete.php?id=" . $row['id'] . "&infra=1' class='btn btn-outline-danger'><i class='fa-solid fa-trash-can'></i> &nbsp; Remove</a>
                        </td>
                    </tr>
                    ";
                    $beneficary1++;
                    }
                    ?>
                </tbody>
                </table>


                    <script>
                    document.getElementById('download21').addEventListener('click', () => {
                        const table = document.getElementById('table21');
                        const workbook = XLSX.utils.table_to_book(table);

                        // Convert the workbook to an array of arrays
                        const excelData = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

                        // Convert the array to a Blob
                        const blob = new Blob([excelData], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });

                        // Create a Blob URL and trigger the download
                        const blobURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = blobURL;
                        link.download = 'Infrastructure_List.xlsx';
                        link.click();

                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 100);
                    });

                  </script>

                  </table>

                  </div>
               </div>

             </div>
             </div>
            <!------- Infrastructure End -------->


    </section>

            
            </main>
            

           <?php require('footer.php'); ?>


           <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>