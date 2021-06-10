<table class="table table-hover card-text">
    <thead>
        <tr>
            <th>No.</th>
            <th>Phim</th>
            <th>Rạp</th>
            <th>Ngày</th>
            <th>Thời gian</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody id="lichchieu">
        @foreach ($screenings as $key => $screening)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$screening->film->name}}</td>
            <td>{{$screening->cinema->cinema_name}}</td>
            <td>{{date('d-m-Y',strtotime($screening->date))}}</td>
            <td>{{date('H:i',strtotime($screening->start_time))}}</td>
            <td><a onclick=" openEditForm(`{{$screening->id}}`)"><button style="background-color: #ffffff00;border: none" title="Sửa"><i class="fas fa-edit text-success"></i></button></a><br>
            <button onclick=" confirmdelete(`{{$screening->id}}`)" value="{{$screening->id}}" type="submit" style="background-color: #ffffff00;border: none" title="Xóa"><i class="fas fa-trash-alt text-danger"></i></button>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>