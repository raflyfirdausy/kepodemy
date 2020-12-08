<section class="teachers-section">
    <div class="container">
        <div class="container mb-5" id="registration">
            <div class="row bg-registration p-3">
                <div class="col-md-12 text-center">
                    <p class="registration-title font-weight-bold display-4 mt-4" style="font-size: 50px;">
                        Pendaftaran Kepodemy</p>
                    <p style="line-height:-30px;margin-top:-15px;">Silahkan isi data data yang diperlukan dibawah </p>
                    <hr>
                </div>
                <div class="col-md-6 mx-auto text-center">
                    <img src="<?= asset("frontend/register.svg") ?>" class="img-fluid img-responsive" alt="" srcset="">
                </div>
                <div class="col-md-6 mx-auto my-auto mt--5">
                    <form method="post" action="<?= base_url("auth/register_proses") ?>" id="form_pendaftaran">
                        <div class="form-group">
                            <label for="nama_lengkap" class="label-font-register">Nama lengkap</label>
                            <input type="text" autocomplete="off" class="form-control effect-9" name="nama" id="nama_lengkap" value="">
                        </div>

                        <div class="form-group">
                            <label for="email" class="label-font-register">No HP</label>
                            <input type="tel" class="form-control" name="no_hp" id="no_hp" value="">
                        </div>

                        <div class="form-group">
                            <label for="email" class="label-font-register">Jabatan / Fungsi Pekerjaan</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" value="">
                        </div>

                        <div class="form-group">
                            <label for="email" class="label-font-register">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" name="pendidikan" id="pendidikan" value="">
                        </div>


                        <div class="form-group">
                            <label for="email" class="label-font-register">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password" class="label-font-register">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="retype_password" class="label-font-register">Retype password</label>
                                <input type="password" class="form-control" name="retype_password" id="retype_password">
                            </div>
                        </div>
                        <!-- <div class="form-check mt-2">
                            <input class="form-check-input checkbox" type="checkbox" id="defaultCheck1" onchange="document.getElementById('btnsubmit').disabled = !this.checked;">
                            <label class=" form-check-label" for="defaultCheck1">
                                Saya setuju dan ingin melanjutkan.
                            </label>
                        </div> -->
                        <p class="terms">Dengan daftar anda menyetujui <i>privasi dan persyaratan ketentuan
                                hukum kami </i></a></p>
                        <button id="btnsubmit" class="btn btn-info text-center" href="#" style="width: 100%;">Daftar Sekarang!</button>
                        <p class="terms mt-2 text-center">Sudah punya akun? masuk <a id="klikDisini" href="#"> disini.</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $("#klikDisini").click(function(e) {
        e.preventDefault();
        $("#btnMasuk").click();
    })

    $("#form_pendaftaran").submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Loading',
            text: 'Proses Mendaftar akun <?= $app_name ?>',
            onBeforeOpen: () => {
                Swal.showLoading();
                //START AJAX
                $.ajax({
                    type: "POST",
                    url: '<?= base_url("auth/register_proses") ?>',
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(data) {
                        if (data.response_code == 200) {
                            Swal.close();
                            Swal.fire('Sukses', data.response_message, 'success').then((result) => {
                                $("#form_pendaftaran")[0].reset();
                                $("#btnMasuk").click();
                            })
                        } else {
                            Swal.close();
                            Swal.fire("Oops", data.response_message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                });
            }
        });
    })
</script>