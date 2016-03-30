function showData(param){
	$('#data14').html('');
	$.ajax({
		type: "POST",
		url: appName + "/click-paths/ajax-user-path",
		data: {param: param},
		success: function(data) {
			$('#data14').html(data);
		}
	});
}

