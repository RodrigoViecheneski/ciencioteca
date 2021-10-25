function abreModal(){
	$.ajax({
		type: 'POST',
		url: '../../gestao_area.php',
		success: function(data){
			$('.gestao_area').html(data);
			$('#areaModal').gestao_area('show');
		}
	});
}