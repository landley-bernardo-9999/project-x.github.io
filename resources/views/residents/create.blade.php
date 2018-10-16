@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/residents"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>    
<h1>Add Resident</h1>
    {!! Form::open(['action'=>'ResidentsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        
        <div class="form-group">
            <label for="">Room No</label>
            <select name="roomNo" id="roomNo">
                <option value="" disabled selected>Please select</option>
                @foreach($registeredRooms as $registeredRoom)
                <option value="{{$registeredRoom->roomNo}}">
                    {{$registeredRoom->roomNo}}
                </option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
                {{Form::label('Birthdate')}}
                &nbsp&nbsp&nbsp
                {{ Form::date('birthDate',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Status')}}
            &nbsp&nbsp&nbsp
            {{Form::select('residentStatus', ['Pending' => 'Pending','Moving-in' => 'Moving-in','Active' => 'Active','Pre-terminated'=>'Pre-terminated' ,'Moving-out' => 'Moving-out', 'Extended'=>'Extended','Inactive' => 'Inactive','Evicted'=>'Evicted'],null,['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::label('Move-in Date')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('moveInDate',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Move-out Date')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('moveOutDate',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
                {{Form::text('school','',['class'=>'form-control','placeholder'=>'School'])}}
        </div>
        <div class="form-group">
                {{Form::text('course','',['class'=>'form-control','placeholder'=>'Course'])}}
        </div>
        <div class="form-group">
            {{Form::number('yearLevel','',['class'=>'form-control','placeholder'=>'Year Level'])}}
        </div>
        <div class="form-group">
                {{Form::text('mobileNumber','',['class'=>'form-control','placeholder'=>'Mobile Number'])}}
        </div>
        <div class="form-group">
                {{Form::email('emailAddress','',['class'=>'form-control','placeholder'=>'Email Address'])}}
        </div>
      
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection

