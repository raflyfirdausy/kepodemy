$(document).ready(function(){
	var status = $('#status-transaksi').val();
	var id_transaksi = $('#id-transaksi-header').val();
	// alert(status)
	var url_path;
	switch(status) {
		case "2":
			$('.btn-reject-transaksi').show();
			$('.btn-approve-transaksi').show();
			url_path = 'bookingpembelian/pending';
		  break;
		case "3":
			$('.btn-approve-transaksi').show();
			url_path = 'bookingpembelian/ditolak';
		  break;
		default:
			url_path = 'bookingpembelian/diterima';
		  break;
	}


	$(document).on("click", ".btn-reject-transaksi", function(event){
		$('#form-send-reject')[0].reset();
		$('#rejectModal').modal("show");
	})

	$('#form-send-reject').on("submit", function(event){
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
					url: base_url + 'bookingpembelian/tolakTransaksi', // Isi dengan url/path file php yang dituju
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

	$(document).on("click", ".btn-approve-transaksi", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data transaksi akan diterima",
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
							url: base_url + 'bookingpembelian/terimaTransaksi', // Isi dengan url/path file php yang dituju
							data: {
								"ID": id_transaksi,
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
						 // END AJAX
					}
				});

			} else {
				$(this).attr('disabled', false);
			}
		});
	})


	

})
