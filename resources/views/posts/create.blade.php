@extends('layouts.app')

@section('main')
 <div class="row">
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

            <form class="form-horizontal" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
               {{ csrf_field() }}

                <div class="form-group row">
                    <label for="email" class="col-md-3 control-label">Write Something</label>

                    <div class="col-md-7">
                        <textarea class="form-control" name="body" id="" cols="" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 control-label">Attachment</label>

                    <div class="col-md-7">
                        <input type="file" name="url">
                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-md-3 control-label"></div>
    
                        <div class="col-md-7">
                                <input type="submit" value="POST" class="btn btn-primary">
                        </div>
                    </div>
                
                  
            </form>

    </div>
 

    
    
<div class="col-md-3 col-lg-3 blog-sidebar">

        <ul class="nav nav-pills nav-stacked">
            {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
            <li><a href="/posts"><i class="fa fa-file-o fa-fw"></i>All Post</a></li>
            <li><a href="/posts/create"><i class="fa fa-file-o fa-fw"></i>Create Posts</a></li>
            
        </ul>
</div>
</div>  

@endsection