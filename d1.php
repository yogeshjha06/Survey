<?php

$sql = "SELECT 
        SUM(CAST(reg_preg_women AS INTEGER)) AS total_sum,
        SUM(CAST(tt1_target AS INTEGER)) AS total_tt1_target,
        SUM(CAST(tt1_achieved AS INTEGER)) AS total_tt1_achieved,
        SUM(CAST(tt2_target AS INTEGER)) AS total_tt2_target,
        SUM(CAST(tt2_achieved AS INTEGER)) AS total_tt2_achieved,
        SUM(CAST(ttbooster_target AS INTEGER)) AS ttbooster_target,
        SUM(CAST(ttboster_achieved AS INTEGER)) AS ttboster_achieved
        FROM `1_immunization`;
        ";
try
{
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the sum result
        $row = $result->fetch_assoc();
        $sum = $row["total_sum"];
        $tt1_target = $row["total_tt1_target"];
        $tt1_achieved = $row["total_tt1_achieved"];
        $tt1=($tt1_achieved/$tt1_target)*100;
        $tt1=round($tt1,2);
        $tt2_target = $row["total_tt2_target"];
        $tt2_achieved = $row["total_tt2_achieved"];
        $tt2=($tt2_achieved/$tt2_target)*100;
        $tt2=round($tt2,2);
        $ttbooster_target = $row["ttbooster_target"];
        $ttboster_achieved = $row["ttboster_achieved"];
        $ttbooster=($ttboster_achieved/$ttbooster_target)*100;
        $tt3=round($ttbooster,2);
    } else 
    {
        $sum=0;
    }
}
catch(Exception $e)
{
    $sum=0;
    //echo $e->getMessage();
}



$s="SELECT COUNT(*) AS total_entries FROM `tbl_login`;";
$result = $con->query($s);
$row = $result->fetch_assoc();
$tt1 = $row['total_entries'];

$s1="SELECT COUNT(*) AS total_entries FROM `tbl_project`;";
$result = $con->query($s1);
$row = $result->fetch_assoc();
$tt2 = $row['total_entries'];

$s3="SELECT COUNT(*) AS total_entries FROM `tbl_scheme`;";
$result = $con->query($s3);
$row = $result->fetch_assoc();
$tt3 = $row['total_entries'];
?>


                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Total Women Enroll</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <label class="small text-white stretched-link"><?php echo$sum; ?></label>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Total Active User's</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <label class="small text-white stretched-link"><?php echo$tt1; ?></label>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Total Project</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <label class="small text-white stretched-link"><?php echo$tt2; ?></label>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Total Scheme</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <label class="small text-white stretched-link"><?php echo$tt3; ?></label>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Vaccination Chart
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Scheme Wise Vaccination Chart
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>


                    
                    
                </div>