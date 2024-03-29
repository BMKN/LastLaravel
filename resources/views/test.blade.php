<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('layouts.app')
@section('content')
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
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Home </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" id = "add-course" class="nav-link ">Create Course</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" id = "add-post" class="nav-link">Create Post</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" id = "export-csv" class="nav-link" >Export CSV</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>

                    </div>


                    <div class="card-body">
                        <form method="POST" action = "/edit" >
                            @csrf


                            <div class="row mb-3">
                                <label for="search" class="col-md-4 col-form-label text-md-end">{{ __('Search') }}</label>

                                <div class="col-md-6">
                                    <input id="Search" type="text" class="form-control @error('Search') is-invalid @enderror" name="Search" value="{{ old('Search Student') }}" required autocomplete="email" autofocus>

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
                                        <input id="module-3" type="module-4" class="form-control" name="module-3">
                                    </div>
                                    <label for="module-4" class="col-md-4 col-form-label text-md-end">{{ __('Module 4') }}</label>

                                    <div class="col-md-6">
                                        <input id="module-4" type="module-0" class="form-control" name="module-4">
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
                                        <textarea class="form-control" id="sms-body"  name="sms-body" rows="4" cols="50">
                                        </textarea>
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

                <div class="modal" id  = "create-course" tabindex="-1" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
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
                <div class="modal" id  = "export-to-csv" tabindex="-1" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Export to CSV</h5>
                            </div>
                            <div class="filter container">
                                <div class="col-4" class="text-center" >
                                    <div class="row">
                                    <label for="course-select-export" >{{ __('Select Course') }}</label>
                                    <select class="form-select" id ="course-select-export"name = "course-select-export" >
                                        @isset($coursesNames)
                                            <option disabled selected value> -- select an option -- </option>

                                        @foreach($coursesNames as $course)
                                            <option value="{{$course->name}}">{{$course->name}}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body export-results" >
                                <div class="row mb-3">

                                    <h4 class="text-center csv-header"></h4>

                                    <table id="student-export-table" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Select All <span class= "st-count"> </span> <input class="form-check-input select-all" type="checkbox"> </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Course</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>

                                        </tr>
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


            </div>
        </div>
    </div>




@endsection
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
                        ;
                        var row = $('<tr><td >'+json[i]['id']+'</td><td>'+json[i]['name']+'</td><td>'+json[i]['email']+'</td><td> '+stundeditIcon+' </td><td> '+sendSMS+' </td><td> '+studentId+' </td></tr>');

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
                }
            });


        });


        $(document).on('click','.save-edit',function(e){
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
            var id = $(this).closest('tr').find('.get-id').val();
            var smsbody  = $('#sms-body').val();
            var studentsubject  = $('#student-subject').val();
            $('#send-sms-modal').modal('show');
            $.ajax({
                type:'POST',
                url:"/sms-info",
                data:{
                    id:id,
                    smsbody:smsbody,
                    studentsubject:studentsubject,

                },
                success:function(studentSms){
                    var studentSms = $.parseJSON(studentSms);
                    $('#Student-name').val(studentSms.name);
                    $('#sms-number').val(studentSms.MobileNumber);
                    $('#student-id-sms').val(id);

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
                url:"/shoeStudentsToExport",
                data:{
                    courseSelectName : options,
                },
                success:function(studenttoExport){
                    $('#export-results').show();
                    var count = 1;
                    var json = JSON.parse(studenttoExport);
                    $('.csv-header').html('Students on course '+json[0]['courseModule']);
                    for (let i = 0; i < json.length; i++) {

                        var studentId =  '<input type = "hidden" value = "'+json[i]['id']+'" class="get-id"> ';
                        var row = $('<tr><td >   <input class="form-check-input studentInfoExport" type="checkbox" value="'+json[i]['id']+'"  name="studentInfoExport[]"  checked> '+json[i]['id']+'</td><td>'+json[i]['name']+'</td><td>'+json[i]['email']+'</td><td>'+json[i]['courseModule']+'</td>');
                        $('.st-count').html('('+count++ +')');

                        $("#student-export-table > tbody").append(row);

                    }
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
                url:"/csv-export",
                data:{
                    studentToExport :  studentToExport,
                },
                success:function(studentToExportData){
                    // $('.post-created').fadeIn().delay(1000).fadeOut();
                }
            });

        });

    });
</script>
