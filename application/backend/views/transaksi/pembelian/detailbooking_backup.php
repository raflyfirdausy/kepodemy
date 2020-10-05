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
					<a href="javascript:;" class="text-muted">Detail</a>
				</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Info-->

		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<a href="javascript:history.back()" class="btn btn-default font-weight-bold">
				Kembali
			</a>

			<button type="button" class="btn btn-danger mr-2 btn-reject-transaksi" style="display:none;">Tolak</button>
			<button type="button" class="btn btn-success btn-approve-transaksi" style="display:none;">Terima</button>
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
					Detail Transaksi

					<input type="hidden" class="form-control" id="status-transaksi" value="<?= $status ?>" disabled/>
				</h3>
				<!-- <div class="card-toolbar">
					<div class="example-tools justify-content-center">
							<button type="button" class="btn btn-danger mr-2 btn-reject-transaksi" style="display:none;">Tolak<i class="fa fa-times-circle pl-2"></i></button>
							<button type="button" class="btn btn-success btn-approve-transaksi" style="display:none;">Terima<i class="fa fa-arrow-circle-right pl-2"></i></button>
					</div>
				</div> -->
			</div>
			<!--begin::Form-->
			<form class="form">
				<div class="card-body">
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Nama Pembelajar:</label>
							<input type="text" class="form-control" value="Rafly Firdausy Irawan" disabled/>
						</div>
						<div class="col-lg-6">
							<label>Total Bayar:</label>
							<input type="text" class="form-control" value="Rp. 300.000" disabled/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Kelas yang dipilih:</label>
							<input type="text" class="form-control" value="Web,Mobile" disabled/>
						</div>
						<div class="col-lg-6">
							<label>Bukti Bayar:</label>
							<a href="https://google.com" class="form-control text-primary" target="_blank"><u>invoice24092020.pdf</u></a>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Tanggal Booking:</label>
							<input type="text" class="form-control" value="24-09-2020" disabled/>
						</div>
						<div class="col-lg-6">
							<label>Catatan:</label>
							<textarea name="Notes" class="form-control" id="catatan" rows="3" disabled></textarea>
						</div>
					</div>

					
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->




<!-- Modal-->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<form id="form-send-reject" method="POST">
            <div class="modal-body">
				<div class="col-md-12">
					<input type="hidden" name="ID" id="id-transaksi" value="">
					<div class="form-group">
						<label for="exampleInputPassword1">Berikan alasan kenapa anda menolak transaki ini</label>
						<textarea name="Notes" class="form-control" id="messageReject" rows="5" placeholder="catatan" required></textarea>
					</div>
				</div>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default font-weight-bold" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-danger font-weight-bold">Kirim</button>
			</div>
			</form>
        </div>
    </div>
</div>

<script> var base_url = "<?= base_url() ?>"; </script>
<script src="<?= asset("admin/customjs/transaksi/detail-transaksi.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


