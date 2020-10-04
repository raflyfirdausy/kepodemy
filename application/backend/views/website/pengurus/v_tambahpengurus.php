<form id="form-add-pengurus" method="POST" enctype="multipart/form-data">
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kelola Pengurus</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Website</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Pengurus KEPODEMY</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Tambah data</a>
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
			<button type="submit" class="btn btn-success btn-simpan-pengajar">Simpan</button>
		</div>

	</div>
</div>
<!--end::Subheader-->

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class=" container ">

		<!--begin::Card-->
		<div class="card card-custom gutter-bs">
		
			<!--Begin::Body-->
			<div class="card-body p-0">
				<!--begin::Body-->
				<div class="card-body">
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">Foto</label>
						<div class="col-lg-9 col-xl-6">
							<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(<?= asset('admin/media/users/blank.png') ?>)">
								<a class="image-popup-vertical-fit el-link" href="<?= asset('admin/media/users/blank.png') ?>" target="_blank">
									<div class="image-input-wrapper" style="background-image: url(<?= asset('admin/media/users/blank.png') ?>)">
									</div>
								</a>

								<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Ubah foto">
									<i class="fa fa-pen icon-sm text-muted"></i>
									<input type="file" name="foto_pengurus" accept=".png, .jpg, .jpeg" required/>
									<input type="hidden" name="foto_pengurus_remove"/>
								</label>

								<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>

								<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
							</div>
							<!-- <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span> -->
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">Nama</label>
						<div class="col-lg-9 col-xl-6">
							<input class="form-control form-control-lg" type="text" name="nama" placeholder="Masukkan nama pengurus" required/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">Jabatan</label>
						<div class="col-lg-9 col-xl-6">
							<input class="form-control form-control-lg" type="text" name="jabatan" placeholder="Masukkan jabatan pengurus" required/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">Keterangan</label>
						<div class="col-lg-9 col-xl-6">
							<textarea class="form-control form-control-lg" id="keterangan-pengurus" name="keterangan" rows="2" placeholder="Masukkan keterangan pengurus" required></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>
						<div class="col-lg-9 col-xl-6">
							<textarea class="summernote" id="kt_summernote_1" name="deskripsi" required></textarea>
						</div>
					</div>
					
		
				</div>
				<!--end::Body-->

			</div>
			<!--end::Body-->
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</form>

<script src="<?= asset("admin/customjs/website/pengurus/proses-pengurus.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


