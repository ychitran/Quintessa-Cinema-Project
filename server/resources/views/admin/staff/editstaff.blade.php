@extends('layouts.admin-layout')

@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        <section class="py-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">Chỉnh sửa Nhân Viên</h3>
                        </div>
                        <div class="card-body">

                            <form method="POST" class="form-horizontal" action="">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Tên nhân viên</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" value="{{$staff->full_name}}" name="full_name" type="text" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Email</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" value="{{$staff->email}}" name="email" type="text" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Số điện thoại</label>
                                    <div class="col-md-9">
                                        <input id="inputHorizontalSuccess" value="{{$staff->phone_number}}" name="phone_number" type="text" placeholder="Tiêu đề" class="form-control form-control-success">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Chức vụ</label>
                                    <div class="col-md-9">
                                        <select name="role_id" class="form-control" id="rap">
                                            <option value="{{$staff->role_id}}" checked>{{$staff->role->role_name}}</option>
                                            @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Thuộc cụm rạp</label>
                                    <div class="col-md-9">
                                        <select name="cinema_id" class="form-control" id="rap">
                                            <!-- <option checked></option> -->
                                            @foreach ($cinemas as $cinema)
                                            <option value="{{$cinema->id}}">{{$cinema->cinema_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-9 m-auto">
                                        <input type="submit" value="Chỉnh sửa" class="btn btn-primary">
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