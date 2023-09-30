<?php
include("auth.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/admin.css" />
	<link rel="stylesheet" href="css/form.css" />
    <title>AIMS Add user</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">ADMINISTRATOR</div>
            <div class="list-group list-group-flush my-3">
                <a href="admin.php" 		class="list-group-item list-group-item-action bg-transparent second-text"><i  class="fas fa-tachometer-alt me-4"></i>Dashboard</a>
                <a href="adminadduser.php" 	class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-user-plus me-4"></i>Add user</a>
                <a href="adminviewuser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fas fa-user-check me-4'></i>View user</a>
				<a href="adminscantags.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa fa-tags me-4"></i></i>Scan Tags</a>
                <a href="#" 				class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fas fa-clipboard-list me-4'></i>Reports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fas fa-hand-holding me-4'></i>Borrowed Item</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fa fa-building me-4'></i></i>Fix assets</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fa fa-trash me-4'></i>Deleted Files</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fas fa-tools me-4'></i>Setting</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-4"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Add user</h2>
                </div>
         
            </nav>

            <div class="container-fluid px-4">


                <div class="row my-5">
                    <div class="col">
                        
						<div class="container">
						
						<?php
							//db connection
							require('db.php');
							// If form submitted, insert values into the database.
							if (isset($_REQUEST['username'])){
								// removes backslashes
								$username = stripslashes($_REQUEST['username']);
								//escapes special characters in a string
								$username = mysqli_real_escape_string($con,$username); 
								
								$password = stripslashes($_REQUEST['password']);
								$password = mysqli_real_escape_string($con,$password);	
								
								$usertype = stripslashes($_REQUEST['usertype']);
								$usertype = mysqli_real_escape_string($con,$usertype);
								
								$empid = stripslashes($_REQUEST['empid']);
								$empid = mysqli_real_escape_string($con,$empid);
								
								$lastname = stripslashes($_REQUEST['lastname']);
								$lastname = mysqli_real_escape_string($con,$lastname);
								
								$firstname = stripslashes($_REQUEST['firstname']);
								$firstname = mysqli_real_escape_string($con,$firstname);
								
								$middlename = stripslashes($_REQUEST['middlename']);
								$middlename = mysqli_real_escape_string($con,$middlename);
								
								$suffix = stripslashes($_REQUEST['suffix']);
								$suffix = mysqli_real_escape_string($con,$suffix);
													
								
								//$trn_date = date("Y-m-d H:i:s");
									$query = "INSERT into `user` (username, password, usertype, empid, lastname, firstname, middlename, suffix)
									VALUES ('$username', '".md5($password)."', '$usertype', '$empid', '$lastname', '$firstname', '$middlename',  '$suffix')";
									$result = mysqli_query($con,$query);
									if($result){ 
								echo "<script language='javascript'> alert('Successfully'); 
								window.location='adminadduser.php';</script>";
								}
								}else{
						?>
						
								<form action="#" id="myForm">
							  
									<div class="row">
										<div class="col-25">
											<label>Employee ID</label>
										</div>
										<div class="col-75">
											<input type="text" id="empid" name="empid" placeholder="Your employee ID.." required>
										</div>
									</div>

									<div class="row">
										<div class="col-25">
											<label>Lastname</label>
										</div>
										<div class="col-75">
											<input type="text" id="lastname" name="lastname" placeholder="Your lastname.." required>
										</div>
									</div>  

									<div class="row">
										<div class="col-25">
											<label>Firstname</label>
										</div>
										<div class="col-75">
											<input type="text" id="firstname" name="firstname" placeholder="Your firstname.." required>
										</div>
									</div>
							  
									<div class="row">
										<div class="col-25">
											<label>Middlename</label>
										</div>
										<div class="col-75">
											<input type="text" id="middlename" name="middlename" placeholder="Your middlename..">
										</div>
									</div>
									
									<div class="row">
										<div class="col-25">
											<label>Suffix</label>
										</div>
										<div class="col-75">
											<input type="text" id="suffix" name="suffix" placeholder="Your suffix..">
										</div>
									</div>

									  <div class="row">
										<div class="col-25">
										  <label for="country">Type of Users</label>
										</div>
										<div class="col-75">
										  <select id="usertype" name="usertype" required>
											<option value="Administrator">Adminstrator</option>
											<option value="ITMSO">ITMSO</option>
											<option value="Office Equipment">Office Equipment</option>
											<option value="Borrower">Borrower</option>
										  </select>
										</div>
									  </div>
									  
									<div class="row">
										<div class="col-25">
											<label>Username</label>
										</div>
										<div class="col-75">
											<input type="text" id="username" name="username" placeholder="Your username.." required>
										</div>
									</div>
									
									<div class="row">
										<div class="col-25">
											<label>Password</label>
										</div>
										<div class="col-75">
											<input type="password" id="password" name="password" placeholder="Your password.." required>
										</div>
									</div>
							  <br />

							  <div class="flex-container">
								<button type="button" name="button" onclick="myFunction()" value="Clear" class="btn me-2">Clear</button>
								<button type="submit" class="btn" >Submit</button>

							  </div>
							  
							  </form>
				
				<?php } ?>
							  
				<script>
				function myFunction() {
				  document.getElementById("myForm").reset();
				}
				</script>
						</div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>