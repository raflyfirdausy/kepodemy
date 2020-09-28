<form id="form-add-pembelajar" method="POST">
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kelola Pembelajar</h5>

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Master</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Kelola Pembelajar</a>
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
			<button type="submit" class="btn btn-success btn-simpan-pembelajar">Simpan</button>
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
					Tambah Pembelajar
				</h3>
			</div>
			
			<div class="card-body">
				<div class="col-md-12">
					<div class="form-group row">
						<div class="col-lg-6">
							<!-- <label>Foto Pembelajar</label> -->
							<div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(<?= asset('admin/media/users/blank.png') ?>)">
								<div class="image-input-wrapper"></div>

								<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Ubah foto">
									<i class="fa fa-pen icon-sm text-muted"></i>
									<input type="file" name="foto_pembelajar" accept=".png, .jpg, .jpeg"/>
									<input type="hidden" name="foto_pembelajar_remove"/>
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
							<input type="email" class="form-control" name="email" id="email-pembelajar" placeholder="Masukkan email" required/>
						</div>
						<div class="col-lg-6">
							<label for="exampleInputPassword1">Password <span class="text-danger">*</span></label>
							<div class="input-group">
								<input type="password" class="form-control password" id="password-pembelajar" name="password" placeholder="Password" required/>
								<div class="input-group-append">
									<button class="btn btn-secondary btn-lihat-password" type="button"><i class="fa fa-eye"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Nama <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="nama" id="nama-pembelajar" placeholder="Masukkan nama" required/>
						</div>
						<div class="col-lg-6">
							<label>No. Hp <span class="text-danger">*</span></label>
							<input type="text" class="form-control valid-number" id="nohp-pembelajar" name="nohp" placeholder="Masukkan Nomor Handphone" required/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Kelas</label>
							<select class="form-control" id="select-kelas" name="kelas" style="width:100%" required>
								<option value=""></option>
								<option value="Kelas Web">Kelas Web</option>
								<option value="Kelas Mobile">Kelas Mobile</option>
							</select>
						</div>
						<div class="col-lg-6">
							<label>Nama Pengajar<span class="text-danger">*</span></label>
							<select class="form-control select2" id="select-pengajar" name="pengajar" style="width:100%" required>
								<option value=""></option>
								<option value="Rafly Firdausy Irawan">Rafly Firdausy Irawan</option>
								<option value="Zulkifli">Zulkifli</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Pendidikan Terakhir</label>
							<input type="text" class="form-control" name="pendidikanTerakhir" id="pendidikan-terakhir" placeholder="Masukkan pendidikan terakhir" required/>
						</div>
					</div>

				</div>
				
			</div>
			<!-- <div class="card-footer">
				<div class="row">
					<div class="col-lg-12">
						<button type="reset" class="btn btn-danger mr-2">Reset</button>
						<button type="button" class="btn btn-success btn-simpan-pembelajar">Simpan</button>
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

<script src="<?= asset("admin/customjs/custom.js") ?>"></script>
<script src="<?= asset("admin/customjs/master/pembelajar/kelola-pembelajar.js") ?>"></script>



