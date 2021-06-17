@extends('layouts.admin-layout')
@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Thêm Phòng Chiếu</h3>
						</div>
						<div class="card-body">
							<form action="" method="POST" class="form-horizontal">
								@csrf

								<div class="form-group row">
									<label class="col-md-3 form-control-label">Tên phòng</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess" name="room_name" type="text" placeholder="Tên Phòng" class="form-control form-control-success">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Chọn rạp</label>
									<div class="col-md-9">
										<select class="form-control w-25 mb-5" id="phong" name="cinema_id">
											<option>Vui lòng chọn rạp</option>
											@foreach ($cinemas as $cinema)
											<option value="{{$cinema->id}}">{{$cinema->cinema_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-9 m-auto">
										<input type="submit" value="THÊM" class="btn btn-primary">
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