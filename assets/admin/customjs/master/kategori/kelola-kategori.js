
$(document).ready( function() { 
	$('#table-kategori').dataTable({
		"responsive": true,
	});
	$('#table-subkategori').dataTable({
		"responsive": true,
	});

	$('.btn-add-kategori').on("click", function(){
		$("#kategoriModal").modal("show");
		$("#labelKategoriModal").html("Tambah Kategori");
		$("#form-kategori").attr("action", base_url + 'kategori/simpan_kategori');
		$('#form-kategori')[0].reset();
	});

	$('.btn-add-subkategori').on("click", function(){
		$("#subkategoriModal").modal("show");
		$("#labelSubkategoriModal").html("Tambah Subategori");
		$("#form-subkategori").attr("action", base_url + 'kategori/simpan_subkategori');
		$('#form-subkategori')[0].reset();
	});

	$(document).on("click", ".btn-edit-kategori", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		
		$("#labelKategoriModal").html("Edit Kategori");
		$("#form-kategori").attr("action", base_url + 'kategori/update_kategori');
		$('#form-kategori')[0].reset();
		$("#id-kategori").val(id);
		
		var getKategori = $(this).closest("tr").find('.txt-kategori').text();
		$("#nama-kategori").val(getKategori);


		$("#kategoriModal").modal("show");
	});


	$(document).on("click", ".btn-edit-subkategori", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		
		$("#labelSubkategoriModal").html("Edit Subkategori");
		$("#form-subkategori").attr("action", base_url + 'kategori/update_subkategori');
		$('#form-subkategori')[0].reset();
		$("#id-kategori").val(id);
		
		var getKategori = $(this).closest("tr").find('.txt-kategori').text();
		$("#nama-kategori").val(getKategori);


		$("#subkategoriModal").modal("show");
	});

	
	$(document).on("click", ".btn-delete", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data kategori ini akan terhapus",
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
							url: base_url + 'kategori/hapus_kategori', // Isi dengan url/path file php yang dituju
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
				$('#table-kategori').dataTable({
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


	$("#form-kategori").on("submit", function(event) {
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
							$("#kategoriModal").modal("show");
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


	$("#form-subkategori").on("submit", function(event) {
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
							$("#subkategoriModal").modal("show");
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
