
@extends('layouts.app')
 <style>
            html, body {
                background-color: #E9967A;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            </style>
@section('content')
@if(Auth::user()->usertype == 'admin')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Post a Job')}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('job.add')}}" method="post">
            @csrf
            <!--TITLE-->
                <div class="form-group">
                    <label for="titleInput">{{__('Title:')}}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autocomplete="title" autofocus id="titleInput" placeholder="Title" name="title">
                    
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <!--DESCRIPTION-->
                <div class="form-group">

                    <label for="degreeInput">{{__('Description:')}}</label><br>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus name="description" id="descriptionInput" rows="5"
                              placeholder="Description"></textarea>
                              
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                </div>
                <div class="form-row align-items-center">
                    <div class="col-md-6 mb-3">
                        <!--COMPANY-->
                        <label for="companyInput">{{__('Company Name:')}}</label>
                        <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="comapny" autofocus id="companyInput" placeholder="Company Name">
                        
                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <!--LOCATION-->
                    <div class="col-md-6 mb-3">
                        <label for="locationInput">{{__('Location:')}}</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required autocomplete="location" autofocus id="locationInput" placeholder="Location"
                               name="location">
                               
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <!--TYPE-->
                        <label for="typeInput">{{__('Type:')}}</label>
                        <select class="form-control" id="typeInput" name="type">
                            <option value="Remote">Remote</option>
                            <option value="On-Ground">On Ground</option>
                        </select>
                        
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <!--PAY-->
                        <label for="payInput">{{__('Pay Range:')}}</label>
                        <input type="text" class="form-control @error('pay_range') is-invalid @enderror" value="{{ old('pay_range') }}" required autocomplete="pay_range" autofocus id="payInput" placeholder="Pay Range" name="pay_range">
                        
                                @error('pay_range')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <!--EMPLOYMENT-->
                        <label for="employmentInput">{{__('Employment Type:')}}</label>
                        <select class="form-control" id="employmentInput" name="employment">
                            <option value="Full-Time">{{__('Full-Time')}}</option>
                            <option value="Part-Time">{{__('Part Time')}}</option>
                            <option value="	Seasonal">{{__('Seasonal')}}</option>
                            <option value="Internship">{{__('Internship')}}</option>
                            <option value="Other">{{__('Other')}}</option>
                        </select>
                        
                                @error('employment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <!-- CONTACT PHONE NUMBER -->
                    <div class="col-md-6 mb-3">
                        <label for="phoneInput">{{__('Contact Phone Number:')}}</label>
                        <input type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" autofocus id="phoneInput" placeholder="Contact Phone Number">
                                
                                @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <!-- CONTACT EMAIL ADDRESS -->
                    <div class="col-md-6 mb-3">
                        <label for="emailInput">{{__('Contact Email Address:')}}</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="emailInput" placeholder="Contact Email Address">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
            
                <td align="center">
                        <form action="{{action('JobController@addJob')}}" method="post"> 
                             @csrf 
                           
                            <button class="btn btn-danger" type="submit">Add</button> 
                      </form> 
                     </td> 
            </form>
        </div>
    </div>
    @else
        <h1 class="h1" align="center">Unauthorized Access</h1>
    
    @endif
@endsection
