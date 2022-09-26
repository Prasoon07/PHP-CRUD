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

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container mt-4 ">

        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student DETAILS
                            <a href="student_create.php"  class="btn btn-primary float-end">Add Students</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table striped">
                            <thread>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thread>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM students_info";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0 ){
                                        foreach($query_run as $student_info){
                                            ?>
                                                <tr>
                                                    <td><?= $student_info['id']; ?></td>
                                                    <td><?= $student_info['name']; ?></td>
                                                    <td><?= $student_info['email']; ?></td>
                                                    <td><?= $student_info['phone']; ?></td>
                                                    <td><?= $student_info['password']; ?></td>
                                                    <td>
                                                        <a href="student-view.php?id=<?= $student_info['id']; ?>" class="btn btn-success btn sm">View</a>
                                                        <a href="student-edit.php?id=<?= $student_info['id']; ?>" class="btn btn-success btn sm">Edit</a>                                                        
                                                        <a href="" class="btn btn-danger btn sm">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }

                                    }
                                    else{
                                        echo "<h5>No Record Found</h5>";
                                    }
                                ?>
                                <tr>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>