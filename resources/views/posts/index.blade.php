@extends('layouts.app')

@section('main')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    
    <div class="container-fluid">
      
       
        @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-md-4">
                    <div class="container-fluid">
                        <img style="max-width: 150px;" src="{{ URL::asset('storage/img/posts/'.$post->url.'') }}" alt="Post Image">
                    </div>
                </div> <!-- end of col-md-4 -->
                <div class="col-md-6">
                    <div class="container-fluid">
                        <p>{{ $post->body }}</p>
                        <br>
                        <a class="btn btn-primary" href="/posts/{{ $post->id }}">View</a>
                    </div>
                </div> <!-- end of col-md-5 -->
            </div> <!-- end of row -->
            <hr>
        @endforeach
        @else
        <p>Currently no Posts</p>
        <br>
        @if (Auth::user()->role==1)
        <a class="btn btn-primary" href="/posts/create">Create a new Post</a>
        @endif
        @endif

    </div>
    <div class="col-md-offset-4">
        {{ $posts->links() }}
    </div>
    
      
</div>

<div class="col-md-3 col-lg-3 blog-sidebar">

        <ul class="nav nav-pills nav-stacked">
                {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
                <li><a href="/posts"><i class="fa fa-file-o fa-fw"></i>All Posts</a></li>
                <li><a href="/posts/create"><i class="fa fa-file-o fa-fw"></i>Create Posts</a></li>
                
            </ul>
</div>
    
@endsection     