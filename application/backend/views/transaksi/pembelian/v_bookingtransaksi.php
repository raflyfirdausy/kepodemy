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
				<!-- <li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Ditolak</a>
				</li> -->
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
						<?php
						if($statusbayar == 2){
							$label = '<span class="label label-xl label-warning label-pill label-inline">Menunggu</span>';
						}elseif($statusbayar == 1){
							$label = '<span class="label label-xl label-success label-pill label-inline">Diterima</span>';
						}elseif($statusbayar == 3){
							$label = '<span class="label label-xl label-danger label-pill label-inline">Ditolak</span>';
						}else{
							$label = $nama_pembelajar;
						}
						?>
							<h3 class="card-label">Transaksi Pembelian - <?= $label?></h3>
							<input type="hidden" id="status-bayar" value="<?= $statusbayar ?>">
							<input type="hidden" id="id-pembelajar" value="<?= $id_pembelajar ?>">
						</div>
                    </div>
                    <!-- <div class="col-md-4 m-0 p-0">
                        <div class="row">
                            <div class="col-md-8 mt-5">
                                <input type="text" class="form-control filter-date" name="filter_date" style="width:100%">
                            </div>
                            <div class="col-md-4 mt-5">
                                <button class="btn btn-primary" type="button" id="btn-filterDate" style="width:100%">Filter <i class="fas fa-filter"></i></button>
                            </div>
                        </div>
                    </div> -->
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="table-booking" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%">No</th>
							<th style="width: 18%">Nama Pembelajar</th>
							<th style="width: 20%">Kelas</th>
							<th style="width: 17%">Total Bayar</th>
							<!-- <th style="width: 18%">Bukti Pembayaran</th> -->
							<th style="width: 14%">Tanggal Booking</th>
							<th style="width: 16%" class="text-center">Status</th>
							<th class="text-center" style="width: 10%">Action</th>
						</tr>
					</thead>

					<tbody id="body-booking"> 
						
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



<script src="<?= asset("admin/customjs/transaksi/booking-transaksi.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


