@extends('layouts.app')

@section('content')
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="d-flex align-items-center">
									<h5 class="page-title">Dashboard</h5>
									<ul class="breadcrumb ml-2">
										<li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
										<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
										<li class="breadcrumb-item active">Edit Profile session</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">


						<div class="col-xl-10 offset-md-1">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Basic information</h5>
								</div>
								<div class="card-body">

									<!-- Form -->
									<form method="post" action="{{ route('update.profile', $profileID) }}" enctype="multipart/form-data">
										@csrf
                        				@method('patch')

										<div class="row form-group">
											<label for="name" class="col-sm-3 col-form-label input-label">Profile</label>
											<div class="col-sm-9">
												<div class="d-flex align-items-center">
													<label class="avatar avatar-xxl profile-cover-avatar m-0" for="avatar">
														<img id="avatarImg" class="avatar-img img-fluid" src="/storage/{{ $profileAvatar }}" alt="Profile Image">

														<input class="@error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" onchange="previewFile(this);">
														<span class="avatar-edit">
															<i class="feather-edit-2 avatar-uploader-icon shadow-soft"></i>
														</span>
													</label>

													@error('avatar')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
										</div>
										<div class="row form-group">
											<label for="name" class="col-sm-3 col-form-label input-label">Full Name</label>
											<div class="col-sm-9">
												<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profileName ?? old('name') }}" id="name" placeholder="Your Name">

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
												<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ $profileEmail ?? old('name') }}">

												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                            	@enderror
											</div>
										</div>

										<div class="row form-group">
											<label for="phone" class="col-sm-3 col-form-label input-label">Phone <span class="text-muted">(Optional)</span></label>
											<div class="col-sm-9">
												<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="+x(xxx)xxx-xx-xx" value="{{ $profilePhone ?? old('name') }}">

												@error('phone')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                            	@enderror
											</div>
										</div>

										<div class="row form-group">
											<label for="location" class="col-sm-3 col-form-label input-label">Location</label>
											<div class="col-sm-9">
												<div class="mb-3">
													<label for="location">Your current country <strong>{{ $profileCountry }}</strong></label>
													<select name="country" class="form-control select @error('country') is-invalid @enderror" id="country">
														<option class="hide-option" selected value="{{ $profileCountry }}">Change Country</option>
														@foreach ($all as $item)
															<option>{{ $item->name->common }}</option>
														@endforeach
													</select>

													@error('country')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                            	@enderror
												</div>

												<div class="mb-3">
													<label for="city">Your current City is <strong>{{ $profileCity }}</strong></label>
													<select name="city" class="form-control select @error('city') is-invalid @enderror" id="city">
														<option class="hide-option" selected value="{{ $profileCity }}">Change City</option>
														@foreach ($locationsCity as $location)
															<option>{{ $location->city }}</option>
														@endforeach
													</select>

													@error('city')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                            	@enderror
												</div>

												<div class="mb-3">
													<label for="area">Your current area is <strong>{{ $profileArea }}</strong></label>
													<select name="area" class="form-control select @error('area') is-invalid @enderror" id="area">
														<option class="hide-option" selected value="{{ $profileArea }}">change area</option>
														@foreach ($locationsArea as $location)
															<option>{{ $location->area }}</option>
														@endforeach
													</select>

													@error('area')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                            	@enderror
												</div>

											</div>
										</div>

										<div class="row form-group">
											<label for="zipcode" class="col-sm-3 col-form-label input-label">Zip code <span class="text-muted">(Optional)</span></label>
											<div class="col-sm-9">
												<input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" name="zip_code" placeholder="Your zip code"  value="{{ $profileZipCode ?? old('zipcode') }}">

												@error('zipcode')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                            	@enderror
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

					<!-- Script to preview Image before submitting -->
					<script>
						function previewFile(input){
							var file = $("input[type=file]").get(0).files[0];

							if(file){
								var reader = new FileReader();

								reader.onload = function(){
									$("#avatarImg").attr("src", reader.result);
								}

								reader.readAsDataURL(file);
							}
						}
					</script>
@endsection
