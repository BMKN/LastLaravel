
@extends('layouts.app')
@section('content')
<div class="container text-center">
    <div class="row">
        <h2> <span class="badge btn-info">{{$user->name}}'s results</span></h2>

<div class="container text-center">
    <div class="row">

        <table id="student-export-table" class="table table-hover">
            <thead>
            <tr>
                <th> <h4> <span class="badge btn-success"> Module 0</span></h4></th>
                <th> <h4> <span class="badge btn-success"> Module 1</span></h4></th>
                <th> <h4> <span class="badge btn-success"> Module 2</span></h4></th>
                <th> <h4> <span class="badge btn-success"> Module 3</span></h4></th>
                <th> <h4> <span class="badge btn-success"> Module 4</span></h4></th>
            </tr>

            </thead>
            <tbody>
            <tr>
               <th> {{$user->Core}}</th>
               <th> {{$user->Rodent}}</th>
               <th> {{$user->Rabbit}}</th>
               <th> {{$user->Large_Animal_Aquatic}}</th>
               <th> {{$user->module_4}}</th>
            </tr>
            </tbody>
        </table>

    </div>
</div>
</div>
@endsection
