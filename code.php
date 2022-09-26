<?php
session_start();
require 'dbconn.php';

if(isset($_POST['update_student'])){
    
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "UPDATE students_info SET name = '$name', email = '$email', 
                phone = '$phone', password = '$password' WHERE id= '$student_id' ";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $session_start['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $session_start['message'] = "Student NOT Updated!!!";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "INSERT INTO students_info( name, email, phone, password) 
        VALUES('$name', '$email', '$phone', '$password')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $session_start['message'] = "Student Created Successfully";
        header("Location: student_create.php");
        exit(0);
    }
    else{
        $session_start['message'] = "Student NOT Created!!!";
        header("Location: student_create.php");
        exit(0);
    }

}

?>