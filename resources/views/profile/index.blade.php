@extends('layouts.app')

@section('content')
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="d-flex align-items-center">
									<h5 class="page-title">Dashboard</h5>
									<ul class="breadcrumb ml-2">
										<li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
										<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
										<li class="breadcrumb-item active">Settings</li>
									</ul>
								</div>
							</div> 
						</div>
					</div> 
	
					<div class="row">
						<div class="col-md-12">
						
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">List of Users</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Registered On</th>
													<th>Role</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html"><img class="avatar avatar-sm mr-2 avatar-img rounded-circle" src="{{ asset('assets/img/profiles/avatar-13.jpg') }}" alt="User Image"> Wendell Ward</a>
														</h2>
													</td>
													<td>wendellward@example.com</td>
													<td>22 Feb 2020</td>
													<td><span class="text-info">Patient</span></td>
													<td><span class="badge badge-pill bg-success-light">Active</span></td>
													<td class="text-right">
														<a href="javascript:void(0);" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a> 
														<a href="javascript:void(0);" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
						</div>	
					</div>
@endsection