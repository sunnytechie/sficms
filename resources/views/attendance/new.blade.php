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
                        <li class="breadcrumb-item active">Attendance Portal</li>
                    </ul>
                </div>
            </div> 
        </div>
    </div> 
    <!-- /Page Header -->

    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">

            <!-- Server Side Validation -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Sisters' Fellowship International Attendance form</h5>
                    <p class="card-text">Kindly fill the form and submit.</p>
                </div>
                
                <div class="card-body">
                    @if (session('status_upload'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status_upload') }}
                        </div>
                        @endif
                    <form method="post" action="{{ route('store.attendance') }}">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">Select Profile</label>
                                <select class="form-control @error('profile_id') is-invalid @enderror" name="profile_id" id="profile_id" value="{{ old('profile_id') }}" autofocus>
                                    @foreach ($profiles as $profile)
                                        <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                    @endforeach
                                </select>
                                @error('profile_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Kindly create a profile first.</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">Area</label>
                                <select class="form-control @error('area') is-invalid @enderror" name="area" id="area" value="{{ old('area') }}" autofocus>
                                    @foreach ($profiles as $profile)
                                        <option>{{ $profile->city }} {{ $profile->area }}</option>
                                    @endforeach
                                </select>
                                @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Kindly create a profile first.</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationServer02">Enter Chapter Name</label>
                                <input type="text" name="chapter" class="form-control @error('chapter') is-invalid @enderror" id="chapter" placeholder="Chapter Name" value="{{ old('area') }}" style="text-transform: capitalize">
                                
                                @error('chapter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="day">Days Of Meeting</label>
                                <select class="form-control @error('date_day') is-invalid @enderror" name="date_day" id="date_day">
                                   <option>Sunday</option>
                                   <option>Monday</option>
                                   <option>Tuesday</option>
                                   <option>Wednesday</option>
                                   <option>Thursday</option>
                                   <option>Friday</option>
                                   <option>Saturday</option>
                                </select>
                                
                                @error('date_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="week">Weeks</label>
                                <select class="form-control @error('date_week') is-invalid @enderror" name="date_week" id="date_week">
                                    <option>Week 1</option>
                                    <option>Week 2</option>
                                    <option>Week 3</option>
                                    <option>Week 4</option>
                                    <option>Week 5</option>
                                </select>
                                
                                @error('date_week')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="month">Months</label>
                                <select class="form-control @error('date_month') is-invalid @enderror" name="date_month" id="date_month">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>Match</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                
                                @error('date_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="capacity">Capacity</label>
                                <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" placeholder="Number of People" name="capacity" value="{{ old('capacity') }}">
                                
                                @error('capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="amount">Tithe (Currency Naira)</label>
                                <input type="number" class="form-control @error('tithe_money') is-invalid @enderror" id="tithe_money" placeholder="Amount" name="tithe_money" value="{{ old('tithe_money') }}">
                                
                                @error('tithe_money')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="amount">HQs Tithe (Currency Naira)</label>
                                <input type="number" class="form-control @error('tithe_hq') is-invalid @enderror" id="tithe_hq" placeholder="Amount" name="tithe_hq" value="{{ old('tithe_hq') }}">
                                
                                @error('tithe_hq')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                                <label class="form-check-label" for="invalidCheck3">
                                    Agree that the information provided are correct and valid
                                </label>

                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
            <!-- /Server Side Validation -->
            
           
            
        </div>
    </div>
    <!-- /Row -->
@endsection