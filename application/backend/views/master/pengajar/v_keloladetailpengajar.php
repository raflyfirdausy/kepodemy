<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kelola Pengajar</h5>
			<input type="hidden" class="form-control" id="status-pengajar" value="<?= $status ?>" disabled/>
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

			<!-- <button type="button" class="btn btn-danger mr-2 btn-reject-pengajar" style="display:none;">Tolak</button>
			<button type="button" class="btn btn-success btn-approve-pengajar" style="display:none;">Terima</button> -->
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
						<li class="nav-item mr-3">
							<a class="nav-link" data-toggle="tab"
								href="#tab-pendidikan">
								<span class="nav-icon mr-2">
									<span class="svg-icon mr-3">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/>
												<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/>
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								 </span>
								<span class="nav-text font-weight-bold">Pendidikan</span>
							</a>
						</li>
						<li class="nav-item mr-3">
							<a class="nav-link" data-toggle="tab"
								href="#tab-pekerjaan">
								<span class="nav-icon mr-2">
									<span class="svg-icon mr-3">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								 </span>
								<span class="nav-text font-weight-bold">Pekerjaan</span>
							</a>
						</li>
						<li class="nav-item mr-3">
							<a class="nav-link" data-toggle="tab"
								href="#tab-attachment">
								<span class="nav-icon mr-2">
									<span class="svg-icon mr-3">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M12.4644661,14.5355339 L9.46446609,14.5355339 C8.91218134,14.5355339 8.46446609,14.9832492 8.46446609,15.5355339 C8.46446609,16.0878187 8.91218134,16.5355339 9.46446609,16.5355339 L12.4644661,16.5355339 L12.4644661,17.5355339 C12.4644661,18.6401034 11.5690356,19.5355339 10.4644661,19.5355339 L6.46446609,19.5355339 C5.35989659,19.5355339 4.46446609,18.6401034 4.46446609,17.5355339 L4.46446609,13.5355339 C4.46446609,12.4309644 5.35989659,11.5355339 6.46446609,11.5355339 L10.4644661,11.5355339 C11.5690356,11.5355339 12.4644661,12.4309644 12.4644661,13.5355339 L12.4644661,14.5355339 Z" fill="#000000" opacity="0.3" transform="translate(8.464466, 15.535534) rotate(-45.000000) translate(-8.464466, -15.535534) "/>
												<path d="M11.5355339,9.46446609 L14.5355339,9.46446609 C15.0878187,9.46446609 15.5355339,9.01675084 15.5355339,8.46446609 C15.5355339,7.91218134 15.0878187,7.46446609 14.5355339,7.46446609 L11.5355339,7.46446609 L11.5355339,6.46446609 C11.5355339,5.35989659 12.4309644,4.46446609 13.5355339,4.46446609 L17.5355339,4.46446609 C18.6401034,4.46446609 19.5355339,5.35989659 19.5355339,6.46446609 L19.5355339,10.4644661 C19.5355339,11.5690356 18.6401034,12.4644661 17.5355339,12.4644661 L13.5355339,12.4644661 C12.4309644,12.4644661 11.5355339,11.5690356 11.5355339,10.4644661 L11.5355339,9.46446609 Z" fill="#000000" transform="translate(15.535534, 8.464466) rotate(-45.000000) translate(-15.535534, -8.464466) "/>
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								 </span>
								<span class="nav-text font-weight-bold">Lampiran</span>
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
						<form class="form">
							<!--begin::Body-->
							<div class="card-body">
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Foto</label>
									<div class="col-lg-9 col-xl-6">
										<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(<?= asset('admin/media/users/blank.png') ?>)">
											<a class="image-popup-vertical-fit el-link" href="<?= asset('admin/media/users/300_21.jpg') ?>" target="_blank">
												<div class="image-input-wrapper" style="background-image: url(<?= asset('admin/media/users/300_21.jpg') ?>)">
												</div>
											</a>

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
										<!-- <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span> -->
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Nama</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg" type="text" value="M. I. Zulkifli M."/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Kategori Pengajar</label>
									<div class="col-lg-9 col-xl-6">
										<select class="form-control" id="select-kategori" name="KategoriPengajar" style="width:100%" required>
											<option value="Web Programming">Web Programming</option>
											<option value="Web Programming" selected>Mobile Programming</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Jabatan / Fungsi Pekerjaan</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg" type="text" value="Instruktur"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>
									<div class="col-lg-9 col-xl-6">
										<textarea  class="form-control form-control-lg" rows="2">Instruktur Pemrograman Game</textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Tanggal Mendaftar</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg form-control-solid" type="text" value="2020-09-24 13:30:00" disabled/>
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
											<input type="text" class="form-control form-control-lg" value="087812347788" placeholder="Phone"/>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Email</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
											<input type="text" class="form-control form-control-lg" value="akunpaten27@gmail.com" placeholder="Email"/>
										</div>
									</div>
								</div>
							</div>
							<!--end::Body-->
							<div class="card-footer">
								<div class="row">
									<!-- <div class="col-2">
									</div> -->
									<div class="col-12">
										<button type="submit" class="btn btn-success btn-update-pengajar">Simpan Perubahan</button>
									</div>
								</div>
							</div>
						</form>
						<!--end::Form-->
					</div>
					<!--end::Tab Content-->

					<!--begin::Tab Content-->
					<div class="tab-pane" id="tab-pendidikan" role="tabpanel">
						<!--begin::Body-->
						<div class="card-body">
							<div class="row mb-5">
								<div class="col-lg-12">
									<button type="button" class="btn btn-sm font-weight-bolder btn-light-primary btn-add-pendidikan">
										<i class="la la-plus"></i>Tambah Pendidikan
									</button>
								</div>
							</div>

							 <!--begin::Table-->
							<div class="table-responsive">
								<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Sekolah / Perguruan Tinggi</th>
											<th>Waktu Masuk</th>
											<th>Waktu Keluar</th>
											<th>Jurusan</th>
											<th>Keterangan</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Universitas Amikom Purwokerto</td>
											<td>2016</td>
											<td>2020</td>
											<td>Informatika</td>
											<td>Teknik Informatika Programming</td>
											<td class="text-center">
												<button type="button" class="btn btn-sm font-weight-bolder btn-light-success btn-edit-pendidikan" title="Edit">
													<i class="la la-edit"></i>
												</button>
												<button type="button" class="btn btn-sm font-weight-bolder btn-light-danger btn-delete-pendidikan" title="Hapus">
													<i class="la la-trash-o"></i>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!--end::Table-->
							
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tab Content-->

					<!--begin::Tab Content-->
					<div class="tab-pane" id="tab-pekerjaan" role="tabpanel">
						<!--begin::Body-->
						<div class="card-body">
							<div class="row mb-5">
								<div class="col-lg-12">
									<button type="button" class="btn btn-sm font-weight-bolder btn-light-primary btn-add-pekerjaan">
										<i class="la la-plus"></i>Tambah Pekerjaan
									</button>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Perusahaan</th>
											<th>Waktu Masuk</th>
											<th>Waktu Keluar</th>
											<th>Posisi</th>
											<th>Keterangan</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Ultranesia.com</td>
											<td>2019</td>
											<td>2020</td>
											<td>Web Developer</td>
											<td>Web Programming Technical</td>
											<td class="text-center">
												<button type="button" class="btn btn-sm font-weight-bolder btn-light-success btn-edit-pekerjaan" title="Edit">
													<i class="la la-edit"></i>
												</button>
												<button type="button" class="btn btn-sm font-weight-bolder btn-light-danger btn-delete-pekerjaan" title="Hapus">
													<i class="la la-trash-o"></i>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tab Content-->

					<!--begin::Tab Content-->
					<div class="tab-pane" id="tab-attachment" role="tabpanel">
						<!--begin::Body-->
						<div class="card-body">
							<!-- INFO Attachment -->
							<div class="row mb-5">
								<div class="col-lg-12">
									<div class="dropzone dropzone-default dropzone-primary" id="dropzone_lampiran">
										<div class="dropzone-msg dz-message needsclick">
											<h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
											<span class="dropzone-msg-desc">Upload up to 10 files</span>
										</div>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_3">
									<thead>
										<tr>
											<th style="width:90%">File Lampiran</th>
											<th style="width:10%" class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<a href="https://google.com" target="_blank">CV_zulkifli.pdf</a>
											</td>
											
											<td class="text-center">
												<button type="button" class="btn btn-sm font-weight-bolder btn-light-danger btn-delete-lampiran" title="Hapus">
													<i class="la la-trash-o"></i>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							
						</div>
						<!--end::Body-->
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



<!-- Modal-->
<div class="modal fade" id="pekerjaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<form id="form-pekerjaan" method="POST">
            <div class="modal-body">
				<div class="col-md-12">
					<input type="hidden" name="idPekerjaan" id="id-pekerjaan" value="">
					<div class="form-group row">
						<label>Nama Perusahaan</label>
						<input type="text" name="NamaPerusahaan" class="form-control" placeholder="Nama perusahaan" />
					</div>
					<div class="form-group row">
						<label>Waktu Masuk</label>
						<input type="number" name="waktuMasuk" class="form-control" placeholder="Tahun masuk kerja" />
					</div>
					<div class="form-group row">
						<label>Waktu Keluar</label>
						<input type="number" name="waktuKeluar" class="form-control" placeholder="Tahun keluar kerja" />
					</div>
					<div class="form-group row">
						<label>Nama Perusahaan</label>
						<input type="text" name="Posisi" class="form-control" placeholder="Posisi Pekerjaan" />
					</div>
					<div class="form-group row">
						<label>Keterangan</label>
						<textarea name="KeteranganPekerjaan" class="form-control" placeholder="Keterangan Pekerjaan" rows="3"></textarea>
					</div>
				</div>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default font-weight-bold" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
			</div>
			</form>
        </div>
    </div>
</div>

<!-- MODAL PENDIDIKAN -->
<div class="modal fade" id="pendidikanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<form id="form-pendidikan" method="POST">
            <div class="modal-body">
				<div class="col-md-12">
					<input type="hidden" name="idPekerjaan" id="id-pekerjaan" value="">
					<div class="form-group row">
						<label>Nama Pendidikan</label>
						<input type="text" name="NamaPendidikan" class="form-control" placeholder="Nama Pendidikan" />
					</div>
					<div class="form-group row">
						<label>Waktu Masuk</label>
						<input type="number" name="waktuMasuk" class="form-control" placeholder="Tahun masuk" />
					</div>
					<div class="form-group row">
						<label>Waktu Keluar</label>
						<input type="number" name="waktuKeluar" class="form-control" placeholder="Tahun keluar" />
					</div>
					<div class="form-group row">
						<label>Jurusan</label>
						<input type="text" name="Jurusan" class="form-control" placeholder="Jurusan" />
					</div>
					<div class="form-group row">
						<label>Keterangan</label>
						<textarea name="KeteranganPendidikan" class="form-control" placeholder="Keterangan Pendidikan" rows="3"></textarea>
					</div>
				</div>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default font-weight-bold" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
			</div>
			</form>
        </div>
    </div>
</div>



<script src="<?= asset("admin/customjs/master/pengajar/kelola-detail-pengajar.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


