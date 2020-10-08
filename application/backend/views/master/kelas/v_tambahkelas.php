<form id="form-add-kelas" method="POST">
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
					<a href="javascript:;" class="text-muted">Produk</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Kelas</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Tambah Data</a>
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
			<!-- <button type="reset" class="btn btn-danger mr-2">Reset</button> -->
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
					Tambah Kelas
				</h3>
			</div>
			
			<div class="card-body">
				<div class="col-md-12">
					<div class="form-group row">
						<div class="col-lg-6">
							<!-- <div class="card-body"> -->
                                <div class="mb-10">
                                    <img style="width: 100%" id="imgPreview" src="<?= asset("gambar/ukuran-banner.jpg") ?>" alt="">
                                </div>
                                <div class="input-group">
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-upload text-white"></i></button>
									</div>
                                    <div class="custom-file">
                                        <input accept="image/*" type="file" class="custom-file-input" id="file_gambar_header" name="file_gambar_header">
                                        <label class="custom-file-label" for="inputGroupFile">Pilih File Gambar</label>
                                    </div>
                                    <div class="col-12 pr-0 pl-0">
										<span class="form-text text-muted">Max Size : 5 Mb (.jpg, .jpeg, .png)</span>
                                    </div>
                                </div>
                            <!-- </div> -->
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Judul <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="nama" id="judul" placeholder="Masukkan judul" required/>
						</div>
						<div class="col-lg-6">
							<label>Nama Pengajar<span class="text-danger">*</span></label>
							<select class="form-control select2" id="select-pengajar" name="id_pengajar" style="width:100%" required>
								<option value=""></option>
								<?php foreach ($listPengajar as $dt) : ?>
									<option value="<?= $dt->id ?>"><?= $dt->nama ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Kategori <span class="text-danger">*</span></label>
							<select class="form-control select2" id="select-kategori" name="kategori[]" style="width:100%" multiple="multiple" required>
								<option value=""></option>
								<?php foreach ($listKategori as $kt) : ?>
									<option value="<?= $kt->id ?>"><?= $kt->nama ?></option>
								<?php endforeach; ?>
								
							</select>
						</div>
						<div class="col-lg-6">
							<label>Jenis pembelajaran <span class="text-danger">*</span></label>
							<select class="form-control select2" id="select-jenis-kelas" name="jenis" style="width:100%" required>
								<option value=""></option>
								<?php foreach (jenis_pembelajaran() as $jp) : ?>
									<option value="<?= $jp ?>"><?= ucwords($jp) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							<label>Tanggal Pembelajaran <span class="text-danger">*</span></label>
							<div class="input-group date">
								<input type="text" class="form-control datepicker" id="tgl-pembelajaran" name="tanggal" placeholder="Select date" required/>
								<div class="input-group-append btn-icon-date">
									<span class="input-group-text">
										<i class="ki ki-calendar"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<label>Jam mulai <span class="text-danger">*</span></label>
							<div class="input-group">
								<input class="form-control timepicker" id="jam-mulai" name="jam_mulai" placeholder="Select time" type="text" required/>
								<div class="input-group-append btn-icon-time">
									<span class="input-group-text">
										<i class="ki ki-clock"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<label>Jam Selesai <span class="text-danger">*</span></label>
							<div class="input-group">
								<input class="form-control timepicker" id="jam-selesai" name="jam_selesai" placeholder="Select time" type="text" required/>
								<div class="input-group-append btn-icon-time2">
									<span class="input-group-text">
										<i class="ki ki-clock"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<label>Harga <span class="text-danger">*</span></label>
							<input type="text" class="form-control valid-number" name="harga" id="harga" placeholder="0" required/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<!-- <label>Nomor pokok pembelajaran <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="nomorpokok" id="nomor-pokok" placeholder="Masukkan nomor pokok pembelajaran" required/> -->
							<label>Keterangan</label>
							<input type="text" class="form-control" name="keterangan" id="keterangan-pokok" placeholder="Masukkan nomor keterangan" required/>
						</div>
						<div class="col-lg-6">
						<label>Potongan <span class="text-muted">(optional)</span></label>
							<input type="text" class="form-control valid-number" name="harga_diskon" id="harga-diskon" placeholder="0"/>
						</div>
						<!-- <div class="col-lg-6">
							<label>Deskripsi</label>
							<textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi kelas" rows="2"></textarea>
						</div> -->
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Media Pembelajaran <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="media" id="akses-belajar" placeholder="Ex: ZOOM, Google Meet, dll" required/>
						</div>
						<div class="col-lg-6">
							<label>Link Pembelajaran <span class="text-danger">*</span></label>
							<!-- <input type="text" class="form-control" name="link_pembelajaran" id="link-belajar" placeholder="Link pembelajaran" required/> -->
							<textarea class="summernote" id="kt_summernote_2" name="link_pembelajaran"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Deskripsi <span class="text-danger">*</span></label>
							<!-- <div class="summernote" id="kt_summernote_1"></div> -->
							<textarea class="summernote" id="kt_summernote_1" name="deskripsi"></textarea>
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

<script src="<?= asset("admin/customjs/master/kelas/proses-kelas.js") ?>"></script>
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



