<?php
// Assuming $con is your database connection
include('db.php');

if (isset($_GET['district_code'])) {
    $districtCode = $_GET['district_code'];

    $query = "SELECT * FROM tbl_block WHERE district_code = '$districtCode'";
    $stmt = mysqli_query($con, $query);

    $blocks = array();

    while ($row = mysqli_fetch_array($stmt)) {
        $block = array(
            'block_code' => $row['block_code'],
            'block_name' => $row['block_name']
        );
        $blocks[] = $block;
    }

    header('Content-Type: application/json');
    echo json_encode($blocks);
} else {
    echo json_encode(array()); // Return an empty array if no district_code is provided
}
?>
