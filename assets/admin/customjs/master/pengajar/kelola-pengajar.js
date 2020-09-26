// var RepeaterForm = function() {

// 	// Private functions
// 	var demoRepeater = function() {
// 		$('#repeater').repeater({
// 			// initEmpty: false,

// 			// defaultValues: {
// 			// 	'text-input': 'foo'
// 			// },

// 			show: function () {
// 				$(this).slideDown();
// 			},

// 			hide: function (deleteElement) {
// 				$(this).slideUp(deleteElement);
// 			}
// 		});
// 	}

// 	return {
// 		// public functions
// 		init: function() {
// 			demoRepeater();
// 		}
// 	};
// }();



$(document).ready( function() { 


	// RepeaterForm.init();
	$(".btn-add-pendidikan").on("click", function(){
		// $(this).slideDown();
		// $(".cloned-row:first").clone().find("input").val("").end().insertAfter(".cloned-row:last");
		var output = "";
		output += `<div class="row mb-4">
				<div class="col-md-3">
					<input type="text" name="NamaPendidikan[]" class="form-control" placeholder="Nama Pendidikan" />
					<div class="d-md-none mb-2"></div>
				</div>
				<div class="col-md-2">
					<input type="text" name="WaktuMasuk[]" class="form-control" placeholder="Tahun Masuk" />
					<div class="d-md-none mb-2"></div>
				</div>
				<div class="col-md-2">
					<input type="text" name  ="WaktuKeluar[]" class="form-control" placeholder="Tahun Keluar" />
					<div class="d-md-none mb-2"></div>
				</div>
				<div class="col-md-2">
					<input type="text" name="Jurusan[]" class="form-control" placeholder="Jurusan" />
					<div class="d-md-none mb-2"></div>
				</div>
				<div class="col-md-2">
					<input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan" />
					<div class="d-md-none mb-2"></div>
				</div>
				<div class="col-md-1">
					<button type="button" class="btn btn-sm font-weight-bolder btn-light-danger btn-delete-pendidikan" title="Hapus">
						<i class="la la-trash-o"></i>
					</button>
				</div>
			</div>`;
		$('.cloned-row-pendidikan').append(output);
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	});

	$(".btn-add-pekerjaan").on("click", function(){
		// $(this).slideDown();
		// $(".cloned-row:first").clone().find("input").val("").end().insertAfter(".cloned-row:last");
		var output = "";
		output += `<div class="row mb-4">
						<div class="col-md-3">
							<input type="text" name="NamaPerusahaan[]" class="form-control" placeholder="Nama Perusahaan" />
							<div class="d-md-none mb-2"></div>
						</div>
						<div class="col-md-2">
							<input type="text" name="WaktuMasukPekerjaan[]" class="form-control" placeholder="Tahun Masuk" />
							<div class="d-md-none mb-2"></div>
						</div>
						<div class="col-md-2">
							<input type="text" name  ="WaktuKeluarPekerjaan[]" class="form-control" placeholder="Tahun Keluar" />
							<div class="d-md-none mb-2"></div>
						</div>
						<div class="col-md-2">
							<input type="text" name="Posisi[]" class="form-control" placeholder="Posisi" />
							<div class="d-md-none mb-2"></div>
						</div>
						<div class="col-md-2">
							<input type="text" name="keteranganPekerjaan[]" class="form-control" placeholder="Keterangan" />
							<div class="d-md-none mb-2"></div>
						</div>
						<div class="col-md-1">
							<button type="button" class="btn btn-sm font-weight-bolder btn-light-danger btn-delete-pekerjaan" title="Hapus">
								<i class="la la-trash-o"></i>
							</button>
						</div>
					</div>`;
		$('.cloned-row-pekerjaan').append(output);
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	});

	$(document).on("click", ".btn-delete-pendidikan", function() {
		$(this).closest(".row").remove();
	});

	$(document).on("click", ".btn-delete-pekerjaan", function() {
		$(this).closest(".row").remove();
	});

	$('#table-pengajar').dataTable({
		"responsive": true,
	});
	
	$(document).on("click", ".btn-delete", function(event){
		event.preventDefault();
		$(this).attr('disabled', true);
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data transaksi ini akan terhapus",
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
						Swal.close();
						Swal.fire("Berhasil", "Data telah terhapus", "success");
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
							// Swal.close();
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

	// function getTable() {
	// 	Swal.fire({
	// 		title: 'Harap menunggu',
	// 		text: 'Sedang memproses',
	// 		// timer: 2000,
	// 		onBeforeOpen: () => {
	// 			Swal.showLoading();
	// 			Swal.close();
	// 			Swal.fire("Berhasil", "Data berhasil diload", "success");
	// 			$('#table-pengajar').dataTable({
	// 				"responsive": true,
	// 			});
	// 			// $.ajax({
	// 			// 	type: "POST", // Method pengiriman data bisa dengan GET atau POST
	// 			// 	url: "/service-order/get-data-by-date", // Isi dengan url/path file php yang dituju
	// 			// 	data: {
	// 			// 		'filter_date': date
	// 			// 	},
	// 			// 	dataType: "JSON",
	// 			// 	success: function (data) { // Ketika proses pengiriman berhasil
	// 			// 		console.log(data.output);
	// 			// 		Swal.close();
	// 			// 		$("#general-body").html("");
	// 			// 		$("#general-body").append(data.output);

	// 			// 		$('#tabel-general').dataTable({
	// 			// 			"paging": true,
	// 			// 			"lengthChange": true,
	// 			// 			"searching": true,
	// 			// 			"ordering": true,
	// 			// 			"info": true,
	// 			// 			"autoWidth": false,
	// 			// 			"responsive": false,
	// 			// 			"orderCellsTop": true,
	// 			// 			"fixedHeader": true,
	// 			// 		});


	// 			// 	},
	// 			// 	error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
	// 			// 		Swal.close();
	// 			// 		Swal.fire("Oops", "Something went wrong", "error");
	// 			// 	}
	// 			// });
	// 		}
	// 	});
	// }

	$("#form-add-pengajar").on("submit", function(event) {
		event.preventDefault();
		
		// $("#form-edit-general-service")
		Swal.fire({
			title: 'Harap menunggu',
			text: 'Sedang menghapus',
			// timer: 2000,
			onBeforeOpen: () => {
				Swal.showLoading();
				// //START AJAX
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: base_url + "kelola_pengajar/simpan_data", // Isi dengan url/path file php yang dituju
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
								window.location.href = base_url + "kelola_pengajar";
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


})
