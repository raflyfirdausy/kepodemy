<form id="form-add-merchandise" method="POST">
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Merchandise</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Master</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Produk</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Merchandise</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Tambah Data</a>
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
			<!-- <button type="reset" class="btn btn-danger mr-2">Reset</button> -->
			<button type="submit" class="btn btn-success btn-simpan-merchandise">Simpan</button>
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
					Tambah Merchandise
				</h3>
			</div>
			
			<div class="card-body">
				<div class="col-md-12">
					<div class="form-group row">
						<div class="col-lg-6">
							<!-- <div class="card-body"> -->
                                <div class="mb-15">
                                    <img style="width: 100%" id="imgPreview" src="<?= asset("gambar/ukuran-banner.jpg") ?>" alt="">
                                </div>
                                <div class="input-group">
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-upload text-white"></i></button>
									</div>
                                    <div class="custom-file">
                                        <input accept="image/*" type="file" class="custom-file-input" id="file_gambar_header" name="file_gambar_header">
                                        <label class="custom-file-label" for="inputGroupFile">Pilih File Gambar</label>
                                    </div>
                                    <div class="col-12 pr-0 pl-0">
										<span class="form-text text-muted">Max Size : 5 Mb (.jpg, .jpeg, .png, .gif)</span>
                                    </div>
                                </div>
                            <!-- </div> -->
						</div>
						<div class="col-lg-6">
							<div class="col-md-12">
								<div class="form-group row">
									<label>Nama Merchandise <span class="text-danger">*</span></label>
									<input type="text" name="nama" id="nama-merchandise" class="form-control" placeholder="Nama merchandise" required/>
								</div>
								<div class="form-group row">
									<label>Harga <span class="text-danger">*</span></label>
									<input type="text" name="harga" id="harga-merchandise" class="form-control valid-number currency" placeholder="0" required/>
								</div>
								<div class="form-group row">
									<label>Potongan <span class="text-muted">(optional)</span></label>
									<input type="text" name="harga_diskon" id="harga-diskon" class="form-control valid-number currency" placeholder="0"/>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Keterangan</label>
							<textarea class="summernote" id="kt_summernote_1" name="keterangan"></textarea>
						</div>
						
					</div>
					
				</div>
			</div>
			
		</div>
		<!--end::Card-->

	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</form>

<script src="<?= asset("admin/customjs/master/merchandise/proses-merchandise.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>
<script src="<?= asset("admin/customjs/autoNumeric.js") ?>"></script>
<script>
	
	$("#file_gambar_header").change(function() {
        readURL(this, false);
    });

    function readURL(input, modeInsert) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



