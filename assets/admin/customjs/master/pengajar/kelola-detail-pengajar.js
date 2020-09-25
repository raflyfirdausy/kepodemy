$(document).ready(function(){

	$('#select-kategori').select2({
		placeholder: "Pilih Kategori Pengajar"
	});
	 // multiple file upload
	//  $('#dropzone_lampiran').dropzone({
	// 	url: base_url + 'kelola_pengajar/upload_file', // Set the url for your upload script location
	// 	paramName: "file", // The name that will be used to transfer the file
	// 	maxFiles: 10,
	// 	maxFilesize: 10, // MB
	// 	// addRemoveLinks: true,
	// 	accept: function(file, response) {
	// 		alert(response.response_code)
	// 		if (response.response_code == 200) {
	// 			toastr.success("Upload sukses");
	// 		} else {
	// 			toastr.error("Upload gagal!");
	// 		}
	// 	},
	// 	error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
	// 		toastr.error("Gagal Total!");
	// 	}
	// });

	var myDropzone = new Dropzone('#dropzone_lampiran', { // Make the whole body a dropzone
		url: base_url + 'kelola_pengajar/upload_file', // Set the url for your upload script location
		renameFile: function(file) {
			return file.name;
		},
			// 		// acceptedFiles: ".jpeg,.jpg,.png,.gif",
		acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.pdf,.pptx,.ppt,.csv,.zip,.xlsx,.xls",
		maxFiles: 10,
		maxFilesize: 10, // MB
		// addRemoveLinks: true,
		accept: function(file, response) {
			console.log(response.code)
			if (response.code == 200) {
				toastr.success("Upload sukses");
			} else {
				toastr.error("Upload gagal!");
			}
		},
		error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
			toastr.error("Gagal Total!");
		}
	});

	myDropzone.on("complete", function(file) {
        myDropzone.removeFile(file);
	});
	

	$(".btn-add-pekerjaan").on("click", function(){
		$("#pekerjaanModal").modal("show");
	});
	$(".btn-add-pendidikan").on("click", function(){
		$("#pendidikanModal").modal("show");
	});

	

	var url_path;


})

// var DropzoneGeneral = new Dropzone(
// 	'#dropzone_lampiran', {
// 		maxFilesize: 10,
// 		renameFile: function(file) {
// 			// alert(file.name);
// 			return file.name;
// 		},
// 		// acceptedFiles: ".jpeg,.jpg,.png,.gif",
// 		acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.pdf,.pptx,.ppt,.csv,.zip,.xlsx,.xls",
// 		// addRemoveLinks: true,
// 		timeout: 60000,
// 		success: function(file, response) {
// 			if (response.code == 200) {
// 				// Swal.fire("Done", response.message, "success");
// 				toastr.success('Attachment has been uploaded');
// 				// $('#table-line-attach').DataTable().clear();
// 				// $('#table-line-attach').DataTable().destroy();
// 				// getDetailAttachment($('#RefID').val(), '#table-line-attach', idstatus, akses_status, roleuser, detailStatus, createdby, usermail, isinternal);
// 				// DropzoneGeneral.removeAllFiles( true );

// 			} else {
// 				Swal.fire("Oops", response.message, "error");
// 			}
// 		},
// 		error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
// 			Swal.fire("Oops", "Something went wrong", "error");
// 			// window.location.href = "/logout";
// 			// toastr.danger('error');
// 		}
// 	}
// );
