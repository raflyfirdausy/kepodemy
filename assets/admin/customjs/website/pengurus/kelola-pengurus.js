
$(document).ready( function() { 
	$('#table-pengurus').dataTable({
		"responsive": true,
	});
	
	$('.btn-add-pengurus').on("click", function(){
		$("#pengurusModal").modal("show");
		$("#labelPengurusModal").html("Tambah Pengurus");
		$("#form-pengurus").attr("action", base_url + 'pengurus/simpan_data');
		$('#form-pengurus')[0].reset();
		// $(".image-input-wrapper").css("background-image", "url(" + asset_url + 'admin/media/users/100_12.jpg' + ")"); 
		// $('.btn-remove').show();
	});


	$(document).on("click", ".btn-edit-pengurus", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		
		$("#labelPengurusModal").html("Edit Pengurus");
		$("#form-pengurus").attr("action", base_url + 'pengurus/update_data');
		$('#form-pengurus')[0].reset();
		$(".image-input-wrapper").css("background-image", "url(" + asset_url + 'admin/media/users/100_12.jpg' + ")"); 
		$('#id-pengurus').val(id);


		$("#pengurusModal").modal("show");
	});

	$(document).on("click", ".btn-detail-pengurus", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		
		$(".el-link").attr("href", asset_url + 'admin/media/users/100_12.jpg');
		$(".image-input-wrapper").css("background-image", "url(" + asset_url + 'admin/media/users/100_12.jpg' + ")"); 
		$('#id-detail-pengurus').val(id);
		var getRows = $(this).closest("tr");
		$('#nama-pengurus-detail').val(getRows.find('td:eq(1)').html());
		$('#jabatan-pengurus-detail').val(getRows.find('td:eq(2)').html());
		$('#keterangan-pengurus-detail').val(getRows.find('td:eq(3)').html());
		$("#detailpengurusModal").modal("show");
	});

	
	$(document).on("click", ".btn-delete", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data pengurus ini akan terhapus",
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
							url: base_url + 'pengurus/hapus_data', // Isi dengan url/path file php yang dituju
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

	function getTable(date) {
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				Swal.close();
				Swal.fire("Berhasil", "Data berhasil diload", "success");
				$('#table-pengurus').dataTable({
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


	$("#form-pengurus").on("submit", function(event) {
		event.preventDefault();
		
		// $("#form-edit-general-service")
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang menghapus',
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
							$("#pengurusModal").modal("show");
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
	});

})
