<?php
    
    // create connection with administrator rights
    $con = mysqli_connect("localhost", "root", "");
    
    // check connection
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    
    //set the default client character set 
    mysqli_set_charset($con, 'utf-8');
    //select DB
    mysqli_select_db($con, "employee_directory");
    
    // form variables
    $user = mysqli_real_escape_string($con, $_GET['user']);
    $id_employee = mysqli_real_escape_string($con, $_GET['id_employee']);
    $fname = mysqli_real_escape_string($con, $_GET['firstname']);
    $lname = mysqli_real_escape_string($con, $_GET['lastname']);
    $address = mysqli_real_escape_string($con, $_GET['address']);
    $phone = mysqli_real_escape_string($con, $_GET['phone']);
    $salary = mysqli_real_escape_string($con, $_GET['salary']);
    $date_hired = mysqli_real_escape_string($con, $_GET['date_hired']);
    
    if ($_GET['add']) {    
        
        $result = mysqli_query($con, "INSERT INTO `employee` (`id_employee`, "
                . "`first_name`, `last_name`, `address`, `phone`, `date_hired`, `salary`) "
                . "VALUES (NULL, '".$fname."', '".$lname."', '".$address."', '".$phone."', "
                . "'".$date_hired."', '".$salary."')");    
        
        header("Location: http://localhost/Employee_Web/administrator.php");
        exit;
    } 
    else if ($_GET['update']) { 
        // could query original record and compare values of non empty fields
      
        // query for id_employee using first and last name if no id_employee
        if (strlen($id_employee) < 1) {
        
            $result = mysqli_query($con, "SELECT id_employee FROM employee WHERE first_name='" . $fname . "'"
                . " AND lname='" . $lname . "'");
            $row = mysqli_fetch_array($result);
            $id_employee = htmlentities($row['id_employee']);  
            // check if there is a result - returned a valid id_employee
            if (mysqli_num_rows($id_employee) < 1) {
                exit("The person " . $_GET['last_name'] . " is not found. Please check the spelling and try again");
            }
        }
        
        // update fields that are not blank
        if (strlen($fname) > 0){
            $result = mysqli_query($con, "UPDATE `employee` SET `first_name` = '".$fname."' WHERE `id_employee` = ".$id_employee);
        }
        if (strlen($lname) > 0){
            $result = mysqli_query($con, "UPDATE `employee` SET `last_name` = '".$lname."' WHERE `id_employee` = ".$id_employee);
        }
        if (strlen($address) > 0){
            $result = mysqli_query($con, "UPDATE `employee` SET `address` = '".$address."' WHERE `id_employee` = ".$id_employee);
        }
        if (strlen($phone) > 0){
            $result = mysqli_query($con, "UPDATE `employee` SET `phone` = '".$phone."' WHERE `id_employee` = ".$id_employee);
        }
        if (strlen($salary) > 0){
            $result = mysqli_query($con, "UPDATE `employee` SET `salary` = '".$salary."' WHERE `id_employee` = ".$id_employee);
        }
        if (strlen($date_hired) > 0){
            $result = mysqli_query($con, "UPDATE `employee` SET `date_hired` = '".$date_hired."' WHERE `id_employee` = ".$id_employee);
        }
        
        header("Location: http://localhost/Employee_Web/administrator.php");
        exit;
    }
    else if ($_GET['delete']) {
        
        // get an employee id for account to be deleted
        if (strlen($id_employee) < 1) {
        
            $result = mysqli_query($con, "SELECT id_employee FROM employee WHERE first_name='" . $fname . "'"
                . " AND lname='" . $lname . "'");
            $row = mysqli_fetch_array($result);
            $id_employee = htmlentities($row['first_name']);  
            // check if there is a result - returned a valid id_employee
            if (mysqli_num_rows($id_employee) < 1) {
                exit("The person " . $_POST['username'] . " is not found. Please check the spelling and try again");
            }
        }
        $result = mysqli_query($con, "DELETE FROM `employee` WHERE `id_employee` = ".$id_employee);
        header("Location: http://localhost/Employee_Web/administrator.php");
        exit;
    }
    else if ($_GET['search']) {
        // check employee_id field
        header("Location: http://localhost/Employee_Web/admin_search_result.php?user=".$user);
        exit;
    }        
?>
