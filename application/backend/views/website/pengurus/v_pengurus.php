<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Pengurus KEPODEMY</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Website</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Pengurus</a>
				</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Info-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<button type="button" class="btn btn-success font-weight-bolder font-size-sm btn-add-pengurus">
			<span class="svg-icon svg-icon-md svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
					</g>
				</svg><!--end::Svg Icon-->
			</span>
				Tambah Data
			</button>
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
		<div class="card card-custom">
			<div class="card-header">
				<div class="col-md-8 m-0 p-0">
					<div class="mt-8">
						<h3 class="card-label">Kelola Pengurus</h3>
					</div>
				</div>
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="table-pengurus" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%">No</th>
							<th style="width: 25%">Nama</th>
							<th style="width: 20%">Jabatan</th>
							<th style="width: 25%">Keterangan</th>
							<th style="width: 13%">Terakhir diubah</th>
							<th class="text-center" style="width: 12%">Action</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td>Muhammad Ali Hasani</td>
							<td>Directur</td>
							<td>Directur Utama</td>
							<td>26-09-2020</td>
							<td class="text-center">
								<button type="button" class="btn btn-sm btn-clean btn-icon btn-detail-pengurus" data-id="2" title="Detail Pengurus">
									<i class="la la-list-ul text-success"></i>
								</button>
								<button type="button" class="btn btn-sm btn-clean btn-icon btn-edit-pengurus" data-id="2" title="Edit">
									<i class="la la-edit text-warning"></i>
								</button>
								<button type="button" class="btn btn-sm btn-clean btn-icon btn-delete" data-id="2" title="Hapus data">
									<i class="la la-trash text-danger"></i>
								</button>
							</td>
						</tr>
					</tbody>

				</table>
				<!--end: Datatable-->
			</div>
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->


<!-- Modal-->
<div class="modal fade" id="pengurusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelPengurusModal">Tambah Pengurus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<form id="form-pengurus" method="POST">
            <div class="modal-body">
				<div class="col-md-12">
					<input type="hidden" name="idPengurus" id="id-pengurus" value="">
					<div class="form-group row">
						<div class="col-lg-12 text-center">
							<!-- <label>Foto Pembelajar</label> -->
							<div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(<?= asset('admin/media/users/blank.png') ?>)">
								
								<div class="image-input-wrapper"></div>

								<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Ubah foto">
									<i class="fa fa-pen icon-sm text-muted"></i>
									<input type="file" name="foto_pembelajar" accept=".png, .jpg, .jpeg"/>
									<input type="hidden" name="foto_pembelajar_remove"/>
								</label>

								<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow btn-cancel" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>

								<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow btn-remove" data-action="remove" data-toggle="tooltip" title="Remove avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
							</div>
							<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
						</div>
					</div>
					<div class="form-group row">
						<label>Nama</label>
						<input type="text" name="namaPengurus" id="nama-pengurus" class="form-control" placeholder="Nama pengurus" required/>
					</div>
					<div class="form-group row">
						<label>Jabatan</label>
						<input type="text" name="jabatan" id="jabatan-pengurus" class="form-control" placeholder="Jabatan pengurus" required/>
					</div>
					<div class="form-group row">
						<label>Keterangan</label>
						<textarea name="keterangan" id="keterangan-pengurus" class="form-control" placeholder="Keterangan"></textarea>
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


<!-- DETAIL Modal-->
<div class="modal fade" id="detailpengurusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelPengurusModal">Detail Pengurus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<!-- <form id="form-pengurus" method="POST"> -->
            <div class="modal-body">
				<div class="col-md-12">
					<input type="hidden" name="idPengurus" id="id-detail-pengurus" value="">
					<div class="form-group row">
						<div class="col-lg-12 text-center">
							<!-- <label>Foto Pembelajar</label> -->
							<div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar">
								<a class="btn default btn-outline image-popup-vertical-fit el-link" target="_blank">
									<div class="image-input-wrapper"></div>
								</a>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label>Nama</label>
						<input type="text" name="namaPengurus" id="nama-pengurus-detail" class="form-control" placeholder="Nama pengurus" disabled/>
					</div>
					<div class="form-group row">
						<label>Jabatan</label>
						<input type="text" name="jabatan" id="jabatan-pengurus-detail" class="form-control" placeholder="Jabatan pengurus" disabled/>
					</div>
					<div class="form-group row">
						<label>Keterangan</label>
						<textarea name="keterangan" id="keterangan-pengurus-detail" class="form-control" placeholder="Keterangan" disabled></textarea>
					</div>
				</div>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default font-weight-bold" data-dismiss="modal">Tutup</button>
			</div>
			<!-- </form> -->
        </div>
    </div>
</div>

<script>var asset_url = "<?= asset() ?>";</script>
<script src="<?= asset("admin/customjs/website/pengurus/kelola-pengurus.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


