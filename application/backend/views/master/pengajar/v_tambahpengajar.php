<form id="form-add-pengajar" method="POST">
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kelola Pengajar</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Master</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Kelola Pengajar</a>
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
			<button type="reset" class="btn btn-danger mr-2">Reset</button>
			<button type="submit" class="btn btn-success btn-simpan-pengajar">Simpan</button>
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
					Tambah Pengajar
				</h3>
			</div>
			
			<div class="card-body">
				<div class="col-md-12">
				<div class="form-group row">
						<div class="col-lg-6">
							<!-- <label>Foto Pengajar</label> -->
							<div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(<?= asset('admin/media/users/blank.png') ?>)">
								<div class="image-input-wrapper"></div>

								<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Ubah foto">
									<i class="fa fa-pen icon-sm text-muted"></i>
									<input type="file" name="foto_pengajar" accept=".png, .jpg, .jpeg"/>
									<input type="hidden" name="foto_pengajar_remove"/>
								</label>

								<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>

								<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
							</div>
							<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Email address <span class="text-danger">*</span></label>
							<input type="email" class="form-control" name="email" id="email-pengajar" placeholder="Masukkan email" required/>
						</div>
						<div class="col-lg-6">
							<label for="exampleInputPassword1">Password <span class="text-danger">*</span></label>
							<div class="input-group">
								<input type="password" class="form-control password" id="password-pengajar" name="password" placeholder="Password" required/>
								<div class="input-group-append">
									<button class="btn btn-secondary btn-lihat-password" type="button"><i class="fa fa-eye"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Nama <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="nama" id="nama-pengajar" placeholder="Masukkan nama" required/>
						</div>
						<div class="col-lg-6">
							<label>No. Hp <span class="text-danger">*</span></label>
							<input type="text" class="form-control valid-number" id="nohp-pengajar" name="nohp" placeholder="Masukkan Nomor Handphone" required/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Deskripsi</label>
							<input type="text" class="form-control" name="deskripsi" id="deskripsi-pengajar" placeholder="Masukkan deskripsi" required/>
						</div>
						<div class="col-lg-6">
							<label>Jabatan / Fungsi Pekerjaan</label>
							<input type="text" class="form-control" name="jabatan" id="jabatan-pengajar" placeholder="Masukkan jabatan atau fungsi pekerejaan" required/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Kategori</label>
							<select class="form-control" id="select-kategori" name="KategoriPengajar" style="width:100%" required>
								<option value=""></option>
								<option value="Web Programming">Web Programming</option>
								<option value="Web Programming">Mobile Programming</option>
							</select>
						</div>
						<div class="col-lg-6">
							<label>Lampiran (CV, dan lain-lain)</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="lampiran" />
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
					</div>

					<div class="separator separator-dashed my-8"></div>

					<!-- PENDIDIKAN -->
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Pendidikan</label>
							<div class="cloned-row-pendidikan">
								<div class="row mb-4">
									<div class="col-md-3">
										<input type="text" name="NamaPendidikan[]" class="form-control" placeholder="Nama Pendidikan" />
										<div class="d-md-none mb-2"></div>
									</div>
									<div class="col-md-2">
										<input type="number" name="WaktuMasuk[]" class="form-control" placeholder="Tahun Masuk" />
										<div class="d-md-none mb-2"></div>
									</div>
									<div class="col-md-2">
										<input type="number" name="WaktuKeluar[]" class="form-control" placeholder="Tahun Keluar" />
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
								</div>
							</div>
						</div>
						
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<!-- <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
								<i class="la la-plus"></i>Tambah Pendidikan
							</a> -->
							<button type="button" class="btn btn-sm font-weight-bolder btn-light-primary btn-add-pendidikan">
								<i class="la la-plus"></i>Tambah Pendidikan
							</button>
						</div>
					</div>
					<!-- END PENDIDIKAN -->

					<!-- PEKERJAAN -->
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Pekerjaan</label>
							<div class="cloned-row-pekerjaan">
								<div class="row mb-4">
									<div class="col-md-3">
										<input type="text" name="NamaPerusahaan[]" class="form-control" placeholder="Nama Perusahaan" />
										<div class="d-md-none mb-2"></div>
									</div>
									<div class="col-md-2">
										<input type="number" name="WaktuMasukPekerjaan[]" class="form-control" placeholder="Tahun Masuk" />
										<div class="d-md-none mb-2"></div>
									</div>
									<div class="col-md-2">
										<input type="number" name="WaktuKeluarPekerjaan[]" class="form-control" placeholder="Tahun Keluar" />
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
								</div>
							</div>
						</div>
						
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<!-- <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
								<i class="la la-plus"></i>Tambah Pendidikan
							</a> -->
							<button type="button" class="btn btn-sm font-weight-bolder btn-light-primary btn-add-pekerjaan">
								<i class="la la-plus"></i>Tambah Pekerjaan
							</button>
						</div>
					</div>
					<!-- END PEKERJAAN -->

					

				</div>
				
			</div>
			<!-- <div class="card-footer">
				<div class="row">
					<div class="col-lg-12">
						<button type="reset" class="btn btn-danger mr-2">Reset</button>
						<button type="button" class="btn btn-success btn-simpan-pengajar">Simpan</button>
					</div>
				</div>
			</div> -->
			
		</div>
		<!--end::Card-->

	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</form>

<script src="<?= asset("admin/customjs/master/pengajar/kelola-pengajar.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>



