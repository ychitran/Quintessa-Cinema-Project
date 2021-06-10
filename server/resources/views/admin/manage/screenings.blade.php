@extends('layouts.admin-layout')

@section('admin-content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-4">
					<!-- <label class="ml-3">Tìm Kiếm Theo Tên Phim:</label>
					<select class="form-control w-50 mb-3" id="lich">
						@foreach ($films as $film)
						<option value="{{$film->id}}">{{$film->name}}</option>
						@endforeach

					</select> -->
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Quản Lý Lịch Chiếu</h6>
							<a onclick="openAddForm()" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
						</div>
						<div class="card-body">

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

<div class="modal fade" id="add-screenings-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h5 class="modal-title" id="exampleModalLabel">Thêm lịch chiếu</h5>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body-add">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="submitAddForm()">Thêm mới </button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit-screenings-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h5 class="modal-title" id="exampleModalLabel">Sửa lịch chiếu</h5>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body-edit">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary submitEditForm">Sửa</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="delete-screenings-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">

				<h5 class="modal-title" id="exampleModalLabel">Xóa lịch chiếu</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<center>
				<div class="modal-body-delete">
					Bạn có chắc muốn xóa?
				</div>
			</center>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary confirm">Xác nhận</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
			</div>
		</div>
	</div>
</div>

<script>
	window.onload = loadList

	function confirmdelete(idScreening) {
		$('#delete-screenings-modal').modal();

		$(".confirm").click(function() {
			$.ajax({
				url: `/admin/deletescreening/${idScreening}`,
				type: 'GET',
				success: function() {

					// Close Modal
					$("#delete-screenings-modal").modal("hide");

					// Reload List
					loadList();
				},
				error: function() {
					alert("Delete Failed")
				}
			})
		});

	}

	//add screening
	function openAddForm() {
		$("#add-screenings-modal").modal();

		$.ajax({
			url: `{{route('admin.addscreening.page')}}`,
			success: function(xml) {
				$('.modal-body-add').html(xml);

				// Display Modal
				$('#add-screenings-modal').modal('show');
			}
		})
	}

	function submitAddForm() {
		const data = {
			_token: document.querySelector(`.form-horizontal [name="_token"]`).value,
			film_id: document.querySelector(`.form-horizontal [name="film"]`).value,
			cinema_id: document.querySelector(`.form-horizontal [name="cinema"]`).value,
			room_id: document.querySelector(`.form-horizontal [name="room"]`).value,
			date: document.querySelector(`.form-horizontal [name="date"]`).value,
			start_time: document.querySelector(`.form-horizontal [name="start_time"]`).value,
		}

		$.ajax({
			url: `{{route('admin.addscreening')}}`,
			type: 'POST',
			data: data,
			success: function() {
				// Close Modal
				$("#add-screenings-modal").modal("hide");

				// Reload List
				loadList();
			},
			error: function() {
				alert("Edit Failed")
			}
		})
	}

	//edit screening
	function openEditForm(idScreening) {
		$("#edit-screenings-modal").modal();

		$.ajax({
			url: `/admin/editscreening/${idScreening}`,
			success: function(xml) {
				$('.modal-body-edit').html(xml);

				// Display Modal
				$('#edit-screenings-modal').modal('show');
			}
		})

		$(".submitEditForm").click(function() {
			const data = {
				_token: document.querySelector(`.form-horizontal [name="_token"]`).value,
				name: document.querySelector(`.form-horizontal [name="name"]`).value,
				cinema_name: document.querySelector(`.form-horizontal [name="cinema_name"]`).value,
				room_name: document.querySelector(`.form-horizontal [name="room_name"]`).value,
				date: document.querySelector(`.form-horizontal [name="date"]`).value,
				start_time: document.querySelector(`.form-horizontal [name="start_time"]`).value,
			}

			$.ajax({
				url: `/admin/editscreening/${idScreening}`,
				type: 'POST',
				data: data,
				success: function() {
					// Close Modal
					$("#edit-screenings-modal").modal("hide");

					// Reload List
					loadList();
				},
				error: function() {
					alert("Edit Failed")
				}
			})
		});


	}



	function loadList() {
		var url = `{{route('admin.getscrlist')}}`;

		$.ajax({
			url: url,
			success: function(xml) {

				$('.card-body').html(xml);
			},
			error: function(error) {
				console.log("Xảy ra lỗi: " + error.message)
			}
		})
	}
</script>
@endsection