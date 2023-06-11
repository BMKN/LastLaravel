<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('layouts.app')
@section('content')
    <html>
    <head>
        <title>Welcome Email</title>
    </head>

    <body>
    <h2>Welcome to the site {{$user['name']}}</h2>
    <br/>
    Your registered email-id is {{$user['email']}}
    </body>

    </html>

@endsection
