@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-2">
                <p>Last-Ireland  is a programme of education to support and help the scientific community in Ireland to use research animals in accordance with best international and national practices.</p>
                <p> A core module course is a cohort class which covers the core EU modules,  whereas a species specific  course is self directed, fully online, covering the species specific EU modules ,
                <p>It is possible to sign up for a ‘core modules  course, complete that exam, then  subsequently complete a species-specific ‘species specific  course (e.g. Rodent, Aquatic, Wildlife  or Large Animal.)</p>
                <p>HPRA often accept the modular training courses from the UK and other  Member States (if an Irish ‘legal module’ is done)</p>
            </div>
            @if(!Auth::user())
            <div class="col-md-4 offset-2">
                <div id="calendar"></div>
            </div>
            @endif
        </div>
    </div>
        <script>
            @isset($events)
            document.addEventListener('DOMContentLoaded', function() {
                const calendarEl = document.getElementById('calendar')
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: @json($events),
                })
                    calendar.render()

            });
            @endisset



        </script>



@endsection
