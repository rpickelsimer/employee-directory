<?php 
    // this file redirects from the login, index.php, to employye.php or administrator.php
    // after checking for a valid user
    if(!isset($_POST['type'])) {
        $errorMessage .= "<li>You forgot to select a login type!</li>";
    }

    $type = (string)$_POST['type'];
    $con = false;

    if ($type == "employee") {
        $con = mysqli_connect("localhost", "employee", "password");
    }
    else if ($type == "admin") {
        $con = mysqli_connect("localhost", "root", "");
    }

    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    //set the default client character set 
    mysqli_set_charset($con, 'utf-8');

    mysqli_select_db($con, "employee_directory");
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT id_user FROM user WHERE username='" . $name . "'"
            . " AND password='" . $pass . "'");
    if (mysqli_num_rows($result) < 1) {
        exit("The person " . $_POST['username'] . " is not found. Please check the spelling and try again");
    }

    else {
         if ($type == "employee") {
            header("Location: http://localhost/Employee_Web/employee.php");
            exit;
         }
         else if ($type == "admin") {
            header("Location: http://localhost/Employee_Web/administrator.php");
            exit;
         }
    } 
?>