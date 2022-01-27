@extends('layouts.app')

@section('content')
<h1 class="text-center text-info"> File :{{$drive->title}}</h1>
<div class="container col-md-6">
    <div class="card">
        <img src="{{ asset("upload/$drive->file") }}" alt="" class="img-top" >
        <div class="card-body">
         <h4> Drive Name :{{$drive->file}} </h4> 
          <h6>Drive Description: {{$drive->description}} </h6> 
        <a href="{{ route('drives.download',$drive->id )}}" class="btn btn-success btn-block m-3">Download</a>
        </div>
    </div>
</div>
@endsection


