$("#searchn").keypress(function(e) {
    if(e.which == 13) {
    	a = $("#searchn").val();
    	window.location.assign("#/search/1/"+a);
    	$("#searchn").val('');
    }
});
