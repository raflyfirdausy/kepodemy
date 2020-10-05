
$(document).ready( function() { 

	getTable(); 
	
	$(document).on("click", ".btn-delete", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data testimoni ini akan terhapus",
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
							url: base_url + 'testimoni/hapus_data', // Isi dengan url/path file php yang dituju
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
					url: base_url + 'testimoni/get_all_data', // Isi dengan url/path file php yang dituju
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-testimoni").html("");
						$("#body-testimoni").append(data.output);
						
						
						$('#table-testimoni').dataTable({
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

	$('.btn-add-testimoni').on("click", function(){
		$("#testimoniModal").modal("show");
		$("#labelTestimoniModal").html("Tambah Testimoni");
		$("#form-testimoni").attr("action", base_url + 'testimoni/simpan_data');
		$('#form-testimoni')[0].reset();
		// urlgambar = asset + 'gambar/default-bg.jpg';
		// $('#imgPreview').attr('src', urlgambar);
		$('#imgPreview').attr('src', '');
		$('.custom-file-label').html('Pilih File Gambar');
		$('#foto_testimoni').prop("required", true);
	});


	$(document).on("click", ".btn-edit-testimoni", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		
		$("#labelTestimoniModal").html("Edit Testimoni");
		$("#form-testimoni").attr("action", base_url + 'testimoni/update_data');
		$('#form-testimoni')[0].reset();
		$('.custom-file-label').html('Pilih File Gambar');
		$('#foto_testimoni').prop("required", false);
		var getGambar = $(this).closest("tr").find('.txt-gambar').val();
		var getNama = $(this).closest("tr").find('.txt-nama').text();
		var getJabatan = $(this).closest("tr").find('.txt-jabatan').text();
		var getIsi = $(this).closest("tr").find('.txt-isi').text();
		var urlgambar;
		if(getGambar == ''){
			// urlgambar = asset + 'gambar/ukuran-banner.jpg';
			urlgambar = '';
		}
		else{
			urlgambar = asset + 'testimoni/' + getGambar;
		}
		$('#imgPreview').attr('src', urlgambar);
		$("#nama-testimoni").val(getNama);
		$("#jabatan-testimoni").val(getJabatan);
		$("#isi-testimoni").val(getIsi);
		$('#id-testimoni').val(id);


		$("#testimoniModal").modal("show");
	});


	$("#form-testimoni").on("submit", function(event) {
		event.preventDefault();
		
		// $("#form-edit-general-service")
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
								$("#testimoniModal").modal("hide");
								$('#table-testimoni').DataTable().clear();
								$('#table-testimoni').DataTable().destroy();
								getTable();
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
	});

	$(document).on("click", ".btn-active", function(event){
		event.preventDefault();
		var $getRows = $(this).closest("tr").find('.status-testimoni');
		
		$(this).attr('disabled', true);
		var btn = $(this);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Testimoni akan diaktifkan",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Aktifkan'
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
							url: base_url + 'testimoni/testimoni_active', // Isi dengan url/path file php yang dituju
							data: {
								"ID": id,
							}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							success: function (data) { // Ketika proses pengiriman berhasil
								if (data.response_code == 200) {
									Swal.close();
									
									Swal.fire('Done', data.response_message, 'success').then((result) => {
										$('#table-testimoni').DataTable().clear();
										$('#table-testimoni').DataTable().destroy();
										getTable();
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


	$(document).on("click", ".btn-not-active", function(event){
		event.preventDefault();
		var $getRows = $(this).closest("tr").find('.status-testimoni');
		
		$(this).attr('disabled', true);
		var btn = $(this);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Testimoni akan diaktifkan",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonText: 'Batal',
			confirmButtonText: 'Non aktifkan'
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
							url: base_url + 'testimoni/testimoni_notactive', // Isi dengan url/path file php yang dituju
							data: {
								"ID": id,
							}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							success: function (data) { // Ketika proses pengiriman berhasil
								if (data.response_code == 200) {
									Swal.close();
									
									Swal.fire('Done', data.response_message, 'success').then((result) => {
										$('#table-testimoni').DataTable().clear();
										$('#table-testimoni').DataTable().destroy();
										getTable();
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
