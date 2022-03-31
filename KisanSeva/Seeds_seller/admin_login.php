<?php

	// session_start();
	// if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
	// {
	// 	header('Location: register.php');
	// }
	include "includes/dbconnect.php";
	

	$email=$_POST['email'];
	$password=$_POST['password'];

	$query="SELECT * FROM `admin` WHERE `email` LIKE '$email' AND `Password` LIKE '$password'";

	//running the serch in DB and storing in $result
	$result=mysqli_query($connection,$query);

	//function to return the number of rows in $result

	$num_rows=mysqli_num_rows($result);

	if($num_rows==1)
	{
		//correct login

		//retriving session name

		$row=mysqli_fetch_assoc($result);
		$_SESSION['name']=$row['name'];
		$_SESSION['email']=$row['email'];
        // echo $_SESSION['name']; 
		// $_SESSION['user_id']=$row['user_id'];
         header('Location: admin.php');
		// echo $_SESSION['Manufacturer_name'];
		
	}
	else
	{	//incorrect login
		//redirect
		// header('Location: index.php');
        echo"not found";
	}

?>