<?php
// Assuming $con is your database connection
include('db.php');
if (isset($_GET['district_code']) && isset($_GET['block_code'])) {
    $districtCode = $_GET['district_code'];
    $blockCode = $_GET['block_code'];

    // Adjust table names and column names based on your schema
    $query = "SELECT * FROM tbl_sector WHERE dcode = '$districtCode' AND bcode = '$blockCode'";
    $stmt = mysqli_query($con, $query);

    $sectors = array();

    while ($row = mysqli_fetch_array($stmt)) {
        $sector = array(
            'sector_code' => $row['sectorcode'],
            'sector_name' => $row['sector_Name']
        );
        $sectors[] = $sector;
    }

    header('Content-Type: application/json');
    echo json_encode($sectors);
} else {
    echo json_encode(array()); // Return an empty array if no district_code or block_code is provided
}
?>
