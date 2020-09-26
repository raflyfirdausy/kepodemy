<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Pendaftaran Pengajar</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Transaksi</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Pendaftaran Pengajar</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Menunggu</a>
				</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Info-->
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
						<h3 class="card-label">Pendaftaran Pengajar - <span class="label label-xl label-warning label-pill label-inline">Menunggu</span></h3>
					</div>
				</div>
				<div class="col-md-4 m-0 p-0">
					<div class="row">
						<div class="col-md-8 mt-5">
							<input type="text" class="form-control filter-date" name="filter_date" style="width:100%">
						</div>
						<div class="col-md-4 mt-5">
							<button class="btn btn-primary" type="button" id="btn-filterDate" style="width:100%">Filter <i class="fas fa-filter"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="table-pengajar-pending" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%">No</th>
							<th style="width: 15%">Nama</th>
							<th style="width: 15%">email</th>
							<th style="width: 15%">Kategori</th>
							<th style="width: 15%">Jabatan</th>
							<th style="width: 10%">No. Hp</th>
							<th style="width: 15%">Tanggal Daftar</th>
							<th class="text-center" style="width: 10%">Action</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td>M. I. Zulkifli M.</td>
							<td>akunpaten27@gmail.com</td>
							<td>Pemograman</td>
							<td>Teacher</td>
							<td>087812348877</td>
							<td>24-09-2020</td>
							<td class="text-center">
								<a href="<?= base_url('pengajar/detailpendaftar/0') ?>" type="button" class="btn btn-sm btn-clean btn-icon" title="Details">
									<i class="la la-edit text-success"></i>
								</a>
								<button type="button" class="btn btn-sm btn-clean btn-icon btn-delete" title="Hapus data">
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



<script src="<?= asset("admin/customjs/pengajar/pengajar-pending.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


