<?php 
session_start();
require_once 'dbconnect.php';

    if(isset($_POST['book'])){
        $driver = $_POST['driver'];
        $name = $_POST['name'];
        $pickup = $_POST['pickup'];
        $drop = $_POST['drop'];
        $phone = $_POST['phone'];
        $date = date('Y-m-d');
        $status = "Not accepted";

        $query = "INSERT INTO booking VALUES (NULL,'$driver','$name','$pickup','$drop','$phone','$status','$date')";
        $result = mysqli_query($conn,$query);
        if($result){
            $_SESSION['success'] = "a";
            header('location:../index.php');
        }

    }

?>