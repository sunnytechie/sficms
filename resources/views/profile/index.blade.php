@extends('layouts.app')

@section('content')
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="d-flex align-items-center">
									<h5 class="page-title">Dashboard</h5>
									<ul class="breadcrumb ml-2">
										<li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
										<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
										<li class="breadcrumb-item active">Profiles</li>
									</ul>
								</div>
							</div> 
						</div>
					</div> 

					

				<div class="row align-items-center">
					<div class="col-md-12">
							@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif
					</div> 
				</div>
	
					<div class="row">
						<div class="col-md-12">
						
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">List of profiles you created.</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Registered On</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($yourProfiles as $profile)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="/profile/{{ $profile->id }}"><img class="avatar img-fluid avatar-sm mr-2 avatar-img rounded-circle" src="{{ $profile->avatar }}" alt="User Image"> {{ $profile->name }}</a>
														</h2>
													</td>
													<td>{{ $profile->email }}</td>
													<td>{{ Carbon\Carbon::parse($profile['created_at'])->toFormattedDateString() }}</td>
													<td class="text-left">
														<a href="/profile/{{ $profile->id }}" class="btn btn-sm btn-white text-info mr-2"><i class="far fa-eye mr-1"></i> View Profile</a> 
														<a href="#" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a> 
														<a href="#" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
						</div>	
					</div>
@endsection