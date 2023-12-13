<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include "dbconfig.php";

if (isset($_POST['update'])) {
        $stu_id = $_POST['stu_id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $sql = "UPDATE `students` SET `name`='$name',`age`='$age',`email`='$email' WHERE `id`='$stu_id'";
        $result = $conn->query($sql);
        if ($result == TRUE) {
            echo "Record updated successfully.";
            header('Location: create-student.php');
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
}

        if (isset($_GET['id'])) {
        $stu_id = $_GET['id'];
        $sql = "SELECT * FROM students WHERE id='$stu_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $age = $row['age'];
            $email = $row['email'];
        }    
   
     
?>
<head>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">
</head>
<div class="container-fluid">
        <h2>Student details Update Form</h2>
            <form action="" method="post">
                
          <legend>Student information:</legend>
          <label  class="form-label">Name:</label>
          <input type="text" name="name" class="form-control" style="width: 400px" value="<?php echo $name; ?>"> 
          <input type="hidden" name="stu_id" value="<?php echo $id; ?>">
          <label  class="form-label">Age:</label>
          <br>
          <input type="text" name="age" class="form-control" style="width: 400px" value="<?php echo $age; ?>">
          <label  class="form-label">Email:</label>
          <input type="email" name="email" class="form-control" style="width: 400px" value="<?php echo $email; ?>">
          <input type="submit" name="update" value="update" class="btn btn-primary mt-3 mb-3 ">
              
    </div>
  
   <div class="container-fluid">
     <h2>Student Details</h2>

     
    <table class="table">
        <thead>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            include 'dbconfig.php';
            $sql= "select * from students";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>

        <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a class="btn btn-info" href="update-student.php?id=<?php echo $row['id']; ?>">Edit</a>
                     &nbsp;
                     
                     <a class="btn btn-danger" href="delete-student.php?id=<?php echo $row['id']; ?>">Delete</a>
 
                    </td>
    <?php            
            }
        }
      ?>
        </tbody>
    </table>
   </div>

        </form>
        </body>
        </html>
        
    <?php
    }else{
        header('Location: create-student.php');
    }
}
?>