/*----------------------------------------------------------------------------------

								 Project Meteor
								    main.js
						      Written in : jQuery

               I've not commented on the code much. It's just jQuery.
   I had to spend much time on animation. At first I thought of keeping it simple,
            then I decided not to. Cause, who loves simple shit anyways.
			
								  ¯\_(ツ)_/¯

----------------------------------------------------------------------------------*/




$(document).ready(function(){
	
	//toggling state of returnDate based on radio button selection
	
	$('input[name="flightType"]').change(function(){
	
		if($(this).val()==='One Way'){
			$('#datetime2').attr('disabled',"true");
		}
		
		else{
			$('#datetime2').removeAttr('disabled');
		}
		
	});
	
	
	//restrict selection of an element as destination in case the same element is selected as origin
	
	//FLIGHTS
	
	 $('#origin').change(function(){
        var airportOrigin=$(this).val();
        $("li a").removeClass("disabled");
        $("li a:contains('"+ airportOrigin + "')").attr("disabled",true);
				$("li a:contains('"+ airportOrigin + "')").addClass("disabled");
    });
	
	//TRAINS
	
	 $('#originTrain').change(function(){
        var stationOrigin=$(this).val();
        $("li a").removeClass("disabled");
        $("li a:contains('"+ stationOrigin + "')").attr("disabled",true);
				$("li a:contains('"+ stationOrigin + "')").addClass("disabled");
    });
	
	 $('#originBus').change(function(){
        var cityOrigin=$(this).val();
        $("li a").removeClass("disabled");
        $("li a:contains('"+ cityOrigin + "')").attr("disabled",true);
				$("li a:contains('"+ cityOrigin + "')").addClass("disabled");
    });
	
	//change action of search flights button based on radio button selection
	
    $('input[name="flightType"]').change(function(){
	
		if($(this).val()==='One Way'){
			document.flightSearch.action="oneWayFlightSearch.php";
		}
		
		else{
			document.flightSearch.action="returnTripOutboundFlightSearch.php";
		}
		
	}); 
	
	/*var var1=document.getElementById("radio1");
     var var2=document.getElementById("radio2");
     if(var1.checked===true)
     {
        document.myform.action="immediate.php";
     }
     else
     {
        document.myform.action="Scheduled.php";
     }*/
	
	
	//$('#r1').css("visibility", "hidden");
	$('#r1').css("visibility", "hidden");
	$('#r2').css("visibility", "hidden");
	$('#r3').css("visibility", "hidden");
	$('#r4').css("visibility", "hidden");
	$('#searchHotel').css("height", "16.5em");
	$('#searchHotelButton').css("top", "-4.8em");
	
	$('#rooms').change(function(){
		var noOfRooms=$(this).val();
		
		$('#searchHotel').css("height", "22.8em");
		
		
		//$('.drop1').css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0});
		
		$('#r1').css("visibility", "visible");
		$('#r1').css("opacity", "0");
		
		$('#r2').css("visibility", "visible");
		$('#r2').css("opacity", "0");
		
		$('#r3').css("visibility", "visible");
		$('#r3').css("opacity", "0");
		
		$('#r4').css("visibility", "visible");
		$('#r4').css("opacity", "0");
		
		
		
		//$('#r1').css("visibility", "visible");
		
		//delaying the button animation
		
		var buttonDelay=function(){
				$('#searchHotelButton').css("top", "+0em");
			};
		
		setTimeout(buttonDelay,500);
		
		/*var inputDelay=function(){
				$('#r1').css("visibility", "visible");
			};
		
		setTimeout(inputDelay,1500);*/
		
		var fadeInInput=function(){
				//$('#r1').css({opacity: 0}).animate({opacity: 1.0});
			
			if(noOfRooms==="1"){
				$('#r1').css({opacity: 0}).fadeTo(500, 1);
				$('#room1').attr('required',"");
				$('#room2').removeAttr('required');
				$('#room3').removeAttr('required');
				$('#room4').removeAttr('required');
			}
			
			if(noOfRooms==="2"){
				$('#r1').css({opacity: 0}).fadeTo(500, 1);
				$('#r2').css({opacity: 0}).fadeTo(500, 1);
				$('#room1').attr('required',"");
				$('#room2').attr('required',"");
				$('#room3').removeAttr('required');
				$('#room4').removeAttr('required');
			}
			
			if(noOfRooms==="3"){
				$('#r1').css({opacity: 0}).fadeTo(500, 1);
				$('#r2').css({opacity: 0}).fadeTo(500, 1);
				$('#r3').css({opacity: 0}).fadeTo(500, 1);
				$('#room1').attr('required',"");
				$('#room2').attr('required',"");
				$('#room3').attr('required',"");
				$('#room4').removeAttr('required');
			}
			
			if(noOfRooms==="4"){
				$('#r1').css({opacity: 0}).fadeTo(500, 1);
				$('#r2').css({opacity: 0}).fadeTo(500, 1);
				$('#r3').css({opacity: 0}).fadeTo(500, 1);
				$('#r4').css({opacity: 0}).fadeTo(500, 1);
				$('#room1').attr('required',"");
				$('#room2').attr('required',"");
				$('#room3').attr('required',"");
				$('#room4').attr('required',"");
			}
			
			};
		
		setTimeout(fadeInInput,1200);
		
		
	});	
	
	
	
	//escaping characters on signup page
	
	$("#phone").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<10) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "1":
  			       case "2":
  			       case "3":
  			       case "4":
  			       case "5":
  			       case "6":
  			       case "7":
  			       case "8":
  			       case "9":
  			       case "0":
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
	$("#fullname").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<50) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "a":
  			       case "b":
  			       case "c":
  			       case "d":
  			       case "e":
  			       case "f":
  			       case "g":
  			       case "h":
  			       case "i":
  			       case "j":
				   case "k":
  			       case "l":
  			       case "m":
  			       case "n":
  			       case "o":
  			       case "p":
  			       case "g":
  			       case "r":
  			       case "s":
  			       case "t":
				   case "u":
  			       case "v":
  			       case "w":
  			       case "x":
  			       case "y":
  			       case "z":
  			       case "A":
  			       case "B":
  			       case "C":
  			       case "D":
				   case "E":
  			       case "F":
  			       case "G":
  			       case "H":
  			       case "I":
  			       case "J":
  			       case "K":
  			       case "L":
  			       case "M":
  			       case "N":
				   case "O":
				   case "P":
  			       case "Q":
  			       case "R":
  			       case "S":
  			       case "T":
  			       case "U":
  			       case "V":
  			       case "W":
  			       case "X":
  			       case "Y":
  			       case "Z":
  			       case ".":
  			       case "Backspace":
				   case " ":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
	$("#city").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<50) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "a":
  			       case "b":
  			       case "c":
  			       case "d":
  			       case "e":
  			       case "f":
  			       case "g":
  			       case "h":
  			       case "i":
  			       case "j":
				   case "k":
  			       case "l":
  			       case "m":
  			       case "n":
  			       case "o":
  			       case "p":
  			       case "g":
  			       case "r":
  			       case "s":
  			       case "t":
				   case "u":
  			       case "v":
  			       case "w":
  			       case "x":
  			       case "y":
  			       case "z":
  			       case "A":
  			       case "B":
  			       case "C":
  			       case "D":
				   case "E":
  			       case "F":
  			       case "G":
  			       case "H":
  			       case "I":
  			       case "J":
  			       case "K":
  			       case "L":
  			       case "M":
  			       case "N":
				   case "O":
				   case "P":
  			       case "Q":
  			       case "R":
  			       case "S":
  			       case "T":
  			       case "U":
  			       case "V":
  			       case "W":
  			       case "X":
  			       case "Y":
  			       case "Z":
  			       case "Backspace":
				   case " ":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
	$("#state").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<50) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "a":
  			       case "b":
  			       case "c":
  			       case "d":
  			       case "e":
  			       case "f":
  			       case "g":
  			       case "h":
  			       case "i":
  			       case "j":
				   case "k":
  			       case "l":
  			       case "m":
  			       case "n":
  			       case "o":
  			       case "p":
  			       case "g":
  			       case "r":
  			       case "s":
  			       case "t":
				   case "u":
  			       case "v":
  			       case "w":
  			       case "x":
  			       case "y":
  			       case "z":
  			       case "A":
  			       case "B":
  			       case "C":
  			       case "D":
				   case "E":
  			       case "F":
  			       case "G":
  			       case "H":
  			       case "I":
  			       case "J":
  			       case "K":
  			       case "L":
  			       case "M":
  			       case "N":
				   case "O":
				   case "P":
  			       case "Q":
  			       case "R":
  			       case "S":
  			       case "T":
  			       case "U":
  			       case "V":
  			       case "W":
  			       case "X":
  			       case "Y":
  			       case "Z":
  			       case "Backspace":
				   case " ":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
	
	
	
	//signup username AJAX call
	
	var doesEmailExist = $("#username").on("change keyup", function()
 	{  
 	  $.ajax({
 	   
 	   type : 'POST',
 	   url  : 'checkIfUsernameExists.php',
 	   data : $(this).serialize(),
 	   success : function(message)
 	   			{	
					if(message.trim() === "true")
					{
						$("#signupButton").prop("disabled", true);
						$("#usernameExists").css("display", "block");
						//console.log("message is "+message+" button disabled");
					}
					else {
						$("#signupButton").prop("disabled", false);
						$("#usernameExists").css("display", "none");
						//console.log("message is "+message+" button enabled");
					}
 	   			}
 	   });
 	   return false;
 	});
	
	
	//password check
	
	/*var passwordCheck = $('#password').on("change keyup", function() {
		
		var oldPass = $('#password').val().trim();
		var newPass = $('#repeatPassword').val().trim();
		
		console.log("old pass is: "+oldPass);
		console.log("new pass is: "+newPass);
		
		if(oldPass!==newPass) {
			
			console.log("entered if");
			
			$("#signupButton").on('click', function() {
				
				console.log("click heard");
				
				alert('The passwords you entered do not match. Please re-enter.');
				return false;
				
				console.log("returned false");
			});
			
		}
		
	});*/
	
	var repeatPasswordCheck = $('#signupButton').on("click", function() {
		
		var oldPass = $('#password').val().trim();
		var newPass = $('#repeatPassword').val().trim();
		
		console.log("old pass is: "+oldPass);
		console.log("new pass is: "+newPass);
		
		if(oldPass!==newPass) {
			
			//$("#signupButton").on('click', function() {
				
				console.log("click heard");
				
				alert('The passwords you entered do not match. Please re-enter.');
				
				console.log("alert");
				return false;
			//});
			
		}
		
	});
	
	
	
	
	//preventing gibberish data on payments page
	
	$("#nameOnCard").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<50) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "a":
  			       case "b":
  			       case "c":
  			       case "d":
  			       case "e":
  			       case "f":
  			       case "g":
  			       case "h":
  			       case "i":
  			       case "j":
				   case "k":
  			       case "l":
  			       case "m":
  			       case "n":
  			       case "o":
  			       case "p":
  			       case "g":
  			       case "r":
  			       case "s":
  			       case "t":
				   case "u":
  			       case "v":
  			       case "w":
  			       case "x":
  			       case "y":
  			       case "z":
  			       case "A":
  			       case "B":
  			       case "C":
  			       case "D":
				   case "E":
  			       case "F":
  			       case "G":
  			       case "H":
  			       case "I":
  			       case "J":
  			       case "K":
  			       case "L":
  			       case "M":
  			       case "N":
				   case "O":
				   case "P":
  			       case "Q":
  			       case "R":
  			       case "S":
  			       case "T":
  			       case "U":
  			       case "V":
  			       case "W":
  			       case "X":
  			       case "Y":
  			       case "Z":
  			       case "Backspace":
				   case " ":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
	$("#cardNumber").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<16) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "1":
  			       case "2":
  			       case "3":
  			       case "4":
  			       case "5":
  			       case "6":
  			       case "7":
  			       case "8":
  			       case "9":
  			       case "0":
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
	$("#cvv").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<3) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "1":
  			       case "2":
  			       case "3":
  			       case "4":
  			       case "5":
  			       case "6":
  			       case "7":
  			       case "8":
  			       case "9":
  			       case "0":
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
	$("#cardExpiry").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<5) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "1":
  			       case "2":
  			       case "3":
  			       case "4":
  			       case "5":
  			       case "6":
  			       case "7":
  			       case "8":
  			       case "9":
  			       case "0":
  			       case "/":
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
	$('#contactForm').submit(function() {
		alert("Your message was sent.");
	});
	
	
	//preventing gibberish data on passenger names page
	
	$(".inputPassengerName").on("keypress",function(e){
		
		var noOfDigits=$(this).val().length;
		
		if(noOfDigits<50) {
		
  			console.log("Entered Key is " + e.key);
  			switch (e.key)
  			   {
  			       case "a":
  			       case "b":
  			       case "c":
  			       case "d":
  			       case "e":
  			       case "f":
  			       case "g":
  			       case "h":
  			       case "i":
  			       case "j":
				   case "k":
  			       case "l":
  			       case "m":
  			       case "n":
  			       case "o":
  			       case "p":
  			       case "g":
  			       case "r":
  			       case "s":
  			       case "t":
				   case "u":
  			       case "v":
  			       case "w":
  			       case "x":
  			       case "y":
  			       case "z":
  			       case "A":
  			       case "B":
  			       case "C":
  			       case "D":
				   case "E":
  			       case "F":
  			       case "G":
  			       case "H":
  			       case "I":
  			       case "J":
  			       case "K":
  			       case "L":
  			       case "M":
  			       case "N":
				   case "O":
				   case "P":
  			       case "Q":
  			       case "R":
  			       case "S":
  			       case "T":
  			       case "U":
  			       case "V":
  			       case "W":
  			       case "X":
  			       case "Y":
  			       case "Z":
  			       case "Backspace":
				   case " ":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
		else {
			 switch (e.key)
  			   {
  			       case "Backspace":
  			           return true;
  			           break;
			
  			       default:
  			           return false;
  			   }
		}
});
	
}); //document ready()