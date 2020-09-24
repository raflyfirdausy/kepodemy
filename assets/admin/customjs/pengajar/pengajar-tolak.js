
$(document).ready( function() { 
	$('#table-pengajar-tolak').dataTable({
		"responsive": true,
	});
	
	$(document).on("click", ".btn-delete", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data transaksi ini akan terhapus",
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
		$('#table-pengajar-tolak').DataTable().clear();
		$('#table-pengajar-tolak').DataTable().destroy();
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
				$('#table-pengajar-tolak').dataTable({
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

})
