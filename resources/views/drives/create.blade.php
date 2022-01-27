@extends('layouts.app')

@section('content')
<h1 class="text-center text-info">Upload File Page</h1>

@if ($errors->any())
    <div class="alert alert-danger mx-auto w-50">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('drives.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Drive Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Drive Description</label>
                    <input type="text" name="description"  class="form-control">
                </div>
                <div class="form-group">
                    <label>File</label>
                    <input type="file" name="inputfile"  class="form-control">
                </div>
                <button class="btn btn-info">send data</button>
            </form>
        </div>
    </div>
</div>
@endsection


