<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css" media="all" />
        
        <title>Search Results</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <img src="http://images.clipartpanda.com/pickle-clipart-pickle.jpg" />
        <h2>PixWorx Employee Directory</h2>
        <br><br>
        Results for: <?php echo $_GET['user'] . "<br/>"; ?>
        <?php
        $con = mysqli_connect("localhost", "root", "");
        if (!$con) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        //set the default client character set 
        mysqli_set_charset($con, 'utf-8');

        mysqli_select_db($con, "employee_directory");
        $user = mysqli_real_escape_string($con, $_GET['user']);
        $wisher = mysqli_query($con, "SELECT id_employee FROM employee WHERE last_name='" . $user . "'");
        if (mysqli_num_rows($wisher) < 1) {
            exit("The person " . $_GET['user'] . " is not found. Please check the spelling and try again");
        }
        $row = mysqli_fetch_row($wisher);
        $wisherID = $row[0];
        mysqli_free_result($wisher);
        ?>
        <table border="black">
            <tr>
                <th>ID</th>
                <th>First</th>
                <th>Last</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Date Hired</th>
                <th>Salary</th>
            </tr>
            <?php
            $result = mysqli_query($con, "SELECT * FROM employee WHERE id_employee=" . $wisherID);
            while ($row = mysqli_fetch_array($result)) {
                
                echo "<tr><td>" . htmlentities($row['id_employee']) . "</td>";
                echo "<td>" . htmlentities($row['first_name']) . "</td>";
                echo "<td>" . htmlentities($row['last_name']) . "</td>";
                echo "<td>" . htmlentities($row['phone']) . "</td>";
                echo "<td>" . htmlentities($row['address']) . "</td>";
                echo "<td>" . htmlentities($row['date_hired']) . "</td>";
                echo "<td>" . htmlentities($row['salary']) . "</td></tr>\n";
            }
            mysqli_free_result($result);
            mysqli_close($con);
            ?>
        </table>
        <br>
        <br>
        <!-- need to be able to select a user from the table -->
        <!-- then echo userh data into href string -->
        <!-- javascript or jquery maybe? -->
        <a href="http://localhost/Employee_Web/administrator.php">Perform another search</a>

    </body>
</html>
