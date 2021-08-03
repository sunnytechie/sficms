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
										<li class="breadcrumb-item active">Add New Location</li>
									</ul>
								</div>
							</div> 
						</div>
					</div> 
					<!-- /Page Header -->
				
					<div class="row">
						
						
						<div class="col-xl-8 offset-md-2">
						
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Register a New location</h5>
								</div>
								<div class="card-body">
                                @if (session('status_upload'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status_upload') }}
                                    </div>
                                @endif
									<!-- Form -->
									<form method="POST" action="{{ route('store.location') }}">                                    
                                       @csrf
										<div class="row form-group">
											<label for="city" class="col-sm-3 col-form-label input-label">City Name<span class="text-muted">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" id="city" placeholder="State">
												
												@error('city')
													<span class="invalid-feedback" role="alert">
														<strong>The city has already been Registered, You can Leave it empty.</strong>
													</span>
                                            	@enderror
											</div>
										</div>

                                        <div class="row form-group">
											<label for="area" class="col-sm-3 col-form-label input-label">Area <span class="text-muted">*</span></label>
											<div class="col-sm-9">
                                                <select name="area" class="form-control @error('area') is-invalid @enderror" id="area">
                                                    <option>Area 1</option>
                                                    <option>Area 2</option>
                                                    <option>Area 3</option>
                                                    <option>Area 4</option>
                                                    <option>Area 5</option>
                                                    <option>Area 6</option>
                                                    <option>Area 7</option>
                                                    <option>Area 8</option>
                                                    <option>Area 9</option>
                                                    <option>Area 10</option>
                                                    <option>Area 11</option>
                                                    <option>Area 12</option>
                                                </select>

												@error('area')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                            	@enderror
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</form>
									<!-- /Form -->
									
								</div>
							</div>
						</div>
					</div>

					
@endsection