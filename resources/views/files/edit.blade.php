@extends('layouts.app')

@section('content')
<h1 class="text-center">Edit Files</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
        <form action="{{route('file_update',$file->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Edit Title</label>
                    <input type="text" value="{{$file->title}}" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label>Edit Desc</label>
                    <input type="text" value="{{$file->desc}}" name="desc" class="form-control">
                </div>

                <div class="form-group">
                    <label>Edit File</label>
                    <input type="file" name="mainFile" class="form-control">
                </div>

                <input type="hidden" name='id'value="{{$file->id}}">
                <img style="margin-left:150px" src="{{asset('uploades/'.$file->mainFile)}}" width="300px" height="300px" alt="">
                <button class="btn btn-block btn-info m-2">Edit Data</button>
            </form>
        </div>
    </div>
</div>
@endsection