var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

dataResponse();

function dataResponse() {
	$.ajax({
		dataType: 'json',
		url: url,
		data: {page:page}
	}).done(function(data){
		total_page = data.total % 5;
		current_page = page;
		rowResponse(data.data);
		is_ajax_fire = 1;
	});
}

function getPageData() {
	$.ajax({
		dataType: 'json',
		url: url,
		data: {page:page}
	}).done(function(data){
		rowResponse(data.data);
	});
}

function rowResponse(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
		if( value.status == 0 ){
			var status_text = '<span class="label label-danger">Incompleted</span>';
		}else{
			var status_text = '<span class="label label-success">Completed</span>';
		}
		rows = rows + '<tr>';
		rows = rows + '<td>'+value.description+'</td>';
		rows = rows + '<td>'+status_text+'</td>';
		rows = rows + '<td data-id="'+value.todo_id+'">';
		rows = rows + '<button data-toggle="modal" data-target="#edit-task" class="btn btn-primary edit-task">Edit</button> ';
		rows = rows + '<button class="btn btn-danger remove-task">Delete</button>';
		rows = rows + '</td>';
		rows = rows + '</tr>';
	});
	$("tbody").html(rows);
}

$(".ajax-submit").click(function(e){
	e.preventDefault();
	var form_action = $("#create-task").find("form").attr("action");
	var description = $("#create-task").find("input[name='description']").val();

	$.ajax({
		dataType: 'json',
		type:'POST',
		url: form_action,
		data:{description:description}
	}).done(function(data){
		getPageData();
		$(".modal").modal('hide');
		toastr.success('Task Created Successfully.', 'Success Alert', {timeOut: 5000});
	});

});

$("body").on("click",".remove-task",function(){
	var id = $(this).parent("td").data('id');
	var c_obj = $(this).parents("tr");
	$.ajax({
		dataType: 'json',
		type:'delete',
		url: url + '/' + id,
	}).done(function(data){
		c_obj.remove();
		toastr.success('Task Deleted Successfully.', 'Success Alert', {timeOut: 5000});
		getPageData();
	});

});

$("body").on("click",".edit-task",function(){
	var id = $(this).parent("td").data('id');
	var description = $(this).parent("td").prev("td").prev("td").text();
	$("#edit-task").find("input[name='description']").val(description);
	$("#edit-task").find("form").attr("action",url + '/update/' + id);
});

$(".ajax-submit-edit").click(function(e){
	e.preventDefault();
	var form_action = $("#edit-task").find("form").attr("action");
	var description = $("#edit-task").find("input[name='description']").val();
	var status = $("#edit-task").find("select[name='status']").val();
	$.ajax({
		dataType: 'json',
		type:'POST',
		url: form_action,
		data:{description:description, status:status}
	}).done(function(data){
		getPageData();
		$(".modal").modal('hide');
		toastr.success('Task Updated Successfully.', 'Success Alert', {timeOut: 5000});
	});

});