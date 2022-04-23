@extends('layouts.index')

@section('content')
<div class="subheader">
	<h1 class="subheader-title">
		<i class='subheader-icon fal fa-plus-circle'></i> Редактировать
	</h1>
</div>
<form action="{{ route('updateUser') }}" method="POST">
	@csrf
	<div class="row">
		<div class="col-xl-6">
			<div id="panel-1" class="panel">
				<div class="panel-container">
					<div class="panel-hdr">
						<h2>Общая информация</h2>
					</div>
					<div class="panel-content">
						<!-- id -->
							<input type="hidden" id="simpleinput" class="form-control" value="{{ $userdata->user_id }}" name="id">

						<!-- username -->
						<div class="form-group">
							<label class="form-label" for="simpleinput">Имя</label>
							<input type="text" id="simpleinput" class="form-control" value="{{ $userdata->name }}" name="name">
						</div>

						<!-- title -->
						<div class="form-group">
							<label class="form-label" for="simpleinput">Место работы</label>
							<input type="text" id="simpleinput" class="form-control" value="{{ $userdata->position }}" name="position">
						</div>

						<!-- tel -->
						<div class="form-group">
							<label class="form-label" for="simpleinput">Номер телефона</label>
							<input type="text" id="simpleinput" class="form-control" value="{{ $userdata->phone }}" name="phone">
						</div>

						<!-- address -->
						<div class="form-group">
							<label class="form-label" for="simpleinput">Адрес</label>
							<input type="text" id="simpleinput" class="form-control" value="{{ $userdata->address }}" name="address">
						</div>
						<div class="col-md-12 mt-3 d-flex flex-row-reverse">
							<button class="btn btn-warning">Редактировать</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection