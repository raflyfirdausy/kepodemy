
$(document).ready( function() { 
	getTable(); 
	
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
							url: base_url + 'kelola_pembelajar/hapus_data', // Isi dengan url/path file php yang dituju
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

	function getTable() {
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + 'kelola_pembelajar/get_all_data', // Isi dengan url/path file php yang dituju
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-pembelajar").html("");
						$("#body-pembelajar").append(data.output);
						
						
						$('#table-pembelajar').dataTable({
							"paging": true,
							"lengthChange": true,
							"searching": true,
							"ordering": true,
							"info": true,
							"autoWidth": false,
							"responsive": true,
							"orderCellsTop": true,
							"fixedHeader": true,
						});
	
					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
						Swal.close();
						// Swal.fire("Oops", "Something went wrong", "error");
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
			}
		});
	}
	

	$(document).on("click", ".btn-verifikasi", function(event){
		event.preventDefault();
		var $getRows = $(this).closest("tr").find('.status-pembelajar');
		
		$(this).attr('disabled', true);
		var btn = $(this);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
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
						
						// START AJAX
						$.ajax({
							type: "POST", // Method pengiriman data bisa dengan GET atau POST
							url: base_url + 'kelola_pembelajar/verifikasi', // Isi dengan url/path file php yang dituju
							data: {
								"ID": id,
							}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							success: function (data) { // Ketika proses pengiriman berhasil
								if (data.response_code == 200) {
									Swal.close();
									
									Swal.fire('Done', data.response_message, 'success').then((result) => {
										btn.hide();
										$getRows.html("Sudah verifikasi");
										$getRows.removeClass("label-light-danger");
										$getRows.addClass("label-light-success");
									})

								} else {
									Swal.close();
									Swal.fire("Oops", data.response_message, "error");
									$(this).attr('disabled', false);
								}
							},
							error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
								Swal.fire("Oops", xhr.responseText, "error");
								$(this).attr('disabled', false);
							}
						});
						//  END AJAX
					}
				});

			} else {
				$(this).attr('disabled', false);
			}
		});
	})



})
