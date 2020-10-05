
$(document).ready( function() { 
	// var tgl = $('#tgl-pembelajaran').val();
	// $('.datepicker2').datepicker({
	// 	format: 'dd-mm-yyyy',
	// 	orientation: "bottom left",
	// 	templates: arrows,
	// 	autoclose: true
	// }).datepicker('setDate', '');

	// $('.btn-icon-date2').on("click", function(){
	// 	alert("cek")
	// 	$('.datepicker2').datepicker('show');
	// }) 

	$("#form-add-kelas").on("submit", function(event) {
		event.preventDefault();
		var btn = $('.btn-simpan-kelas');
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
					// url: this.action,  // Isi dengan url/path file php yang dituju
					url: base_url + 'kelas/simpan_data', // Isi dengan url/path file php yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,

					success: function(data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire('Done', data.response_message, 'success').then((result) => {
								window.location.href = base_url + 'kelas';
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

	$("#form-edit-kelas").on("submit", function(event) {
		event.preventDefault();
		var btn = $('.btn-simpan-kelas');
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
					// url: this.action,  // Isi dengan url/path file php yang dituju
					url: base_url + 'kelas/update_data', // Isi dengan url/path file php yang dituju
					data: new FormData(this),
					dataType: "JSON",
					contentType: false,
					cache: false,
					processData: false,

					success: function(data) { // Ketika proses pengiriman berhasil
						if (data.response_code == 200) {
							Swal.close();
							Swal.fire('Done', data.response_message, 'success').then((result) => {
								window.location.href = base_url + 'kelas';
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
