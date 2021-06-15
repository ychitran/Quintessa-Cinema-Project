@extends('layouts.admin-layout')
@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Thêm Phim Mới</h3>
						</div>
						<div class="card-body">
							<form action="" method="POST" class="form-horizontal">
								@csrf
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Phim</label>
									<div class="col-md-9">
										<select name="film_id" class="form-control">
											@foreach ($films as $film)
											<option value="{{$film->id}}">{{$film->film_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Rạp</label>
									<div class="col-md-9">
										<select class="form-control" id="rap">
											<!-- <option checked></option> -->
											
											<option checked value="{{$cinema->id}}">{{$cinema->cinema_name}}</option>
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Phòng</label>
									<div class="col-md-9">
										<select name="room_id" class="form-control" id="phong">
											<option checked></option>
											@foreach ($rooms as $room)
											<option value="{{$room->id}}">{{$room->room_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Ngày</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="date" type="date" class="form-control form-control-warning">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Thời gian</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarningg" name="start_time" type="time" class="form-control ">
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