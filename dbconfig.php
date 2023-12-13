<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_database";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn -> connect_error){
    die("connection failed:".$conn->connect_error);
}

