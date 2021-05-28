$(document).ready(function() {
	
	//delete account
	
	$('#deleteAccount').click(function() {
		if (confirm('Are you sure you want to delete your account?')) {
			$.ajax({
				type: "POST",
  				url: 'deleteUserAccount.php',  //this location is relative to the php file from which this js is called
  				success : function() {
        	        $(location).attr('href', 'deleteAccountRedirect.php');
        	    }
			});
		}
	});
	
	$('#flightTicketsWrapper').css("display", "block");
	$('#trainTicketsWrapper').css("display", "none");
	$('#busTicketsWrapper').css("display", "none");
	$('#cabTicketsWrapper').css("display", "none");
	
	$('#ticketTypeSelector').change(function(){
		var ticketType=$(this).val();
		
		if(ticketType==="flightTickets") {
			$('#trainTicketsWrapper').css("display", "none");
			$('#busTicketsWrapper').css("display", "none");
			$('#cabTicketsWrapper').css("display", "none");
			$('#flightTicketsWrapper').css("display", "block");
		}
		else if(ticketType==="trainTickets") {
			$('#flightTicketsWrapper').css("display", "none");
			$('#busTicketsWrapper').css("display", "none");
			$('#cabTicketsWrapper').css("display", "none");
			$('#trainTicketsWrapper').css("display", "block");
		}
		else if(ticketType==="busTickets") {
			$('#flightTicketsWrapper').css("display", "none");
			$('#trainTicketsWrapper').css("display", "none");
			$('#cabTicketsWrapper').css("display", "none");
			$('#busTicketsWrapper').css("display", "block");
		}
		else if(ticketType==="cabTickets") {
			$('#flightTicketsWrapper').css("display", "none");
			$('#trainTicketsWrapper').css("display", "none");
			$('#busTicketsWrapper').css("display", "none");
			$('#cabTicketsWrapper').css("display", "block");
		}
		
	});
	
	//cancel a ticket
	
	$('.cancelTicket').click(function() {
		if (confirm('Are you sure you want to cancel this booking?')) {
  			var id = $(this).closest('tr').find('td:first').text().trim();
			var hide = $(this).closest('tr');
			
  			$.ajax({
  			  type: "POST",
  			  url: 'cancelTicket.php',
  			  data: {
  			    bookingID: id
  			  },
  			  success: function() {
				  hide.css("display", "none");
  			  }
  			});
		}
	});
	
	$('.cancelBooking').click(function() {
		if (confirm('Are you sure you want to cancel this booking?')) {
  			var id = $(this).closest('tr').find('td:first').text().trim();
			var hide = $(this).closest('tr');
			
  			$.ajax({
  			  type: "POST",
  			  url: 'cancelBooking.php',
  			  data: {
  			    bookingID: id
  			  },
  			  success: function() {
				  hide.css("display", "none");
  			  }
  			});
		}
	});
	
		$('.cancelCabTicket').click(function() {
		if (confirm('Are you sure you want to cancel this booking?')) {
  			var id = $(this).closest('tr').find('td:first').text().trim();
			var hide = $(this).closest('tr');
			
  			$.ajax({
  			  type: "POST",
  			  url: 'cancelCabTicket.php',
  			  data: {
  			    bookingID: id
  			  },
  			  success: function() {
				  hide.css("display", "none");
  			  }
  			});
		}
	});
	
	$('.cancelBusTicket').click(function() {
		if (confirm('Are you sure you want to cancel this booking?')) {
  			var id = $(this).closest('tr').find('td:first').text().trim();
			var hide = $(this).closest('tr');
			
  			$.ajax({
  			  type: "POST",
  			  url: 'cancelBusTicket.php',
  			  data: {
  			    bookingID: id
  			  },
  			  success: function() {
				  hide.css("display", "none");
  			  }
  			});
		}
	});
	
	$('.cancelTrainTicket').click(function() {
		if (confirm('Are you sure you want to cancel this booking?')) {
  			var id = $(this).closest('tr').find('td:first').text().trim();
			var hide = $(this).closest('tr');
			
  			$.ajax({
  			  type: "POST",
  			  url: 'cancelTrainTicket.php',
  			  data: {
  			    bookingID: id
  			  },
  			  success: function() {
				  hide.css("display", "none");
  			  }
  			});
		}
	});
	
}); //document ready