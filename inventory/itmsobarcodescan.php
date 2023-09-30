<?php
include("auth.php");
$error="";
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
    <title>AIMS ITMSO</title>
<style>
</style>
</head>

<body onload="document.pos.barcode.focus();">

<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">ITMSO</div>
            <div class="list-group list-group-flush my-3">
                <a href="itmso.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-4"></i>Dashboard</a>
                <a href="itmsoadditem.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa fa-cart-arrow-down me-4"></i></i>Add item</a>
				<a href="itmsoscantags.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa fa-tags me-4"></i></i>Scan Tags</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fas fa-clipboard-list me-4'></i>Reports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fas fa-hand-holding me-4'></i>Borrow</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class='fa fa-trash me-4'></i>Delete Files</a>
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
                    <h2 class="fs-2 m-0">Barcode Item Scan</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">		
			    <div class="row my-5">
                    <div class="col">
						<div class="scanform">
						<div class align="center">
							<form class="pos-style" name="pos" action="" method="POST">
								<div class="form-group">
								<input type="text" name="barcode" class="form-control" placeholder="Scan barcode...">
								</div>
							</form>
							<?php include "barcode_reg.php";?>
							<h1 style="color:red" class="error"><?php echo $error;?></h1>
							<table class="table table-hover table-striped">
								<thead>
								<tr>
								</tr>
								</thead>
								
								<tbody>
								<?php
								$query_grap="Select * from item";
								$query_exe=mysqli_query($con,$query_grap);
								
								while($row=mysqli_fetch_assoc($query_exe)){
									$barcode=$row['barcode'];
									//$date=$row['datereg'];
								?>
								<tr>
								
								</tr>
								<?php
								}
								?>
								</tbody>	
							</table>	
							<div>
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