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
        $status=$row['userStatus'];
        if($status==0)
        {
            $q="UPDATE `tbl_login` SET `userStatus`='1' WHERE `id`='$id'";
            $s=mysqli_query($con,$q);
            $q1="UPDATE `tbl_login` SET `online`='1' WHERE `id`='$id'";
            $s1=mysqli_query($con,$q1);
        }
        else
        {
            $q1="UPDATE `tbl_login` SET `online`='1' WHERE `id`='$id'";
            $s1=mysqli_query($con,$q1);
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
    <title>Dashboard - Admin</title>
    <!-- excel -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var ctx = document.getElementById("myAreaChart");

var labels = <?php echo json_encode($labels); ?>;
var dataValues = <?php echo json_encode($dataValues); ?>;

var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: dataValues,
    }],
  },
  options: {
    // Your chart options
  }
});
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
</head>

<body class="sb-nav-fixed">
    <?php require('header.php'); ?>


        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php
                    if($designation=='Admin'||$designation=='DSWO'||$designation=='CDPO')
                    {
                        require('d1.php');                        
                    }                        
                    else
                    {
                        include('d3.php');
                    }
                ?>
            </main>

            <?php require('footer.php'); ?>
</body>

</html>