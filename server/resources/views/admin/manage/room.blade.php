@extends('layouts.admin-layout')

@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-4">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Quản Lý Phòng</h6>
							<a href="{{route('admin.addroom')}}" title="Thêm mới" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
						</div>
						<div class="card-body">                           
							<table class="table table-hover card-text">
								<thead>
									<tr>
										<th>No.</th>
										<th>Tên Phòng</th>
										<th>Thuộc Rạp</th>
										<th>Chức năng</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($rooms as $key => $room)                     		
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$room->room_name}}</td>		
										<td>{{$room->cinema->cinema_name}}</td>	
										<td><a href="{{asset('admin.editroom',$room->id)}}"><button style="background-color: #ffffff00;border: none" title="Sửa"><i class="fas fa-edit text-success"></i></button></a><br>
											<form action="{{route('admin.deleteroom',$room->id)}}" method="get" onsubmit="return confirm('Chắc chắn muốn xóa ?')">
												@csrf
												<button type="submit" style="background-color: #ffffff00;border: none" title="Xóa"><i class="fas fa-trash-alt text-danger"></i></button>
											</form></td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 text-center text-md-left text-primary">
						<p class="mb-2 mb-md-0">QUINTESSA Cinema &copy; 2021</p>
					</div>
					<!-- <div class="col-md-6 text-center text-md-right text-gray-400">
						<p class="mb-0">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a></p>
						
					</div> -->
				</div>
			</div>
		</footer>
	</div>
@endsection