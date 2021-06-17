@extends('layouts.admin-layout')

@section('admin-content')

<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				
				<div class="col-lg-12 mb-4">

					<!-- <form class="input-group" method="POST" action="/admin/managefilm">
						@csrf
						<input type="text" class="form-control col-sm-3 form-control-label" placeholder="Keyword" aria-label="Search Keyword" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-warning" type="submit">Search</button>
						</div>
					</form> -->

					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Quản Lý Phim</h6>
							<a href="film/create" title="Thêm mới" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
						</div>
						<div class="card-body">
							<table class="table table-hover card-text" id="tablephim">
								<thead>
									<tr>
										<th>No.</th>
										<th>Tên Phim</th>
										<th>Thể loại</th>
										<th>Thời Lượng</th>
										<th>Ngày Khởi chiếu</th>
										<th>Trạng thái</th>
										<th>Chức năng</th>
									</tr>
								</thead>
								<tbody id="tbphim">
									@php

									$stt=0;

									if (isset($_GET['page'])) {
									$a=$_GET['page'];

									}
									else{
									$a=1;
									}
									$stt=($a-1)*10;
									@endphp

									@foreach ($films as $film)
									@php

									$stt++;
									@endphp
									<tr>
										<td>{{$stt}}</td>
										<td>{{$film->name}}<br>{{$film->global_name}}</td>
										<td>{{$film->categories}}</td>
										<td>{{$film->durations}}</td>
										<td>{{$film->release_date}}</td>
										<td>@if ($film->status == '1')
											Đang Chiếu
											@else
											Sắp Chiếu
											@endif</td>

										<td><a href="film/edit/{{$film->id}}"><button style="background-color: #ffffff00;border: none" title="Sửa"><i class="fas fa-edit text-success"></i></button></a><br>
											<form action="film/delete/{{$film->id}}" method="get" onsubmit="return confirm('Chắc chắn muốn xóa ?')">
												@csrf
												<button type="submit" style="background-color: #ffffff00;border: none" title="Xóa"><i class="fas fa-trash-alt text-danger"></i></button>
											</form>
										</td>
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
				<div class="col-md-6 text-center text-md-right text-gray-400">
					<p class="mb-0">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a></p>
					<!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
				</div>
			</div>
		</div>
	</footer>
</div>

<script>
	// function loadAddPage() {
	// 	var url = `{{route('admin.addfilm.page')}}`;
	// 	$.ajax({
	// 		url: url,
	// 		success: function(xml) {

	// 			$('.py-5 .row').html(xml);
	// 		},
	// 		error: function(error) {
	// 			console.log("Xảy ra lỗi: " + error.message)
	// 		}
	// 	})
	// }
</script>

@endsection