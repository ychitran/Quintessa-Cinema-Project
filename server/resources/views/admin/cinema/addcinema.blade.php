@extends('layouts.admin-layout')

@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Thêm Rạp Mới</h3>
						</div>
						<div class="card-body">

							<form method="POST" class="form-horizontal" action="">
								@csrf
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Tên rạp</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess" name="cinema_name" type="text" placeholder="Tiêu đề" class="form-control form-control-success">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Thông tin rạp</label>
									<div class="col-md-9">
										<textarea class="form-control " name="infomation" rows="5" id="ttrap"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-9 m-auto">
										<!-- <input type="submit" value="ADD" class="btn btn-primary"> -->
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection