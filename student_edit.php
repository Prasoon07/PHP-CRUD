<?php
session_start();
require 'dbconn.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Student Edit FORM</title>
  </head>
  <body>


    <!-- Form -->


    <div class="container mt-5">
        <?php include('message.php');  ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                            if(isset($_GET['id'])){
                                $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM students_info WHERE id = '$student_id'";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_run_rows($query_run) > 0){
                                    $student = mysqli_fetch_array($query_run);
                                    ?>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name= "student_id" value="<?= $student_id ?>">
                                        <div class="mb-3">
                                            <label>Student Name</label>
                                            <input type="text" name="name" value= "<?=$student['name'];?>"class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Student Email</label>
                                            <input type="email" name="email" value= "<?=$student['email'];?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Student Phone Number</label>
                                            <input type="text" name="phone" value= "<?=$student['phone'];?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Student password</label>
                                            <input type="password" name="password" value= "<?=$student['password'];?>"class="form-control">
                                        </div>
                                        <!-- Button -->
                                        <div class="mb-3">
                                            <button type="submit" name="update_student"
                                            class="btn btn-primary">Update Info</button>
                                        </div>

                                    </form> 
                                    <?php
                                }
                                else{
                                    echo "<h4>No Such ID Found</h4>";
                                }
                            }
                        ?>
                </div>
            </div>
        </div>   
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>