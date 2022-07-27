<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How was your day?</title>
    <link rel="stylesheet" href="Form.css">
</head>

<body>

    <div class="master_div_style">

        <h1>How was your day?</h1>

        <form method="POST" enctype="multipart/form-data" action="">

            <p>
                Date: <input id="start" class="input" type="date" name="calendar" min="0000-01-01" max="2018-13-13" required>
            </p>

            <div class="form-rows">
                <p>Rate your day from 1-5:</p>
                <div class="fields">
                    <input type="number" name="ranking" class="input-fields" placeholder="Enter a number between 1 and 5" min="1" max="5" required>
                </div>
            </div>

            <div>
                <p>What do you expect tomorrow to be?</p>
                  <input type="radio" id="expectation" name="expectation" value="Good" required>
                  <label for="Good">Good</label><br>
                  <input type="radio" id="expectation" name="expectation" value="Okay" required>
                  <label for="Okay">Okay</label><br>
                  <input type="radio" id="expectation" name="expectation" value="Bad" required>
                  <label for="Bad">Bad</label>
            </div>
            <input class="submit" type="submit" name="Submit" id="Submit" value="Insert">




            <!--
======================================
    INSERT DATA INTO TABLE
======================================
-->
            <?php

            if (isset($_POST['Submit'])) {
                // Create connection
                $conn = new mysqli("localhost", "root", "", "dailyform");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $calendar = $_POST["calendar"];
                $ranking = $_POST["ranking"];
                $expectation = $_POST["expectation"];

                $sql = "INSERT INTO dailyform_table (Date, Ranking, Expectation)
                VALUES ('$calendar', '$ranking', '$expectation')";

                $sql_update = "UPDATE dailyform_table SET Ranking='$ranking', Expectation='$expectation' WHERE Date='$calendar'";

                if ($conn->multi_query($sql) === TRUE or $conn->multi_query($sql_update) === TRUE) {
                    echo "<br>";
                    echo "New record created successfully";
                } else {
                    echo "<br>";
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                echo "<br>";
                echo "$calendar<br>";
                echo "$ranking<br>";
                echo "$expectation<br>";
            }
            ?>

        </form>
        <!--
======================================
    GET DATA OUT OF TABLE
======================================
-->
        <input onclick="location.href='index_export.php'" class="submit" type="submit" name="Download_Table" id="Submit" value="Download Table">


        <!--
            ======================================
            DISPLAY TABLE
            ======================================
        -->

        <button onclick="myFunction()">Display Table</button>

        <form method="POST" enctype="multipart/form-data" action="">

            <p>
                <input onclick="return confirm('Are you sure? This will permanently delete ALL data in the table.');" style="background-color: red; color: white;" type="submit" name="Delete_Data" value="Delete Data">
                <?php
                if (isset($_POST['Delete_Data'])) {
                    $conn = new mysqli("localhost", "root", "", "dailyform");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    mysqli_query($conn, "TRUNCATE TABLE dailyform_table");
                    $conn->close();
                }

                ?>
            </p>



            <div id="table">
                <?php
                $conn = new mysqli("localhost", "root", "", "dailyform");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = mysqli_query($conn, "SELECT Date, Ranking, Expectation FROM dailyform_table ORDER BY Date");

                echo "<table>"; // start a table tag in the HTML

                while ($row = mysqli_fetch_array($sql)) {   //Creates a loop to loop through results
                    echo "<tr><td>" . $row['Date'] . "</td><td>" . $row['Ranking'] . "</td><td>" . $row['Expectation'] . "</td></tr>";  //$row['index'] the index here is a field name
                }

                echo "</table>"; //Close the table in HTML
                $conn->close(); //Make sure to close out the database connection
                ?>
            </div>

        </form>

    </div>

</body>

<script>
    function myFunction() {
        var x = document.getElementById("table");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<script src="Form.js"></script>

</html>