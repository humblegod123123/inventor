<?php
	include("auth.php");
	require('db.php');
	
	// If form submitted, insert values into the database.
	if (isset($_POST['submit'])){
		//anti - SQL Injection to be add  
		$item_id= $_POST['submit']; 
		$rfid = $_POST['rfid'];				
		$barcode = $_POST['barcode'];					
		$sn = $_POST['sn'];						
		$pcode = $_POST['pcode'];						
		$particular = $_POST['particular'];								
		$description = $_POST['description'];							
		$qty = $_POST['qty'];							
		$amount = $_POST['amount'];								
		$department = $_POST['department'];							
		$building = $_POST['building'];						
		$officeroom = $_POST['officeroom'];						
		$issuedto = $_POST['issuedto'];							
		$dateacq = $_POST['dateacq'];					
		$licensed = $_POST['licensed'];
		$status = $_POST['status'];							
		$remark = $_POST['remark'];
		
		$query = "INSERT into `item` (rfid, barcode, sn, pcode, particular, description, qty, amount, 
					   department, building, officeroom, issuedto, dateacq, licensed, status, remark)
				  VALUES ('$rfid', '$barcode', '$sn', '$pcode', '$particular', '$description',  '$qty',  
				  '$amount',  '$department',  '$building',  '$officeroom',  '$issuedto',  '$dateacq',  
				  '$licensed',  '$status',  '$remark')";
				  
		$result = mysqli_query($con,$query);
		if($result){ 
			echo "<script language='javascript'> alert('Item added successfully.'); 
			window.location='itmsoadditem.php';</script>";
			$con->close();
		}
	}else{	
		$con->close();
		echo "<script language='javascript'> alert('Error! Cannot be done!'); 
		window.location='itmsoadditem.php';</script>";
		
	}
?>