
$(document).ready( function() { 
	$("#form-add-pembelajar").on("submit", function(event) {
		event.preventDefault();
		if ($('#password-pembelajar').val() != $('#password-retype').val()) {
            Swal.fire("Oops", "Password konfirmasi harus sama, silahkan dicek kembali", "error");
        } else {
			Swal.fire({
				title: 'Harap menunggu',
				text: 'Sedang memproses',
				// timer: 2000,
				onBeforeOpen: () => {
					Swal.showLoading();
					// //START AJAX
					$.ajax({
						type: "POST", // Method pengiriman data bisa dengan GET atau POST
						url: base_url + "kelola_pembelajar/simpan_data", // Isi dengan url/path file php yang dituju
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
									window.location.href = base_url + "kelola_pembelajar";
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
		}
	});

	
	$('#form-update-pembelajar').on("submit", function(event){
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
					url: base_url + 'kelola_pembelajar/update_pembelajar',  // Isi dengan url/path file php yang dituju
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
