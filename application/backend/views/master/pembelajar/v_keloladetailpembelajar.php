<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kelola Pembelajar</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Master</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Kelola Pembelajar</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Detail</a>
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

			<!-- <button type="button" class="btn btn-danger mr-2 btn-reject-pembelajar" style="display:none;">Tolak</button>
			<button type="button" class="btn btn-success btn-approve-pembelajar" style="display:none;">Terima</button> -->
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
		<div class="card card-custom gutter-bs">
			<!--Begin::Header-->
			<div class="card-header card-header-tabs-line">
				<div class="card-toolbar">
					<ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x "
						role="tablist">
						<li class="nav-item mr-3">
							<a class="nav-link active" data-toggle="tab"
								href="#tab-personal">
								<span class="nav-icon mr-2">
									<span class="svg-icon mr-3">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z"
													fill="#000000" fill-rule="nonzero"
													opacity="0.3" />
												<path
													d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z"
													fill="#000000" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span> 
								</span>
								<span class="nav-text font-weight-bold">Personal</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!--end::Header-->

			<!--Begin::Body-->
			<div class="card-body p-0">
				<div class="tab-content">
					<!--begin::Tab Content-->
					<div class="tab-pane active" id="tab-personal" role="tabpanel">
						<!--begin::Form-->
						<form class="form" id="form-update-pembelajar" method="POST">
							<!--begin::Body-->
							<div class="card-body">
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Foto</label>
									<div class="col-lg-9 col-xl-6">
										<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(<?= asset('admin/media/users/blank.png') ?>)">
											<a class="image-popup-vertical-fit el-link" href="<?= isset($data->foto) ?  asset("pembelajar/" . $data->foto) :  asset('admin/media/users/blank.png') ?>" target="_blank">
												<div class="image-input-wrapper" style="background-image: url(<?= isset($data->foto) ?  asset("pembelajar/" . $data->foto) :  asset('admin/media/users/blank.png') ?>)">
												</div>
											</a>

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
										<!-- <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span> -->
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Nama</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg" type="hidden" name="id" id="id-pembelajar" value="<?= $data->id ?>"/>
										<input class="form-control form-control-lg" type="text" name="nama" value="<?= $data->nama ?>"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Jabatan / Fungsi Pekerjaan</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg" type="text" name="jabatan" value="<?= $data->jabatan ?>"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Pendidikan Terakhir</label>
									<div class="col-lg-9 col-xl-6">
										<input type="text" class="form-control" name="pendidikan" id="pendidikan-terakhir" value="<?= $data->pendidikan ?>" required/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Tanggal Mendaftar</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg form-control-solid" type="text" value="<?= date("d-m-Y H:i:s", strtotime($data->created_at)); ?>" disabled/>
									</div>
								</div>
								
								<!-- INFO KONTAK -->
								<div class="row">
									<label class="col-xl-3"></label>
									<div class="col-lg-9 col-xl-6">
										<h5 class="font-weight-bold mt-10 mb-6">Info Kontak</h5>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Nomor Telepon</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
											<input type="text" class="form-control form-control-lg valid-number" name="no_hp" value="<?= $data->no_hp ?>" />
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Email</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
											<input type="text" class="form-control form-control-lg" value="<?= $data->email ?>" name="email"/>
										</div>
									</div>
								</div>
								<!-- INFO KONTAK -->
								<div class="row">
									<label class="col-xl-3"></label>
									<div class="col-lg-9 col-xl-6">
										<h5 class="font-weight-bold mt-10 mb-6">Ubah password</h5>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Password</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group">
											<input type="password" class="form-control password" id="password-admin" name="password" placeholder="Password"/>
											<div class="input-group-append">
												<button class="btn btn-secondary btn-lihat-password" type="button"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<span class="form-text text-muted txt-edit-password">Kosongkan jika tidak ingin mengubah password</span>
									</div>
								</div>
								
							</div>
							<!--end::Body-->
							<div class="card-footer">
								<div class="row">
									<!-- <div class="col-2">
									</div> -->
									<div class="col-12">
										<button type="submit" class="btn btn-success btn-update-pembelajar">Simpan Perubahan</button>
									</div>
								</div>
							</div>
						</form>
						<!--end::Form-->
					</div>
					<!--end::Tab Content-->

				</div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->


<script src="<?= asset("admin/customjs/custom.js") ?>"></script>
<script src="<?= asset("admin/customjs/master/pembelajar/kelola-pembelajar.js") ?>"></script>



