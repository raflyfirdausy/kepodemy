<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Subkategori</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Master</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Kategori</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Subkategori</a>
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
			<button type="button" class="btn btn-success font-weight-bolder font-size-sm btn-add-subkategori">
			<span class="svg-icon svg-icon-md svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24"/>
						<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
						<path d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z" fill="#000000"/>
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
						<h3 class="card-label">Subkategori - <span class="judul-subkategori"><?= ucwords($namakategori)?></span></h3>
						<input type="hidden" id="id-induk" value="<?= $id_induk ?>">
						<input type="hidden" id="nama-induk-kategori" value="<?= $namakategori ?>">
					</div>
				</div>
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="table-subkategori" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%">No</th>
							<th style="width: 35%">Nama Kategori</th>
							<th style="width: 25%">Jumlah Subkategori</th>
							<th style="width: 20%">Terakhir diubah</th>
							<th class="text-center" style="width: 15%">Action</th>
						</tr>
					</thead>

					<tbody id="body-subkategori">
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
<div class="modal fade" id="subkategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelSubkategoriModal">Tambah Subkategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<form id="form-subkategori" method="POST">
            <div class="modal-body">
				<div class="col-md-12">
					<input type="hidden" name="id" id="id-kategori" value="">
					<input type="hidden" name="id_induk" id="id-induk-kategori" value="">
					<div class="form-group row">
						<label>Induk Kategori</label>
						<input type="text" name="namainduk" id="kategori-induk" class="form-control" disabled/>
					</div>
					<div class="form-group row">
						<label>Nama Kategori</label>
						<input type="text" name="nama" id="nama-kategori" class="form-control" placeholder="Nama kategori" required/>
					</div>
					<div class="form-group row">
						<label>Keterangan</label>
						<textarea name="keterangan" id="keterangan-kategori" class="form-control" placeholder="Keterangan" rows="3"></textarea>
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


<script src="<?= asset("admin/customjs/master/kategori/kelola-subkategori.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


