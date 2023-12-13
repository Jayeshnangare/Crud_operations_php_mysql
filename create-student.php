

<!DOCTYPE html>
<html>
    <title>Crud Operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">
<body>
    
    <div class="container-fluid ">
        <h2>Student Form</h2>
        <form action="" method="POST" class="form-group">

           <legend>Student information:</legend>
           <label  class="form-label">Name:</label>
           <input type="text" name="name" class="form-control" style="width: 400px"> 
           <label  class="form-label">Age:</label>
           <br>
          <input type="text" name="age" class="form-control" style="width: 400px">
         <label  class="form-label">Email:</label>
          <input type="email" name="email" class="form-control" style="width: 400px">
          <input type="submit" name="submit" value="submit" class="btn btn-primary mt-3 mb-3 ">
          
    <?php


include "dbconfig.php";

 if(isset($_POST['submit'])){
     
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $sql = "INSERT INTO `students`(`name`, `age`, `email`) VALUES ('$name','$age','$email')";
        $result = $conn->query($sql);

        if ($result == true){
           // echo 'New record created successfully.';
//             header('Location: view-student.php');
        } else {
            echo 'Error:'.$sql."<br>".$conn->error;
        }
        
        $conn->close();
        
 }
 ?>        
    </form>
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

            <?php
        include 'dbconfig.php';
        $sql= "select * from students";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>

    <tbody>
        
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




   



