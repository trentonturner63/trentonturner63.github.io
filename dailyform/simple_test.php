<?php

// Create connection
$conn = new mysqli("localhost", "root", "", "dailyform");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["fname"];

$sql = "INSERT INTO simple_table (Name)
VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Test</title>
</head>

<body>
    <form action="" enctype="multipart/form-data" method="POST">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname"><br><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>