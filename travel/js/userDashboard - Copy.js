$(document).ready(function() {
	
	//delete account
	
	$('#deleteAccount').click(function() {
		$.ajax({
			type: "POST",
  			url: 'deleteUserAccount.php',  //this location is relative to the php file from which this js is called
  			success : function() {
                $(location).attr('href', 'deleteAccountRedirect.php');
            }
		});
	});
	
	$('#flightTicketsWrapper').css("display", "none");
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
  		var id = $(this).closest('tr').find('td:first').text().trim();
		
  		$.ajax({
  		  type: "POST",
  		  url: 'cancelTicket.php',
  		  data: {
  		    bookingID: id
  		  },
  		  success: function() {
  		    //alert("Ticket Cancelled");
			//window.location.reload();
			  
  		  }
  		});
	});
	
}); //document ready