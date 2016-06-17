var finalResult;

$(document).ajaxStart(function(){
		$(".loadingIcon").show();
	}).ajaxStop(function(){
		$(".loadingIcon").hide();
		
		var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + finalResult.toString());
			
		if(r)
		{
			//window.location.href = "../public";
			window.location.href = "step3.html";
		}
		else{
			window.location.href = "step2.html";
		}
	});
$(".loadingIcon").hide();

function fillData1(temp)
{
	$.ajax({
		url: "location_types.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{	
		$("#locationType").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
	localStorage.clear();
	$.ajax({
		url: "locations.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{			
		$("#locations").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});

	$.ajax({
		url: "resources.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{		
		$("#resources").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});	
	$.ajax({
		url: "resourcesTypes.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{		
		$("#resourcesType").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function fillData2(temp)
{
	$.ajax({
		url: "stakeholder_types.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{		
		$("#stakeholderTypes").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});	
	localStorage.clear();
	$.ajax({
		url: "user_table.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{	
		$("#users").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function fillData(temp)
{
	localStorage.clear();
	$.ajax({
		url: "roles_resources.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{	
		$("#roleResources").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	}); 
	
	$.ajax({
		url: "list_details.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{			
		$("#listDetail").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
	localStorage.clear();
	$.ajax({
		url: "list_master.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{		
		$("#listMaster").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
	
	setTimeout(function(){
		fillData1(temp);
	}, 5000);
	
	$.ajax({
		url: "roles.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{		
		$("#roles").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});

	$.ajax({
		url: "stakeholder.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{		
		$("#stakeholders").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});	
	localStorage.clear();
	setTimeout(function(){
		fillData2(temp);
	}, 10000);
	localStorage.clear();
	
	$.ajax({
		url: "configFile.php",
		data:  temp,
		type: "GET",
	}).done(function(result)
	{		
		$("#configFile").removeClass("fa-cog fa-spin").addClass("fa-check-square");
		/* var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + result.toString());
		
		if(r)
		{
			window.location.href = "../public";
		}
		else{
			window.location.href = "step2.html";
		} */
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});	
	localStorage.clear();
	setTimeout(function(){
		fillData2(temp);
	}, 10000);
	localStorage.clear();
}

$(document).ready(function(){	
	$("#otherServerIP").css("visibility","hidden");
	$("#RemoteServerText").css("visibility","hidden");
	
	$("#otherServer").click(function(){
		$("#otherServerIP").css("visibility","visible");
		$("#RemoteServerText").css("visibility","visible");
	});
	
	$("#localhostserver").click(function(){
		$("#otherServerIP").css("visibility","hidden");
		$("#RemoteServerText").css("visibility","hidden");
	});
	
	$("#db_form").submit(function(event)
	{
		event.preventDefault();
		/* $("#description").css("visibility","hidden");
		$("#otherServerIP").css("visibility","hidden");
		$("#RemoteServerText").css("visibility","hidden");*/	
		$("#description").hide();
		var temp = $("#db_form").serialize().toString();
		
		$.ajax({
			url: "testdb.php",
			data:  temp,
			type: "GET",
		}).done(function(result)
		{
			$("#dbCreation").removeClass("fa-cog fa-spin").addClass("fa-check-square");
			event.preventDefault();
			fillData(temp);
			finalResult = result;
		}).fail(function(xhr, status, errorThrown)
		{
			alert( "Sorry, there was a problem!\n" + errorThrown.toString() +"\nPlease Delete the database the create a new one\nthen try again" );
			window.location.href = "step2.html";
		});  
	});	
});