$(document).ready(function(){
	var id_pengajar = $('#id-pengajar').val();
	getTablePekerjaan(id_pengajar);
	getTablePendidikan(id_pengajar);
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
		success: function(file, response) {
			var response = JSON.parse(response);
			if (response.response_code == 200) {
				toastr.success(response.response_message);
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
		$("#labelPekerjaanModal").html("Tambah Pekerjaan");
		$("#form-pekerjaan").attr("action", base_url + 'kelola_pengajar/savePekerjaanPengajar');
		$('#form-pekerjaan')[0].reset();
		$("#id-pengajar-pekerjaan").val(id_pengajar);
	});

	$(".btn-add-pendidikan").on("click", function(){
		$("#pendidikanModal").modal("show");
		$("#labelPendidikanModal").html("Tambah Pendidikan");
		$("#form-pendidikan").attr("action", base_url + 'kelola_pengajar/savePendidikanPengajar');
		$('#form-pendidikan')[0].reset();
		$("#id-pengajar-pendidikan").val(id_pengajar);
	});


	$(document).on("click", ".btn-edit-pekerjaan", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		
		$("#labelPekerjaanModal").html("Edit Pekerjaan");
		$("#form-pekerjaan").attr("action", base_url + 'kelola_pengajar/updatePekerjaanPengajar');
		$('#form-pekerjaan')[0].reset();
		$("#id-pekerjaan").val(id);
		$("#id-pengajar-pekerjaan").val(id_pengajar);

		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				// START AJAX
				$.ajax({
					type: "POST",
					url: base_url + 'kelola_pengajar/getPekerjaanPengajarById',
					data: {
						"ID": id,
					},
					dataType: "json",
					success: function (data) {
						if (data.response_code == 200) {
							Swal.close();
							$('#nama-pekerjaan').val(data.datapekerjaan.nama_pekerjaan);
							$('#waktu-masuk-kerja').val(data.datapekerjaan.tahun_masuk);
							$('#waktu-keluar-kerja').val(data.datapekerjaan.tahun_keluar);
							$('#posisi-kerja').val(data.datapekerjaan.posisi);
							$('#pencapaian-kerja').val(data.datapekerjaan.pencapaian);
							$('#keterangan-kerja').val(data.datapekerjaan.keterangan);
						} else {
							Swal.close();
							Swal.fire("Oops", "Data Not Found", "error");
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						Swal.close();
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
				 // END AJAX
			}

		});

		$("#pekerjaanModal").modal("show");
	});

	$(document).on("click", ".btn-edit-pendidikan", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		$("#labelPekerjaanModal").html("Edit Pendidikan");
		$("#form-pendidikan").attr("action", base_url + 'kelola_pengajar/updatePendidikanPengajar');
		$('#form-pendidikan')[0].reset();
		$("#id-pendidikan").val(id);
		$("#id-pengajar-pendidikan").val(id_pengajar);

		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				// START AJAX
				$.ajax({
					type: "POST",
					url: base_url + 'kelola_pengajar/getPendidikanPengajarById',
					data: {
						"ID": id,
					},
					dataType: "json",
					success: function (data) {
						if (data.response_code == 200) {
							Swal.close();
							$('#nama-pendidikan').val(data.datapendidikan.nama_pendidikan);
							$('#waktu-masuk-pendidikan').val(data.datapendidikan.tahun_masuk);
							$('#waktu-keluar-pendidikan').val(data.datapendidikan.tahun_keluar);
							$('#jurusan-pendidikan').val(data.datapendidikan.jurusan);
							$('#keterangan-pendidikan').val(data.datapendidikan.keterangan);
						} else {
							Swal.close();
							Swal.fire("Oops", "Data Not Found", "error");
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						Swal.close();
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
				 // END AJAX
			}

		});

		$("#pendidikanModal").modal("show");
	});

	$('#form-pekerjaan').on("submit", function(event){
		event.preventDefault();
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				//START AJAX
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: this.action,  // Isi dengan url/path file php yang dituju
					// url: base_url + 'kelola_admin/simpan_data', // Isi dengan url/path file php yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,

					success: function(data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire('Done', data.response_message, 'success').then((result) => {
								$("#pekerjaanModal").modal("hide");
								getTablePekerjaan(id_pengajar);
							})
						} else {
							Swal.close();
							Swal.fire("Oops", data.response_message, "error");
						
						}
					},
					error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
				 // END AJAX
			}
		});
	})

	$('#form-pendidikan').on("submit", function(event){
		event.preventDefault();
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				//START AJAX
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: this.action,  // Isi dengan url/path file php yang dituju
					// url: base_url + 'kelola_admin/simpan_data', // Isi dengan url/path file php yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,

					success: function(data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire('Done', data.response_message, 'success').then((result) => {
								$("#pendidikanModal").modal("hide");
								getTablePendidikan(id_pengajar);
							})
						} else {
							Swal.close();
							Swal.fire("Oops", data.response_message, "error");
						
						}
					},
					error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
				 // END AJAX
			}
		});
	})


	$(document).on("click", ".btn-delete-pekerjaan", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		var id = $(this).data("id")
		var btn = $(this);
		var row = $(this).closest("tr");
		var message = "Data pekerjaan ini akan terhapus";
		var url_tujuan = base_url + 'kelola_pengajar/hapus_pekerjaan';
		
		delete_data(message, btn, id, url_tujuan, row)
	});

	$(document).on("click", ".btn-delete-pendidikan", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		var id = $(this).data("id")
		var btn = $(this);
		var row = $(this).closest("tr");
		var message = "Data pendidikan ini akan terhapus";
		var url_tujuan = base_url + 'kelola_pengajar/hapus_pendidikan';
		
		delete_data(message, btn, id, url_tujuan, row)
	});

	$(document).on("click", ".btn-delete-lampiran", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		var id = $(this).data("id")
		var btn = $(this);
		var row = $(this).closest("tr");
		var message = "Data lampiran ini akan terhapus";
		var url_tujuan = base_url + 'kelola_pengajar/hapus_lampiran';
		
		delete_data(message, btn, id, url_tujuan, row)
	});


	function delete_data(message, btn, id, url_tujuan, row){
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: message,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonText: 'Batal',
			confirmButtonText: 'Hapus'
		}).then((result) => {
			if (result.value) {
				Swal.fire({
					title: 'Harap menunggu',
					text: 'Sedang menghapus',
					// timer: 2000,
					onBeforeOpen: () => {
						Swal.showLoading();
						//START AJAX
						$.ajax({
							type: "POST", // Method pengiriman data bisa dengan GET atau POST
							url: url_tujuan, // Isi dengan url/path file php yang dituju
							data: {
								"ID": id,
							}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							success: function (data) { // Ketika proses pengiriman berhasil
								if (data.response_code == 200) {
									Swal.close();
									Swal.fire('Deleted', data.response_message, 'success').then((result) => {
										row.remove();
									})
	
								} else {
									Swal.close();
									Swal.fire("Oops", data.response_message, "error");
									btn.attr('disabled', false);
								}
							},
							error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
								Swal.fire("Oops", xhr.responseText, "error");
								btn.attr('disabled', false);
							}
						});
						 // END AJAX
					}
				});
	
			} else {
				btn.attr('disabled', false);
			}
		});
	}


	$('#form-update-pengajar').on("submit", function(event){
		event.preventDefault();
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				//START AJAX
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + 'kelola_pengajar/update_pengajar',  // Isi dengan url/path file php yang dituju
					// url: base_url + 'kelola_admin/simpan_data', // Isi dengan url/path file php yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,

					success: function(data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire("Done", data.response_message, "success");
							
						} else {
							Swal.close();
							Swal.fire("Oops", data.response_message, "error");
						
						}
					},
					error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
				 // END AJAX
			}
		});
	})

	function getTablePekerjaan(id_pengajar) {
		// Swal.fire({
		// 	title: 'Harap menunggu',
		// 	text: 'Sedang memproses',
		// 	// timer: 2000,
		// 	onBeforeOpen: () => {
		// 		Swal.showLoading();
				
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + 'kelola_pengajar/getPekerjaanPengajar', // Isi dengan url/path file php yang dituju
					data:{
						'ID' : id_pengajar
					},
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-pekerjaan").html("");
						$("#body-pekerjaan").append(data.output);
					
					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
						Swal.close();
						// Swal.fire("Oops", "Something went wrong", "error");
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
		// 	}
		// });
	}

	function getTablePendidikan(id_pengajar) {
		// Swal.fire({
		// 	title: 'Harap menunggu',
		// 	text: 'Sedang memproses',
		// 	// timer: 2000,
		// 	onBeforeOpen: () => {
		// 		Swal.showLoading();
				
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + 'kelola_pengajar/getPendidikanPengajar', // Isi dengan url/path file php yang dituju
					data:{
						'ID' : id_pengajar
					},
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-pendidikan").html("");
						$("#body-pendidikan").append(data.output);
					
					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
						Swal.close();
						// Swal.fire("Oops", "Something went wrong", "error");
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
		// 	}
		// });
	}


})

