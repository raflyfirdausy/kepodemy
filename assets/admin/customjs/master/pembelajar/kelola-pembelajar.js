
$(document).ready( function() { 
	$('#table-pembelajar').dataTable({
		"responsive": true,
	});
	
	$(document).on("click", ".btn-delete", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data pembelajar ini akan terhapus",
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
							url: base_url + 'kelola_pembelajar/hapus_pembelajar', // Isi dengan url/path file php yang dituju
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
				$(this).attr('disabled', false);
			}
		});
	})

	$(document).on("click", ".btn-verifikasi", function(event){
		event.preventDefault();
		var $getRows = $(this).closest("tr").find('.status-pembelajar');
		
		$(this).attr('disabled', true);
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Akun pembelajar akan terverifikasi",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Verifikasi'
		}).then((result) => {
			if (result.value) {
				Swal.fire({
					title: 'Harap menunggu',
					text: 'Sedang memproses',
					// timer: 2000,
					onBeforeOpen: () => {
						Swal.showLoading();
						Swal.close();
						Swal.fire("Berhasil", "Akun telah terverifikasi", "success");
						$(this).hide();
						$getRows.html("Sudah verifikasi");
						$getRows.removeClass("label-light-danger");
						$getRows.addClass("label-light-success");
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
	})


	$(document).on("click", "#btn-filterDate", function(event){
		event.preventDefault();
		$('#table-pembelajar').DataTable().clear();
		$('#table-pembelajar').DataTable().destroy();
		// $("#general-body").html("");
		getTable($('.filter-date').val());
	})

	function getTable(date) {
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				Swal.close();
				Swal.fire("Berhasil", "Data berhasil diload", "success");
				$('#table-pembelajar').dataTable({
					"responsive": true,
				});
				// $.ajax({
				// 	type: "POST", // Method pengiriman data bisa dengan GET atau POST
				// 	url: "/service-order/get-data-by-date", // Isi dengan url/path file php yang dituju
				// 	data: {
				// 		'filter_date': date
				// 	},
				// 	dataType: "JSON",
				// 	success: function (data) { // Ketika proses pengiriman berhasil
				// 		console.log(data.output);
				// 		Swal.close();
				// 		$("#general-body").html("");
				// 		$("#general-body").append(data.output);

				// 		$('#tabel-general').dataTable({
				// 			"paging": true,
				// 			"lengthChange": true,
				// 			"searching": true,
				// 			"ordering": true,
				// 			"info": true,
				// 			"autoWidth": false,
				// 			"responsive": false,
				// 			"orderCellsTop": true,
				// 			"fixedHeader": true,
				// 		});


				// 	},
				// 	error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				// 		Swal.close();
				// 		Swal.fire("Oops", "Something went wrong", "error");
				// 	}
				// });
			}
		});
	}


	$("#form-add-pembelajar").on("submit", function(event) {
		event.preventDefault();
		
		// $("#form-edit-general-service")
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang menghapus',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				// //START AJAX
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + "kelola_pembelajar/simpan_data", // Isi dengan url/path file php yang dituju
					// data: {
					//     "ID": id,
					// }, // data yang akan dikirim ke file yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,
					success: function (data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire('Success', data.response_message, 'success').then((result) => {
								window.location.href = base_url + "kelola_pembelajar";
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
				//  // END AJAX
			}
		});
	});

	
	$('#form-update-pembelajar').on("submit", function(event){
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
					url: base_url + 'kelola_pembelajar/update_pembelajar',  // Isi dengan url/path file php yang dituju
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


})
