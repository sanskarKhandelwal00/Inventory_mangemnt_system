<?php 	

require_once 'core.php';

$sql = "SELECT customer_id, customer_name, customer_active, customer_status FROM customer WHERE customer_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeCustomers = ""; 

 while($row = $result->fetch_array()) {
 	$CustomerId = $row[0];
 	// active 
 	if($row[2] == 1) {
 		// activate member
 		$activeCustomers = "<label class='label label-success'>Available</label>";
 	} else {
 		// deactivate member
 		$activeCustomers = "<label class='label label-danger'>Not Available</label>";
 	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editCustomerModel" onclick="editCustomers('.$CustomerId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeCustomers('.$CustomerId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 		
 		$activeCustomers,
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);