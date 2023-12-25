<?php 
session_start();
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

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">

    <?php
  include('message.php');
    ?>
    <div class="row">
     <div class="col-md-12">
     <div class="card-header">
     <h4>Students Details 
      <a href="student-create.php"class="btn btn-primary float-end">Add Students</a>
     </h4> 
     </div>
     <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>STUDENT NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>COURSE</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
           $query = "SELECT * from `blog`.`students`";
           $result = mysqli_query($con, $query);
           if(mysqli_num_rows($result) > 0){
            foreach($result as $students){
              // 
              ?>
              <tr>
                <td><?= $students['id'] ?></td>
                <td><?= $students['name'] ?></td>
                <td><?= $students['email'] ?></td>
                <td><?= $students['phone'] ?></td>
                <td><?= $students['course'] ?></td>
                <td>
                <a href="student-view.php?id=<?=$students['id'];?>" class="btn btn-info btn-sm">View</a>
            <a href="student-edit.php?id=<?=$students['id']; ?>" class="btn btn-success btn-sm">Edit</a>  
            <form action='code.php' method="POST" class="d-inline">
                <button type="submit" name="delete_student" value="<?= $students['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
            </form>
            
                </td>
              </tr>
              <?php
            }
           }
           else{
            echo "<h5> No record Found </h5>";
           }
          ?>
          
        </tbody>
      </table>
     </div> 
     </div> 
    </div>
    </div>

 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>