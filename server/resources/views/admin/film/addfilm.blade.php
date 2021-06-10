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
							<form action="{{route('admin.addfilm')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Tên Phim</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess" name="name" type="text" placeholder="Tên phim" class="form-control form-control-success" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Tên Quốc Tế</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="global_name" type="text" placeholder="Tên Quốc Tế" class="form-control form-control-warning" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Ảnh Phim</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name=image type="file" class="form-control form-control-warning" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Nhà Sản Xuất</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="producer" type="text" placeholder="Nhà sản xuất" class="form-control form-control-warning " required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Thể loại</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="categories" type="text" placeholder="Thể loại" class="form-control form-control-warning " required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Đạo Diễn</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="director" type="text" placeholder="Đại diễn" class="form-control form-control-warning " required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Diễn Viên</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="case" type="text" placeholder="Diễn viên" class="form-control form-control-warning " required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Thời lượng</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="durations" type="text" placeholder="Thời lượng" class="form-control form-control-warning " required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Ngày Khởi Chiếu</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="release_date" type="date" class="form-control form-control-warning " required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Trạng Thái</label>
									<div class="col-md-9">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="radio1" name="status" value="1" class="custom-control-input" checked>
											<label for="radio1" class="custom-control-label">Phim Đang Chiếu</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="radio2" name="status" value="0" class="custom-control-input" >
											<label for="radio2" class="custom-control-label">Phim Sắp Chiếu</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Trailer</label>
									<div class="col-md-9">
										<textarea class="form-control " name="trailer" rows="5" id="trailerYT"></textarea><small class="form-text text-muted ml-3">Chú ý : Lấy mã nhúng video của YouTube</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Nội Dung</label>
									<div class="col-md-9">
										<textarea class="form-control " name="description" rows="5" id="noidung"></textarea required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Giá Vé</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="ticket_price" type="text" placeholder="Giá vé" class="form-control form-control-warning " required>
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