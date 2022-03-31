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
                        <li class="breadcrumb-item active">Report Portal</li>
                    </ul>
                </div>
            </div> 
        </div>
    </div> 
    <!-- /Page Header -->

    <!-- Row -->
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <!-- Server Side Validation -->
            <div class="card">
                <div class="card-header text-center p-4">
                    <h5 class="card-title">Edit Report Section</h5>
                    <p class="card-text">You are editing a report that was sent <strong>{{$reportUpdated_at->diffForHumans()}}</strong> by <strong>{{ $area }}</strong>, in the month of <strong>{{ $date_month }}</strong>, <strong>{{ $date_year }}</strong>.</p>
                </div>
                
                <div class="card-body">
                    @if (session('status_upload'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status_upload') }}
                        </div>
                        @endif
                    <form method="post" action="/report/{{ $id }}/update" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-row">
                            {{-- <div class="col-md-6 mb-3">
                                <label for="validationServer01">Select Profile</label>
                                <select class="form-control select @error('profile_id') is-invalid @enderror" name="profile_id" id="profile_id" value="{{ old('profile_id') }}" autofocus>
                                    
                                    @foreach ($profiles as $item)
                                        <option value="{{ $profile_id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('profile_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Kindly Choose a profile</strong>
                                </span>
                                @enderror
                            </div> --}}

                            {{-- <div class="col-md-6 mb-3">
                                <label for="validationServer01">Area</label>
                                <select class="form-control select @error('area') is-invalid @enderror" name="area" id="area" value="{{ old('area') }}" autofocus>
                                    <option selected>{{ $area }}</option>
                                    @foreach ($locations as $item)
                                        <option value="{{ $item->city }} {{ $item->area }}">{{ $item->city }} {{ $item->area }}</option>
                                    @endforeach
                                </select>
                                @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Kindly create a profile first.</strong>
                                </span>
                                @enderror
                            </div> --}}

                            <input type="hidden" name="profile_id" id="profile_id" value="{{ $profile_id }}">

                            <div class="col-md-6 mb-3">
                                <label for="week">This report is set for <strong>{{ $date_week }}</strong></label>
                                <select class="form-control select @error('date_week') is-invalid @enderror" name="date_week" id="date_week">
                                    <option selected value="{{ $date_week }}">Change selected</option>
                                    <option>Week 1</option>
                                    <option>Week 2</option>
                                    <option>Week 3</option>
                                    <option>Week 4</option>
                                    <option>Week 5</option>
                                    <option>Monthly</option>
                                </select>
                                
                                @error('date_week')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="month">This report is set for the month of <strong>{{ $date_month }}</strong></label>
                                <select class="form-control select @error('date_month') is-invalid @enderror" name="date_month" id="date_month">
                                    <option selected value="{{ $date_month }}">Change selection</option>
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
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

                            <div class="col-md-6 mb-3">
                                <label for="year">Year</label>
                                <select class="form-control select @error('date_year') is-invalid @enderror" name="date_year" id="date_year">
                                    <option>{{ $date_year }}</option>
                                </select>
                                
                                @error('date_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="year">Reupload Spreadsheet</label>
                                <input id="spreadsheet" class="form-control form-control-file @error('spreadsheet') is-invalid @enderror" type="file" name="spreadsheet">
                                <label for="">Previously: {{ $spreadsheet }}</label>
                                @error('spreadsheet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group mt-4">
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
                        <button class="btn btn-primary" type="submit">Update Report</button>
                    </form>
                </div>
            </div>
            <!-- /Server Side Validation -->
                       
        </div>
    </div>
    <!-- /Row -->
        @if (session('status'))
            <div class="alert alert-primary status-alert" id="status-alert" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <script>
            setTimeout(function() {
                    $('#status-alert').fadeOut('fast');
            }, 10000); 
        </script>
@endsection
