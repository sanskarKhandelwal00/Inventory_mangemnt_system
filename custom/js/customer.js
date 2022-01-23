var manageCustomerTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage brand table
	manageCustomerTable = $("#manageCustomerTable").DataTable({
		'ajax': 'php_action/fetchBrand.php',
		'order': []		
	});

	// submit brand form function
	$("#submitBrandForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var brandName = $("#brandName").val();
		var brandStatus = $("#CustomerStatus").val();

		if(CustomerName == "") {
			$("#CustomerName").after('<p class="text-danger">Customer Name field is required</p>');
			$('#CustomerName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#CustomerName").find('.text-danger').remove();
			// success out for form 
			$("#CustomerName").closest('.form-group').addClass('has-success');	  	
		}

		if(CustomerStatus == "") {
			$("#CustomerStatus").after('<p class="text-danger">Customer Name field is required</p>');

			$('#CustomerStatus').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#CustomerStatus").find('.text-danger').remove();
			// success out for form 
			$("#CustomerStatus").closest('.form-group').addClass('has-success');	  	
		}

		if(CustomerName && CustomerStatus) {
			var form = $(this);
			// button loading
			$("#createCustomerBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createCustomerBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageCustomerTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitCustomerForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-Customer-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit Customer form function

});

function editCustomers(CustomerId = null) {
	if(CustomerId) {
		// remove hidden Customer id text
		$('#CustomerId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-Customer-result').addClass('div-hide');
		// modal footer
		$('.editCustomerFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedCustomer.php',
			type: 'post',
			data: {CustomerId : CustomerId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-Customer-result').removeClass('div-hide');
				// modal footer
				$('.editCustomerFooter').removeClass('div-hide');

				// setting the Customer name value 
				$('#editCustomerName').val(response.Customer_name);
				// setting the Customer status value
				$('#editCustomerStatus').val(response.Customer_active);
				// Customer id 
				$(".editCustomerFooter").after('<input type="hidden" name="CustomerId" id="CustomerId" value="'+response.Customer_id+'" />');

				// update Customer form 
				$('#editCustomerForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var CustomerName = $('#editCustomerName').val();
					var CustomerStatus = $('#editCustomerStatus').val();

					if(CustomerName == "") {
						$("#editCustomerName").after('<p class="text-danger">Customer Name field is required</p>');
						$('#editCustomerName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCustomerName").find('.text-danger').remove();
						// success out for form 
						$("#editCustomerName").closest('.form-group').addClass('has-success');	  	
					}

					if(CustomerStatus == "") {
						$("#editCustomerStatus").after('<p class="text-danger">Customer Name field is required</p>');

						$('#editCustomerStatus').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editCustomerStatus").find('.text-danger').remove();
						// success out for form 
						$("#editCustomerStatus").closest('.form-group').addClass('has-success');	  	
					}

					if(CustomerName && CustomerStatus) {
						var form = $(this);

						// submit btn
						$('#editCustomerBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editCustomerBtn').button('reset');

									// reload the manage member table 
									manageCustomerTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-Customer-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update Customer form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit Customers function

function removeCustomers(CustomerId = null) {
	if(CustomerId) {
		$('#removeCustomerId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedCustomer.php',
			type: 'post',
			data: {CustomerId : CustomerId},
			dataType: 'json',
			success:function(response) {
				$('.removeCustomerFooter').after('<input type="hidden" name="removeCustomerId" id="removeCustomerId" value="'+response.Customer_id+'" /> ');

				// click on remove button to remove the Customer
				$("#removeCustomerBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeCustomerBtn").button('loading');

					$.ajax({
						url: 'php_action/removeCustomer.php',
						type: 'post',
						data: {CustomerId : CustomerId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeCustomerBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the Customer table 
								manageCustomerTable.ajax.reload(null, false);
								
								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the Customer

				}); // /click on remove button to remove the Customer

			} // /success
		}); // /ajax

		$('.removeCustomerFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove Customers function