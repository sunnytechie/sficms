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
        <div class="col-sm-8 offset-md-2">

            <!-- Server Side Validation -->
            <div class="card">
                <div class="card-header text-center p-4">
                    <h5 class="card-title">Sisters' Fellowship International Weekly Report form</h5>
                    <p class="card-text">Kindly fill the form below and submit.</p>
                </div>
                
                <div class="card-body">
                    @if (session('status_upload'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status_upload') }}
                        </div>
                        @endif
                    <form method="post" action="{{ route('store.report') }}">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationServer01">Select Profile</label>
                                <select class="form-control select @error('profile_id') is-invalid @enderror" name="profile_id" id="profile_id" value="{{ old('profile_id') }}" autofocus>
                                    @foreach ($profiles as $profile)
                                        <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                    @endforeach
                                </select>
                                @error('profile_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Kindly create or select a profile first.</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationServer01">Area</label>
                                <select class="form-control select @error('area') is-invalid @enderror" name="area" id="area" value="{{ old('area') }}" autofocus>
                                    @foreach ($profiles as $profile)
                                        <option>{{ $profile->city }} {{ $profile->area }}</option>
                                    @endforeach
                                </select>
                                @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Kindly create or select a profile first.</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="week">Week</label>
                                <select class="form-control select @error('date_week') is-invalid @enderror" name="date_week" id="date_week">
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

                            <div class="col-md-6 mb-3">
                                <label for="month">Months</label>
                                <select class="form-control select @error('date_month') is-invalid @enderror" name="date_month" id="date_month">
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

                            <div class="col-md-6 mb-3">
                                <label for="year">Year</label>
                                <select class="form-control select @error('date_year') is-invalid @enderror" name="date_year" id="date_year">
                                    <option>{{ $year_now }}</option>
                                </select>
                                
                                @error('date_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="year">Excel Spreadsheet</label>
                                <input id="spreadsheet" class="form-control form-control-file" type="file" name="spreadsheet">
                                
                                
                                @error('date_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            {{-- <table class="table table-light">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Chapter</th>
                                        <th>Days of Meeting</th>
                                        <th>Capacity</th>
                                        <th>Income</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                                <input type="text" class="form-control @error('chapter1') is-invalid @enderror" id="chapter1" placeholder="Chapter Name" name="chapter1" value="{{ old('chapter1') }}">
                                                
                                                @error('chapter1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day1') is-invalid @enderror" name="day1" id="day1">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        
                                        <td>
                                            <input type="number" class="form-control @error('capacity1') is-invalid @enderror" id="capacity1" placeholder="Capacity" name="capacity1" value="{{ old('capacity1') }}">
                                                
                                                @error('capacity1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income1') is-invalid @enderror" id="income1" placeholder="Income" name="income1" value="{{ old('income1') }}">
                                                
                                                @error('income1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>






                                    <tr>
                                        <td>
                                                <input type="text" class="form-control @error('chapter2') is-chapter2valid @enderror" id="chapter2" placeholder="Chapter Name" name="chapter2" value="{{ old('chapter2') }}">
                                                
                                                @error('chapter2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day2') is-invalid @enderror" name="day2" id="day2">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                    
                                        <td>
                                            <input type="number" class="form-control @error('capacity2') is-invalid @enderror" id="capacity2" placeholder="Capacity" name="capacity2" value="{{ old('capacity2') }}">
                                                
                                                @error('capacity2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income2') is-invalid @enderror" id="income2" placeholder="Income" name="income2" value="{{ old('income2') }}">
                                                
                                                @error('income2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>







                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter3') is-invalid @enderror" id="chapter3" placeholder="Chapter Name" name="chapter3" value="{{ old('chapter3') }}">
                                            
                                            @error('chapter3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day3') is-invalid @enderror" name="day3" id="day3">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        
                                        <td>
                                            <input type="number" class="form-control @error('capacity3') is-invalid @enderror" id="capacity3" placeholder="Capacity" name="capacity3" value="{{ old('capacity3') }}">
                                                
                                                @error('capacity3')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income3') is-invalid @enderror" id="income3" placeholder="Income" name="income3" value="{{ old('income3') }}">
                                                
                                                @error('income3')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>





                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter4') is-invalid @enderror" id="chapter4" placeholder="Chapter Name" name="chapter4" value="{{ old('chapter4') }}">
                                            
                                            @error('chapter4')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day4') is-invalid @enderror" name="day4" id="day4">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day4')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        
                                        <td>
                                            <input type="number" class="form-control @error('capacity4') is-invalid @enderror" id="capacity4" placeholder="Capacity" name="capacity4" value="{{ old('capacity4') }}">
                                                
                                                @error('capacity4')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income4') is-invalid @enderror" id="income4" placeholder="Income" name="income4" value="{{ old('income4') }}">
                                                
                                                @error('income4')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td> 
                                    </tr>



                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter5') is-invalid @enderror" id="chapter5" placeholder="Chapter Name" name="chapter5" value="{{ old('chapter5') }}">
                                            
                                            @error('chapter5')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day5') is-invalid @enderror" name="day5" id="day5">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day5')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <input type="number" class="form-control @error('capacity5') is-invalid @enderror" id="capacity5" placeholder="Capacity" name="capacity5" value="{{ old('capacity5') }}">
                                                
                                                @error('capacity5')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income5') is-invalid @enderror" id="income5" placeholder="Income" name="income5" value="{{ old('income5') }}">
                                                
                                                @error('income5')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>





                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter6') is-invalid @enderror" id="chapter6" placeholder="Chapter Name" name="chapter6" value="{{ old('chapter6') }}">
                                            
                                            @error('chapter6')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day6') is-invalid @enderror" name="day6" id="day6">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day6')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                       
                                        <td>
                                            <input type="number" class="form-control @error('capacity6') is-invalid @enderror" id="capacity6" placeholder="Capacity" name="capacity6" value="{{ old('capacity6') }}">
                                                
                                                @error('capacity6')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income6') is-invalid @enderror" id="income6" placeholder="Income" name="income6" value="{{ old('income6') }}">
                                                
                                                @error('income6')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>





                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter7') is-invalid @enderror" id="chapter7" placeholder="Chapter Name" name="chapter7" value="{{ old('chapter7') }}">
                                            
                                            @error('chapter7')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day7') is-invalid @enderror" name="day7" id="day7">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day7')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        
                                        <td>
                                            <input type="number" class="form-control @error('capacity7') is-invalid @enderror" id="capacity7" placeholder="Capacity" name="capacity7" value="{{ old('capacity7') }}">
                                                
                                                @error('capacity7')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income7') is-invalid @enderror" id="income7" placeholder="Income" name="income7" value="{{ old('income7') }}">
                                                
                                                @error('income7')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>





                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter8') is-invalid @enderror" id="chapter8" placeholder="Chapter Name" name="chapter8" value="{{ old('chapter8') }}">
                                            
                                            @error('chapter8')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day8') is-invalid @enderror" name="day8" id="day8">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day8')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                       
                                        <td>
                                            <input type="number" class="form-control @error('capacity8') is-invalid @enderror" id="capacity8" placeholder="Capacity" name="capacity8" value="{{ old('capacity8') }}">
                                                
                                                @error('capacity8')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income8') is-invalid @enderror" id="income8" placeholder="Income" name="income8" value="{{ old('income8') }}">
                                                
                                                @error('income8')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>





                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter9') is-invalid @enderror" id="chapter9" placeholder="Chapter Name" name="chapter9" value="{{ old('chapter9') }}">
                                            
                                            @error('chapter9')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day9') is-invalid @enderror" name="day9" id="day9">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day9')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                       
                                        <td>
                                            <input type="number" class="form-control @error('capacity9') is-invalid @enderror" id="capacity9" placeholder="Capacity" name="capacity9" value="{{ old('capacity9') }}">
                                                
                                                @error('capacity9')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income9') is-invalid @enderror" id="income9" placeholder="Income" name="income9" value="{{ old('income9') }}">
                                                
                                                @error('income9')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>




                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter10') is-invalid @enderror" id="chapter10" placeholder="Chapter Name" name="chapter10" value="{{ old('chapter10') }}">
                                            
                                            @error('chapter10')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                       
                                        <td>
                                            <select class="select form-control @error('day10') is-invalid @enderror" name="day10" id="day10">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day10')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        
                                        <td>
                                            <input type="number" class="form-control @error('capacity10') is-invalid @enderror" id="capacity10" placeholder="Capacity" name="capacity10" value="{{ old('capacity10') }}">
                                                
                                                @error('capacity10')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income10') is-invalid @enderror" id="income10" placeholder="Income" name="income10" value="{{ old('income10') }}">
                                                
                                                @error('income10')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>




                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter11') is-invalid @enderror" id="chapter11" placeholder="Chapter Name" name="chapter11" value="{{ old('chapter11') }}">
                                            
                                            @error('chapter11')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        
                                        <td>
                                            <select class="select form-control @error('day11') is-invalid @enderror" name="day11" id="day11">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day11')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        
                                        <td>
                                            <input type="number" class="form-control @error('capacity11') is-invalid @enderror" id="capacity11" placeholder="Capacity" name="capacity11" value="{{ old('capacity11') }}">
                                                
                                                @error('capacity11')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income11') is-invalid @enderror" id="income11" placeholder="Income" name="income11" value="{{ old('income11') }}">
                                                
                                                @error('income11')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>





                                    <tr>
                                        <td>
                                            <input type="text" class="form-control @error('chapter12') is-invalid @enderror" id="chapter12" placeholder="Chapter Name" name="chapter12" value="{{ old('chapter12') }}">
                                            
                                            @error('chapter12')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <select class="select form-control @error('day12') is-invalid @enderror" name="day12" id="day12">
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                             </select>
                                            @error('day12')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        
                            
                                        <td>
                                            <input type="number" class="form-control @error('capacity12') is-invalid @enderror" id="capacity12" placeholder="Capacity" name="capacity12" value="{{ old('capacity12') }}">
                                                
                                                @error('capacity12')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('income12') is-invalid @enderror" id="income12" placeholder="Income" name="income12" value="{{ old('income12') }}">
                                                
                                                @error('income12')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table> --}}

                        
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
                        <button class="btn btn-primary" type="submit">Submit Report</button>
                    </form>
                </div>
            </div>
            <!-- /Server Side Validation -->
            
           
            
        </div>
    </div>
    <!-- /Row -->
@endsection