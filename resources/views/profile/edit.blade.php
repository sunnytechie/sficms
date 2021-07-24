@extends('layouts.app')

@section('content')
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="d-flex align-items-center">
									<h5 class="page-title">Dashboard</h5>
									<ul class="breadcrumb ml-2">
										<li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
										<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
										<li class="breadcrumb-item active">Settings</li>
									</ul>
								</div>
							</div> 
						</div>
					</div> 
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-xl-3 col-md-4">
						
							<!-- Settings Menu -->
							<div class="widget settings-menu">
								<ul>
									<li class="nav-item">
										<a href="settings.html" class="nav-link active">
											<i class="far fa-user"></i> <span>Profile Settings</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="preferences.html" class="nav-link">
											<i class="fas fa-cog"></i> <span>Preferences</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="tax-types.html" class="nav-link">
											<i class="far fa-check-square"></i> <span>Tax Types</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="expense-category.html" class="nav-link">
											<i class="far fa-list-alt"></i> <span>Expense Category</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="notifications.html" class="nav-link">
											<i class="far fa-bell"></i> <span>Notifications</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="delete-account.html" class="nav-link">
											<i class="fas fa-ban"></i> <span>Delete Account</span>
										</a>
									</li>
								</ul>
							</div>
							<!-- /Settings Menu -->
							
						</div>
						
						<div class="col-xl-9 col-md-8">
						
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Basic information</h5>
								</div>
								<div class="card-body">
								
									<!-- Form -->
									<form>
										<div class="row form-group">
											<label for="name" class="col-sm-3 col-form-label input-label">Profile</label>
											<div class="col-sm-9">
												<div class="d-flex align-items-center">
													<label class="avatar avatar-xxl profile-cover-avatar m-0" for="edit_img">
														<img id="avatarImg" class="avatar-img" src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="Profile Image">
														<input type="file" id="edit_img">
														<span class="avatar-edit">
															<i class="feather-edit-2 avatar-uploader-icon shadow-soft"></i>
														</span>
													</label>
												</div>
											</div>
										</div>
										<div class="row form-group">
											<label for="name" class="col-sm-3 col-form-label input-label">Name</label>
											<div class="col-sm-9">
												<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Your Name" value="Charles Hafner">

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
											</div>
										</div>
										<div class="row form-group">
											<label for="email" class="col-sm-3 col-form-label input-label">Email</label>
											<div class="col-sm-9">
												<input type="email" class="form-control" id="email" placeholder="Email" value="charleshafner@example.com">
											</div>
										</div>
										<div class="row form-group">
											<label for="phone" class="col-sm-3 col-form-label input-label">Phone <span class="text-muted">(Optional)</span></label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="phone" placeholder="+x(xxx)xxx-xx-xx" value="+1 (304) 499-13-66">
											</div>
										</div>
										<div class="row form-group">
											<label for="location" class="col-sm-3 col-form-label input-label">Location</label>
											<div class="col-sm-9">
												<div class="mb-3">
													<input type="text" class="form-control" id="location" placeholder="Country" value="United States">
												</div>
												<div class="mb-3">
													<input type="text" class="form-control" placeholder="City" value="Charleston">
												</div>
												<input type="text" class="form-control" placeholder="State" value="West Virginia">
											</div>
										</div>
										<div class="row form-group">
											<label for="addressline1" class="col-sm-3 col-form-label input-label">Address line 1</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="addressline1" placeholder="Your address" value="2681  Columbia Mine Road">
											</div>
										</div>
										<div class="row form-group">
											<label for="addressline2" class="col-sm-3 col-form-label input-label">Address line 2 <span class="text-muted">(Optional)</span></label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="addressline2" placeholder="Your address">
											</div>
										</div>
										<div class="row form-group">
											<label for="zipcode" class="col-sm-3 col-form-label input-label">Zip code <span class="text-muted">(Optional)</span></label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="zipcode" placeholder="Your zip code" value="25301">
											</div>
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Save Changes</button>
										</div>
									</form>
									<!-- /Form -->
									
								</div>
							</div>
						</div>
					</div>
@endsection