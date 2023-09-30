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
    <title>AIMS ITMSO Add Item</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">ITMSO</div>
            <div class="list-group list-group-flush my-3">
                <a href="itmso.php" class="list-group-item list-group-item-action bg-transparent second-text"><i class="fas fa-tachometer-alt me-4"></i>Dashboard</a>
                <a href="itmsoadditem.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fa fa-cart-arrow-down me-4"></i></i>Add item</a>
				<a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa fa-tags me-4"></i></i>Scan Tags</a>
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
                    <h2 class="fs-2 m-0">Add Stock</h2>
                </div>
         
            </nav>

            <div class="container-fluid px-4">


                <div class="row my-5">
                    <div class="col">
                        
						<div class="container">
						
						<?php
							require('db.php');
							// If form submitted, insert values into the database.
							if (isset($_REQUEST['rfid'])){
								// removes backslashes
								$rfid = stripslashes($_REQUEST['rfid']);
								//escapes special characters in a string
								$rfid = mysqli_real_escape_string($con,$rfid); 
								
								$barcode = stripslashes($_REQUEST['barcode']);
								$barcode = mysqli_real_escape_string($con,$barcode);	
								
								$sn = stripslashes($_REQUEST['sn']);
								$sn = mysqli_real_escape_string($con,$sn);
								
								$pcode = stripslashes($_REQUEST['pcode']);
								$pcode = mysqli_real_escape_string($con,$pcode);
								
								$particular = stripslashes($_REQUEST['particular']);
								$particular = mysqli_real_escape_string($con,$particular);
								
								$description = stripslashes($_REQUEST['description']);
								$description = mysqli_real_escape_string($con,$description);
								
								$qty = stripslashes($_REQUEST['qty']);
								$qty = mysqli_real_escape_string($con,$qty);
								
								$amount = stripslashes($_REQUEST['amount']);
								$amount = mysqli_real_escape_string($con,$amount);
								
								$department = stripslashes($_REQUEST['department']);
								$department = mysqli_real_escape_string($con,$department);
								
								$building = stripslashes($_REQUEST['building']);
								$building = mysqli_real_escape_string($con,$building);
								
								$officeroom = stripslashes($_REQUEST['officeroom']);
								$officeroom = mysqli_real_escape_string($con,$officeroom);
								
								$issuedto = stripslashes($_REQUEST['issuedto']);
								$issuedto = mysqli_real_escape_string($con,$issuedto);
								
								$dateacq = stripslashes($_REQUEST['dateacq']);
								$dateacq = mysqli_real_escape_string($con,$dateacq);
								
								$licensed = stripslashes($_REQUEST['licensed']);
								$licensed = mysqli_real_escape_string($con,$licensed);

								$status = stripslashes($_REQUEST['status']);
								$status = mysqli_real_escape_string($con,$status);
								
								$remark = stripslashes($_REQUEST['remark']);
								$remark = mysqli_real_escape_string($con,$remark);
								
								$query = "INSERT into `item` (rfid, barcode, sn, pcode, particular, description, qty, amount, department, building, officeroom, issuedto, dateacq, licensed, status, remark)
											VALUES ('$rfid', '$barcode', '$sn', '$pcode', '$particular', '$description',  '$qty',  '$amount',  '$department',  '$building',  '$officeroom',  '$issuedto',  '$dateacq',  '$licensed',  '$status',  '$remark')";
								$result = mysqli_query($con,$query);
								if($result){ 
								echo "<script language='javascript'> alert('Successfully'); 
								window.location='additem.php';</script>";
								}
								}else{
						?>
						
								<form action="#" id="myForm">
																	<div class="row">
										<div class="col-25">
										  <label for="country">Status</label>
										</div>
										<div class="col-25">
										  <select id="status" name="status" required>
											<option value="barcode" name="barcode">Barcode</option>
											<option value="rfid" name="rfid">RFID</option>
										  </select>
										  <div class="col-75">
											<input type="text" id="" name="" placeholder="Your employee ID.." required>
										</div>
										</div>
									  </div>

									<div class="row">
										<div class="col-25">
											<label>Serial No.</label>
										</div>
										<div class="col-75">
											<input type="text" id="sn" name="sn" placeholder="Serial No.." required>
										</div>
									</div>

									<div class="row">
										<div class="col-25">
											<label>Property Code</label>
										</div>
										<div class="col-75">
											<input type="text" id="pcode" name="pcode" placeholder="Property code.." required>
										</div>
									</div>
									
									<div class="row">
										<div class="col-25">
											<label>Particular</label>
										</div>
										<div class="col-75">
											<input type="text" id="particular" name="particular" placeholder="Particular.." required>
										</div>
									</div>  

									<div class="row">
										<div class="col-25">
											<label>Description</label>
										</div>
										<div class="col-75">
											<input type="text" id="description" name="description" placeholder="Description.." required>
										</div>
									</div>
							  
									<div class="row">
										<div class="col-25">
											<label>Quantify</label>
										</div>
										<div class="col-75">
											<input type="text" id="qty" name="qty" placeholder="Quantify..">
										</div>
									</div>

									<div class="row">
										<div class="col-25">
											<label>Amount</label>
										</div>
										<div class="col-75">
											<input type="text" id="amount" name="amount" placeholder="Your employee ID.." required>
										</div>
									</div>

									<div class="row">
										<div class="col-25">
											<label>Department</label>
										</div>
										<div class="col-75">
											<input type="text" id="department" name="department" placeholder="Your employee ID.." required>
										</div>
									</div>
									
									<div class="row">
										<div class="col-25">
											<label>Building</label>
										</div>
										<div class="col-75">
											<input type="text" id="building" name="building" placeholder="Your employee ID.." required>
										</div>
									</div>

									<div class="row">
										<div class="col-25">
											<label>Room</label>
										</div>
										<div class="col-75">
											<input type="text" id="officeroom" name="officeroom" placeholder="Your employee ID.." required>
										</div>
									</div>

									<div class="row">
										<div class="col-25">
											<label>Issued to</label>
										</div>
										<div class="col-75">
											<input type="text" id="issuedto" name="issuedto" placeholder="Your employee ID.." required>
										</div>
									</div>
									
									<div class="row">
										<div class="col-25">
											<label>Date acquired</label>
										</div>
										<div class="col-75">
											<input type="date" id="dateacq" name="dateacq">
										</div>
									</div>
									
									<div class="row">
										<div class="col-25">
											<label>Licensed</label>
										</div>
										<div class="col-75">
											<input type="text" id="licensed" name="licensed" placeholder="Your employee ID.." required>
										</div>
									</div>
									
									<div class="row">
										<div class="col-25">
										  <label for="country">Status</label>
										</div>
										<div class="col-25">
										  <select id="status" name="status" required>
											<option value="Available">Available</option>
											<option value="Not Available">Not Available</option>
											<option value="Not Applicable">Not Aplicable</option>
										  </select>
										</div>
									  </div>
									
									<div class="row">
										<div class="col-25">
											<label>Remarks</label>
										</div>
										<div class="col-75">
											<input type="text" id="remark" name="remark" placeholder="Your remarks.." required>
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