@extends('layouts.admin-layout')

@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-4">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Quản Lý Quảng cáo</h6>
							<a href="advertisement/create" title="Thêm mới" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
						</div>
						<div class="card-body">                           
							<table class="table table-hover card-text">
								<thead>
									<tr>
										<th>No.</th>
										<th>Tên Đối tác</th>
										<th>Nội dung</th>
										<th>Ngày bắt đầu</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Chức năng</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($ads as $key => $ad)                     		
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$ad->company_name}}</td>
										<td>{{$ad->content}}</td>
                                        <td>{{$ad->start_time}}{{date(strto)}}</td>
                                        <td>{{date('Y-m-d', strtotime($ad->start_time. ' + '.strval($ad->date_count). 'days'))}}</td>
										<td><a href="advertisement/edit/{{$ad->id}}"><button style="background-color: #ffffff00;border: none" title="Sửa"><i class="fas fa-edit text-success"></i></button></a><br>
											<form action="advertisement/delete/{{$ad->id}}" method="get" onsubmit="return confirm('Chắc chắn muốn xóa ?')">
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
						Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)
					</div> -->
				</div>
			</div>
		</footer>
	</div>
@endsection