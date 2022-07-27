<?php
$conn = new mysqli("localhost", "root", "", "dailyform");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = mysqli_query($conn, "SELECT Date, Ranking, Expectation FROM dailyform_table ORDER BY Date");


$columnHeader = '';
$columnHeader = "Date" . "\t" . "Ranking" . "\t" . "Expectation" . "\t";

$setData = '';

while ($rec = mysqli_fetch_row($sql)) {
    $rowData = '';
    foreach ($rec as $value) {
        $value = '"' . $value . '"' . "\t";
        $rowData .= $value;
    }
    $setData .= trim($rowData) . "\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=dailyform_table.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader) . "\n" . $setData . "\n";
