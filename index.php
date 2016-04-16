<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css" media="all" />
        
        <title>Login Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <img src="http://images.clipartpanda.com/pickle-clipart-pickle.jpg" />
        <h2>PixWorx Employee Directory</h2>
        <div class = center>
        <h3>Login with email and password</h3>
        
        <form action="validate.php" method="post">
            <strong>Username</strong>:<input type="text" name="name"><br>
            <strong>Password</strong>:<input type="password" name="password"><br>
            <strong>Login type</strong>:
            <select name="type">
                <option selected>Select</option>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
            </select><br>           
            
            <input type="submit" value="Login">
        </form>
        </div>
        <!--a href="http://localhost:8080/Employee_WebApp/">This page</a-->
    </body>
</html>
