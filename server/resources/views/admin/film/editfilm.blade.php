@extends('layouts.admin-layout')
@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-5">
      <div class="row">
       <div class="col-lg-12 mb-5">
        <div class="card">
          <div class="card-header">
            <h3 class="h6 text-uppercase mb-0">Chỉnh Sửa Phim</h3>
          </div>
          @foreach ($films as $film)
          <div class="card-body">
            <form action="" method="POST" class="form-horizontal">
              @csrf
              <div class="form-group row">
                <label class="col-md-3 form-control-label">Tên Phim</label>
                <div class="col-md-9">
                  <input id="inputHorizontalSuccess" name="name" type="text" placeholder="Tên phim" value="{{$film->name}}" class="form-control form-control-success ">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Tên Quốc Tế</label>
                <div class="col-md-9">
                  <input id="inputHorizontalWarning" name="global_name" type="text" placeholder="Tên Quốc Tế" value="{{$film->global_name}}" class="form-control form-control-warning ">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Ảnh Phim</label>
                <div class="col-md-9">
                  <input id="inputHorizontalWarning" name="image" type="file" value="{{$film->image}}" class="form-control form-control-warning ">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nhà Sản Xuất</label>
                <div class="col-md-9">
                  <input id="inputHorizontalWarning" name="producer" type="text" placeholder="Nhà sản xuất" value="{{$film->producer}}" class="form-control form-control-warning ">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Thể loại</label>
                <div class="col-md-9">
                  <input id="inputHorizontalWarning" name="categories" type="text" placeholder="Thể loại" value="{{$film->categories}}" class="form-control form-control-warning ">
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Đạo Diễn</label>
                <div class="col-md-9">
                  <input id="inputHorizontalWarning" name="director" type="text" placeholder="Đạo diễn" value="{{$film->director}}" class="form-control form-control-warning ">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Diễn Viên</label>
                <div class="col-md-9">
                  <input id="inputHorizontalWarning" name="case" type="text" placeholder="Diễn viên" value="{{$film->case}}" class="form-control form-control-warning ">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Thời lượng</label>
                <div class="col-md-9">
                  <input id="inputHorizontalWarning" name="durations" type="text" placeholder="Thời lượng" value="{{$film->durations}}" class="form-control form-control-warning ">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Ngày Khởi Chiếu</label>
                <div class="col-md-9">
                  <input id="inputHorizontalWarning" name="release_date" type="date" value="{{$film->release_date}}" class="form-control form-control-warning ">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Trạng Thái</label>
                <div class="col-md-9">
                 @if ($film->status==1)
                 <div class="custom-control custom-radio custom-control-inline">
                  <input id="customRadioInline1" type="radio" name="status" value="1" class="custom-control-input" checked>
                  <label for="customRadioInline1" class="custom-control-label">Phim Đang Chiếu</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input id="customRadioInline2" type="radio" name="status" value="0" class="custom-control-input">
                  <label for="customRadioInline2" class="custom-control-label">Phim Sắp Chiếu</label>
                </div>
                @else
                <div class="custom-control custom-radio custom-control-inline">
                  <input id="customRadioInline1" type="radio" name="status" value="1" class="custom-control-input">
                  <label for="customRadioInline1" class="custom-control-label">Phim Đang Chiếu</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input id="customRadioInline2" type="radio" name="status" value="0" class="custom-control-input" checked>
                  <label for="customRadioInline2" class="custom-control-label">Phim Sắp Chiếu</label>
                </div>
                @endif

              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Trailer</label>
              <div class="col-md-9">
                <textarea class="form-control " name="trailer" rows="5" id="trailerYT">{{$film->trailer}}</textarea><small class="form-text text-muted ml-3">Chú ý : Lấy mã nhúng video của YouTube</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Nội Dung</label>
              <div class="col-md-9">
                <textarea class="form-control " name="description" rows="5" id="noidung">{{$film->description}}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Giá Vé</label>
              <div class="col-md-9">
                <input id="inputHorizontalWarning" name="ticket_price" type="text" placeholder="Giá vé" value="{{$film->ticket_price}}" class="form-control form-control-warning ">
              </div>
            </div>
            @endforeach
            <div class="form-group row">       
              <div class="col-md-9 m-auto">
                <input type="submit" value="CHỈNH SỬA" class="btn btn-primary">
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