$(document).ready(function(){
	$('.table-info-pengajar').dataTable({
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		"responsive": true,
		"orderCellsTop": true,
		"fixedHeader": true,
	});



	var status = $('#status-pengajar').val();
	var url_path;
	switch(status) {
		case "0":
			$('.btn-reject-pengajar').show();
			$('.btn-approve-pengajar').show();
			url_path = 'pengajar/pending';
		  break;
		case "1":
			$('.btn-approve-pengajar').show();
			url_path = 'pengajar/ditolak';
		  break;
		default:
			url_path = 'pengajar/diterima';
		  break;
	}


	$(document).on("click", ".btn-reject-pengajar", function(event){
		$('#rejectModal').modal("show");
	})

	$('#form-send-reject-pengajar').on("submit", function(event){
		event.preventDefault();
		$('#rejectModal').modal("hide");
		Swal.fire("Berhasil!", "Data telah ditolak", "success").then((result) => {
			window.location.href = base_url + url_path;
		})
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
