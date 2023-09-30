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
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/popupform.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>AIMS ITMSO</title>
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

				<div class="row my-5">
                    <div class="form2">
					<div class="tableform">
						<?php
							//db connection
							require('db.php');
							if ($con->connect_error) {
								die("Connection failed: " . $con->connect_error);
								}
							$item_id=$_GET['item_id'];								
							$sql = "SELECT * FROM item where item_id='$item_id'";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
						?>	
                        <table class="table bg-white rounded " style="font-size:17px; width:auto;">
							<tr><td colspan="2" align="center" style="font-size:25px;"><a href="admin.php?item_id=<?php echo($row['item_id']);?>" /><i class="fa fa-times-circle"></i></a></td></tr>
							<tr><td colspan="2" align="center" style="font-size:25px;"><label><b>Item Details</b></label></td></tr>
							<tr>
								<td><label for="rfid"><b>RFID :</b></label></td>
								<td><label for="rfid"><?php echo $row['rfid'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Barcode :</b></label></td>
								<td><label><?php echo $row['barcode'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Serial Number :</b></label></td>
								<td><label><?php echo $row['sn'];?></label></td>
							</tr>
							<tr>
								<td width="250px;"><label><b>Property Number :</b></label></td>
								<td><label><?php echo $row['pcode'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Particular :</b></label></td>
								<td><label><?php echo $row['particular'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Description :</b></label></td>
								<td><label><?php echo $row['description'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Quantity :</b></label></td>
								<td><label><?php echo $row['qty'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Amount :</b></label></td>
								<td><label><?php echo $row['amount'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Department :</b></label></td>
								<td><label><?php echo $row['department'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Building :</b></label></td>
								<td><label><?php echo $row['building'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Office/Room :</b></label></td>
								<td><Label><?php echo $row['officeroom'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Issued To :</b></label></td>
								<td><label><?php echo $row['issuedto'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Date Acquired :</b></label></td>
								<td><label><?php echo $row['dateacq'];?></label></td>
							</tr>
							<tr>
								<td><label><b>License :</b></label></td>
								<td><label><?php echo $row['licensed'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Status :</b></label></td>
								<td><label><?php echo $row['status'];?></label></td>
							</tr>
							<tr>
								<td><label><b>Remarks :</b></label></td>
								<td><label><?php echo $row['remark'];?></label></td>
							</tr>
							<?php
								}
								echo "</table>";
								} else { echo "0 results"; }
								$con->close();
							?>			
							<script>
								function openForm() {
								  document.getElementById("myForm").style.display = "block";
								}

								function closeForm() {
								  document.getElementById("myForm").style.display = "none";
								}
							</script>  
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