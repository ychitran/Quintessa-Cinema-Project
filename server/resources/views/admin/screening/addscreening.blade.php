<form action="" method="POST" class="form-horizontal">
	@csrf
	<div class="form-group row">
		<label class="col-md-3 form-control-label">Phim</label>
		<div class="col-md-9">
			<select name="film" class="form-control">
				@foreach ($films as $film)
				<option value="{{$film->id}}">{{$film->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3 form-control-label">Rạp</label>
		<div class="col-md-9">
			<select name="cinema" class="form-control" id="rap">
				<!-- <option checked></option> -->
				@foreach ($cinemas as $cinema)
				<option value="{{$cinema->id}}">{{$cinema->cinema_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3 form-control-label">Phòng</label>
		<div class="col-md-9">
			<select name="room" class="form-control" id="phong">
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
			<!-- <input type="submit" value="THÊM" class="btn btn-primary"> -->
		</div>
	</div>
</form>