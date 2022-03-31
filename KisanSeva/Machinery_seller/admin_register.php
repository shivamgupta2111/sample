<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mangola');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

$Email_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $manufacturername = $_POST['manufacturername'];
    $category =$_POST['category'];
    $Telephone=$_POST['TelephoneNumber'];
    $Phone_no = $_POST['PhoneNumber'];
    $sql = "SELECT name  FROM admin WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt, "i", $param_Email);
        // Set the value of param username
        $param_Email= trim($_POST['Email']);
        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                $Email_err = "This username is already taken"; 
            }
            else{
                $Email = trim($_POST['Email']);
            }
        }
        else{
            echo "Something went wrong";
        }
    }
    $State = $_POST['State'];
    $CustomerCare = $_POST['CustomerCare'];
    $City= $_POST['City'];
    $PINCode = $_POST['PINCode'];
    $address = $_POST['Address'];
    $AuthenticationNo =$_POST['AuthenticationNo'];
    $LicenseNo = $_POST["LicenseNo"];
    
    $IncomeTaxNo =$_POST['IncomeTaxNo'];
    
    
    if(empty(trim($_POST['password']))){
        $password_err = "Password cannot be blank";
    }
    elseif(strlen(trim($_POST['password'])) < 5){
        $password_err = "Password cannot be less than 5 characters";
    }
    else{
        $password = trim($_POST['password']);
    }
    
    // Check for confirm password field
    if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
        $password_err = "Passwords should match";
    }
    if(empty($Email_err))
{ 
    if(empty($password_err)){
        if(empty($confirm_password_err)){
            $sql = "INSERT INTO admin (name,Catagory,Telephone_no,Phone_no,customer_car,state,city,address,AuthenticationNo,License_no,email,IncomeTaxNo,Password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssiiisssissss",$manufacturername,$category,$Telephone,$Phone_no,$CustomerCare,$State,$City,$address,$AuthenticationNo,$LicenseNo,$Email,$IncomeTaxNo,$password);

        // Set these parameters
        
        $param_password = password_hash($password, PASSWORD_DEFAULT);
       
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.html");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);

        }
        else{
            echo $confirm_password_err;
        }

    }
    else{
        echo$password_err;
    }  
}
else{
    echo $Email_err;

}
mysqli_close($conn);
}
 

?>
