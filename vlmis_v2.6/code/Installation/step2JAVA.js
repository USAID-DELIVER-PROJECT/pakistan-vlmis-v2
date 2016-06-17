function checking(event)
{
	ShowDialogBox('Error!','Error occurred while setting up database.','',"Ok", 'GoToAssetList',null);
}

var finalResult;

$(document).ajaxStart(function(){
		$(".loadingIcon").show();
	}).ajaxStop(function(){
		$(".loadingIcon").hide();
		
		ShowDialogBox('Information!','Database Setup Completed. \nPress OK to proceed to the next page\nPress CANCEL to try again',"Ok","Cancel", 'GoToAssetList',null);
		
		//var r = confirm("Response from the Server:\n(Press OK to Proceed to the next Page and CANCEL to try again)\n\n" + finalResult.toString());
			
		//if(r)
		//{
			//window.location.href = "../public";
		//	window.location.href = "step3.html";
		//}
		//else{
		//	window.location.href = "step2.html";
		//}
	});
$(".loadingIcon").hide();

function RoleResources(temp)
{
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
		ListDetail(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("Role Resources");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function ListDetail(temp)
{
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
		ListMaster(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("List Detail");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function ListMaster(temp)
{
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
		LocationType(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("listmaster");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function LocationType(temp)
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
		Locations(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("locationType");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function Locations(temp)
{
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
		ResourcesType(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("locations");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function ResourcesType(temp)
{
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
		Roles(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("resourceType");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function Roles(temp)
{
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
		StakeholdersType(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("roles");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function StakeholdersType(temp)
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
		Resources(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});	
}

function Resources(temp)
{
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
		Stakeholders(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});	
}

function Stakeholders(temp)
{
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
		User(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("Stakeholders");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});	
}

function User(temp)
{
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
		ConfigFile(temp);
	}).fail(function(xhr, status, errorThrown)
	{
		showError("Users");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});
}

function ConfigFile(temp)
{
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
		showError("Config File");
		//alert( "Sorry, there was a problem!" );
		window.location.href = "step2.html";
	});	
}

function ShowDialogBox(title, content, btn1text, btn2text, functionText, parameterList) 
{
	var btn1css;
	var btn2css;

	if (btn1text == '') {
	btn1css = "hidecss";
	} else {
	btn1css = "showcss";
	}

	if (btn2text == '') {
	btn2css = "hidecss";
	} else {
	btn2css = "showcss";
	}
	$("#lblMessage").html(content);

	$("#dialog").dialog({
		resizable: false,
		title: title,
		modal: true,
		width: '400px',
		height: 'auto',
		bgiframe: false,
		hide: { effect: 'scale', duration: 400 },

		buttons: [
		{
			text: btn1text,
			"class": btn1css,
			click: function () 
			{													
				$("#dialog").dialog('close');
				setTimeout(function()
				{
					moveToPage("../public");
				}, 2000);
			}
		},
		{
			text: btn2text,
			"class": btn2css,
			click: function () 
			{
				$("#dialog").dialog('close');
				setTimeout(function()
				{
					moveToPage("step2.html");
				}, 2000);
			}
		}]
	});
}

function moveToPage(refPage)
{
	window.location.href = refPage;
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
	
	
	function showError(errorInfor)
	{		
		ShowDialogBox('Error!','Error occurred while setting up database.',"","Ok", 'GoToAssetList',null);
	}
	
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
			RoleResources(temp);
			finalResult = result;
		}).fail(function(xhr, status, errorThrown)
		{
			showError("Database Structure");
			//alert( "Sorry, there was a problem!\n" + errorThrown.toString() +"\nPlease Delete the database the create a new one\nthen try again" );
			window.location.href = "step2.html";
		});  
	});	
});