@extends('layouts.admin-layout')

@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        <section class="py-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">Thêm Quảng cáo</h3>
                        </div>
                        <div class="card-body">

                            <form method="POST" class="form-horizontal" action="">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Tên đối tác</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" name="company_name" type="text" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Nội dung</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" name="content" type="text" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Giá hợp đồng</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" name="contract_price" type="number" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Thời lượng</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" name="duration" type="number" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Ngày bắt đầu</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" name="start_time" type="date" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Thời gian</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" name="date_count" type="number" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-9 m-auto">
                                        <input type="submit" value="Thêm" class="btn btn-primary">
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