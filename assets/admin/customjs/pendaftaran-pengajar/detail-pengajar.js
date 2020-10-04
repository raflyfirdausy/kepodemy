$(document).ready(function(){
	var id_pengajar = $('#id-pengajar').val();
	getTablePekerjaan(id_pengajar);
	getTablePendidikan(id_pengajar);



	var status = $('#status-pengajar').val();
	var url_path;
	switch(status) {
		case "2":
			$('.btn-reject-pengajar').show();
			$('.btn-approve-pengajar').show();
			url_path = 'pengajar/pending';
		  break;
		case "3":
			$('.btn-approve-pengajar').show();
			url_path = 'pengajar/ditolak';
		  break;
		default:
			$('.btn-reject-pengajar').show();
			url_path = 'pengajar/diterima';
		  break;
	}


	$(document).on("click", ".btn-reject-pengajar", function(event){
		$('#form-send-reject-pengajar')[0].reset();
		$('#rejectModal').modal("show");
	})

	$('#form-send-reject-pengajar').on("submit", function(event){
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
					url: base_url + 'pengajar/tolakPengajar', // Isi dengan url/path file php yang dituju
					// url: base_url + 'kelola_admin/simpan_data', // Isi dengan url/path file php yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,

					success: function(data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							$('#rejectModal').modal("hide");
							Swal.fire('Done', data.response_message, 'success').then((result) => {
								window.location.href = base_url + url_path;
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
		
	})

	$(document).on("click", ".btn-approve-pengajar", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data pengajar akan diterima",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Terima'
		}).then((result) => {
			if (result.value) {
				Swal.fire({
					title: 'Harap menunggu',
					text: 'Sedang memproses',
					// timer: 2000,
					onBeforeOpen: () => {
						Swal.showLoading();
						
						//START AJAX
						$.ajax({
							type: "POST", // Method pengiriman data bisa dengan GET atau POST
							url: base_url + 'pengajar/terimaPengajar', // Isi dengan url/path file php yang dituju
							data: {
								"ID": id_pengajar,
							}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							success: function (data) { // Ketika proses pengiriman berhasil
								if (data.response_code == 200) {
									Swal.close();
									Swal.fire('Done', data.response_message, 'success').then((result) => {
										$(this).attr('disabled', false);
										window.location.href = base_url + url_path;
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

	function getTablePekerjaan(id_pengajar) {
		// Swal.fire({
		// 	title: 'Harap menunggu',
		// 	text: 'Sedang memproses',
		// 	// timer: 2000,
		// 	onBeforeOpen: () => {
		// 		Swal.showLoading();
				
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + 'pengajar/getPekerjaanPengajar', // Isi dengan url/path file php yang dituju
					data:{
						'ID' : id_pengajar
					},
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-pekerjaan").html("");
						$("#body-pekerjaan").append(data.output);
					
					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
						Swal.close();
						// Swal.fire("Oops", "Something went wrong", "error");
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
		// 	}
		// });
	}

	function getTablePendidikan(id_pengajar) {
		// Swal.fire({
		// 	title: 'Harap menunggu',
		// 	text: 'Sedang memproses',
		// 	// timer: 2000,
		// 	onBeforeOpen: () => {
		// 		Swal.showLoading();
				
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + 'pengajar/getPendidikanPengajar', // Isi dengan url/path file php yang dituju
					data:{
						'ID' : id_pengajar
					},
					dataType: 'JSON',
					success: function (data) { // Ketika proses pengiriman berhasil
						// var data = JSON.parse(data);
						console.log(data.output);
						Swal.close();
						$("#body-pendidikan").html("");
						$("#body-pendidikan").append(data.output);
					
					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
						Swal.close();
						// Swal.fire("Oops", "Something went wrong", "error");
						Swal.fire("Oops", xhr.responseText, "error");
					}
				});
		// 	}
		// });
	}
	

})
