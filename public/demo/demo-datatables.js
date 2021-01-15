// -------------------------------
// Initialize Data Tables
// -------------------------------

$(document).ready(function() {
	$('#submissionDetails').dataTable({
    	"language": {
    		"lengthMenu": "_MENU_"
		},
		'iDisplayLength': 20,
		"paging": false,
		"order": [[ 4, "asc" ]]
	});
	$('#users').dataTable({
    	"language": {
    		"lengthMenu": "_MENU_"
		},
		'iDisplayLength': 20,
		"order": [[ 1, "desc" ]]
	});
    $('.dataTables_filter input').attr('placeholder','Search...');


	//DOM Manipulation to move datatable elements integrate to panel
	
	$('.panel-ctrls-limit').append("&nbsp;&nbsp;Limit");
	$('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
	$('.panel-ctrls').append("<i class='separator'></i>");
	$('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

	$('.panel-footer').append($(".dataTable+.row"));
	$('.dataTables_paginate>ul.pagination').addClass("pull-right m0");
});