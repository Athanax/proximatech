@extends('layouts.app')

@section('main')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    <div class="container-fluid">
            <form class="col-md-offset-1" action="{{ route('roles.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="tittle" class="col-md-3 control-label">Name</label>
    
                    <div class="col-md-7">
                        <input  type="tittle" class="form-control" name="name" value="" autofocus> 
                    </div>
                </div>

                <input type="submit" class="btn btn-primary col-md-offset-3">
                
        </form>
    </div>
</div>


    
    <div class="col-md-3 col-lg-3 blog-sidebar">
    
            <ul class="nav nav-pills nav-stacked">
                    {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
                   
                    <li><a href="/roles/create"><i class="fa fa-list-alt fa-fw"></i>Create Role</a></li>
                    <li><a href="/roles"><i class="fa fa-list-alt fa-fw"></i>View Roles</a></li>


              
                   
    </div>
    
@endsection