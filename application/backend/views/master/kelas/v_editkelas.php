<form id="form-edit-kelas" method="POST">
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kelas</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Master</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Kelas</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Edit Data</a>
				</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Info-->

		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<a href="javascript:history.back()" class="btn btn-default font-weight-bold mr-2">
				Kembali
			</a>
			<button type="submit" class="btn btn-success btn-simpan-kelas">Simpan</button>
			<!--end::Actions-->
		</div>


	</div>
</div>
<!--end::Subheader-->

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class=" container ">

		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">
					Edit Kelas - <?= $namakelas ?>
				</h3>
			</div>
			
			<div class="card-body">
				<div class="col-md-12">
				<div class="form-group row">
						<div class="col-lg-6">
							<!-- <div class="card-body"> -->
                                <div class="mb-10">
                                    <img style="width: 100%" id="imgPreview" src="<?= asset('admin/media/bg/bg-invoice-5.jpg') ?>" alt="">
                                </div>
                                <div class="input-group">
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-upload text-white"></i></button>
									</div>
                                    <div class="custom-file">
                                        <input accept="image/*" type="file" class="custom-file-input" id="file_gambar_header" name="file_gambar_header">
                                        <label class="custom-file-label" for="inputGroupFile">Pilih File Gambar Header</label>
                                    </div>
                                    <div class="col-12 pr-0 pl-0">
										<span class="form-text text-muted">Max Size : 5 Mb (.jpg, .jpeg, .png, .gif)</span>
                                    </div>
                                </div>
                            <!-- </div> -->
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Judul <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul" value="Kelas Programming" required/>
						</div>
						<div class="col-lg-6">
							<label for="exampleInputPassword1">Waktu Pembelajaran <span class="text-danger">*</span></label>
							<div class="row">
								<div class="col-md-6">
									<div class="input-group date">
										<input type="text" class="form-control datepicker" id="date-pembelajaran" placeholder="Select date"/>
										<div class="input-group-append btn-icon-date">
											<span class="input-group-text">
												<i class="ki ki-calendar"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<input class="form-control timepicker" id="time-pembelajaran" readonly placeholder="Select time" type="text"/>
										<div class="input-group-append btn-icon-time">
											<span class="input-group-text">
												<i class="ki ki-clock"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Kategori<span class="text-danger">*</span></label>
							<select class="form-control select2" id="select-kategori" name="KategoriPengajar" style="width:100%" multiple="multiple" required>
								<option value=""></option>
								<option value="Web Programming">Web Programming</option>
								<option value="Web Programming" selected>Mobile Programming</option>
							</select>
						</div>
						<div class="col-lg-6">
							<label>Nama Pengajar<span class="text-danger">*</span></label>
							<select class="form-control select2" id="select-pengajar" name="pengajar" style="width:100%" required>
								<option value=""></option>
								<option value="Rafly Firdausy Irawan" selected>Rafly Firdausy Irawan</option>
								<option value="Zulkifli">Zulkifli</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Harga <span class="text-danger">*</span></label>
							<input type="text" class="form-control valid-number" name="harga" id="harga" placeholder="Masukkan harga" value="150000" required/>
						</div>
						<div class="col-lg-6">
							<label>Akses Pembelajaran <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="aksespembelajaran" id="akses-belajar" placeholder="Ex: Link atau sejenisnya" value="www.ultanesia.id/meet" required/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Nomor pokok pembelajaran <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="nomorpokok" id="nomor-pokok" placeholder="Masukkan nomor pokok pembelajaran" value="25" required/>
						</div>
						<div class="col-lg-6">
							<label>Deskripsi</label>
							<textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi kelas" rows="2">Kelas web programming</textarea>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		<!--end::Card-->

	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</form>

<script src="<?= asset("admin/customjs/master/kelas/kelola-kelas.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>
<script>
	
	$("#file_gambar_header").change(function() {
        readURL(this, false);
    });

    function readURL(input, modeInsert) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



