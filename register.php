<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ticket - Admin</title>

        <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Generate Ticket</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your name" required />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input name="subject" class="form-control" id="inputLastName" type="text" placeholder="Enter Subject" required/>
                                                        <label for="inputLastName">Subject</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="email" class="form-control" id="inputFirstName" type="email" placeholder="Enter your email" required />
                                                        <label for="inputFirstName">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select name="issue" class="form-select" required>
                                                            <option value="">Select Problem</option>
                                                            <option value="Login Related">Login Related Issue</option>
                                                            <option value="Server">Techinical Issue</option>
                                                            <option value="Support">Support</option>
                                                            <option value="Traning">Traning</option>
                                                            <option value="use">Usage</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                        <label for="inputLastName">Subject</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="msg" class="form-control" id="inputEmail" type="text" placeholder="Enter Your Message" required/>
                                                <label for="inputEmail">Message</label>
                                            </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" name="ok" class="btn btn-outline-primary btn-block"><i class="fa-solid fa-ticket"></i>&nbsp;Generate Ticket</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

            <?php
            function generateRandomString($length = 8) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';
            
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
            
                return $randomString;
            }
            
            

            
            if(isset($_POST['ok']))
            {
                include('db.php');
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $issue = $_POST['issue'];
                $msg = $_POST['msg'];
                $status = "Pending";

                $name = mysqli_real_escape_string($con,$name);
                $email = mysqli_real_escape_string($con,$email);
                $subject = mysqli_real_escape_string($con,$subject);
                $issue = mysqli_real_escape_string($con,$issue);
                $msg = mysqli_real_escape_string($con,$msg);
                $status = mysqli_real_escape_string($con,$status);


                date_default_timezone_set('Asia/Kolkata');
                // Get the current date and time
                $date = date('d-m-Y');
                $time = date('H:i:s');
                $token = generateRandomString();
                $token = mysqli_real_escape_string($con,$token);

                $sql = "INSERT INTO `token`(`name`, `email`, `subject`, `issue`, `msg`, `status`, `time`, `date`,`token`) VALUES ('$name','$email','$subject','$issue','$msg','$status','$time','$date','$token')";
                $res = mysqli_query($con,$sql);
                try
                {
                        if($res)
                        {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>Ticket Genrated Successfully !</strong> Your ticked number is <b>".$token."</b>. Keep it safe for future reference.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                        ";
                        }
                        else
                        {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>Failed To Genrate Ticket !</strong> Please try again later.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";
                                    header("refresh:2;url=index.php");
                        }
                }
                catch(Exception $e)
                    {            
                        header("location: index.php");
                    }   
             }
            ?>
            <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Department of Women, Child Development & Social Security 2023</div>
                        <div>
                            <!-- <a href="#"></a>
                                &middot; -->
                            <a href="https://jsac.jharkhand.gov.in/">Designed & Devloped By Jharkhand Space Applications Center</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
