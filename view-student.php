<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include "dbconfig.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
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
</body>
</html>
