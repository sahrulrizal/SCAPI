function getUser(id) {
	$.ajax({
		'type' : 'GET',
		'url' : '../proses/getUser/'+id,
		'dataType' : 'json',
		success : function (data) {
			$("#id").val(data[0].id_user);
			$("#name").val(data[0].name);
			$("#username").val(data[0].username);
		}
	});
}

function getGenre(id) {
	$.ajax({
		'type' : 'GET',
		'url' : '../proses/getGenre/'+id,
		'dataType' : 'json',
		success : function (data) {
			$("#id").val(data[0].id_genre);
			$("#genre").val(data[0].genre);
		}
	});
}

function getAdver(id) {
	$.ajax({
		'type' : 'GET',
		'url' : '../proses/getAdver/'+id,
		'dataType' : 'json',
		success : function (data) {
			$("#id").val(data[0].id_adver);
			$("#title").val(data[0].title);
			$("#text").val(data[0].text);
		}
	});
}