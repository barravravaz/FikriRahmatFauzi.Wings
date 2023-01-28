<?php

$conn= new mysqli("localhost","root","","penjualan"); 
	include 'includes/session.php';


	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$ambil = $conn->query("SELECT * FROM users WHERE email='$email'");
	$yangcocok = $ambil->num_rows;
	if ($yangcocok==1)
	{
		$_SESSION['error'] = 'Email already taken'; 
		header('location: signup.php');
	}
	else
		{
			$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);
				
		  $conn->query("INSERT INTO users(email,password,type,firstname,lastname,status,created_on) VALUES ('$email','$password','0','$firstname','$lastname','1','$now') ");
				echo "<script>alert('Pendaftaran sukses, silahkan login');</script>";
				echo "<script>location = 'login.php';</script>"; 

					}
				}
		
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>