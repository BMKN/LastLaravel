<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h1> Dear {{$data['name']}}  </h1>
                    <h5 class="card-title">Your certificate is ready for download please click <a href="{{$data['aws_link']}}">here</a>
                        </h5>
                    <p class="card-text">No 18. This is scheduled to be held on the .</p>

                </div>
            </div>


            </div>
        </div>

@endsection
