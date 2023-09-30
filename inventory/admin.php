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
    <title>AIMS Dashboard</title>
<style>
tr:nth-child(even) {
  background-color: #f0f5f5;
}
</style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">ADMINISTRATOR</div>
            <div class="list-group list-group-flush my-3">
                <a href="admin.php" 		class="list-group-item list-group-item-action bg-transparent second-text active"><i  class="fas fa-tachometer-alt me-4"></i>Dashboard</a>
                <a href="adminadduser.php" 	class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user-plus me-4"></i>Add user</a>
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
                    <h2 class="fs-2 m-0">Dashboard</h2>
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
								//count total numbers of users
								$query1=mysqli_query($con,"Select num from user") or die ("Database query failed: $query1" . mysqli_error());
								$count = mysqli_num_rows($query1);
								?>
								<h3 class="fs-2"><?php echo $count; ?></h3>
								<p class="fs-5">Users</p>
                            </div>
                            <i class="fas fa-user-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
								<?php 
								//count total numbers of users
								$query2=mysqli_query($con,"Select item_id from item") or die ("Database query failed: $query2" . mysqli_error());
								$count2 = mysqli_num_rows($query2);
								?>
                                <h3 class="fs-2"><?php echo $count2; ?></h3>
                                <p class="fs-5">Assets</p>
                            </div>
                            <i class="fa fa-list fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">0</h3>
                                <p class="fs-5">Borrowed Items</p>
                            </div>
                            <i class="fas fa-hand-holding fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">0</h3>
                                <p class="fs-5">Deleted Items</p>
                            </div>
                            <i class="fa fa-trash me-2 fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">All Assets</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
									<th scope="col">Particular</th>
									<th scope="col">Description</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               	<?php
							
								// Check connection
								if ($con->connect_error) {
								die("Connection failed: " . $con->connect_error);
								}
								// get primary key
								$queryno = mysqli_query($con,"SELECT item_id FROM item")or die ("Database query failed: $queryno" . mysqli_error());
																
								$sql = "SELECT * FROM item";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
								?>
								<td><?php echo $row['particular'];?></td>
								<td><?php echo $row['description'];?></td>
								<td><?php echo $row['status'];?></td>
								<td><a href="adminviewmore.php?item_id=<?php echo($row['item_id']);?>" /><i class="far fa-eye"></i></a></td></tr>
								<?php
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