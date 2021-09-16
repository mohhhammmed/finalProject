@extends('layouts.app')

@section('content')
<h1 class="text-center">Add File Page</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
           
            <form action="{{route('file_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                    <div class="alert alert-warning" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>File Desc</label>
                    <input type="text" name="desc" class="form-control">
                    @error('desc')
                       <div class="alert alert-warning" role="alert">
                         {{$message}}
                       </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>File Upload</label>
                    <input type="file" name="mainFile" class="form-control">
                    @error('mainFile')
                       <div class="alert alert-warning" role="alert">
                          {{$message}}
                       </div>
                    @enderror
                </div>
                
                <button class="btn btn-info">Send Data</button>
            </form>
        </div>
    </div>
</div>
@endsection