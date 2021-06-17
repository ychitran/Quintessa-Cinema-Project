@extends('layouts.admin-layout')

@section('admin-content')
<table class="table table-hover card-text">
    <thead>
        <tr>
            <th>No.</th>
            <th>Số ghế</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seats as $key => $seat)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$seat->row}}{{$seat->number}}</td>
            <td>Bình thường</td>
            <td>
                <form action="{{asset('admin.deleteroom',$room->id)}}}" method="get" onsubmit="return confirm('Chắc chắn muốn xóa ?')">
                    @csrf
                    <button type="submit" style="background-color: #ffffff00;border: none" title="Xóa"><i class="fas fa-trash-alt text-danger"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection