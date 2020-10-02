$(document).ready(function() {


    // RepeaterForm.init();
    $(".btn-add-pendidikan").on("click", function() {
        // $(this).slideDown();
        // $(".cloned-row:first").clone().find("input").val("").end().insertAfter(".cloned-row:last");
        var output = "";
        output += `<div class="row rowdetailpendidikan mb-3">
					<div class="col-lg-12">
						<div class="row mb-4">
							<div class="col-md-3">
								<input type="text" name="nama_pendidikan[]" class="form-control" placeholder="Nama Pendidikan" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-2">
								<input type="number" name="tahun_masuk[]" class="form-control" placeholder="Tahun Masuk" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-2">
								<input type="number" name="tahun_keluar[]" class="form-control" placeholder="Tahun Keluar" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-2">
								<input type="text" name="jurusan[]" class="form-control" placeholder="Jurusan" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-2">
								<input type="text" name="keterangan_pendidikan[]" class="form-control" placeholder="Keterangan" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-sm font-weight-bolder btn-light-danger btn-delete-pendidikan" title="Hapus">
									<i class="la la-trash-o"></i>
								</button>
							</div>
						</div>
						<hr>
					</div>
					</div>`;
        $('.cloned-row-pendidikan').append(output);
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $(".btn-add-pekerjaan").on("click", function() {
        // $(this).slideDown();
        // $(".cloned-row:first").clone().find("input").val("").end().insertAfter(".cloned-row:last");
        var output = "";
        output += `<div class="row rowdetail mb-3">
					<div class="col-lg-12">
						<div class="row mb-4">
							<div class="col-md-4">
								<input type="text" name="nama_pekerjaan[]" class="form-control" placeholder="Nama Perusahaan" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-3">
								<input type="text" name="posisi[]" class="form-control" placeholder="Posisi" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-2">
								<input type="number" name="tahun_masuk_kerja[]" class="form-control" placeholder="Tahun Masuk" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-2">
								<input type="number" name="tahun_keluar_kerja[]" class="form-control" placeholder="Tahun Keluar" />
								<div class="d-md-none mb-2"></div>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col-md-7">
								<input type="text" name="pencapaian[]" class="form-control" placeholder="Masukkan pencapaian" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-4">
								<input type="text" name="keterangan_pekerjaan[]" class="form-control" placeholder="Keterangan" />
								<div class="d-md-none mb-2"></div>
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-sm font-weight-bolder btn-light-danger btn-delete-pekerjaan" title="Hapus">
									<i class="la la-trash-o"></i>
								</button>
							</div>
						</div>
						<hr>
					</div>
				</div>`;
        $('.cloned-row-pekerjaan').append(output);
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $(document).on("click", ".btn-delete-pendidikan", function() {
        $(this).closest(".rowdetailpendidikan").remove();
    });

    $(document).on("click", ".btn-delete-pekerjaan", function() {
        $(this).closest(".rowdetail").remove();
    });



    $("#form-add-pengajar").on("submit", function(event) {
        event.preventDefault();
        if ($('#password-pengajar').val() != $('#password-retype-pengajar').val()) {
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
                        url: base_url + "kelola_pengajar/simpan_data", // Isi dengan url/path file php yang dituju
                        // data: {
                        //     "ID": id,
                        // }, // data yang akan dikirim ke file yang dituju
                        data: new FormData(this),
                        dataType: "JSON",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) { // Ketika proses pengiriman berhasil
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

        }
        // $("#form-edit-general-service")
    });


})