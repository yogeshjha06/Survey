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

        $about = $row['about'];
        $fb = $row['fb'];
        $insta = $row['insta']; 
        $twitter = $row['twitter'];
        $web = $row['linkedin'];
    }
    $s="SELECT * FROM `tbl_district` WHERE `district_code`='$district'";
    $r=mysqli_query($con,$s);
    $ro=mysqli_fetch_array($r);
    $dis=$ro['district_name'];
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
    <title>Profile - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">

    <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
</head>

<body class="sb-nav-fixed">

<?php 
require('header.php'); 

if(isset($_GET['id']))
{
    $cid=$_GET['id'];
    $sql="SELECT * FROM `tbl_login` WHERE `id`='$cid'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    
        $name6 = $row['officerName'];
        $email6 = $row['email'];
        $phone6 = $row['officerMObile'];        
        $designation6 = $row['designation'];
        $cid = $row[0];

        $district6 = $row['dcodeb'];
        $block6 = $row['bcode'];
        $sector6 = $row['sector']; //sector name

        $about6 = $row['about'];
        $fb6 = $row['fb'];
        $insta6 = $row['insta']; 
        $twitter6 = $row['twitter'];
        $web6 = $row['linkedin'];

        $onl=$row['online'];

        $s6="SELECT * FROM `tbl_district` WHERE `district_code`='$district6'";
        $r6=mysqli_query($con,$s6);
        $ro6=mysqli_fetch_array($r6);
        $dis6=$ro6['district_name'];

        $s1="SELECT * FROM `tbl_block` WHERE `block_code`='$block6'";
        $r1=mysqli_query($con,$s1);
        $ro1=mysqli_fetch_array($r1);
        $blo1=$ro1['block_name'];


        $s0="SELECT * FROM `tbl_sector` WHERE `sectorcode`='$sector6'";
        $r0=mysqli_query($con,$s0);
        $ro0=mysqli_fetch_array($r0);
        $sec0=$ro0['sector_Name'];
    
}
?>


        </div>
        <div id="layoutSidenav_content">
            <main  style="padding: 15px;">
                <!-- start form add new admin -->
                <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
              <h2><a href="">
                
                <?php 
                if($onl==1)
                    echo "<i style='font-size: 0.43em;' color='green' class=' fa-solid fa-circle'></i>".$name6;
                else
                    echo $name6;              
                ?>&nbsp;<i style="height: 10px; width: 10px;" class="bi bi-patch-check-fill"></i></a></h2>
              <h3><?php echo $designation6." Profile Gov Jharkhand";?></h3>
              <div class="social-links mt-2">
                <a href="<?php echo $twitter6;?>" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $fb6;?>" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $insta6;?>" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $web6;?>" target="_blank" class="website"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Privacy</button>
                </li> -->
<!--- 
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>
--->
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo $about6;?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $name6;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Role</div>
                    <div class="col-lg-9 col-md-8"><?php echo $designation6;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">District</div>
                    <div class="col-lg-9 col-md-8"><?php echo $dis6;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Block</div>
                    <div class="col-lg-9 col-md-8"><?php echo $blo1;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Sector</div>
                    <div class="col-lg-9 col-md-8"><?php echo $sec0;?></div>
                  </div>
                
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email6;?></div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $phone6;?></div>
                  </div>
                


                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="#" method="post">
                    <!-- <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/user.png" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div> -->
<!-- 
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $name;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?php echo $about;?></textarea>
                      </div>
                    </div> -->


                   

                    
                        <!--- social media platform link---->
                    <!-- <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $phone;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $email;?>">
                      </div>
                    </div>
                        
                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter" value="<?php echo $twitter;?>">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="Facebook" value="<?php echo $fb;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="<?php echo $insta;?>">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Website</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="website" type="text" class="form-control" id="website" value="<?php echo $web;?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button name="submit" type="submit" class="btn btn-outline-primary"><i class="fa-regular fa-floppy-disk"></i> &nbsp;Save Changes</button>
                    </div>
                  </form> -->
                  
                  <!-- End Profile Edit Form -->
                  <?php
                //   if(isset($_POST['submit']))
                //   {
                //     //update user info
                //     $name1=$_POST['fullName'];
                //     $about1=$_POST['about'];
                //     $email1=$_POST['email'];
                //     $phone1=$_POST['phone'];                    
                //     $twitter1=$_POST['twitter'];
                //     $fb1=$_POST['facebook'];
                //     $insta1=$_POST['instagram'];
                //     $web1=$_POST['website'];  

                //     //prevent sql injection
                //     $name1 = $con->real_escape_string($name1);
                //     $email1 = $con->real_escape_string($email1);
                //     $phone1 = $con->real_escape_string($phone1);
                //     $twitter1 = $con->real_escape_string($twitter1);
                //     $fb1 = $con->real_escape_string($fb1);
                //     $insta1 = $con->real_escape_string($insta1);
                //     $web1 = $con->real_escape_string($web1);
                //     $about1 = $con->real_escape_string($about1);

                //     ///insert updated data
                //     $sql = "UPDATE `tbl_login` SET officerName = '$name1', email = '$email1', officerMObile = '$phone1', twitter = '$twitter1', fb = '$fb1' , insta = '$insta1', about = '$about1', linkedin = '$web1'  WHERE id = '$id'";                    
                //     $res=mysqli_query($con, $sql);
                //     if($res)
                //     {
                //       echo"<script>                
                //       swal({
                //           icon: 'success',
                //           title: 'Success',
                //           text: 'Data Updated Successfully!',
                //           }).then(function() {
                //               window.location = 'profile.php';
                //           });                        
                //           </script>";
                //     }

                //     else
                //     echo"<script>                
                //     swal({
                //         icon: 'error',
                //         title: 'Sorry',
                //         text: 'Please try again!',
                //         }).then(function() {
                //             window.location = 'profile.php';
                //         });                        
                //         </script>";
                //     }
                    ?>
                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <!-- <form action="#" method="post">

                  <div class="row mb-3">
                      <label for="old" class="col-md-4 col-lg-3 col-form-label">Old Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="old" type="password" class="form-control" id="old" placeholder="Old Password">
                      </div>
                    </div>

                        <div class="row mb-3">
                      <label for="new1" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new1" type="password" class="form-control" id="new1" placeholder="New Password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="new2" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new2" type="password" class="form-control" id="new2" placeholder="Repeat New Password">
                      </div>
                    </div>

                        
                    <div class="text-center">
                      <button name="ok" type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-lock"></i>&nbsp; Save Changes</button>
                    </div> -->
                  <!-- </form> -->
                  
                  <!-- End password Form -->
                      <?php 
                    //   if(isset($_POST['ok']))
                    //   {
                    //     $old=$_POST['old'];
                    //     $new1=$_POST['new1'];
                    //     $new2=$_POST['new2'];

                    //     //prevent sql injection
                    //     $old = $con->real_escape_string($old);
                    //     $new1 = $con->real_escape_string($new1);
                    //     $new2 = $con->real_escape_string($new2);


                    //     if($password==$old)
                    //     {
                    //       if($new1==$new2)
                    //       {
                    //         $sql="UPDATE `tbl_login` SET password='$new1' WHERE id='$id'";
                    //         $result=mysqli_query($con,$sql);
                    //         if($result)
                    //         {
                    //           echo"<script>                
                    //           swal({
                    //               icon: 'success',
                    //               title: 'Success',
                    //               text: 'Password Updated Successfully!',
                    //               }).then(function() {
                    //                   window.location = 'profile.php';
                    //               });                        
                    //               </script>";
                    //         }
                    //         else
                    //         {
                    //           echo"<script>                
                    //           swal({
                    //               icon: 'error',
                    //               title: 'Sorry',
                    //               text: 'Please try again!',
                    //               }).then(function() {
                    //                   window.location = 'profile.php';
                    //               });                        
                    //               </script>";
                    //         }
                    //       }
                    //       else
                    //       {
                    //         echo"<script>                
                    //         swal({
                    //             icon: 'error',
                    //             title: 'Sorry',
                    //             text: 'New Passwords do not match!',
                    //             }).then(function() {
                    //                 window.location = 'profile.php';
                    //             });                        
                    //             </script>";
                    //       }
                    //     }
                    //     else
                    //       {
                    //         echo"<script>                
                    //         swal({
                    //             icon: 'error',
                    //             title: 'Sorry',
                    //             text: 'Wrong attempt, old password do not match!',
                    //             }).then(function() {
                    //                 window.location = 'profile.php';
                    //             });                        
                    //             </script>";
                    //       }
                    //   }
                      ?>
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  
                
                
                
                
                <!-- Change Password Form -->
                  <!-- <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>
                   -->
                  <!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
                <!-- end form -->
            </main>
            

            <?php require('footer.php'); ?>



  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>