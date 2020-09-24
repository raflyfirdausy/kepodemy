<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
	<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">

			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kelola Admin</h5>
			<!--end::Page Title-->
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
				<div class="card-title">
					<span class="card-icon"><i class="flaticon2-favourite text-primary"></i></span>
					<h3 class="card-label">Data Administrator</h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Button-->
					<button type="button" class="btn btn-primary font-weight-bolder" id="btn-add-admin"><i class="la la-plus"></i>Tambah Data</button>
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="table-admin" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Level</th>
							<th>No. Hp</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td>Rafly Firdausy Irawan</td>
							<td>Raflypaten28@gmail.com</td>
							<td>Administrator</td>
							<td>087712137721</td>
							<td class="text-center">
								<button type="button" class="btn btn-sm btn-clean btn-icon" title="Edit details">
									<i class="la la-edit text-success"></i>
								</button>
								<button type="button" class="btn btn-sm btn-clean btn-icon" title="Delete">
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


<!-- Modal-->
<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
			<form id="form-add-admin" method="POST">
            <div class="modal-body">

					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
			</div>
			</form>
        </div>
    </div>
</div>


<script src="<?= asset("admin/customjs/kelola_admin.js") ?>"></script>


