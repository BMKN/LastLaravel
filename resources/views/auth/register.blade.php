@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Register') }}
                    @isset($courseUrl)
                        for {{$courseUrl->name}}
                    @endisset
                </div>
                <div class="card-body">



                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="courseModule" class="col-md-4 col-form-label pt-2 text-md-end">{{ __('Course Module') }}</label>

                            <div class="col-md-6">

                                <select name="courseModule"   id="courseModule" class="form-control">
                                    @isset($courseUrl)
                                        <option value='{{$courseUrl->name}}'>{{$courseUrl->name}}</option>
                                    @endisset
                                    @isset($regCourses)
                                        @foreach($regCourses as $course)
                                                <option disabled selected value> -- select a module -- </option>
                                                <option value='{{$course->name}}'>{{$course->name}}</option>
                                        @endforeach
                                    @endisset
                                </select>

                            @error('courseModule')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lectureHandouts" class="col-md-4 col-form-label text-md-end">{{ __('Lecture Handouts') }}</label>

                            <div class="col-md-6">
                                <select name="lectureHandouts"   id="lectureHandouts" class="form-control">
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>

                                </select>

                                @error('lectureHandouts')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="collegeChoice" class="col-md-4 col-form-label text-md-end">{{ __('College Choice') }}</label>

                            <div class="col-md-6">
                                <select name="collegeChoice"   id="collegeChoice" class="form-control">
                                    <option disabled selected value> -- select a college -- </option>
                                    <option value="TCD">TCD</option>
                                    <option value="UCD">UCD</option>
                                    <option value="UCC">UCC</option>
                                    <option value="UCG">UCG</option>
                                    <option value="NUIM">NUIM</option>
                                    <option value="NUIG">NUIG</option>
                                    <option value="Teagasc">Teagasc</option>
                                    <option value="RCSI">RCSI</option>
                                    <option value="DCU">DCU</option>
                                    <option value="other">other</option>
                                </select>

                                @error('collegeChoice')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}"  autocomplete="department" autofocus>

                                @error('department')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="supplyBooks" class="col-md-4 col-form-label text-md-end">{{ __('Supply Bookts at €85') }}</label>

                            <div class="col-md-6">
                                <select name="supplyBooks"   id="supplyBooks" class="form-control">
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>

                                @error('supplyBooks')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="methodofPayment" class="col-md-4 col-form-label text-md-end">{{ __('Method of Payment') }}</label>

                            <div class="col-md-6">
                                <select name="methodofPayment"   id="methodofPayment" class="form-control">
                                    <option disabled selected value> -- select a payment type -- </option>
                                    <option value="Purchase order">Purchase order</option>
                                    <option value="redit card">Credit card</option>
                                </select>

                                @error('methodofPayment')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="MobileNumber" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="MobileNumber" type="text" class="form-control @error('MobileNumber') is-invalid @enderror" name="MobileNumber" value="{{ old('MobileNumber') }}"  autocomplete="MobileNumber" autofocus>

                                @error('MobileNumber')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" á autocomplete="new-password">
                            </div>
                        </div>
                        {{--address block start --}}
                        <div class="row mb-3">
                            <label for="addressLine1" class="col-md-4 col-form-label text-md-end">{{ __('Address Line 1') }}</label>
                            <div class="col-md-2">
                                <input id="addressLine1" type="text" class="form-control @error('addressLine1') is-invalid @enderror" name="addressLine1" value="{{ old('addressLine1') }}"  autocomplete="addressLine1" autofocus>

                                @error('addressLine1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="addressLine2" class="col-md-2 col-form-label text-md-end">{{ __('Address Line 2') }}</label>

                            <div class="col-md-2">
                                <input id="addressLine2" type="text" class="form-control @error('addressLine2') is-invalid @enderror" name="addressLine2" value="{{ old('addressLine2') }}"  autocomplete="addressLine2" autofocus>

                                @error('addressLine2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-2">
                                <input id="Country" type="text" class="form-control @error('Country') is-invalid @enderror" name="Country"  autocomplete="Country">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="city" class="col-md-2 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-2">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"  autocomplete="city">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="eirCode" class="col-md-4 col-form-label text-md-end">{{ __('Eircode') }}</label>

                            <div class="col-md-6">
                                <input id="eirCode" type="text" class="form-control @error('eirCode') is-invalid @enderror" name="eirCode"  autocomplete="eirCode">

                                @error('eirCode')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--address block finish --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
