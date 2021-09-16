@extends('layouts.app')

@section('content')
<h1 class="text-center">Show File {{$file->id}}</h1>
<div class="container col-6">
    <div class="card">
        {{$file->title}}
        <div class="card-body">
            {{$file->desc}}
            <img src="{{asset('uploades/'.$file->mainFile)}}" alt="" width="200px" height="200">
            <a href="{{route('file_download',$file->id)}}" class="btn btn-block btn-info m-2">Download</a>
        </div>
    </div>
</div>
@endsection