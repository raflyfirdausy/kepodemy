
$(document).ready( function() { 

	getTable();

	$('.btn-tambah-data').on("click", function(){
		$("#form-add-admin").attr("action", base_url + 'kelola_admin/simpan_data');
		$('#form-add-admin')[0].reset();
		$("#select-kelamin").val('').trigger('change');
		$("#select-level").val('').trigger('change');
		$('#createAdminModal').modal("show");
		$(".btn-simpan-data").html("Simpan");
		$("#labelModal").html("Tambah Data");
		$('#password-admin').prop("required", true);
		$('#password-retype-admin').prop("required", true);
		$('.div-retype').show();
		$('.txt-edit-password').hide();
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
		$('#password-admin').removeAttr('required');
		$('#password-retype-admin').removeAttr('required');
		
		$('.div-retype').hide();
		$('.txt-edit-password').show();
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
						console.log(data);
						if (data.response_code == 200) {
							Swal.close();
							$('#email-admin').val(data.datapersonal.email);
							// $('#password-admin').val(data.datapersonal.password);
							$('#nama-admin').val(data.datapersonal.nama);
							$('#nohp-admin').val(data.datapersonal.no_hp);
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
		var id = $(this).data("id")
		var row = $(this).closest("tr");
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
						// START AJAX
						$.ajax({
							type: "POST", // Method pengiriman data bisa dengan GET atau POST
							url: base_url + 'kelola_admin/hapus_data', // Isi dengan url/path file php yang dituju
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
									$(this).attr('disabled', false);
								}
							},
							error: function(xhr, ajaxOptions,
								thrownError) { // Ketika ada error
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
	});

	function getTable() {
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + 'kelola_admin/get_all_data', // Isi dengan url/path file php yang dituju
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-admin").html("");
						$("#body-admin").append(data.output);
						
						
						$('#table-admin').dataTable({
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


	$('#form-add-admin').on("submit", function(event){
		event.preventDefault();
		var url_tujuan = this.action;
		var dataform = new FormData(this);
		if($('#labelModal').html() == 'Tambah Data'){
			if($('#password-admin').val() != $('#password-retype-admin').val()){
				Swal.fire("Oops", "Password konfirmasi harus sama, silahkan dicek kembali", "error");
			}
			else{
				simpanData(url_tujuan, dataform)
			}
		}
		else{
			simpanData(url_tujuan, dataform)
		}
	})

	function simpanData(url_tujuan, dataform){
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				//START AJAX
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: url_tujuan,  // Isi dengan url/path file php yang dituju
					// url: base_url + 'kelola_admin/simpan_data', // Isi dengan url/path file php yang dituju
					data: dataform,
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,

					success: function(data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire('Done', data.response_message, 'success').then((result) => {
								$('#createAdminModal').modal("hide");
								$('#table-admin').DataTable().clear();
								$('#table-admin').DataTable().destroy();
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
	}

	
	
})



