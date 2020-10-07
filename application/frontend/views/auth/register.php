<section class="teachers-section">
            <div class="container">
                <div class="container mb-5" id="registration">
                    <div class="row bg-registration p-3">
                        <div class="col-md-12 text-center">
                            <p class="registration-title font-weight-bold display-4 mt-4" style="font-size: 50px;">
                                Pendaftaran Kepodemy</p>
                            <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan dibawah </p>
                            <hr>
                        </div>
                        <div class="col-md-6 mx-auto text-center">
                            <img src="upload/img/2650147.png" class="img-fluid img-responsive" alt="" srcset="">
                        </div>
                        <div class="col-md-6 mx-auto my-auto mt--5">
                            <form method="post" id="form_pendaftaran">
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
                                    <input type="text" class="form-control" name="email" id="email" value="">
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="control-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                    <select class="select2 form-control custom-select" style="width: 100%;" name="pendidikan_pamong" id="pendidikan_terakhir" required>
                                        <option value="">Pilih Pendidikan Terakhir</option>
                                        <option value="TIDAK/BELUM SEKOLAH">TIDAK/BELUM SEKOLAH</option>
                                        <option value="BELUM TAMAT SD/SEDERAJAT">BELUM TAMAT SD/SEDERAJAT</option>
                                        <option value="TAMAT SD/SEDERAJAT">TAMAT SD/SEDERAJAT</option>
                                        <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                                        <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                        <option value="DIPLOMA I/II">DIPLOMA I/II</option>
                                        <option value="AKADEMI/DIPLOMA III/SARJANA MUDA">AKADEMI/DIPLOMA III/SARJANA MUDA</option>
                                        <option value="DIPLOMA IV/STRATA I">DIPLOMA IV/STRATA I</option>
                                        <option value="STRATA II">STRATA II</option>
                                        <option value="STRATA III">STRATA III</option>
                                        <option value="LAINNYA">Lainnya</option>
                                    </select>
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
                                <div class="form-check mt-2">
                                    <input class="form-check-input checkbox" type="checkbox" id="defaultCheck1" onchange="document.getElementById('btnsubmit').disabled = !this.checked;">
                                    <label class=" form-check-label" for="defaultCheck1">
                                        Saya setuju dan ingin melanjutkan.
                                    </label>
                                </div>
                                <p class="terms">Dengan daftar anda menyetujui <i>privasi dan persyaratan ketentuan
                                        hukum kami </i> . baca selengkapnya <a href="#"> disini.</a></p>
                                <button id="btnsubmit" disabled class="btn btn-info text-center" href="#" style="width: 100%;">Daftar Sekarang!</button>
                                <p class="terms mt-2 text-center">Sudah punya akun? masuk <a href="8. Masuk.html"> disini.</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>