<?php 
session_start();
require_once '../../include/dbconnect.php';

    if(isset($_POST['add_driver'])){
        $driver_name =$_POST['driver_name'];
        $email =$_POST['email'];
        $password =$_POST['password'];
        $type = $_POST['type'];
        $expereince = $_POST['expereince'];
        $image = $_FILES['image']['name'];
		$target = "../../assets/front/images/drivers/".basename($image);
        $query = "INSERT INTO driver VALUES(NULL,'$driver_name','$email','$password','$type','$expereince','0','$image')";
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
			mysqli_query($conn,$query);
        	$_SESSION['success'] = "Driver has been added";
        	header('location:../drivers.php');
		}
    }

    if(isset($_POST['update_driver'])){
        $driver_name =$_POST['driver_name'];
        $email =trim($_POST['email']);
        $password =trim($_POST['password']);
        $type = $_POST['type'];
        $expereince = $_POST['expereince'];

        $query = "UPDATE driver SET driver.driver_name='$driver_name',
        		driver.password ='$password',driver.type='$type',driver.experience='$expereince' WHERE driver.email = '$email'";
		mysqli_query($conn,$query);
        $_SESSION['success'] = "Driver has been updated";
        header('location:../drivers.php');
    }

    if(isset($_POST['signin'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
			$_SESSION['admin_id'] = $data['admin_id'];
			$_SESSION['admin_email'] = $data['email'];
			header('location:../index.php');
		}
		else{
			$_SESSION['error'] = "Username or password invalid !!";
			header('location:../login.php');

		}
	}

	if(isset($_POST['find'])){
		$email = $_POST['email'];

		$query = "SELECT * FROM admin WHERE email = '$email'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
			$_SESSION['success'] = "Email found! Change your password";

			$_SESSION['admin_email'] = $data['email'];
			header('location:../update-password.php');
		}
		else{
			$_SESSION['error'] = "No email found!";
			header('location:../forgot.php');

		}
	}
	if(isset($_POST['add_taxi'])){
        $taxi_number = $_POST['taxi_number'];
        $year =$_POST['year'];
        $image = $_FILES['image']['name'];
		$target = "../../assets/front/images/taxi/".basename($image);
        $query = "INSERT INTO taxi VALUES(NULL,'$taxi_number','$year','$image','0')";
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
			mysqli_query($conn,$query);
            $_SESSION['success'] = "Taxi has been added";
            header('location:../taxi.php');
		}
    }
	if(isset($_POST['update_taxi'])){
		$number = $_POST['taxi_number'];
		$year = $_POST['year'];
		$status = $_POST['status'];
		$id = $_POST['taxi_id'];
		$query = "UPDATE taxi SET taxi_number = '$number', made_year = '$year', taxi_status = '$status' WHERE taxi_id = '$id'";

		$result = mysqli_query($conn, $query);
		$_SESSION['success'] = "Taxi has been updated successfully";
		header('location:../taxi.php');
	}

	if(isset($_POST['update'])){
		$pass = $_POST['password'];
		$email = $_SESSION['admin_email'];

		$query = "UPDATE admin SET admin.password ='$pass' WHERE admin.email = '$email'";

		$result = mysqli_query($conn, $query);
		$_SESSION['success'] = "Password updated successfully, Login to continue";
		header('location:../login.php');
	}

?>