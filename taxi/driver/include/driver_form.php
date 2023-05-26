<?php 
session_start();
require_once '../../include/dbconnect.php';

    if(isset($_POST['book_ride'])){
        $price =$_POST['price'];
        $status =$_POST['status'];
        $book_id = $_POST['book_id'];
		$driver = $_SESSION['driver_id'];
		$date = date('Y-m-d');
		$taxi = $_POST['taxi'];
		$query = "UPDATE booking SET booking.book_status = '$status';";
		$query.="UPDATE driver SET driver.status = '1' WHERE driver.driver_id = '$driver';";
		$query.="UPDATE taxi SET taxi_status = '1' WHERE taxi_id = '$taxi';";
		$query.="INSERT INTO taxi_taken VALUES (NULL,'$taxi','$driver');";
		$query.="INSERT INTO earnings VALUES (NULL,'$driver','$price','$date')";
    	$result = mysqli_multi_query($conn,$query);
        $_SESSION['success'] = "Status Updated";
        header('location:../booking.php');
    }


	if(isset($_POST['add_expenses'])){
        $amount =$_POST['amount'];
        $details = $_POST['details'];
		$driver = $_SESSION['driver_id'];
		$date = date('Y-m-d');
		$taxi = $_POST['taxi'];
		$query.="INSERT INTO expenditure VALUES (NULL,'$driver','$details','$amount','$date')";
    	$result = mysqli_multi_query($conn,$query);
        $_SESSION['success'] = "Expenses Updated";
        header('location:../expenditure.php');
    }

    if(isset($_POST['signin'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM driver WHERE email = '$email' AND password = '$password'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
			$_SESSION['driver_id'] = $data['driver_id'];
			$_SESSION['driver_email'] = $data['email'];
			header('location:../index.php');
		}
		else{
			$_SESSION['error'] = "Username or password invalid !!";
			header('location:../login.php');

		}
	}

	if(isset($_POST['find'])){
		$email = $_POST['email'];

		$query = "SELECT * FROM driver WHERE email = '$email'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
			$_SESSION['success'] = "Email found! Change your password";

			$_SESSION['driver_email'] = $data['email'];
			header('location:../update-password.php');
		}
		else{
			$_SESSION['error'] = "No email found!";
			header('location:../forgot.php');

		}
	}

	if(isset($_POST['update'])){
		$pass = $_POST['password'];
		$email = $_SESSION['driver_email'];

		$query = "UPDATE driver SET driver.password ='$pass' WHERE driver.email = '$email'";

		$result = mysqli_query($conn, $query);
		$_SESSION['success'] = "Password updated successfully, Login to continue";
		header('location:../login.php');
	}


	if(isset($_POST['update_profile'])){
        $driver_name =$_POST['name'];
        $email = $_POST['email'];
        $password =$_POST['password'];
        $type = $_POST['type'];
        $expereince = $_POST['expereince'];
		$status = $_POST['status'];
		$query = "UPDATE driver SET driver_name = '$driver_name',email = '$email',password = '$password', type = '$type', experience ='$expereince', status = '$status'
		WHERE driver_id=".$_SESSION['driver_id']; 
		$result = mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "Profile has been updated";
            header('location:../profile.php');
		}
            

    }
?>