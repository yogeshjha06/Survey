<?php
$id = $_SESSION['id'];
//code to fetch all details of user
$query = "SELECT * FROM tbl_login WHERE id='$id'";
$stmt = mysqli_query($con, $query);
$row = mysqli_fetch_array($stmt); 
    $name = $row['officerName'];

$sql = "SELECT COUNT(*) AS total_entries FROM `1_immunization` WHERE `submittedBy`='$name';";
try
{
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the sum result
        $row = $result->fetch_assoc();
        $sum = $row["total_entries"];
    } 
    else 
    {
        $sum=0;
    }
}
catch(Exception $e)
{
    $sum=0;
    //echo $e->getMessage();
}



$sql1 = "SELECT COUNT(*) AS total_anc FROM `01_anc` WHERE `submitedid`='$id';";
try
{
    $result1 = $con->query($sql1);

    if ($result1->num_rows > 0) {
        // Fetch the sum result
        $row1 = $result1->fetch_assoc();
        $anc1 = $row1["total_anc"];        
    } else 
    {
        $anc1=0;
    }
}
catch(Exception $e)
{
    $anc1=0;
    //echo $e->getMessage();
}

$sql2 = "SELECT COUNT(*) AS total_anc FROM `02_delivery` WHERE `submitedid`='$id';";
try
{
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) {
        // Fetch the sum result
        $row2 = $result2->fetch_assoc();
        $del = $row2["total_anc"];        
    } else 
    {
        $del=0;
    }
}
catch(Exception $e)
{
    $del=0;
    //echo $e->getMessage();
}


$sql3 = "SELECT COUNT(*) AS total_anc FROM `02_delivery` WHERE `submitedid`='$id';";
try
{
    $result3 = $con->query($sql3);

    if ($result3->num_rows > 0) {
        // Fetch the sum result
        $row3 = $result3->fetch_assoc();
        $bcg = $row3["total_anc"];        
    } else 
    {
        $bcg=0;
    }
}
catch(Exception $e)
{
    $bcg=0;
    //echo $e->getMessage();
}


$sql4 = "SELECT COUNT(*) AS total_anc FROM `04_opv` WHERE `submitedid`='$id';";
try
{
    $result4 = $con->query($sql4);

    if ($result4->num_rows > 0) {
        // Fetch the sum result
        $row4 = $result4->fetch_assoc();
        $opv = $row4["total_anc"];        
    } else 
    {
        $opv=0;
    }
}
catch(Exception $e)
{
    $opv=0;
    //echo $e->getMessage();
}

$sql5 = "SELECT COUNT(*) AS total_anc FROM `05_penta` WHERE `submitedid`='$id';";
try
{
    $result5 = $con->query($sql5);

    if ($result5->num_rows > 0) {
        // Fetch the sum result
        $row5 = $result5->fetch_assoc();
        $penta = $row5["total_anc"];        
    } else 
    {
        $penta=0;
    }
}
catch(Exception $e)
{
    $penta=0;
    //echo $e->getMessage();
}

$sql6 = "SELECT COUNT(*) AS total_anc FROM `06_rota` WHERE `submitedid`='$id';";
try
{
    $result6 = $con->query($sql6);

    if ($result6->num_rows > 0) {
        // Fetch the sum result
        $row6 = $result6->fetch_assoc();
        $rota = $row6["total_anc"];        
    } else 
    {
        $rota=0;
    }
}
catch(Exception $e)
{
    $rota=0;
    //echo $e->getMessage();
}

$sql7 = "SELECT COUNT(*) AS total_anc FROM `07_pcv` WHERE `submitedID`='$id';";
try
{
    $result7 = $con->query($sql7);

    if ($result7->num_rows > 0) {
        // Fetch the sum result
        $row7 = $result7->fetch_assoc();
        $pcv = $row7["total_anc"];        
    } else 
    {
        $pcv=0;
    }
}
catch(Exception $e)
{
    $pcv=0;
    //echo $e->getMessage();
}


$sql8 = "SELECT COUNT(*) AS total_anc FROM `08_ipv` WHERE `submitedID`='$id';";
try
{
    $result8 = $con->query($sql8);

    if ($result8->num_rows > 0) {
        // Fetch the sum result
        $row8 = $result8->fetch_assoc();
        $ipv = $row8["total_anc"];        
    } else 
    {
        $ipv=0;
    }
}
catch(Exception $e)
{
    $ipv=0;
    //echo $e->getMessage();
}

$sql9 = "SELECT COUNT(*) AS total_anc FROM `09_mr` WHERE `submitedID`='$id';";
try
{
    $result9 = $con->query($sql9);

    if ($result9->num_rows > 0) {
        // Fetch the sum result
        $row9 = $result9->fetch_assoc();
        $mr = $row9["total_anc"];        
    } else 
    {
        $mr=0;
    }
}
catch(Exception $e)
{
    $mr=0;
    //echo $e->getMessage();
}

$sql10 = "SELECT COUNT(*) AS total_anc FROM `10_full` WHERE `submitedID`='$id';";
try
{
    $result10 = $con->query($sql10);

    if ($result10->num_rows > 0) {
        // Fetch the sum result
        $row10 = $result10->fetch_assoc();
        $full = $row10["total_anc"];        
    } else 
    {
        $full=0;
    }
}
catch(Exception $e)
{
    $full=0;
    //echo $e->getMessage();
}


$sql11 = "SELECT COUNT(*) AS total_anc FROM `11_child` WHERE `submitedID`='$id';";
try
{
    $result11 = $con->query($sql11);

    if ($result11->num_rows > 0) {
        // Fetch the sum result
        $row11 = $result11->fetch_assoc();
        $child = $row11["total_anc"];        
    } else 
    {
        $child=0;
    }
}
catch(Exception $e)
{
    $child=0;
    //echo $e->getMessage();
}
$sql12 = "SELECT COUNT(*) AS total_anc FROM `13_vhsnd` WHERE `submitedID`='$id';";
try
{
    $result12 = $con->query($sql12);

    if ($result12->num_rows > 0) {
        // Fetch the sum result
        $row12 = $result12->fetch_assoc();
        $vs = $row12["total_anc"];        
    } else 
    {
        $vs=0;
    }
}
catch(Exception $e)
{
    $vs=0;
    //echo $e->getMessage();
}

$sql13 = "SELECT COUNT(*) AS total_anc FROM `12_birth_death` WHERE `submitedID`='$id';";
try
{
    $result13 = $con->query($sql13);

    if ($result13->num_rows > 0) {
        // Fetch the sum result
        $row13 = $result13->fetch_assoc();
        $bd = $row13["total_anc"];        
    } else 
    {
        $bd=0;
    }
}
catch(Exception $e)
{
    $bd=0;
    //echo $e->getMessage();
}

$sql14 = "SELECT COUNT(*) AS total_anc FROM `14_snp` WHERE `submitedID`='$id';";
try
{
    $result14 = $con->query($sql14);

    if ($result14->num_rows > 0) {
        // Fetch the sum result
        $row14 = $result14->fetch_assoc();
        $snp = $row14["total_anc"];        
    } else 
    {
        $snp=0;
    }
}
catch(Exception $e)
{
    $snp=0;
    //echo $e->getMessage();
}

$sql15 = "SELECT COUNT(*) AS total_anc FROM `15_mal_nutrition` WHERE `submitedID`='$id';";
try
{
    $result15 = $con->query($sql15);

    if ($result15->num_rows > 0) {
        // Fetch the sum result
        $row15 = $result15->fetch_assoc();
        $mal = $row15["total_anc"];        
    } else 
    {
        $mal=0;
    }
}
catch(Exception $e)
{
    $mal=0;
    //echo $e->getMessage();
}


$sql16 = "SELECT COUNT(*) AS total_anc FROM `16_mtc` WHERE `submitedID`='$id';";
try
{
    $result16 = $con->query($sql16);

    if ($result16->num_rows > 0) {
        // Fetch the sum result
        $row16 = $result16->fetch_assoc();
        $mtc = $row16["total_anc"];        
    } else 
    {
        $mtc=0;
    }
}
catch(Exception $e)
{
    $mtc=0;
    //echo $e->getMessage();
}

$sql17 = "SELECT COUNT(*) AS total_anc FROM `17_ifa` WHERE `submitedID`='$id';";
try
{
    $result17 = $con->query($sql17);

    if ($result17->num_rows > 0) {
        // Fetch the sum result
        $row17 = $result17->fetch_assoc();
        $ifa = $row17["total_anc"];        
    } else 
    {
        $ifa=0;
    }
}
catch(Exception $e)
{
    $ifa=0;
    //echo $e->getMessage();
}

$sql18 = "SELECT COUNT(*) AS total_anc FROM `18_beneficiary` WHERE `submitedID`='$id';";
try
{
    $result18 = $con->query($sql18);

    if ($result18->num_rows > 0) {
        // Fetch the sum result
        $row18 = $result18->fetch_assoc();
        $b = $row18["total_anc"];        
    } else 
    {
        $b=0;
    }
}
catch(Exception $e)
{
    $b=0;
    //echo $e->getMessage();
}

$sql19 = "SELECT COUNT(*) AS total_anc FROM `19_beneficiary_3_6` WHERE `submitedID`='$id';";
try
{
    $result19 = $con->query($sql19);

    if ($result19->num_rows > 0) {
        // Fetch the sum result
        $row19 = $result19->fetch_assoc();
        $b1 = $row19["total_anc"];        
    } else 
    {
        $b1=0;
    }
}
catch(Exception $e)
{
    $b1=0;
    //echo $e->getMessage();
}
$sql20 = "SELECT COUNT(*) AS total_anc FROM `20_beneficiary_adol` WHERE `submitedID`='$id';";
try
{
    $result20 = $con->query($sql20);

    if ($result20->num_rows > 0) {
        // Fetch the sum result
        $row20 = $result20->fetch_assoc();
        $adol = $row20["total_anc"];        
    } else 
    {
        $adol=0;
    }
}
catch(Exception $e)
{
    $adol=0;
    //echo $e->getMessage();
}

$sql21 = "SELECT COUNT(*) AS total_anc FROM `21_infra` WHERE `submitedID`='$id';";
try
{
    $result21 = $con->query($sql21);

    if ($result21->num_rows > 0) {
        // Fetch the sum result
        $row21 = $result21->fetch_assoc();
        $inf = $row21["total_anc"];        
    } else 
    {
        $inf=0;
    }
}
catch(Exception $e)
{
    $inf=0;
    //echo $e->getMessage();
}
?>


<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="row">
        <!-- T1, T2, T3 -->
        <div class="col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">T1, T2, T3</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $sum; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- ANC -->
        <div class="col-md-3">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">ANC</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $anc1; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Institutional Delivery -->
        <div class="col-md-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Institutional Delivery</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $del; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- BCG -->
        <div class="col-md-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">BCG</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $bcg; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- OPV -->
        <div class="col-md-3">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">OPV</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $opv; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- PENTA -->
        <div class="col-md-3">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">PENTA</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $penta; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- ROTA -->
        <div class="col-md-3">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">ROTA</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $rota; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- pcv -->
        <div class="col-md-3">
            <div class="card bg-light text-dark mb-4">
                <div class="card-body">PCV</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-dark stretched-link"><?php echo "<b>Total : </b>" . $pcv; ?></label>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>


        <!-- ipv -->
        <div class="col-md-3">
            <div class="card bg-primary text-light mb-4">
                <div class="card-body">IPV</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-light stretched-link"><?php echo "<b>Total : </b>" . $ipv; ?></label>
                    <div class="small text-light"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- mr -->
        <div class="col-md-3">
            <div class="card bg-warning text-light mb-4">
                <div class="card-body">MR JE VAT A</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-light stretched-link"><?php echo "<b>Total : </b>" . $mr; ?></label>
                    <div class="small text-light"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- Full -->
        <div class="col-md-3">
            <div class="card bg-success text-light mb-4">
                <div class="card-body">Full Immunization</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-light stretched-link"><?php echo "<b>Total : </b>" . $full; ?></label>
                    <div class="small text-light"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- Child  -->
        <div class="col-md-3">
            <div class="card bg-danger text-light mb-4">
                <div class="card-body">Child Birth Status</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-light stretched-link"><?php echo "<b>Total : </b>" . $child; ?></label>
                    <div class="small text-light"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!---- birth death ----->
        <div class="col-md-3">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">Birth & Death</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $bd; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- Vhsnd  -->
        <div class="col-md-3">
            <div class="card bg-info text-light mb-4">
                <div class="card-body">VHSND</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-light stretched-link"><?php echo "<b>Total : </b>" . $vs; ?></label>
                    <div class="small text-light"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!----- snp ----->
        <div class="col-md-3">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">SNP</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $snp; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- mal nutrition -->
        <div class="col-md-3">
            <div class="card bg-light text-dark mb-4">
                <div class="card-body">Mal Nutrition</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-dark stretched-link"><?php echo "<b>Total : </b>" . $mal; ?></label>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- mtc -->
        <div class="col-md-3">
            <div class="card bg-primary text-light mb-4">
                <div class="card-body">MTC</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-light stretched-link"><?php echo "<b>Total : </b>" . $mtc; ?></label>
                    <div class="small text-light"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- IFA -->
        <div class="col-md-3">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">IFA</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $ifa; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Beneficary 0-3 -->
        <div class="col-md-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Beneficiary Details (0-3 years)</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $b; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Beneficary 3-6 -->
        <div class="col-md-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Beneficiary Details (3-6 years)</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $b1; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">

        </div>

        <!---- Beneficary adolesent  ----->
        <div class="col-md-3">
            <div class="card bg-info text-light mb-4">
                <div class="card-body">Beneficiary Details (Adolscent)</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $adol; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>


        <!---- infrastructure   ----->
        <div class="col-md-3">
            <div class="card bg-secondary text-light mb-4">
                <div class="card-body">Infrastructure Details</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <label class="small text-white stretched-link"><?php echo "<b>Total : </b>" . $inf; ?></label>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>




    </div>
</div>

     


                    
                   