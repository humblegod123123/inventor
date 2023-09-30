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
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css" />
    <title>AIMS Scan Tags</title>
<style>
table, tr, td {
	border: 1px solid black;
	border-collapse: collapse;
}
td{
	text-align:center;
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
                <a href="adminviewuser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fas fa-user-check me-4'></i>View user</a>
				<a href="adminscantags.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fa fa-tags me-4"></i></i>Scan Tags</a>
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
                    <h2 class="fs-2 m-0">Scan Tags</h2>
                </div>
            </nav>
			
			<div class="container-fluid px-4">
				<div class="scanform">
					
					<div class="bcscan">
					<h3>Barcode</h3>
						<?php echo '<a href="adminbarcodescan.php"><img src="img/barcode.png" width="150px" height="150px"></a>';?>
					</div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 					
					<div class="rfidscan">
					<h3>RFID</h3>
						<?php echo '<a href="rfidscan.php"><img src="img/rfid.png" width="150px" height="150px"></a>';?>
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