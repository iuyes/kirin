function addGoods() {
	$('#add_goods').ajaxForm(function(data) {
		data = jQuery.parseJSON(data);
		alert(data.error);
	});
}

function editGoods() {
	$('#edit_goods').ajaxForm(function(data) {
		data = jQuery.parseJSON(data);
		alert(data.error);
	});
}