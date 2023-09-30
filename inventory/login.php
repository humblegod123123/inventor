<?php

$host="localhost";
$user="root";
$password="";
$db="inventory";

session_start();

$data=mysqli_connect($host, $user, $password, $db);
if($data==false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
		$username=$_POST["username"];
		$password=$_POST["password"];
		
		
		$sql="select * from user where username= '".$username."' AND password='".md5($password)." ' ";
		
		
		$result=mysqli_query($data,$sql);	
		
		$row=mysqli_fetch_array($result);
		
		$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
        
	    header("Location: admin.php");
		
			if($row["usertype"]=="ITMSO")
			{	
				$_SESSION["username"]=$username;
				
				header("location: itmso.php");
			}
			
			elseif($row["usertype"]=="Office Equipment")
			{
				
				$_SESSION["username"]=$username;
				
				header("location: officeequipment.php");
			}

			elseif($row["usertype"]=="Borrower")
			{
				
				$_SESSION["username"]=$username;
				
				header("location: borrow.php");
			}

			elseif($row["usertype"]=="Administrator")
			{
				
				$_SESSION["username"]=$username;
				
				header("location:admin.php");
			}
			
			else
			{
				echo "username or password incorrect";			
			}
		}else{
		echo "<script language='javascript'> alert('Incorrect Username/Password. Please try again.'); 
		window.location='login.php';</script>";
	}		
		
}	

?>

<!DOCTYPE html>

<html lang="en">
	<head>
        <title>AIMS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/login.css" />
	</head>
	
<body>
    <div class="login">
            <div class="account-login">
			
            <h1>Bulak AIMS</h1>
			   
			<form action="#" method="POST" class="login-form">
				<div class="form-group">
					<input name="username" type="text" placeholder="Username" class="form-control" required>
                </div>
				
                <div class="form-group">
					<input name="password" type="password" placeholder="Password"  class="form-control" required>
                </div>
				
                <button type="submit" class="btn" >Login</button>
			</form>
			   
            </div>
	</div>
</body>
   
</html>