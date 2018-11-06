@extends('layouts.app')
@section('content')
<br>
<a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
<a class="btn btn-secondary btn-md" role="button" href="/repairs/create"><i class="fas fa-plus-circle fa-1x"></i></a>   
<a href="/repairs" class="btn btn-secondary"><i class="fas fa-toolbox"></i>&nbspRepairs</a>
<br>
<br>
<div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:14%">
                <h3>Total</h3>
                <h1>{{count($repairs)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-warning" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Pending</h3>
                <h1>{{count($pending)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-success" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Ongoing</h3>
                <h1>{{count($ongoing)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-danger" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Closed</h3>
                <h1>{{count($closed)}}</h1>
            </div>
        </div>
    </div>
 <br>
    @if(count($repairs) > 0)
    <div class="container"  >
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Room</th>
                        <th>Reported By</th>
                        <th>Date Reported</th>
                        <th>Description</th>
                        <th>Endorsed To</th> 
                        <th>Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                 @foreach($repairs as $repair)
                <tbody>
                        <th>{{$rowNum++}}</th>
                        <td><a href="/rooms/{{$repair->roomNo}}">{{$repair->roomNo}}</a></td>
                        <td>{{$repair->residentName}}</td>
                        <td>{{Carbon\Carbon::parse($repair->dateReported)->format('F j, Y')}}</td>
                        <td>{{$repair->desc}}</td>
                        <td><a href="/maintenances/{{$repair->id}}">{{$repair->endorsedTo}}</a></td>
                        <td>{{$repair->repairStatus}}</td>
                        <td>
                            <a href="/repairs/{{$repair->repairsId}}" class="btn btn-info">MORE INFO</a>
                        </td>
                        <td>
                            <a href="/repairs/{{$repair->repairsId}}/edit" class="btn btn-warning">EDIT</a>
                        </td>
                        <td>
                            {{-- {!!Form::open(['action' => ['RepairsController@destroy', $repair->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}  
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!} --}}
                        </td>
                     
                </tbody>
        @endforeach   
            </table>
            
    @else
    <div class="alert alert-danger" role="alert"><p>No Repairs found!</p></div>
    @endif
            </div>
@endsection


