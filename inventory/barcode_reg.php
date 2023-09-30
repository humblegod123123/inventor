<?php
require('db.php');

if(isset($_POST['barcode'])){
    
                $current_time=time();
                $DateTime=strftime("%d-%m-%y  %H:%M:%S",$current_time);
                $DateTime;
    
    
    $barcode=$_POST['barcode'];
	$barcode=mysqli_real_escape_string($con,$barcode);
	
	$count="0";
	$query_grap="Select * from item where barcode='$barcode'";
	$result = $con->query($query_grap);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	
		?>
		  <table class="table bg-white rounded " style="font-size:17px; width:auto;">
							<tr><td colspan="2" align="center" style="font-size:25px;"><a href="itmsobarcodescan.php" /><i class="fa fa-times-circle"></i></a></td></tr>
							<tr><td colspan="2" align="center" style="font-size:25px;"><label><b>Item Details</b></label></td></tr>
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
							</table>
		<?php
		}
	}else{
		echo "No record/s found!";
		
	}               
}
?>