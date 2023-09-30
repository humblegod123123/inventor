<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/admin.css" />
	<link rel="stylesheet" href="css/table.css" />
    <title>AIMS Users</title>
<style>
tr:nth-child(even) {
  background-color: #D6EEEE;
}
td {
	height:30px;
}
</style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">ADMINISTRATOR</div>
            <div class="list-group list-group-flush my-3">
                <a href="admin.php" 		class="list-group-item list-group-item-action bg-transparent second-text"><i  class="fas fa-tachometer-alt me-4"></i>Dashboard</a>
                <a href="adminadduser.php" 	class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user-plus me-4"></i>Add user</a>
                <a href="adminviewuser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class='fas fa-user-check me-4'></i>View user</a>
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
                    <h2 class="fs-2 m-0">View Users</h2>
                </div>  
            </nav>

            <div class="container-fluid px-4">
				<div class="row g-3 my-2">
				
					<div class="col-md-3">
						<div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
						<div>
						<?php 
						//db connection
						require('db.php');
						//count total number/s of adminisrator
						$query1=mysqli_query($con,"Select num from user where usertype = 'Administrator'") or die ("Database query failed: $query1" . mysqli_error());
						$count = mysqli_num_rows($query1);
						?>
						<h3 class="fs-2"><?php echo $count; ?></h3>
						<p class="fs-5">Administrator</p>
						</div>
						<i class="fas fa-user-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
						<div>
						<?php 
						//count total numbers of itmso users
						$query1=mysqli_query($con,"Select num from user where usertype = 'ITMSO'") or die ("Database query failed: $query1" . mysqli_error());
						$count = mysqli_num_rows($query1);
						?>
						<h3 class="fs-2"><?php echo $count; ?></h3>
						<p class="fs-5">ITMSO User</p>
						</div>
						<i class="fas fa-user-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
						<div>
						<?php 
						//count total numbers of office equipment users
						$query1=mysqli_query($con,"Select num from user where usertype = 'Office Equipment'") or die ("Database query failed: $query1" . mysqli_error());
						$count = mysqli_num_rows($query1);
						?>
						<h3 class="fs-2"><?php echo $count; ?></h3>
						<p class="fs-5">Office Equipment User</p>
						</div>
						<i class="fas fa-user-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
						<div>
						<!--<?php 
						//count total numbers of borrower
						$query1=mysqli_query($con,"Select num from user where usertype = 'Office Equipment'") or die ("Database query failed: $query1" . mysqli_error());
						$count = mysqli_num_rows($query1);
						?>-->
						<h3 class="fs-2"><?php echo '0'; ?></h3>
						<p class="fs-5">Borrower</p>
						</div>
						<i class="fas fa-hand-holding fs-1 primary-text border rounded-full secondary-bg p-3"></i>
						</div>
					</div>
				</div>
                            	
						<div class="row my-5">
						  
							<div class="col">
							  <table class="table bg-white rounded shadow-sm  table-hover">
								<thead >
								  <tr style="vertical-align:center; text-align:center; background-color:#ECF0F1;">
									<th scope="col">Employee I.D.</th>
									<th scope="col">Name</th>
									<th scope="col">User Type</th>
									<th scope="col">Actions</th>
								  </tr>
								</thead>
								<tbody>

								<?php
								//db connection
								require('db.php');
								// Check connection
								if ($con->connect_error) {
								die("Connection failed: " . $con->connect_error);
								}
								$sql = "SELECT empid, lastname, firstname, middlename, suffix, usertype FROM user";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["empid"]. "</td><td>" . $row["firstname"] . '&nbsp;' . $row["middlename"] . '&nbsp;' . $row["lastname"] . 
								'&nbsp;' . $row["suffix"] . "</td><td>". $row["usertype"]. "</td>";
								echo '<td style="text-align:center"><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td></tr>';
								}
								echo "</tbody></table>";
								} else { echo "0 results"; }
								$con->close();
								?>
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