$(document).ready(function(){
	
	//toggling state of returnDate based on radio button selection
	
	$('input[name="flightType"]').change(function(){
	
		if($(this).val()==='oneWay'){
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
	
	//$('#r1').css("visibility", "hidden");
	$('#r1').hide();
	$('#r2').hide();
	$('#r3').hide();
	$('#r4').css("visibility", "hidden");
	$('#searchHotel').css("height", "15em");
	$('#searchHotelButton').css("top", "-4.8em");
	
	$('#rooms').change(function(){
		//var noOfRooms=$(this).val();
		
		$('#searchHotel').css("height", "23em");
		
		$('#searchHotelButton').css("top", "+0em");
		
		$('#r1').fadeIn('slow');
		
		
	});
	
	
	
}); //document ready()