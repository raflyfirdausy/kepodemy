<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kategori</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Master</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Kategori</a>
				</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Info-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<a href="<?= base_url('kelola_pembelajar/tambah_data') ?>" type="button" class="btn btn-success font-weight-bolder font-size-sm">
			<span class="svg-icon svg-icon-md svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24"/>
						<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
						<path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
					</g>
				</svg><!--end::Svg Icon-->
			</span>
				Tambah Data
			</a>
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
						<h3 class="card-label">Kelola Kategori</h3>
					</div>
				</div>
			
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="table-pembelajar" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%">No</th>
							<th style="width: 20%">Nama</th>
							<th style="width: 20%">email</th>
							<th style="width: 13%">No. Hp</th>
							<th style="width: 15%">Tanggal Daftar</th>
							<th class="text-center" style="width: 12%">Status</th>
							<th class="text-center" style="width: 15%">Action</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td>Rifki Kurniawan</td>
							<td>rifkikurniawan@gmail.com</td>
							<td>087812348877</td>
							<td>24-09-2020</td>
							<td class="text-center">
								<span class="label label-inline label-light-danger font-weight-bold status-pembelajar">
									Belum Verifikasi
								</span>
							</td>
							<td class="text-center">
								<button type="button" class="btn btn-sm btn-clean btn-icon btn-verifikasi" data-id="2" title="Verifikasi akun">
									<i class="la la-check-circle-o text-success"></i>
								</button>
								<a href="<?= base_url('bookingpembelian/detailbooking/2') ?>" type="button" class="btn btn-sm btn-clean btn-icon" title="Cek Transaksi">
									<i class="la la-money-check-alt text-primary"></i>
								</a>
								<a href="<?= base_url('kelola_pembelajar/detail_pembelajar/2') ?>" type="button" class="btn btn-sm btn-clean btn-icon" title="Detail Pembelajar">
									<i class="la la-edit text-warning"></i>
								</a>
								<button type="button" class="btn btn-sm btn-clean btn-icon btn-delete" data-id="2" title="Hapus data">
									<i class="la la-trash text-danger"></i>
								</button>
							</td>
						</tr>
						<tr>
							<td class="text-center">2</td>
							<td>Rafly Firadusy Irawan</td>
							<td>rafly@gmail.com</td>
							<td>081223121122</td>
							<td>24-09-2020</td>
							<td class="text-center">
								<span class="label label-inline label-light-success font-weight-bold status-pembelajar">
									Sudah Verifikasi
								</span>
							</td>
							<td class="text-center">
								<a href="<?= base_url('bookingpembelian/detailbooking/2') ?>" type="button" class="btn btn-sm btn-clean btn-icon" title="Cek Transaksi">
									<i class="la la-money-check-alt text-primary"></i>
								</a>
								<a href="<?= base_url('kelola_pembelajar/detail_pembelajar/2') ?>" type="button" class="btn btn-sm btn-clean btn-icon" title="Detail Pembelajar">
									<i class="la la-edit text-warning"></i>
								</a>
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




<script src="<?= asset("admin/customjs/master/pembelajar/kelola-pembelajar.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


