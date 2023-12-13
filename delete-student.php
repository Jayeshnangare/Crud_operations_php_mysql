<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


include "dbconfig.php";
if (isset($_GET['id'])) {
    $stu_id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id ='$stu_id'";
     $result = $conn->query($sql);
//     if ($result == TRUE) {
//        //echo "Record deleted successfully.";
           header('Location: create-student.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
   
     }

?>