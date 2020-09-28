<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Booking / Pembelian</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Transaksi</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Booking</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Diterima</a>
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
				<!-- <div class="card-title">
					<span class="card-icon"><i class="flaticon2-list text-primary"></i></span>
					<h3 class="card-label">Transaksi Pembelian - Menunggu</h3>
				</div>
				<div class="card-toolbar">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<input type="text" class="form-control filter-date" readonly placeholder="Select time" type="text"/>
					</div>
					
				</div> -->
                    <div class="col-md-8 m-0 p-0">
						<div class="mt-8">
							<h3 class="card-label">Transaksi Pembelian - <span class="label label-xl label-success label-pill label-inline">Diterima</span></h3>
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
				<table class="table table-bordered table-hover table-checkable" id="table-booking-terima" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%">No</th>
							<th style="width: 18%">Nama Pembelajar</th>
							<th style="width: 20%">Kelas</th>
							<th style="width: 15%">Total Bayar</th>
							<th style="width: 18%">Bukti Pembayaran</th>
							<th style="width: 14%">Tanggal Booking</th>
							<th class="text-center" style="width: 10%">Action</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td>Rafly Firdausy Irawan</td>
							<td>Web,Mobile</td>
							<td>Rp. 300.000</td>
							<td><a href="https://google.com" target="_blank">invoive24092020.pdf</a></td>
							<td>24-09-2020</td>
							<td class="text-center">
								<a href="<?= base_url('bookingpembelian/detailbooking/2') ?>" type="button" class="btn btn-sm btn-clean btn-icon" title="Details">
									<i class="la la-edit text-success"></i>
								</a>
								<!-- <button type="button" class="btn btn-sm btn-clean btn-icon btn-delete" title="Hapus data">
									<i class="la la-trash text-danger"></i>
								</button> -->
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



<script src="<?= asset("admin/customjs/transaksi/booking-terima.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


