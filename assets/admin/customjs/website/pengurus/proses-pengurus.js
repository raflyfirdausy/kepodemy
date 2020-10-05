
$(document).ready( function() { 
	$("#form-add-pengurus").on("submit", function(event) {
		event.preventDefault();
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang memproses',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				// //START AJAX
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + "pengurus/simpan_data", // Isi dengan url/path file php yang dituju
					// data: {
					//     "ID": id,
					// }, // data yang akan dikirim ke file yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,
					success: function (data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire('Success', data.response_message, 'success').then((result) => {
								window.location.href = base_url + "pengurus";
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
				//  // END AJAX
			}
		});
		
	});

	
	$('#form-update-pengurus').on("submit", function(event){
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
					url: base_url + 'pengurus/update_data',  // Isi dengan url/path file php yang dituju
					// url: base_url + 'kelola_admin/simpan_data', // Isi dengan url/path file php yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,

					success: function(data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire('Success', data.response_message, 'success').then((result) => {
								window.location.href = base_url + "pengurus";
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


})
