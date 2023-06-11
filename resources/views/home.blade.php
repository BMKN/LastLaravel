@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-2">
                <p>Last-Ireland  is a programme of education to support and help the scientific community in Ireland to use research animals in accordance with best international and national practices.</p>
                <p> A core module course is a cohort class which covers the core EU modules,  whereas a species specific  course is self directed, fully online, covering the species specific EU modules ,
                <p>It is possible to sign up for a ‘core modules  course, complete that exam, then  subsequently complete a species-specific ‘species specific  course (e.g. Rodent, Aquatic, Wildlife  or Large Animal.)</p>
                <p>HPRA often accept the modular training courses from the UK and other  Member States (if an Irish ‘legal module’ is done)</p>
            </div>
            <div class="col-md-4 offset-2">
                @if(isset($courses))
                @foreach($courses as $course)
                    <div class="mt-8  dark:bg-gray-800 overflow-hidden shadow-lg rounded">
                        <div class="card-body ">
                            <h5 class="card-title">{{$course->name}}</h5>
                            <p class="card-text text-grey">
                                {{$course->subject}}
                            </p>
                            <p class="card-text text-grey">
                                {{$course->content}}
                            </p>
                            <p class="card-text text-grey">
                                Price {{$course->price}}
                            </p>

                            <a href="{{$course->URL}}/{{$course->id}}" class="btn btn-success ">Register here</a>
                        </div>

                    </div>
                @endforeach
                    @endif
            </div>

        </div>
    </div>


@endsection
