
$(document).ready( function() { 

	getTable(); 
	
	$(document).on("click", ".btn-delete", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data slider ini akan terhapus",
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
							url: base_url + 'slider/hapus_data', // Isi dengan url/path file php yang dituju
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
					url: base_url + 'slider/get_all_data', // Isi dengan url/path file php yang dituju
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-slider").html("");
						$("#body-slider").append(data.output);
						
						
						$('#table-slider').dataTable({
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

	$('.btn-add-slider').on("click", function(){
		$("#sliderModal").modal("show");
		$("#labelSliderModal").html("Tambah Slider");
		$("#form-slider").attr("action", base_url + 'slider/simpan_data');
		$('#form-slider')[0].reset();
		urlgambar = asset + 'gambar/ukuran-banner.jpg';
		$('#imgPreview').attr('src', urlgambar);
		$('.custom-file-label').html('Pilih File Gambar');
		$('#foto_slider').prop("required", true);
	});


	$(document).on("click", ".btn-edit-slider", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		
		$("#labelSliderModal").html("Edit Slider");
		$("#form-slider").attr("action", base_url + 'slider/update_data');
		$('#form-slider')[0].reset();
		$('.custom-file-label').html('Pilih File Gambar');
		$('#foto_slider').prop("required", false);
		var getGambar = $(this).closest("tr").find('.txt-gambar').val();
		var getJudul = $(this).closest("tr").find('.txt-judul').text();
		var getKeterangan = $(this).closest("tr").find('.txt-keterangan').text();
		var urlgambar;
		if(getGambar == ''){
			urlgambar = asset + 'gambar/ukuran-banner.jpg';
		}
		else{
			urlgambar = asset + 'slider/' + getGambar;
		}
		$('#imgPreview').attr('src', urlgambar);
		$("#judul-slider").val(getJudul);
		$("#keterangan-slider").val(getKeterangan);
		$('#id-slider').val(id);


		$("#sliderModal").modal("show");
	});


	$("#form-slider").on("submit", function(event) {
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
								$("#sliderModal").modal("hide");
								$('#table-slider').DataTable().clear();
								$('#table-slider').DataTable().destroy();
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
		var $getRows = $(this).closest("tr").find('.status-slider');
		
		$(this).attr('disabled', true);
		var btn = $(this);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Slider akan diaktifkan",
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
							url: base_url + 'slider/slider_active', // Isi dengan url/path file php yang dituju
							data: {
								"ID": id,
							}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							success: function (data) { // Ketika proses pengiriman berhasil
								if (data.response_code == 200) {
									Swal.close();
									
									Swal.fire('Done', data.response_message, 'success').then((result) => {
										$('#table-slider').DataTable().clear();
										$('#table-slider').DataTable().destroy();
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
		var $getRows = $(this).closest("tr").find('.status-slider');
		
		$(this).attr('disabled', true);
		var btn = $(this);
		var id = $(this).data("id")
		var row = $(this).closest("tr");
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Slider akan diaktifkan",
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
							url: base_url + 'slider/slider_notactive', // Isi dengan url/path file php yang dituju
							data: {
								"ID": id,
							}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							success: function (data) { // Ketika proses pengiriman berhasil
								if (data.response_code == 200) {
									Swal.close();
									
									Swal.fire('Done', data.response_message, 'success').then((result) => {
										$('#table-slider').DataTable().clear();
										$('#table-slider').DataTable().destroy();
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
