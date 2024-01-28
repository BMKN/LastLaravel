<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row">
            <h2> <span class="badge btn-info">{{$user->name}} personal info</span></h2>

            <div class="container text-center">
                <div class="row">

                    <table id="student-export-table" class="table table-hover">
                        <thead>
                        <tr>
                            <th> <h4> <span class="badge btn-success"> Name</span></h4></th>
                            <th> <h4> <span class="badge btn-success"> Email</span></h4></th>
                            <th> <h4> <span class="badge btn-success"> Mobile</span></h4></th>
                            <th> <h4> <span class="badge btn-success"> Address</span></h4></th>
                            <th> <h4> <span class="badge btn-success">Eircode</span></h4></th>
                            <th> <h4> <span @if($user->Core >= 70)class="badge btn-success"@endif @if($user->Core < 70) class="badge btn-danger"@endif >Core</span></h4></th>
                            <th> <h4> <span @if($user->Rodent >= 70)class="badge btn-success"@endif @if($user->Rodent < 70) class="badge btn-danger"@endif >Rodent</span></h4></th>
                            <th> <h4> <span @if($user->Rabbit >= 70)class="badge btn-success"@endif @if($user->Rabbit < 70) class="badge btn-danger"@endif >Rabbit</span></h4></th>
                            <th> <h4> <span @if($user->Large_Animal_Aquatic >= 70)class="badge btn-success"@endif @if($user->Large_Animal_Aquatic < 70) class="badge btn-danger"@endif >Large Animal Aquatic</span></h4></th>
                            <th> <h4> <span @if($user->Wildlife_terrestrial >= 70)class="badge btn-success"@endif @if($user->Wildlife_terrestrial < 70) class="badge btn-danger"@endif >Wildlife terrestrial</span></h4></th>
                            <th> <h4> <span @if($user->Wildlife_Aquatic >= 70)class="badge btn-success"@endif @if($user->Wildlife_Aquatic < 70) class="badge btn-danger"@endif >Wildlife Aquatic</span></h4></th>
                            <th> <h4> <span @if($user->Lab >= 70)class="badge btn-success"@endif @if($user->Lab < 70) class="badge btn-danger"@endif >Lab </span></h4></th>
                            <th> <h4> <span @if($user->Pigs >= 70)class="badge btn-success"@endif @if($user->Pigs < 70) class="badge btn-danger"@endif >Pigs </span></h4></th>
                            @if($user->cert_Uploaded == 1)
                            <th> <h4> <span class="badge btn-success">Download cert</span></h4></th>
                            @endif
                            @if($user->cert_Uploaded == 0)
                                    <th> <h4> <span class="badge btn-danger"> Cert not yet ready</span></h4></th>
                            @endif
                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            <th> {{$user->name}} <span class="badge btn-success Edit">Edit</span></th>
                            <th> {{$user->email}}</th>
                            <th> {{$user->MobileNumber}}</th>
                            <th> {{$user->addressLine1}} {{$user->addressLine2}} </th>
                            <th> {{$user->eirCode}}  </th>
                            <th> {{$user->Core}}  </th>
                            <th> {{$user->Rodent}}  </th>
                            <th> {{$user->Rabbit}}  </th>
                            <th> {{$user->Large_Animal_Aquatic}}  </th>
                            <th> {{$user->Wildlife_terrestrial}}  </th>
                            <th> {{$user->Wildlife_Aquatic}}  </th>
                            <th> {{$user->Lab}}  </th>
                            <th> {{$user->Pigs}}  </th>

                            @if($user->cert_Uploaded == 1)
                            <th> <a href="{{$user->aws_link}}" target="_blank">Download cert here</a> </th>
                            @endif

                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="modal fade"id="exampleCentralModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Your Info</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" value="{{$user->email}}" name="email">
                            </div>
                            <div class="row mb-3">
                                <label for="mobile" class="col-md-4 col-form-label text-md-end pt-2">Mobile</label>
                                <div class="col-md-6 pt-2">
                                    <input id="mobile" type="text" class="form-control" value="{{$user->MobileNumber}}" name="mobile">
                                       </div>
                                        </div>
                          <div class="row mb-3">
                                   <label for="addressLine1" class="col-md-4 col-form-label text-md-end pt-2">Address Line 1</label>
                                   <div class="col-md-6 pt-2">
                                           <input id="addressLine1" type="text" class="form-control" value="{{$user->addressLine1}}" name="addressLine1">
                                       </div>
                                    </div>
                            <div class="row mb-3">
                                   <label for="addressLine2" class="col-md-4 col-form-label text-md-end pt-2">Address Line 2</label>
                                   <div class="col-md-6 pt-2">
                                           <input id="addressLine2" type="text" class="form-control" value="{{$user->addressLine2}}" name="addressLine2">
                                       </div>
                                </div>
                            <div class="row mb-3">
                                   <label for="eirCode" class="col-md-4 col-form-label text-md-end pt-2">Eirdcode</label>
                                   <div class="col-md-6 pt-2">
                                           <input id="eirCode" type="text" class="form-control" value="{{$user->eirCode}}" name="eirCode">
                                </div>
                            </div>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary close" data-mdb-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary update-info">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

<script>
    $(document).ready(function (){
        $('.Edit').click(function (){
            $('#exampleCentralModal2').modal('show');
        });
$('.close').click(function (){
    $('#exampleCentralModal2').modal('hide');

})

        $('.update-info').click(function (e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = {{$user->id}};
            var email = $('#email').val();
            var mobile = $('#mobile').val();
            var addressLine1 = $('#addressLine1').val();
            var addressLine2 = $('#addressLine2').val();
            var eirCode = $('#eirCode').val();
            $.ajax({
                type:'POST',
                url:"/personalInfoedit",
                data:{
                    id:id,
                    email:email,
                    addressLine1:addressLine1,
                    addressLine2:addressLine2,
                    eirCode:eirCode,

                },
                success:function(studentSms){
                  //  var studentSms = $.parseJSON(studentSms);


                }
            });
        })
    });
</script>
