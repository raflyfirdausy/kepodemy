
$(document).ready( function() { 


	$('#table-admin').dataTable({
		"responsive": true,
	});

	$('.btn-tambah-data').on("click", function(){
		$("#form-add-admin").attr("action", base_url + 'kelola_admin/simpan_data');
		$('#form-add-admin')[0].reset();
		$("#select-kelamin").val('').trigger('change');
		$("#select-level").val('').trigger('change');
		$('#createAdminModal').modal("show");
		$(".btn-simpan-data").html("Simpan");
		$("#labelModal").html("Tambah Data");
	})

	$('#form-add-admin').on("submit", function(event){
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
							Swal.fire("Done", data.response_message, "success");
							$('#createAdminModal').modal("close");
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

	//EDIT DATA
	$(document).on("click", ".btn-edit-data", function(event){
		var id = $(this).data("id");
		$("#form-add-admin").attr("action", base_url + 'kelola_admin/update_data');
		$('#form-add-admin')[0].reset();
		$("#select-kelamin").empty();
		$("#select-level").empty();
		$("#id-admin").val(id);
		$("#labelModal").html("Edit Data");
		$(".btn-simpan-data").html("Simpan perubahan");
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				// START AJAX
				$.ajax({
					type: "POST",
					url: base_url + 'kelola_admin/get_data',
					data: {
						"ID": id,
					},
					dataType: "json",
					success: function (data) {
						console.log(data.datapersonal.email);
						if (data.response_code == 200) {
							Swal.close();
							$('#email-admin').val(data.datapersonal.email);
							$('#password-admin').val(data.datapersonal.password);
							$('#nama-admin').val(data.datapersonal.nama);
							$('#nohp-admin').val(data.datapersonal.nohp);
							$('#alamat-admin').val(data.datapersonal.alamat);
							$('#keterangan-admin').val(data.datapersonal.keterangan);
							$("#select-kelamin").append(data.gender);
							$("#select-level").append(data.level);
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

		$('#createAdminModal').modal('show');
	});
	

	$(document).on("click", ".btn-delete", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data administrator ini akan terhapus",
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
						Swal.close();
						Swal.fire("Berhasil", "Data telah terhapus", "success");
						$(this).attr('disabled', false);
						//START AJAX
						// $.ajax({
						// 	type: "POST", // Method pengiriman data bisa dengan GET atau POST
						// 	url: "/general-service/delete-header", // Isi dengan url/path file php yang dituju
						// 	data: {
						// 		"ID": id,
						// 	}, // data yang akan dikirim ke file yang dituju
						// 	dataType: "json",
						// 	success: function (data) { // Ketika proses pengiriman berhasil
						// 		if (data.response_code == 200) {
						// 			Swal.close();
						// 			Swal.fire('Deleted', data.response_message, 'success').then((result) => {
						// 				row.remove();
						// 			})

						// 		} else {
						// 			Swal.close();
						// 			Swal.fire("Oops", data.response_message, "error");
						// 			$(this).attr('disabled', false);
						// 		}
						// 	},
						// 	error: function(xhr, ajaxOptions,
						// 		thrownError) { // Ketika ada error
						// 		Swal.fire("Oops", xhr.responseText, "error");
						// 		$(this).attr('disabled', false);
						// 	}
						// });
						 // END AJAX
					}
				});

			} else {
				$(this).attr('disabled', false);
			}
		});
	});

	
})
