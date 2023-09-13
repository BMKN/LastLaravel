<!DOCTYPE html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script><link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@extends('layouts.app')
@section('content')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="#" id = "add-course" class="nav-link ">Create Course</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" id = "export-csv" class="nav-link" >Export CSV</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" id = "mass-course-email" class="nav-link" >Email Course</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" id = "custom-email-template" class="nav-link" >Email Customiser</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" id = "search-course" class="nav-link" >Search Course</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>

                    </div>


                    <div class="card-body">
                        <form method="POST" action="/edit">
                            @csrf
                            <div class="row mb-3">
                                <label for="search" class="col-md-4 col-form-label text-md-end">{{ __('Search') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="Search" type="text" class="form-control @error('Search') is-invalid @enderror" name="Search" value="{{ old('Search Student') }}" required autocomplete="email" autofocus>
                                        <button id="clearSearch" class="btn btn-outline-secondary" type="button">Clear Filter</button>
                                    </div>
                                    @error('Search')
                                    <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="Search btn btn-primary">
                                        {{ __('Search') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body results" style = "display: none;">
                        <div class="row mb-3">

                        <h4 class="text-center">This is Student results below</h4>

                            <table id="mt" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Sms</th>
                                    <th>Create sumup link</th>
{{--                                    <th>Create invoice</th>--}}
                                    <th>Upload cert</th>
                                    <th>Create cert</th>


                                </tr>

                                </thead>
                                <tbody>
                                <tr>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal" id  = "edit-student-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title student-name"> </h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                                <div class="row mb-3">
                                    <span class="badge badge-success" style="display: none;">Success</span>
                                    <label for="Name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <input id="id" type="hidden" >

                                    <div class="col-md-6">
                                        <input id="Name" type="text" class="form-control" name="Name">
                                    </div>
                                    <label for="Email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email">
                                    </div>
                                    <label for="MobileNumber" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

                                    <div class="col-md-6">
                                        <input id="MobileNumber" type="MobileNumber" class="form-control" name="MobileNumber">
                                    </div>
                                    <label for="lectureHandouts" class="col-md-4 col-form-label text-md-end">{{ __('Lecture Hand outs') }}</label>

                                    <div class="col-md-6">
                                        <input id="lectureHandouts" type="lectureHandouts" class="form-control" name="lectureHandouts">
                                    </div>
                                    <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                                    <div class="col-md-6">
                                        <input id="department" type="department" class="form-control" name="department">
                                    </div>
                                    <label for="supplyBooks" class="col-md-4 col-form-label text-md-end">{{ __('Books') }}</label>

                                    <div class="col-md-6">
                                        <input id="supplyBooks" type="supplyBooks" class="form-control" name="supplyBooks">
                                    </div>
                                    <label for="methodofPayment" class="col-md-4 col-form-label text-md-end">{{ __('Payment Type') }}</label>

                                    <div class="col-md-6">
                                        <input id="methodofPayment" type="methodofPayment" class="form-control" name="methodofPayment">
                                    </div>
                                    <label for="collegeChoice" class="col-md-4 col-form-label text-md-end">{{ __('College') }}</label>

                                    <div class="col-md-6">
                                        <input id="collegeChoice" type="collegeChoice" class="form-control" name="collegeChoice">
                                    </div>
                                    <label for="addressLine1" class="col-md-4 col-form-label text-md-end">{{ __('Address Line 1') }}</label>

                                    <div class="col-md-6">
                                        <input id="addressLine1" type="addressLine1" class="form-control" name="addressLine1">
                                    </div>
                                    <label for="addressLine2" class="col-md-4 col-form-label text-md-end">{{ __('Address Line 2') }}</label>

                                    <div class="col-md-6">
                                        <input id="addressLine2" type="addressLine2" class="form-control" name="addressLine2">
                                    </div>
                                    <label for="Country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <input id="Country" type="Country" class="form-control" name="Country">
                                    </div>
                                    <label for="eirCode" class="col-md-4 col-form-label text-md-end">{{ __('Eircode') }}</label>

                                    <div class="col-md-6">
                                        <input id="eirCode" type="eirCode" class="form-control" name="eirCode">
                                    </div>


                                    <label for="module-0" class="col-md-4 col-form-label text-md-end">{{ __('Module 0') }}</label>

                                    <div class="col-md-6">
                                        <input id="module-0" type="module-0" class="form-control" name="module-0">
                                    </div>
                                    <label for="module-1" class="col-md-4 col-form-label text-md-end">{{ __('Module 1') }}</label>

                                    <div class="col-md-6">
                                        <input id="module-1" type="module-1" class="form-control" name="module-1">
                                    </div>
                                    <label for="module-2" class="col-md-4 col-form-label text-md-end">{{ __('Module 2') }}</label>

                                    <div class="col-md-6">
                                        <input id="module-2" type="module-2" class="form-control" name="module-2">
                                    </div>
                                    <label for="module-3" class="col-md-4 col-form-label text-md-end">{{ __('Module 3') }}</label>

                                    <div class="col-md-6">
                                        <input id="module-3" type="module-3" class="form-control" name="module-3">
                                    </div>
                                    <label for="module-4" class="col-md-4 col-form-label text-md-end">{{ __('Course Module 4') }}</label>

                                    <div class="col-md-6">
                                        <input id="course_module" type="course_module" class="form-control" name="course_module">
                                    </div>
                                    <label for="pain_module" class="col-md-4 col-form-label text-md-end">{{ __('Pain Module') }}</label>

                                    <div class="col-md-6">
                                        <input id="pain_module" type="pain_module" class="form-control" name="pain_module">
                                    </div>
                                    <label for="uk_legal" class="col-md-4 col-form-label text-md-end">{{ __('Uk Legal') }}</label>

                                    <div class="col-md-6">
                                        <input id="uk_legal" type="uk_legal" class="form-control" name="uk_legal">
                                    </div>
                                    <label for="species_specific" class="col-md-4 col-form-label text-md-end">{{ __('Species Specific ') }}</label>

                                    <div class="col-md-6">
                                        <input id="species_specific" type="species_specific" class="form-control" name="species_specific">
                                    </div>
                                    <label for="comment_on_results" class="col-md-4 col-form-label text-md-end">{{ __('Comment on results ') }}</label>

                                    <div class="col-md-6">
                                        <input id="comment_on_results" type="comment_on_results" class="form-control" name="comment_on_results">
                                    </div>
                                    <label for="invoice_number" class="col-md-4 col-form-label text-md-end">{{ __('invoice number') }}</label>

                                    <div class="col-md-6">
                                        <input id="invoice_number" type="invoice_number" class="form-control" name="invoice_number">
                                    </div>
                                    <label for="species_specific_1" class="col-md-4 col-form-label text-md-end">{{ __('Species Specific 1') }}</label>

                                    <div class="col-md-6">
                                        <input id="species_specific_1" type="species_specific_1" class="form-control" name="species_specific_1">
                                    </div>
                                    <label for="species_specific_2" class="col-md-4 col-form-label text-md-end">{{ __('Species Specific 2') }}</label>

                                    <div class="col-md-6">
                                        <input id="species_specific_2" type="species_specific_2" class="form-control" name="species_specific_2">
                                    </div>

                                    <label for="date_of_course" class="col-md-4 col-form-label text-md-end">{{ __('Date of course') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_of_course" type="date_of_course" class="form-control" name="date_of_course">
                                    </div>


                                    <label for="course_name" class="col-md-4 col-form-label text-md-end">{{ __('Course Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="course_name" type="course_name" class="form-control" name="course_name">
                                    </div>
                                    <label for="student_comments" class="col-md-4 col-form-label text-md-end">{{ __('Student Comments') }}</label>

                                    <div class="col-md-6">
                                        <input id="student_comments" type="student_comments" class="form-control" name="student_comments">
                                    </div>
                                    <label for="handling" class="col-md-4 col-form-label text-md-end">{{ __('Handling') }}</label>

                                    <div class="col-md-6">
                                        <input id="handling" type="handling" class="form-control" name="handling">
                                    </div>
                                    <label for="date_of_exam" class="col-md-4 col-form-label text-md-end">{{ __('Date of exam') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_of_exam" type="date_of_exam" class="form-control" name="date_of_exam">
                                    </div>
                                    <label for="date_of_uk_exam" class="col-md-4 col-form-label text-md-end">{{ __('Date of uk exam') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_of_uk_exam" type="date_of_uk_exam" class="form-control" name="date_of_uk_exam">
                                    </div>

                                </div>
                            </div>
                            <div class="alert alert-success text-center" role="alert" style="display: none;">
                                Student data saved
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary save-edit">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id  = "custom-email" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title save-email"> </h5>

                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label for="course-title" class="col-md-4 col-form-label text-md-end">{{ __('Course Title') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select" id ="course-title"name = "course-title" >
                                                @isset($coursesNames)
                                                    <option disabled selected value> -- select an option -- </option>
                                                    @foreach($coursesNames as $course)
                                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <label for="course-date" class="col-md-4 col-form-label text-md-end">{{ __('Course date') }}</label>

                                        <div class="col-md-6">
                                            <input id="course-date" type="date" class="form-control" name="course-date">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-success custom-email-alert text-center" role="alert" style="display: none;">
                                SMS sent
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary save-email-data">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id  = "send-sms-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title send-sms"> </h5>

                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="sms-number" class="col-md-4 col-form-label text-md-end">{{ __('Student Mobile') }}</label>

                                    <div class="col-md-6">
                                        <input id="sms-number" type="text" class="form-control" name="sms-number">

                                    </div>
                                    <label for="Student-name" class="col-md-4 col-form-label text-md-end">{{ __('Student Name') }}</label>

                                    <div class="col-md-6">
                                    <input id="Student-name" type="text" class="form-control" name="Student-name">
                                </div>
                                    <label for="student-subject" class="col-md-4 col-form-label text-md-end">{{ __('Subject') }}</label>

                                    <div class="col-md-6">
                                        <input id="student-subject" type="text" class="form-control" name="student-subject">
                                        <input id="student-id-sms" type="text" class="form-control" name="student-id-sms">
                                    </div>
                                    <label for="sms-body" class="col-md-4 col-form-label text-md-end">{{ __('Message for Student') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="sms-body"  name="sms-body" rows="4" cols="50"></textarea>
                                    </div>

                            </div>
                            </div>
                            </div>
                            <div class="alert alert-success sms-alert text-center" role="alert" style="display: none;">
                                SMS sent
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary save-sms-send">Send SMS</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id  = "send-course-email" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                                <h5 class="modal-title send-course-email"> </h5>

                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="course-select-email" >{{ __('Select Course for email') }}</label>
                                            <select class="form-select" id ="course-select-email"name = "course-select-exemail" >
                                                @isset($coursesNames)
                                                         <option disabled selected value> -- select an option -- </option>
                                                    @foreach($coursesNames as $course)
                                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>

                                        </div>
                                    </div>

                                    <label for="email-list" >{{ __('Select Students to email') }}</label>

                                    <select class="js-example-basic-single form-control" name="emails[]"   multiple="multiple"></select>

                                    <label for="student-subject" >{{ __('Subject') }}</label>
                                            <input id="send-course-email-subject" type="text" class="form-control" name="student-subject">
                                            <label for="email-body" >{{ __('Message for Students') }}</label>
                                    <textarea class="form-control" id="send-course-email-subject"  name="sms-body" rows="4" cols="50"></textarea>

                                    <div class="alert alert-success email-alert text-center" role="alert" style="display: none;">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary send-mass-email">Send Email</button>
                            </div>
                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>

            <div class="modal" id  = "create-sumup-link" tabindex="-1" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create SumUp link</h5>
                        </div>
                        <div class="modal-body">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Amount to pay') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price">
                            </div>
                            <div class="col-md-6">
                                <input id="student-id" type="text" class="student-id" name="student-id">
                            </div>
                            <label for="email-Sumup" class="col-md-4 col-form-label text-md-end">{{ __('Email ') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="email-Sumup"  name="email-Sumup" rows="4" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="alert alert-success course-created text-center" role="alert" style="display: none;">
                            Link created and sent
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary create-link">Create link</button>
                            <button type="button" class="btn btn-secondary course-close" data-dismiss="modal"aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>

                <div class="modal" id  = "create-course" tabindex="-1" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Course</h5>
                            </div>
                            <div class="modal-body">
                                <label for="course-name" class="col-md-4 col-form-label text-md-end">{{ __('Course Name') }}</label>

                                <div class="col-md-6">
                                    <input id="course-name" type="text" class="form-control" name="course-name">
                                </div>

                                <label for="Subject" class="col-md-4 col-form-label text-md-end">{{ __('Subject') }}</label>

                                <div class="col-md-6">
                                    <input id="subject-course" type="text" class="form-control" name="subject-course">
                                </div>
                            </div>
                            <div class="alert alert-success course-created text-center" role="alert" style="display: none;">
                                Course Added
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary save-course">Create course</button>
                                <button type="button" class="btn btn-secondary course-close" data-dismiss="modal"aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal" id="search-courses" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Search Courses</h5>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input id="search-course-name" type="text" class="form-control" name="course-name">
                                <button class="btn btn-danger" type="button" id="clear-search">
                                    <i class="fas fa-times">X</i>
                                </button>
                            </div>
                        </div>
                        <div class="alert alert-success course-searched-data col-md-12" role="alert" style="display: none;">
                            <!-- Your alert content here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary search-course-btn">Search</button>
                            <button type="button" class="btn btn-secondary search-course-close" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>

                <div class="modal" id  = "edit-search-courses" tabindex="-1" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title course-title"></h5>
                            </div>
                            <div class="modal-body">
                                <label for="search-course-name" class="col-md-4 col-form-label text-md-end">{{ __('Edit Course') }}</label>

                                <div class="col-md-12">
                                    <label for="search-course-name" class="col-md-12 col-form-label ">{{ __('Edit Course Name') }}</label>

                                    <input id="Edit-course-name" type="text" class="form-control" name="Edit-course-name">
                                </div>

                                <div class="col-md-12">
                                    <label for="search-course-name" class="col-md-12 col-form-label ">{{ __('Edit Course Subject') }}</label>

                                    <textarea id="Edit-course-subject" type="text" class="form-control" name="Edit-course-subjecte"></textarea>

                                </div>

                                <div class="col-md-12">
                                    <label for="search-course-name" class="col-md-12 col-form-label ">{{ __('Edit Course Content') }}</label>

                                    <input id="Edit-course-content" type="text" class="form-control" name="Edit-course-content">
                                </div>

                            </div>
                            <div class="alert alert-success course-searched-data-saved col-md-12" role="alert" style="display: none;">


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary Edit-course-btn">Save</button>
                                <button type="button" class="btn btn-secondary edit-search-course-close" data-dismiss="modal"aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id  = "create-post" tabindex="-1" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Post</h5>
                            </div>
                            <div class="modal-body">
                                <label for="course-name" class="col-md-4 col-form-label text-md-end">{{ __('Post Title') }}</label>

                                <div class="col-md-6">
                                    <input id="post-name" type="text" class="form-control" name="post-name">
                                </div>

                                <label for="Subject" class="col-md-4 col-form-label text-md-end">{{ __('Subject') }}</label>

                                <div class="col-md-6">
                                    <input id="post-subject" type="text" class="form-control" name="post-subject">
                                </div>
                                <label for="Subject" class="col-md-4 col-form-label text-md-end">{{ __('Post Content') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="post-content" name="post-content" rows="4" cols="50">                                        </textarea>                                </div>
                            </div>
                            <div class="alert alert-success post-created text-center" role="alert" style="display: none;">
                                Post Added
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary save-post">Create post</button>
                                <button type="button" class="btn btn-secondary post-close" data-dismiss="modal"aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="modal" id="export-to-csv" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Export to CSV</h5>
                        </div>
                        <div class="filter container">
                            <div class="col-4 text-center">
                                <div class="row">
                                    <label for="course-select-export">{{ __('Select Course') }}</label>
                                    <select class="form-select" id="course-select-export" name="course-select-export">
                                        @isset($coursesNames)
                                            <option disabled selected value>-- select an option --</option>
                                            @foreach($coursesNames as $course)
                                                <option value="{{$course->name}}">{{$course->name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-body export-results">
                            <div class="row mb-3">
                                <h4 class="text-center csv-header"></h4>
                                <table id="student-export-table" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>select</th>

                                        <th>
                                            Select All <span class="st-count"></span> <input class="select-all" type="checkbox" checked>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Course</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary export">Export</button>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal" id = "cert-portal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Upload Cert</h5>

                            </div>
                            <div class="modal-body">
                                <form  action="{{ route('FileUpload') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf <!-- {{ csrf_field() }} -->
                                    <input type="file" name="Cert" class="form-control"/>
                                    <input type="hidden" class = "student-cert-id" name="student-cert-id" class="form-control"/>

                                    <button type="submit" class="btn btn-primary cert-upload pt-2" >Upload cert</button>

                                    <div class="col-12">
                                        <span >Would you like to send email when and link when uploaded?</span>
                                        <input name="send-upload-email-cert" type="checkbox" value="1" id="flexCheckDefault">

                                    </div>

                                </form>
                            </div>
                            @isset($successMessage)
                            <div class="alert alert-success text-center" role="alert" >
                                {{$successMessage}}
                            </div>
                            @endisset
                            @isset($errorMessage)
                            <div class="alert alert-danger text-center" role="alert" >
                                {{$errorMessage}}
                            </div>
                            @endisset
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary close-cert-portal" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


@endsection
            <script type="text/javascript">
                tinymce.init({
                    selector: 'textarea.tinymce-editor',
                    height: 300,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount', 'image'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            </script>
<script>

    $( document ).ready(function() {
        $( ".Search" ).click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var search = $('#Search').val();
            $.ajax({
                type:'POST',
                url:"/edit",
                data:{search:search},
                success:function(data){
                    $('.results').fadeIn();
                    var json = JSON.parse(data);
                    for (let i = 0; i < json.length; i++) {
                        var studentId =  '<input type = "hidden" value = "'+json[i]['id']+'" class="get-id"> ';

                        var stundeditIcon = '<img class ="edit-student"src="/Icons/edit.png" style = "max-height:25px;" >';
                        var sendSMS = '<img class ="send-sms" src="/Icons/sms-icon.svg" style = "max-height:25px;" >';
                        var fileupload = '<img class ="upload-file" src="/Icons/upload.svg" style = "max-height:25px;" >';
                        var createIrishCert = '<img class ="create-cert" src="/Icons/cert.png" style = "max-height:25px;" >';
                        var sumpUp = '<img class ="create-sum-up-link" src="/Icons/Sumpup.png" style = "max-height:25px;" >';
                        var wave = '<img class ="wave" src="/Icons/wave.png" style = "max-height:25px;" >';
                        var row = $('<tr><td >'+json[i]['id']+'</td><td>'+json[i]['name']+'</td><td>'+json[i]['email']+'</td><td> '+stundeditIcon+' </td><td> '+sendSMS+' </td><td> '+sumpUp+' </td> <td> '+studentId+' </td><td> '+fileupload+' </td><td> '+createIrishCert+' </td></td></tr>');

                        $("#mt > tbody").append(row);

                    }
                }
            });

        });


        $(document).on('click','.edit-student',function(){

            $('#edit-student-modal').modal('show');
            var index = $(".edit-student").index(this)+1;
            var id = $(this).closest('tr').find('.get-id').val();

            $.ajax({
                type:'POST',
                url:"/showStudent",
                data:{id:id},
                success:function(data){
                    $('#edit-student-modal').modal('show');
                    var student = $.parseJSON(data);
                    $('.student-name').html('Your are Editing '+student[0].name);
                    $('#Name').val(student[0].name);
                    $('#id').val(student[0].id);
                    $('#email').val(student[0].email);
                    $('#MobileNumber').val(student[0].MobileNumber);
                    $('#lectureHandouts').val(student[0].lectureHandouts);
                    $('#department').val(student[0].department);
                    $('#supplyBooks').val(student[0].supplyBooks);
                    $('#methodofPayment').val(student[0].methodofPayment);
                    $('#collegeChoice').val(student[0].collegeChoice);
                    $('#addressLine1').val(student[0].addressLine1);
                    $('#addressLine2').val(student[0].addressLine2);
                    $('#Country').val(student[0].Country);
                    $('#eirCode').val(student[0].eirCode);
                    $('#module-0').val(student[0].module_0);
                    $('#module-1').val(student[0].module_1);
                    $('#module-2').val(student[0].module_2);
                    $('#module-3').val(student[0].module_3);
                    $('#module-4').val(student[0].module_4);
                    $('#course_module').val(student[0].course_module);
                    $('#pain_module').val(student[0].pain_module);
                    $('#uk_legal').val(student[0].uk_legal);
                    $('#species_specific_1').val(student[0].species_specific_1);
                    $('#species_specific_2').val(student[0].species_specific_2);
                    $('#species_specific').val(student[0].species_specific);
                    $('#student_comments').val(student[0].student_comments);
                    $('#handling').val(student[0].handling);
                    $('#date_of_exam').val(student[0].date_of_exam);
                    $('#date_of_uk_exam').val(student[0].date_of_uk_exam);
                    $('#comment_on_results').val(student[0].comment_on_results);
                    $('#invoice_number').val(student[0].invoice_number);
                    $('#date_of_course').val(student[0].date_of_course);
                }
            });


        });
        tinymce.init({
            selector: 'textarea#Edit-course-subject', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
        $('#clearSearch').on('click', function() {
            // Clear the value of Search input
            $('#Search').val('');
        });

        $(document).on('click','.save-edit',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var id = $('#id').val();
            var name = $('#Name').val();
            var email = $('#email').val();
            var mobile = $('#MobileNumber').val();
            var department = $('#department').val();
            var lectureHandouts = $('#lectureHandouts').val();
            var supplyBooks = $('#supplyBooks').val();
            var methodofPayment = $('#methodofPayment').val();
            var collegeChoice = $('#collegeChoice').val();
            var addressLine1 = $('#addressLine1').val();
            var addressLine2 = $('#addressLine2').val();
            var Country = $('#Country').val();
            var eirCode = $('#eirCode').val();
            var module0 = $('#module-0').val();
            var module1 = $('#module-1').val();
            var module2 = $('#module-2').val();
            var module3 = $('#module-3').val();
            var module4 = $('#module-4').val();
            var course_module = $('#course_module').val();
            var pain_module = $('#pain_module').val();
            var uk_legal = $('#uk_legal').val();
            var species_specific_1 = $('#species_specific_1').val();
            var species_specific_2 = $('#species_specific_2').val();
            var course_name = $('#course_name').val();
            var species_specific = $('#species_specific').val();
            var student_comments = $('#student_comments').val();
            var handling = $('#handling').val();
            var date_of_exam = $('#date_of_exam').val();
            var date_of_uk_exam = $('#date_of_uk_exam').val();
            var comment_on_results = $('#comment_on_results').val();
            var invoice_number = $('#invoice_number').val();
            var date_of_course = $('#date_of_course').val();
            $.ajax({
                type:'POST',
                url:"/update-student",
                data:{
                    id:id,
                    name:name,
                    email:email,
                    mobile:mobile,
                    department:department,
                    lectureHandouts:lectureHandouts,
                    supplyBooks:supplyBooks,
                    methodofPayment:methodofPayment,
                    collegeChoice:collegeChoice,
                    addressLine1:addressLine1,
                    addressLine2:addressLine2,
                    Country:Country,
                    eirCode:eirCode,
                    module0:module0,
                    module1:module1,
                    module2:module2,
                    module3:module3,
                    module4:module4,
                    course_module:course_module,
                    pain_module:pain_module,
                    uk_legal:uk_legal,
                    species_specific_1:species_specific_1,
                    species_specific_2:species_specific_2,
                    course_name:course_name,
                    species_specific:species_specific,
                    student_comments:student_comments,
                    handling:handling,
                    date_of_exam:date_of_exam,
                    date_of_uk_exam:date_of_uk_exam,
                    comment_on_results:comment_on_results,
                    invoice_number:invoice_number,
                    date_of_course:date_of_course,

                        },
                success:function(student){
                     var student = $.parseJSON(student);
                    $('.alert-success').text(student.name+' has been updated');
                    $('.alert-success').fadeIn().delay(1000).fadeOut();

                }
            });

         });
        $(document).on('click','.send-sms',function(e){
            e.preventDefault();
            var index = $(".edit-student").index(this)+1;
            var courseName = $('#course-select-email').val();
            var smsbody  = $('#sms-body').val();
            $('#send-sms-modal').modal('show');
            $.ajax({
                type:'POST',
                url:"/sms-info",
                data:{
                    id:id,
                    smsbody:smsbody,
                    studentsubject:studentsubject

                },
                success:function(studentSms){
                    var studentSms = $.parseJSON(studentSms);
                    $('#Student-name').val(studentSms.name);
                    $('#sms-number').val(studentSms.MobileNumber);
                    $('#student-id-sms').val(id);

                }
            });

        });

        $(document).on('click','.create-sum-up-link',function(e){
            $('#create-sumup-link').modal('show');

        });


        $(document).on('click','.create-sum-up-link',function(e){
            e.preventDefault();
            var index = $(".edit-student").index(this)+1;
            var id = $(".edit-student").closest('tr').find('.get-id').val();
            $('.student-id').val(id);
            var price = $('#price').val();
            $.ajax({
                type:'POST',
                url:"/create-sumup",
                data:{
                    price:price,
                    id:id

                },
                success:function(){


                }
            });

        });

        $(document).on('click','.wave',function(e){
            e.preventDefault();
            var index = $(".edit-student").index(this)+1;
            var id = $(".edit-student").closest('tr').find('.get-id').val();

            $.ajax({
                type:'POST',
                url:"/create-invoice",
                data:{
                    id:id

                },
                success:function(){


                }
            });

        });

        $(document).on('click','.create-link',function(e){
            e.preventDefault();
            var id = $('.student-id').val();
            var price = $('#price').val();
            $.ajax({
                type:'POST',
                url:"/create-sumup-link",
                data:{
                    price:price,
                    id:id

                },
                success:function(){


                }
            });

        });
        $(document).on('click','#custom-email-template',function(e){

            $('#custom-email').modal('show');


        });

        $(document).on('click','.edit-course',function(e){

            $('#edit-search-courses').modal('show');

            var courseName = $(this).closest('.row').find('.course-name').first();
            var courseSubject = $(this).closest('.row').find('.course-subject').first().val();
            var courseContent = $(this).closest('.row').find('.course-content').first().val();
            var courseName = courseName.val();
            $('#Edit-course-name').val(courseName);
            $('#Edit-course-subject').text(courseSubject);
            $('#Edit-course-content').val(courseContent);
            $('#edit-search-courses #Edit-course-content').val(sessionStorage.getItem('courseContent'));

        });

        $(document).on('click','#search-course',function(e){

            $('#search-courses').modal('show');


        });

        $(document).on('click','.search-course-btn',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $('.course-searched-data').show();

            $.ajax({
                type:'POST',
                url:"/course-search",
                data:{
                    courseName:$('#search-course-name').val()

                },
                success:function(courses){
                    var json = JSON.parse(courses);

                    for (let i = 0; i < json.length; i++) {

                        $('.course-searched-data').append('<input type="hidden" value = "'+json[i]['id']+'" name = "id" class = "course-id col-4">  ');
                        $('.course-searched-data').append('<div class="row"><div class="col-4"> <input type="text" value="' + json[i]['name'] + '" name="name" class="form-control course-name"> \n' +
                            '</div> <div class="col-4"> <input type="button" class="btn btn-success form-control mb-4 edit-course" value = "Edit" >\n' +
                            '<input type="hidden" value="' + json[i]['subject'] + '" name="name" class="form-control course-subject"> \n' +
                            '<input type="hidden" value="' + json[i]['content'] + '" name="name" class="form-control course-content">\n' +
                            '</div> </div>');

                    }

                }
            });

        });

        $('#clear-search').on('click', '#clear-search', function () {
            alert();
        })

        $(document).on('click','.Edit-course-btn',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();


            $.ajax({
                type:'POST',
                url:"/course-update",
                data:{
                    courseName:$('#Edit-course-name').val(),
                    courseSubject:$('#Edit-course-subject').val(),
                    courseContent:$('#Edit-course-content').val()

                },
                success:function(editedCourse){
                    var json = JSON.parse(editedCourse);
                    $('.course-searched-data-saved').show().html(json.courseName+' Saved');
                }
            });

        });

        $(document).on('click','.save-email-data',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            console.log($('#course-date').val());

            $.ajax({
                type:'POST',
                url:"/update-email",
                data:{
                    courseId:$('#course-title').val(),
                    courseDate:$('#course-date').val()

                },
                success:function(studentSms){
                    $('.custom-email-alert').show().html('Custom email saved for '+$('#course-title').val()+' '+' at '+$('#course-date').val()+' date');


                }
            });

        });
        $(document).on('click','.send-course-email',function(e){
            e.preventDefault();
            $('#send-course-email').modal('show');
            $.ajax({
                type:'POST',
                url:"/email-mass",
                data:{

                },
                success:function(studentSms){


                }
            });

        });

        $(document).on('click','.send-mass-email',function(e){
            e.preventDefault();
            var emailbody  = $('#email-body').val();
            var studentsubject  = $('#send-course-email-subject').val();
            var courseId  = $('#course-select-email').val();

            $.ajax({
                type:'POST',
                url:"/sendCourseEmail",
                data:{
                    studentsubject:studentsubject,
                    emailbody:emailbody,
                    emails:$('.js-example-basic-single').val(),
                    courseId:courseId
                },
                success:function(){
                    var text ='Emails sent to ';

                    for (let i = 0; i < $('.js-example-basic-single').val().length; i++) {
                        text += $('.js-example-basic-single').val()[i] + "<br>";
                        $('.email-alert').show().html(text);

                    }



                }
            });

        });




        $(document).on('click','.save-sms-send',function(e){
            e.preventDefault();
            var id = $('#student-id-sms').val();
            var smsbody  = $('#sms-body').val();
            var studentsubject  = $('#student-subject').val();
            var mobile = $('#sms-number').val()
            $('.sms-alert').html('SMS sent to '+mobile);
            $.ajax({
                type:'POST',
                url:"/send-sms",
                data:{
                    id:id,
                    mobile:mobile,
                    smsbody:smsbody,
                    studentsubject:studentsubject,

                },
                success:function(sms){
                  $('.sms-alert').fadeIn().delay(1000).fadeOut();
                }
            });

        });
        $(document).on('click','#add-course',function(e){

            $('#create-course').modal('show');


        });
        $(document).on('click','#add-post',function(e){

            $('#create-post').modal('show');


        });

        $(document).on('click','.search-course-close',function(e){

            $('#search-courses').modal('hide');


        });

        $(document).on('click','#clear-search',function(e){

            $('.course-name').val('');
            $('#search-course-name').val('');
            $('#Edit-course-name').val('');
            $('#Edit-course-content').val('');
            $('.course-searched-data').html('');
            $('.course-searched-data').hide();


        });
        $(document).on('click','.edit-search-course-close',function(e){
                 sessionStorage.setItem('courseContent',$('#Edit-course-content').val());
                $('#edit-search-courses').modal('hide');
                $('.course-searched-data-saved').hide();

        });

        $(document).on('click','.upload-file',function(e){
            var id = $(this).closest('tr').find('.get-id').val();
            $('#st-id').val(id);
            $('.student-cert-id').val(id);
            console.log($('#st-id').val(id));

            $('#cert-portal').modal('show');



        });
        $(document).on('click','.close-cert-portal',function(e){

            $('#cert-portal').modal('hide');


        });

        $(document).on('click','.course-close',function(e){

            $('#create-course').modal('hide');


        });
        $(document).on('click','.post-close',function(e){

            $('#create-post').modal('hide');


        });

        $(document).on('click','.course-close',function(e){

            $('#create-course').modal('hide');


        });

        $(document).on('click','.select-all',function(e){



            if ($(this).is(":checked")){
                $('.studentInfoExport').prop('checked', true);
            }else{
                $('.studentInfoExport').prop('checked', false);
            }



        });



        $(document).on('click','.save-course',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $('#create-course').modal('show');
            var courseName = $('#course-name').val();
            var subjectCourse = $('#subject-course').val();
            $.ajax({
                type:'POST',
                url:"/view-course",
                data:{
                    courseName:courseName,
                    subjectCourse:subjectCourse,
                },
                success:function(course){
                    $('.course-created').fadeIn().delay(1000).fadeOut();
                }
            });

        });

        $(document).on('click','.save-post',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $('#create-course').modal('show');
            var postName = $('#post-name').val();
            var subjectPost = $('#post-subject').val();
            var contentPost = $('#post-content').val();
            $.ajax({
                type:'POST',
                url:"/createPosts",
                data:{
                    postName:postName,
                    subjectPost:subjectPost,
                    contentPost:contentPost,
                },
                success:function(post){
                    $('.post-created').fadeIn().delay(1000).fadeOut();
                }
            });

        });

        $(document).on('click','#export-csv',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $('#export-to-csv').modal('show');



        });
        $(document).on('click','#mass-course-email',function(e){

            $('#send-course-email').modal('show');


        });

        $(document).on('change','#course-select-export',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var options = $(this).val()


            $.ajax({
                type:'POST',
                url:"/student-export",
                data:{
                    courseSelectName : options,
                },
                success:function(studenttoExport){
                    $('.export-results').show();
                    var count = 1;
                    var json = JSON.parse(studenttoExport);
                    $('.csv-header').html('Students on course '+json[0]['courseModule']);
                    for (let i = 0; i < json.length; i++) {

                        var studentId =  '<input type = "hidden" value = "'+json[i]['id']+'" class="get-id"> ';
                        var row = $('<tr><td><input class=" studentInfoExport text-center" type="checkbox" value="'+json[i]['id']+'" name="studentInfoExport[]" checked/></td><td>'+json[i]['id']+'</td><td>'+json[i]['name']+'</td><td>'+json[i]['email']+'</td><td>'+json[i]['courseModule']+'</td></tr>');
                        $('.st-count').html('('+count++ +')');

                        $("#student-export-table > tbody").append(row);

                    }
                }
            });

        });


        $(document).on('change','#course-select-email',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var options = $(this).val()


            $.ajax({
                type:'POST',
                url:"/email-mass",
                data:{
                    courseSelectName : options,
                },
                success:function(studenttoExport){
                    $('.js-example-basic-single').select2({
                        dropdownParent: $('#send-course-email')
                    });
                    var data = {
                        id: 1
                    };
                    var all = new Option('all', 'test@gmail.com', false, false);
                    $('.js-example-basic-single').append(all).trigger('change');

                    var count = 1;
                    var json = JSON.parse(studenttoExport);
                    $('.csv-header').html('Students on course '+json[0]['courseModule']);
                    for (let i = 0; i < json.length; i++) {

                        var row = $('<tr><td><input class="form-check-input studentInfoEmail" type="hidden" value="'+json[i]['email']+'"  name="studentInfoEmail[]"  checked> '+json[i]['id']+'</td><td>'+json[i]['name']+'</td><td>'+json[i]['email']+'</td><td><button class="btn-danger remove-email">X</button></td><td>');
                        var newOption = new Option(json[i]['email'], json[i]['email'], false, false);
                        $('.js-example-basic-single').append(newOption).trigger('change');
                    }
                }
            });

        });

        function resetModal(modal) {
            $('#'+modal).on('hidden.bs.modal', function (e) {
                $(this)
                    .find("input,textarea,select")
                    .val('')
                    .end()
                    .find("input[type=checkbox], input[type=radio]")
                    .prop("checked", "")
                    .end();
            })
        }
        resetModal('create-course');
        resetModal('create-post');
        resetModal('export-to-csv');
        resetModal('export-to-csv');


        $('#send-course-email').on('hidden.bs.modal', function (e) {
            $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
            $('.js-example-basic-single').val('').trigger('change');
        })
        $('.js-example-basic-single').on("select2:select", function (e) {
            var data = e.params.data.text;
            if(data=='all'){
                $(".js-example-basic-single > option").prop("selected","selected");
                $(".js-example-basic-single").trigger("change");
            }
        });
        $(document).on('click','#export-csv',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $('#export-to-csv').modal('show');

        });

        $(document).on('click','.export',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             e.preventDefault();
            var studentToExport = [];
            $('.studentInfoExport').each(function(){
                if($(this).is(":checked"))
                {
                    studentToExport.push($(this).val());
                }
            });

            $.ajax({
                type:'POST',
                url:"/csv-file",
                data:{
                    studentToExport :  studentToExport,
                },
                success:function(studentToExportData){
                   window.location.replace(studentToExportData);
                }
            });

        });

        $(document).on('click','.create-cert',function(e){
            e.preventDefault();

            alert('Your file will open in a new window');
            var id = $(this).closest('tr').find('.get-id').val();


            $.ajax({
                type:'POST',
                url:"/IrishCert",
                data:{
                    id:id,


                },
                success:function(downloadCert){
                    window.open(downloadCert,'_blank');

                }
            });

        });



    });
</script>
