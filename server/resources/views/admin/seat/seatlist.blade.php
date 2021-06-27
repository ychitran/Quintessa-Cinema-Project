@extends('layouts.admin-layout')
@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        <section class="py-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h6 class="text-uppercase mb-0">Đặt vé</h6>
                            <!-- <a routerLink="./order" title="Thêm mới" style="position: absolute;right: 35px;top: 22px;"><i
            class="fas fa-plus-square text-success" style="font-size: 24px"></i></a> -->
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Phim</label>
                                <div class="col-md-9">
                                    <select  class="form-control" id="rap">
                                        <option checked></option>
                                        @foreach ($films as film)
                                        <option  value="{{$film->id}}">{{$film->global_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Ngày chiếu</label>
                                <div class="col-md-9">
                                    <select  class="form-control" id="rap">
                                        <option checked></option>
                                        @foreach($dates as date)
                                        <option  value="{{$date->date}}">{{$date->date}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Giờ chiếu</label>
                                <div class="col-md-9">
                                    <select  class="form-control" id="rap">
                                        <option checked></option>
                                        @foreach ($start_times as start_time) 
                                        <option  value="{{$start_time->room_id}}">{{$start_time->start_time}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="seatbooking" style="background-color: #fff;height: auto">



                                <div class="seatStructure" style=" width:100%">

                                    <div class="screen ">SCREEN</div>
                                    <div class="seatcolor">
                                        <span class="seat-gray">Ghế đã bán</span>
                                        <span class="seat-blue">Có thể chọn</span>
                                        <span class="seat-green">Ghế đang chọn</span>
                                    </div>
                                    <div class="seatBooking">

                                        @foreach ($seats as $seat)
                                        <div class="seatRow">


                                            <div class="seatRowName">
                                                {{$seat->row}}
                                            </div>

                                            @foreach ($seat['number'] as $seat_number)

                                            @if($seat_number->screening_id != null)
                                            <div id="{{$seat_number->id}}" class="seatNumber seatDisable" value="{{$seat_number->row}}{{$seat_number->number}}"><a class="btn btn-outline-primary">{{$seat_number->number}}</a></div>
                                            @else
                                            <div id="{{$seat_number->id}}" class="seatNumber" value="{{$seat_number->row}}{{$seat_number->number}}"><a class="btn btn-outline-primary">{{$seat_number->number}}</a></div>
                                            @endif

                                            @endforeach

                                        </div>
                                        @endforeach
                                        <div class="seatReceipt">
                                            <button class="btnClear">Clear</button>
                                        </div>
                                    </div>

                                </div>

                                <br /><br />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection