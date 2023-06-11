<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h1> LAST Course
                        @foreach($data['emails'] as $email)
                            {{$email->name}}
                        @endforeach
                        on
                        @foreach($data['emails'] as $email)
                            {{$email->email_date}}
                        @endforeach
                    </h1>
                    <h5 class="card-title">Thank you for registering for the Day 1 (core modules) online course.</h5>
                    <p class="card-text">No 18. This is scheduled to be held on the .</p>
                    <p class="card-text">Please read on for important course information.</p>
                    <p class="card-text">Please put these fixed dates in your diary: .</p>
                    <p class="card-text">You must attend a Zoom conference on both these days. If you cannot attend both days please don't confirm your attendance.</p>
                    <p class="card-text">There will be a short presentation by the lecturers about the learning outcomes, etc.</p>
                    <p class="card-text">After the first Zoom session, the main course material will be made available.</p>
                    <p class="card-text">There is some pre-course preparation with a short quiz, which you need to do before this. This is for you to be prepared for the course. In particular, you should be comfortable with basic statistics and experimental design. There are no credits for this pre-course work.</p>
                    <p class="card-text">I will send you links and passwords when you confirm your availability for these two times.</p>
                    <p class="card-text">The structure of the CORE MODULES (day 1) online module is that we have an introductory Zoom meeting where the lecturers outline the work required and give introductory talks. The student then has a week to go through the online material and there is another Zoom meeting where we have discussion and breakout-room problem solving sessions. After that, you have an exam the following week.</p>
                    <p class="card-text">The Day 2 (species specific) module will also be online. Details of these will be available after completion of the Day 1 (core module).</p>
                    <p class="card-text">If you have any questions, please contact me.</p>
                    <p class="card-text">Regards,</p>
                    <p class="card-text">Peter Nowlan</p>
                    <p class="card-text">Course Director</p>
                </div>
            </div>


        </div>
    </div>

@endsection
