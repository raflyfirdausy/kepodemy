<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Slider</h5>
			<!--end::Page Title-->

			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Website</a>
				</li>
				<li class="breadcrumb-item">
					<a href="javascript:;" class="text-muted">Slider</a>
				</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Info-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<button type="button" class="btn btn-success font-weight-bolder font-size-sm btn-add-slider">
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
						<h3 class="card-label">Kelola Slider</h3>
					</div>
				</div>
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="table-slider" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%">No</th>
							<th style="width: 30%">Judul</th>
							<th style="width: 40%">Keterangan</th>
							<th style="width: 10%">Status</th>
							<th class="text-center" style="width: 15%">Action</th>
						</tr>
					</thead>

					<tbody id="body-slider">
						
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
<div class="modal fade" id="sliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelSliderModal">Tambah Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<form id="form-slider" method="POST">
            <div class="modal-body">
				<div class="col-md-12">
					<input type="hidden" name="id" id="id-slider" value="">
					<div class="form-group row">
						<div class="mb-10">
							<img style="width: 100%" id="imgPreview" src="<?= asset("gambar/ukuran-banner.jpg") ?>" alt="">
						</div>
						<div class="input-group">
							<div class="input-group-append">
								<button type="button" class="btn btn-primary"><i class="fa fa-upload text-white"></i></button>
							</div>
							<div class="custom-file">
								<input required="" accept="image/*" type="file" class="custom-file-input" id="foto_slider" name="foto_slider">
								<label class="custom-file-label" for="inputGroupFile">Pilih File Gambar</label>
							</div>
							<div class="col-12 pr-0 pl-0">
								<span class="form-text text-muted">Max Size : 5 Mb (.jpg, .jpeg, .png,)</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label>Judul <span class="text-danger">*</span></label>
						<input type="text" name="judul" id="judul-slider" class="form-control" placeholder="Judul slider" required/>
					</div>
					<div class="form-group row">
						<label>Keterangan <span class="text-danger">*</span></label>
						<textarea name="keterangan" id="keterangan-slider" class="form-control" placeholder="Keterangan slider" rows="4"></textarea>
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


<script>var asset = "<?= asset() ?>";</script>
<script src="<?= asset("admin/customjs/website/slider/kelola-slider.js") ?>"></script>
<script src="<?= asset("admin/customjs/custom.js") ?>"></script>


<script>
	
	$("#foto_slider").change(function() {
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
