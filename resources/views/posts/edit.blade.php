@extends('layouts.app')

@section('main')


    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
      
    <form class="form-horizontal"  action="{{ route('posts.update',[$post->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <div class="container-fluid">
            <div class="container-fluid">
                <img style="max-width: 150px;" src="{{ URL::asset('storage/img/posts/'.$post->url.'') }}" alt="Post Image">
               
            </div>
            
            <div class="container-fluid">
                    <label for="body" class="control-label">Attachment</label><br>
                    <div class="container-fluid">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="file" name="url">
                    </div>
                   
                </div>
            <div class="container-fluid">
                <label for="body" class=" control-label">Write Something</label><br>
                <div class=" container-fluid">
                        <textarea class="form-control" name="body" id="" cols="" rows="5">{{ $post->body }}</textarea>
                </div>
               
            </div>
            <div class="form-group row">
                <div class="col-md-3 control-label"></div>
        
                <div class="col-md-7"><br>
                        <input type="submit" value="POST" class="btn btn-primary pull-right">
                </div>
            </div>
        </div>
        
        
          
        </form>
        
    </div>
  

<div class="col-md-3 col-lg-3 blog-sidebar">

    <ul class="nav nav-pills nav-stacked">
        {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
        <li><a href="/posts"><i class="fa fa-file-o fa-fw"></i>All Posts</a></li>
        <li><a href="/posts/create"><i class="fa fa-file-o fa-fw"></i>Create Posts</a></li>
        
    </ul>
</div>
    
@endsection     