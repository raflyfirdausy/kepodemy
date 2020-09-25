<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kelola Admin</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Master</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Kelola Admin</a>
				</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Info-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<button type="button" class="btn btn-success font-weight-bolder font-size-sm btn-tambah-data">
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
							<h3 class="card-label">Data Administrator</h3>
						</div>
                    </div>
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="table-admin" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%">No</th>
							<th style="width: 18%">Nama</th>
							<th style="width: 20%">Email</th>
							<th style="width: 15%">Level</th>
							<th style="width: 18%">Jenis Kelamin</th>
							<th style="width: 14%">Created On</th>
							<th class="text-center" style="width: 10%">Action</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td>Rafly Firdausy Irawan</td>
							<td>rafly@gmail.com</td>
							<td>Admin</td>
							<td>laki-laki</td>
							<td>24-09-2020</td>
							<td class="text-center">
								<button type="button" class="btn btn-sm btn-clean btn-icon btn-edit-data" title="Details" data-id="1">
									<i class="la la-edit text-success"></i>
								</button>
								<button type="button" class="btn btn-sm btn-clean btn-icon btn-delete" title="Delete">
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


<!-- MODAL TAMBAH DATA -->
<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true" ata-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<form id="form-add-admin" method="POST">
            <div class="modal-body">
				<div class="col-md-12">
					<input type="hidden" class="form-control" name="id_admin" id="id-admin"/>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Email address <span class="text-danger">*</span></label>
							<input type="email" class="form-control" name="email" id="email-admin" placeholder="Masukkan email" required/>
						</div>
						<div class="col-lg-6">
							<label for="exampleInputPassword1">Password <span class="text-danger">*</span></label>
							<div class="input-group">
								<input type="password" class="form-control password" id="password-admin" name="password" placeholder="Password" required/>
								<div class="input-group-append">
									<button class="btn btn-secondary btn-lihat-password" type="button"><i class="fa fa-eye"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Nama <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="nama" id="nama-admin" placeholder="Masukkan nama" required/>
						</div>
						<div class="col-lg-6">
							<label>Jenis Kelamin <span class="text-danger">*</span></label>
							<select class="form-control" id="select-kelamin" name="JenisKelamin" style="width:100%" required>
								<option value=""></option>
								<?php foreach (Gender() as $gender) : ?>
									<option value="<?= $gender ?>"><?= $gender; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Level <span class="text-danger">*</span></label>
							<select class="form-control" id="select-level" name="level" style="width:100%" required>
								<option value=""></option>
								<?php foreach (Level() as $level) : ?>
									<option value="<?= $level ?>"><?= $level; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-lg-6">
							<label>No. Hp <span class="text-danger">*</span></label>
							<input type="text" class="form-control valid-number" id="nohp-admin" name="nohp" placeholder="Masukkan Nomor Handphone" required/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Alamat <span class="text-danger">*</span></label>
							<textarea name="Alamat" class="form-control" id="alamat-admin" rows="5" placeholder="Alamat rumah" required></textarea>
						</div>
						<div class="col-lg-6">
							<label>Keterangan</label>
							<textarea name="Keterangan" class="form-control" id="keterangan-admin" rows="5" placeholder="Keterangan"></textarea>
						</div>
					</div>
				</div>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default font-weight-bold" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary font-weight-bold btn-simpan-data">Simpan</button>
			</div>
			</form>
        </div>
    </div>
</div>



<script src="<?= asset("admin/customjs/master/admin/kelola-admin.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>



