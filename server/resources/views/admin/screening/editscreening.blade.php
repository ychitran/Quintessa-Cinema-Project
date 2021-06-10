@foreach ($screenings as $screening)

<form action="" method="POST" class="form-horizontal">
	@csrf
	<div class="form-group row">
		<label class="col-md-3 form-control-label">Phim</label>
		<div class="col-md-9">
			<input id="inputHorizontalWarning" name="name" type="text" class="form-control form-control-warning" value="{{$screening->film->name}}" disabled="disabled">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3 form-control-label">Rạp</label>
		<div class="col-md-9">
			<input id="inputHorizontalWarning" name="cinema_name" type="text" class="form-control form-control-warning" value="{{$screening->cinema->cinema_name}}" disabled="disabled">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3 form-control-label">Phòng</label>
		<div class="col-md-9">
			<input id="inputHorizontalWarning" name="room_name" type="text" class="form-control form-control-warning" value="{{$screening->room->room_name}}" disabled="disabled">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 form-control-label">Ngày</label>
		<div class="col-md-9">
			<input id="inputHorizontalWarning" name="date" type="date" class="form-control form-control-warning" value="{{$screening->date}}">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 form-control-label">Thời gian</label>
		<div class="col-md-9">
			<input id="inputHorizontalWarningg" name="start_time" type="time" class="form-control" value="{{$screening->start_time}}">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-9 m-auto">
			<!-- <input type="submit" value="CHỈNH SỬA" class="btn btn-primary"> -->
		</div>
	</div>
</form>
@endforeach