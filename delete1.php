<?php
include('db.php');

if(isset($_GET['action']))
{
    $sql="DELETE FROM `1_immunization` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['anc']))
{
    $sql="DELETE FROM `01_anc` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}


if(isset($_GET['ins']))
{
    $sql="DELETE FROM `02_delivery` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['BCG']))
{
    $sql="DELETE FROM `03_bcg` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['opv']))
{
    $sql="DELETE FROM `04_opv` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['penta']))
{
    $sql="DELETE FROM `05_penta` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['rota']))
{
    $sql="DELETE FROM `06_rota` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['pcv']))
{
    $sql="DELETE FROM `07_pcv` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}


if(isset($_GET['ipv']))
{
    $sql="DELETE FROM `08_ipv` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}
if(isset($_GET['mr']))
{
    $sql="DELETE FROM `09_mr` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['full']))
{
    $sql="DELETE FROM `10_full` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['child']))
{
    $sql="DELETE FROM `11_child` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['vs']))
{
    $sql="DELETE FROM `13_vhsnd` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}



if(isset($_GET['dead']))
{
    $sql="DELETE FROM `12_birth_death` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['snp']))
{
    $sql="DELETE FROM `14_snp` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['mal']))
{
    $sql="DELETE FROM `15_mal_nutrition` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}


if(isset($_GET['mtc']))
{
    $sql="DELETE FROM `16_mtc` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['ifa']))
{
    $sql="DELETE FROM `17_ifa` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['b']))
{
    $sql="DELETE FROM `18_beneficiary` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['c']))
{
    $sql="DELETE FROM `19_beneficiary_3_6` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['adol']))
{
    $sql="DELETE FROM `20_beneficiary_adol` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}

if(isset($_GET['infra']))
{
    $sql="DELETE FROM `21_infra` WHERE id='$_GET[id]'";
    $result=mysqli_query($con,$sql);   
    if ($result) {                                           
       header('location: report.php');
    } 
    else {
        header('location: report.php');
    }
}
?>
