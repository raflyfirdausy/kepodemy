<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Booking / Pembelian</h5>
			<!--end::Page Title-->

			<input type="hidden" class="form-control" id="status-transaksi" value="<?= $datatransaksi->status_bayar ?>" disabled/>
			<input type="hidden" id="id-transaksi-header" value="<?= $datatransaksi->id ?>" disabled>

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
			<a href="javascript:history.back()" class="btn btn-default font-weight-bold mr-2">
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
		<!--begin::Invoice-->
		<div class="card card-custom position-relative overflow-hidden">
			<!--begin::Shape-->
			<div class="position-absolute opacity-30">
				<span class="svg-icon svg-icon-10x svg-logo-white">
					<!--begin::Svg Icon | path:assets/media/svg/shapes/abstract-8.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" width="176" height="165" viewBox="0 0 176 165" fill="none">
						<g clip-path="url(#clip0)">
							<path
								d="M-10.001 135.168C-10.001 151.643 3.87924 165.001 20.9985 165.001C38.1196 165.001 51.998 151.643 51.998 135.168C51.998 118.691 38.1196 105.335 20.9985 105.335C3.87924 105.335 -10.001 118.691 -10.001 135.168Z"
								fill="#AD84FF" />
							<path
								d="M28.749 64.3117C28.749 78.7296 40.8927 90.4163 55.8745 90.4163C70.8563 90.4163 83 78.7296 83 64.3117C83 49.8954 70.8563 38.207 55.8745 38.207C40.8927 38.207 28.749 49.8954 28.749 64.3117Z"
								fill="#AD84FF" />
							<path
								d="M82.9996 120.249C82.9996 144.964 103.819 165 129.501 165C155.181 165 176 144.964 176 120.249C176 95.5342 155.181 75.5 129.501 75.5C103.819 75.5 82.9996 95.5342 82.9996 120.249Z"
								fill="#AD84FF" />
							<path
								d="M98.4976 23.2928C98.4976 43.8887 115.848 60.5856 137.249 60.5856C158.65 60.5856 176 43.8887 176 23.2928C176 2.69692 158.65 -14 137.249 -14C115.848 -14 98.4976 2.69692 98.4976 23.2928Z"
								fill="#AD84FF" />
							<path
								d="M-10.0011 8.37466C-10.0011 20.7322 0.409554 30.7493 13.2503 30.7493C26.0911 30.7493 36.5 20.7322 36.5 8.37466C36.5 -3.98287 26.0911 -14 13.2503 -14C0.409554 -14 -10.0011 -3.98287 -10.0011 8.37466Z"
								fill="#AD84FF" />
							<path
								d="M-2.24881 82.9565C-2.24881 87.0757 1.22081 90.4147 5.50108 90.4147C9.78135 90.4147 13.251 87.0757 13.251 82.9565C13.251 78.839 9.78135 75.5 5.50108 75.5C1.22081 75.5 -2.24881 78.839 -2.24881 82.9565Z"
								fill="#AD84FF" />
							<path
								d="M55.8744 12.1044C55.8744 18.2841 61.0788 23.2926 67.5001 23.2926C73.9196 23.2926 79.124 18.2841 79.124 12.1044C79.124 5.92653 73.9196 0.917969 67.5001 0.917969C61.0788 0.917969 55.8744 5.92653 55.8744 12.1044Z"
								fill="#AD84FF" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>
			</div>
			<!--end::Shape-->

			<!--begin::Invoice header-->
			<div class="row justify-content-center py-8 px-8 py-md-36 px-md-0 bg-primary">
				<div class="col-md-9">
					<div
						class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
						<div class="d-flex flex-column px-0 order-2 order-md-1">
							<span
								class="d-flex flex-column font-size-h5 font-weight-bold text-white">
								<span><?=  ucwords($datapembelajar->nama) ?></span>
								<span><?= $datapembelajar->no_hp ?></span>
							</span>
						</div>
						<h1 class="display-3 font-weight-boldest text-white order-1 order-md-2">
							INVOICE</h1>
					</div>
				</div>
			</div>
			<!--end::Invoice header-->
			<div class="row justify-content-center py-8 px-8 px-md-0">
				<div class="col-md-9">
					<!--begin::Invoice body-->
					<div class="row pb-26">
						<div class="col-md-2 border-right-md pr-md-5 py-md-5">
							<!--begin::Invoice To-->
							<div class="text-dark-50 font-size-lg font-weight-bold mb-3">INVOICE TO.
							</div>
							<div class="font-size-lg font-weight-bold mb-10"><?= ucwords($datapembelajar->nama)?><br /><?= $datapembelajar->no_hp ?> </div>
							<!--end::Invoice To-->

							<!--begin::Invoice No-->
							<div class="text-dark-50 font-size-lg font-weight-bold mb-3">INVOICE NO.
							</div>
							<div class="font-size-lg font-weight-bold mb-10"><?= $datatransaksi->kode_transaksi ?></div>
							<!--end::Invoice No-->

							<!--begin::Invoice Date-->
							<div class="text-dark-50 font-size-lg font-weight-bold mb-3">Tanggal Booking</div>
							<div class="font-size-lg font-weight-bold mb-10"><?= datetime_eng($datatransaksi->created_at) ?></div>
							<!--end::Invoice Date-->
							<!--begin::Invoice Date-->
							<div class="text-dark-50 font-size-lg font-weight-bold mb-3">Lampiran</div>
							<div class="font-weight-bold"><a href="<?= base_url('bookingpembelian/download_file/'. $datatransaksi->bukti_bayar) ?>" target='_blank'><?= $datatransaksi->bukti_bayar ?></a></div>
							<!--end::Invoice Date-->
						</div>
						<div class="col-md-10 py-5 pl-md-5">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th class="font-weight-bolder text-muted font-size-lg text-uppercase">
												No
											</th>
											<th class="font-weight-bolder text-muted font-size-lg text-uppercase">
												Kelas
											</th>
											<th class="font-weight-bolder text-muted font-size-lg text-uppercase">
												Pengajar
											</th>
											<th class="font-weight-bolder text-muted font-size-lg text-uppercase">
												Keterangan
											</th>
											<th class="text-right font-weight-bolder text-muted font-size-lg text-uppercase">
												Diskon
											</th>
											<th class="text-right font-weight-bolder text-muted font-size-lg text-uppercase">
												Harga
											</th>
										</tr>
									</thead>
									<tbody>
									<?php $x = 1; ?>
									<?php
										$totalharga = 0;
										$totalhargadiskon = 0;
									?>
									<?php foreach ($transaksi_detail as $detail): ?>
										
										<tr class="font-weight-bolder">
											<td class="pt-7"><?= $x++; ?></td>

											<?php
											$namakelas = "";
											$pengajar = "";
											
													if(!empty($detail->produk)){
														$namakelas = $detail->produk->nama;
														if(!empty($detail->produk->pengajar)){
															$pengajar = $detail->produk->pengajar->nama;
														}
													}
											?>
											<td class="border-top-0 pl-0 pl-md-5 pt-7 d-flex align-items-center"><?= $namakelas ?></td>
											<td class="pt-7"><?= $pengajar ?></td>
											<td class="pt-7"><?= $detail->keterangan ?></td>
											<td class="pr-0 pt-7 font-size-h6 font-weight-boldest text-right">
												<?= rupiah($detail->harga_diskon) ?>
											</td>
											<td class="pr-0 pt-7 font-size-h6 font-weight-boldest text-right">
												<?= rupiah($detail->harga) ?>
											</td>
										</tr>
										<?php $totalharga += $detail->harga ?>
										<?php $totalhargadiskon += $detail->harga_diskon ?>

									<?php endforeach; ?>
									<!-- class="font-weight-bolder" -->
										<tr>
											<td class="pt-15 text-right" colspan="5">Total Harga</td>
											<td class="pr-0 pt-15 font-size-h6 font-weight-boldest text-right"><?= rupiah($totalharga) ?></td>
										</tr>
										<tr>
											<td class="pt-7 text-right" colspan="5">Total Diskon</td>
											<td class="pr-0 pt-7 font-size-h6 font-weight-boldest text-right"><?= rupiah($totalhargadiskon) ?></td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!--end::Invoice body-->

					<!--begin::Invoice footer-->
					<div class="row">
						<div class="col-md-5 border-top pt-14 pb-10 pb-md-18">
							
						</div>
						<div class="col-md-7">
							<div
								class="bg-primary rounded d-flex align-items-center justify-content-between text-white max-w-350px position-relative ml-auto p-7">
								<!--begin::Shape-->
								<div class="position-absolute opacity-30 top-0 right-0"><span
										class="svg-icon svg-icon-2x svg-logo-white svg-icon-flip">
										<!--begin::Svg Icon | path:assets/media/svg/shapes/abstract-8.svg--><svg
											xmlns="http://www.w3.org/2000/svg" width="176"
											height="165" viewBox="0 0 176 165" fill="none">
											<g clip-path="url(#clip0)">
												<path
													d="M-10.001 135.168C-10.001 151.643 3.87924 165.001 20.9985 165.001C38.1196 165.001 51.998 151.643 51.998 135.168C51.998 118.691 38.1196 105.335 20.9985 105.335C3.87924 105.335 -10.001 118.691 -10.001 135.168Z"
													fill="#AD84FF" />
												<path
													d="M28.749 64.3117C28.749 78.7296 40.8927 90.4163 55.8745 90.4163C70.8563 90.4163 83 78.7296 83 64.3117C83 49.8954 70.8563 38.207 55.8745 38.207C40.8927 38.207 28.749 49.8954 28.749 64.3117Z"
													fill="#AD84FF" />
												<path
													d="M82.9996 120.249C82.9996 144.964 103.819 165 129.501 165C155.181 165 176 144.964 176 120.249C176 95.5342 155.181 75.5 129.501 75.5C103.819 75.5 82.9996 95.5342 82.9996 120.249Z"
													fill="#AD84FF" />
												<path
													d="M98.4976 23.2928C98.4976 43.8887 115.848 60.5856 137.249 60.5856C158.65 60.5856 176 43.8887 176 23.2928C176 2.69692 158.65 -14 137.249 -14C115.848 -14 98.4976 2.69692 98.4976 23.2928Z"
													fill="#AD84FF" />
												<path
													d="M-10.0011 8.37466C-10.0011 20.7322 0.409554 30.7493 13.2503 30.7493C26.0911 30.7493 36.5 20.7322 36.5 8.37466C36.5 -3.98287 26.0911 -14 13.2503 -14C0.409554 -14 -10.0011 -3.98287 -10.0011 8.37466Z"
													fill="#AD84FF" />
												<path
													d="M-2.24881 82.9565C-2.24881 87.0757 1.22081 90.4147 5.50108 90.4147C9.78135 90.4147 13.251 87.0757 13.251 82.9565C13.251 78.839 9.78135 75.5 5.50108 75.5C1.22081 75.5 -2.24881 78.839 -2.24881 82.9565Z"
													fill="#AD84FF" />
												<path
													d="M55.8744 12.1044C55.8744 18.2841 61.0788 23.2926 67.5001 23.2926C73.9196 23.2926 79.124 18.2841 79.124 12.1044C79.124 5.92653 73.9196 0.917969 67.5001 0.917969C61.0788 0.917969 55.8744 5.92653 55.8744 12.1044Z"
													fill="#AD84FF" />
											</g>
										</svg>
										<!--end::Svg Icon--></span></div>
								<!--end::Shape-->
								<div class="font-weight-boldest font-size-h6">Total Pembayaran</div>
								<div class="text-right d-flex flex-column">
								<?php $total = $totalharga - $totalhargadiskon?>
									<span class="font-weight-boldest font-size-h3 line-height-sm"><?= rupiah($total) ?></span>
									<!-- <span class="font-size-sm">Taxes included</span> -->
								</div>
							</div>
						</div>
					</div>
					<!--end::Invoice footer-->
				</div>
			</div>

			<!-- begin: Invoice action-->
			<!-- <div class="row justify-content-center border-top py-8 px-8 py-md-28 px-md-0">
				<div class="col-md-9">
					<div class="d-flex font-size-sm flex-wrap">
						<button type="button"
							class="btn btn-primary font-weight-bolder py-4 mr-3 mr-sm-14 my-1"
							onclick="window.print();">Print Invoice</button>
						<button type="button"
							class="btn btn-light-primary font-weight-bolder mr-3 my-1">Download</button>
						<button type="button"
							class="btn btn-warning font-weight-bolder ml-sm-auto my-1">Create
							Invoice</button>
					</div>
				</div>
			</div> -->
			<!-- end: Invoice action-->

		</div>
		<!--end::Invoice-->
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
					<input type="hidden" name="id" id="id-transaksi" value="<?= $datatransaksi->id ?>">
					<div class="form-group">
						<label for="exampleInputPassword1">Berikan alasan kenapa anda menolak transaki ini</label>
						<textarea name="keterangan" class="form-control" id="messageReject" rows="5" placeholder="catatan" required></textarea>
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

<script src="<?= asset("admin/customjs/transaksi/detail-transaksi.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


