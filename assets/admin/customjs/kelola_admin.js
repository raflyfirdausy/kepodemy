$(document).ready( function() { 
	$('#table-admin').dataTable();

	$('#btn-add-admin').on("click", function(){
		$('#createAdminModal').modal("show");
	})

	$('#form-add-admin').on("submit", function(event){
		event.preventDefault();
		Swal.fire("Berhasil!", "Data telah ditambahkan", "success");
		$('#createAdminModal').modal("hide");
	})
})
