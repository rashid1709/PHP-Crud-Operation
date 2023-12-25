<?php

require 'dbcon.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Student View Detail</title>
  </head>
  <body>
   <div class="container mt-5">
   <?php include('message.php');  ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Student View
                        <a href='index.php' class='btn btn-danger float-end'>Back</a>
                    </h4>
                </div>
                <div class="card-body">
    <?php
    if(isset($_GET['id']))
    {
       $student_id= $_GET['id'];
         $query="SELECT * from `blog`.`students` where id='$student_id' " ;
         $result=mysqli_query($con,$query) or die(mysqli_error($conn));

         if(mysqli_num_rows($result)> 0)
         {
            $student= mysqli_fetch_array($result);
            ?>
<form action="code.php" method="POST">
    
  
                        <div class="mb-3">
        <label>Student Name</label>
        <p class="form-control">
         <?= $student['name'];?> 
         </p>
         
    </div>
                        <div class="mb-3">
        <label>Student Email</label>
        <p class="form-control">
         <?= $student['email'];?> 
         </p>
                        </div>
                        <div class="mb-3">
        <label>Student Phone</label>
        <p class="form-control">
         <?= $student['phone'];?> 
         </p>
                        </div>
                        <div class="mb-3">
        <label>Student Course</label>
        <p class="form-control">
         <?= $student['course'];?> 
         </p>
                        </div>
        <!-- <div class="mb-3">
             <button class="btn btn-primary" 
             name="update_student" type="submit">Update Student</button>
        </div> -->
                    </form>
            <?php
         }
         else{
            echo "<h5> No record Found </h5>";
         }
    }
        
    
    ?>
                    
                </div>
            </div>
        </div>
    </div>
   </div>

 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>