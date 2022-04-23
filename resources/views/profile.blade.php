@extends('layouts.index')

@section('content')
<div class="subheader">
	<h1 class="subheader-title">
		 <i class='subheader-icon fal fa-user'></i> {{ $userdata->name }}
	</h1>
</div>
<div class="row">
 <div class="col-lg-6 col-xl-6 m-auto">
		 <!-- profile summary -->
		 <div class="card mb-g rounded-top">
			  <div class="row no-gutters row-grid">
					<div class="col-12">
						 <div class="d-flex flex-column align-items-center justify-content-center p-4">
							  <img src="/{{ $userdata->avatar }}" class="rounded-circle shadow-2 img-thumbnail" alt="">
							  <h5 class="mb-0 fw-700 text-center mt-3">
									{{ $userdata->name }}
									<small class="text-muted mb-0">{{ $userdata->address }}</small>
							  </h5>
							  <div class="mt-4 text-center demo">
									<a href="{{ $userdata->instagram }}" class="fs-xl" style="color:#C13584">
										 <i class="fab fa-instagram"></i>
									</a>
									<a href="{{ $userdata->vk }}" class="fs-xl" style="color:#4680C2">
										 <i class="fab fa-vk"></i>
									</a>
									<a href="{{ $userdata->telegram }}" class="fs-xl" style="color:#0088cc">
										 <i class="fab fa-telegram"></i>
									</a>
							  </div>
						 </div>
					</div>
					<div class="col-12">
						 <div class="p-3 text-center">
							  <a href="tel:+13174562564" class="mt-1 d-block fs-sm fw-400 text-dark">
									<i class="fas fa-mobile-alt text-muted mr-2"></i>{{ $userdata->phone }}</a>
							  <a href="mailto:oliver.kopyov@marlin.ru" class="mt-1 d-block fs-sm fw-400 text-dark">
									<i class="fas fa-mouse-pointer text-muted mr-2"></i>{{ $userdata->email }}</a>
							  <address class="fs-sm fw-400 mt-4 text-muted">
									<i class="fas fa-map-pin mr-2"></i>{{ $userdata->address }}
							  </address>
						 </div>
					</div>
			  </div>
		 </div>
  </div>
</div>
@endsection