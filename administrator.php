<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css" media="all" />
        <title>PixWorx Employee Directory - Administrator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <img src="http://images.clipartpanda.com/pickle-clipart-pickle.jpg" />
        <h2>PixWorx Employee Directory</h2>
        <div class = center>
            <h3>Search by last name or index</h3>
        
        <form action = "administrator_result.php" method="GET">
            <input type="text" name="user">            
            <input type="submit" name="search" value="Search"><br>
            Employee ID:
            <input type="text" name="id_employee">
            <br>
            First name:
            <input type="text" name="firstname">
            <br>
            Last name:
            <input type="text" name="lastname">
            <br>
            Address:
            <input type="text" name="address">
            <br>
            Phone:
            <input type="text" name="phone">
            <br>
            Salary:
            <input type="text" name="salary">
            <br>
            Date Hired:
            <input type="text" name="date_hired">
            <br><br>
            <input type="submit" name="add" value="Add">
            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete">

        </form>
        </div>
    </body>
</html>
