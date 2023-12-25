<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student'])){
     $student_id = $_POST['delete_student'];
    $query="DELETE FROM `blog`.`students` WHERE id='$student_id'";
    $result=mysqli_query($con,$query);
    if($result){
        $_SESSION['message']="student deleted Succesfully";
        header("Location:index.php");
        exit(0);
    } 
    else {
        $_SESSION['message']="student not deleted";
        header("Location:index.php");
        exit(0);
    }
   
   
}

if(isset($_POST['update_student'])){
    $student_id =$_POST['student_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];

    $query = "UPDATE `blog`.`students` SET name='$name', email='$email',phone='$phone',course='$course' WHERE id='$student_id'";
    $result = mysqli_query($con, $query);

    if($result){
        $_SESSION['message']="student updated Succesfully";
        header("Location:index.php");
        exit(0);
    }
    else {
        $_SESSION['message']="student not updated";
        header("Location:index.php");
        exit(0);
    }

}

if(isset($_POST['save_student'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];

    $query = "insert into `blog`.`students` (name,email,phone,course) 
    VALUES ('$name','$email','$phone','$course')";

    $result= mysqli_query($con,$query);

    if($result){
        $_SESSION['message']="student added Succesfully";
        header("Location:student-create.php");
        exit(0);
    }
    else {
        $_SESSION['message']="student not created";
        header("Location:student-create.php");
        exit(0);
    }
}
?>