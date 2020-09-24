$(document).ready(function(){
	var status = $('#status-transaksi').val();
	var url_path;
	switch(status) {
		case "0":
			$('.btn-reject-transaksi').show();
			$('.btn-approve-transaksi').show();
			url_path = 'bookingpembelian/pending';
		  break;
		case "1":
			$('.btn-approve-transaksi').show();
			url_path = 'bookingpembelian/ditolak';
		  break;
		default:
			url_path = 'bookingpembelian/diterima';
		  break;
	}


	$(document).on("click", ".btn-reject-transaksi", function(event){
		$('#rejectModal').modal("show");
	})

	$('#form-send-reject').on("submit", function(event){
		event.preventDefault();
		$('#rejectModal').modal("hide");
		Swal.fire("Berhasil!", "Data telah ditolak", "success").then((result) => {
			window.location.href = base_url + url_path;
		})
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
						Swal.close();
						Swal.fire("Berhasil!", "Data telah diterima", "success").then((result) => {
							window.location.href = base_url + url_path;
						})
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


	

})
