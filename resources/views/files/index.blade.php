@extends('layouts.app')

@section('content')
<h1 class="text-center">All Files</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
           @include('messages.message')
           <table class="table">
               <tr>
                   <th>id</th>
                   <th>title</th>
                   <th>action</th>
               </tr>
               @foreach( $files as $file)
               <tr>
                   <td>{{$file->id}}</td>
                   <td>{{$file->title}}</td>
                   <td><a href="{{route('file_show',$file->id)}}"><i class="fa fa-eye" style="font-size:25px;"></i></a></td>
                  <td><a href="{{route('file_edit',$file->id)}}"><i class="fa fa-edit" style="font-size:25px;"></i></a></td> 
                  <td> <a href="{{route('file_destroy',$file->id)}}"><i class="fa fa-trash-alt" style="font-size:25px;"></i></a></td>
               </tr>
               @endforeach
              
           </table>
        </div>
    </div>
</div>
@endsection