@extends('layouts.index')

@section('content')
<div class="subheader">
	<h1 class="subheader-title">
		 <i class='subheader-icon fal fa-sun'></i> Установить статус
	</h1>
</div>
<form action="{{ route('setStatus') }}" method="POST">
	@csrf
	<div class="row">
		 <div class="col-xl-6">
			  <div id="panel-1" class="panel">
					<div class="panel-container">
						 <div class="panel-hdr">
							  <h2>Установка текущего статуса</h2>
						 </div>
						 <div class="panel-content">
							  <div class="row">
									<div class="col-md-4">
										 <!-- status -->
										 <div class="form-group">
											  <label class="form-label" for="example-select">Выберите статус</label>
											  <select class="form-control" id="example-select" name="status">
												  @foreach ($arrayStatus as $status)
												   @if (array_search($status, $arrayStatus) == $userdata->status)
													   <option value="{{ array_search($status, $arrayStatus) }}" selected>{{ $status }}</option> 
														@else
														<option value="{{ array_search($status, $arrayStatus) }}">{{ $status }}</option>
													@endif
												  @endforeach
											  </select>
										 </div>
									</div>
									<input type="hidden" name="id" value="{{ $userdata->user_id }}">
									<div class="col-md-12 mt-3 d-flex flex-row-reverse">
										 <button class="btn btn-warning">Set Status</button>
									</div>
							  </div>
						 </div>
					</div>
					
			  </div>
		 </div>
	</div>
</form>


@endsection