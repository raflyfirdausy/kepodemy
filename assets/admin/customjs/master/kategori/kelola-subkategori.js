
$(document).ready( function() { 
	var id_induk = $("#id-induk").val();
	var namaindukkategori = $("#nama-induk-kategori").val();
	
	getTable(id_induk);


	$('.btn-add-subkategori').on("click", function(){
		$("#subkategoriModal").modal("show");
		$("#labelSubkategoriModal").html("Tambah Subkategori");
		$("#form-subkategori").attr("action", base_url + 'kategori/simpan_kategori');
		$('#form-subkategori')[0].reset();
		$("#kategori-induk").val(namaindukkategori);
		$("#id-induk-kategori").val(id_induk);
		urlgambar = asset + 'gambar/ukuran-banner.jpg';
		$('#imgPreview').attr('src', urlgambar);
		$('.custom-file-label').html('Pilih File Gambar');
		$('#file_gambar_header').prop("required", true);
	});

	$(document).on("click", ".btn-edit-subkategori", function(event){
		event.preventDefault();
		var id = $(this).data("id");
		$("#subkategoriModal").modal("show");
		
		$("#labelSubkategoriModal").html("Edit Subkategori");
		$("#form-subkategori").attr("action", base_url + 'kategori/update_kategori');
		$('#form-subkategori')[0].reset();
		$("#id-kategori").val(id);
		$('.custom-file-label').html('Pilih File Gambar');
		$('#file_gambar_header').prop("required", false);
		
		var getKategori = $(this).closest("tr").find('.txt-kategori').text();
		var getKeterangan = $(this).closest("tr").find('.txt-keterangan').text();
		var getGambar = $(this).closest("tr").find('.txt-gambar').val();
		var urlgambar;
		if(getGambar == ''){
			urlgambar = asset + 'gambar/ukuran-banner.jpg';
		}
		else{
			urlgambar = asset + 'kategori/' + getGambar;
		}
		$('#imgPreview').attr('src', urlgambar);
		$("#nama-kategori").val(getKategori);
		$("#keterangan-kategori").val(getKeterangan);
		$("#kategori-induk").val(namaindukkategori);
		$("#id-induk-kategori").val(id_induk);

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

	function getTable(id_induk) {
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + 'kategori/get_subkategori', // Isi dengan url/path file php yang dituju
					data: {
						'id_induk': id_induk
					},
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-subkategori").html("");
						$("#body-subkategori").append(data.output);
						
						
						$('#table-subkategori').dataTable({
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

	$("#form-subkategori").on("submit", function(event) {
		event.preventDefault();
		var btn = $('.btn-simpan');
		btn.attr('disabled', true);
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
								$("#subkategoriModal").modal("hide");
								$('#table-subkategori').DataTable().clear();
								$('#table-subkategori').DataTable().destroy();
								getTable(id_induk);
								btn.attr('disabled', false);
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
	});

})
