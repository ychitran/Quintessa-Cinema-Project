@extends('layouts.admin-layout')

@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        <section class="py-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">Đặt vé xem phim</h3>
                        </div>
                        <div class="card-body">

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

                                            @if(isset($seat_number->ticket->screening_id) && $seat_number->ticket->screening_id == $idscreening && isset($seat_number->ticket->user_id))
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

                            <div class="col-sm-3" style="margin-top: 20px">
                                <div style="background-color: #f9f9f9">
                                    @foreach ($screenings as $screening)
                                    <input type="hidden" class="screening_id" value="{{$screening->id}}">
                                    @if (Auth::check())
                                    <input type="hidden" class="user_id" value="{{Auth::user()->id}}">
                                    @endif
                                    <div class="col-md-12" style="text-align: center; margin-bottom: 15px">
                                        <img src="{{asset('/storage/' .$screening->film->image)}}" width="215" height="285">
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <h4 style="font-size: 18px" id="tenphim">{{$screening->film->name}}</h4>
                                            <h4 style="font-size: 14px" id="tentienganh">{{$screening->film->global_name}}</h4>
                                        </div>
                                        <div>
                                            <!-- <p><b>Rạp:</b>&nbsp;<span id="tenrap">{{$screening->cinema->cinema_name}}</span></p> -->
                                            <p><b>Phòng:</b>&nbsp;<span id="tenphong">{{$screening->room->room_name}}</span></p>
                                            <p><b>Suất chiếu:</b>&nbsp;<span id="ngay">{{date('d-m-Y', strtotime($screening->date))}}</span>&nbsp;|&nbsp;<span id="thoigian">{{date('G:i',strtotime($screening->start_time))}}</span></p>
                                            @endforeach
                                        </div>
                                        <div><b>Ghế: </b> &nbsp;<div class="seatList"></div>
                                        </div>
                                    </div>
                                    <div style="padding: 10px 15px 0px 15px ;">
                                        <p><b>Tổng:</b><span id="total"> </span>&nbsp;VNĐ</p>
                                    </div>
                                    <div>
                                        @if (!Auth::check())
                                        <a href="" class="text-danger">Đăng nhập để tiếp tục</a>
                                        @else
                                        <center>
                                            <button id="addve" class="order-ticket btn btn-danger">Đặt vé</button>
                                            @csrf
                                        </center>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection