@extends('layouts.admin-layout')

@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-4">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Quản Lý Vé</h6>
							<!-- <a href="" title="Thêm mới" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a> -->
						</div>
						<div class="card-body"> 

							<table class="table table-hover card-text">
								<thead>
									<tr>
										<th>STT</th>
										<th>Tên Khách Hàng</th>
										<th>Tên Phim</th>
										<th>Lịch chiếu</th>
										<th>Ghế</th>
										<th>Chức năng</th>
									</tr>
								</thead>
								<tbody>
									
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