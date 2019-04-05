@extends('layouts.app')

@section('main')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    
    <div class="container-fluid">
        <div class="container-fluid">
            <img style="max-width: 150px;" src="{{ URL::asset('storage/img/posts/'.$post->url.'') }}" alt="Post Image">
            
        </div><br><br>
        <div class="container-fluid">
            <p>{{ $post->body }}</p>
        </div>
    </div>
    @if (Auth::user()->role==1)
       <form action="{{ route('posts.destroy',[$post->id]) }}" method="POST">
        {{ csrf_field() }}
        <br><br>
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" class="btn btn-danger pull-right" value="DELETE POST">

        </form>

    @endif
      
</div>

<div class="col-md-3 col-lg-3 blog-sidebar">

    <ul class="nav nav-pills nav-stacked">
        {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
        <li><a href="/posts"><i class="fa fa-file-o fa-fw"></i>All Posts</a></li>
        <li><a href="/posts/{{ $post->id }}/edit"><i class="fa fa-file-o fa-fw"></i>Edit Post</a></li>
        <li><a href="/posts/create"><i class="fa fa-file-o fa-fw"></i>Create Posts</a></li>


        
    </ul>
</div>
    
@endsection     