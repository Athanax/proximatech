@extends('layouts.app')

@section('main')



<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    
    <div class="container-fluid">
        <div class="fb-profile">
            <img align="left"  class="fb-image-lg" src="{{ URL::asset('storage/img/upl/'.$user->cover_image.'') }}" alt="Profile image example"/>
            <img align="left"  class="fb-image-profile thumbnail" src="{{ URL::asset('storage/img/upl/'.$user->profile_pic.'') }}" alt="Profile image example"/>
            <div class="fb-profile-text">
                <h1>{{ ucwords($user->name) }}</h1>
                <p>{{ $user->email }}</p>
            </div>
        </div><br>
        

        <ul class="nav nav-pills nav-stacked col-sm-offset-3">
            {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
            <li><a href="/profile/{{ $user->id }}/edit"><i class="fa fa-file-o fa-fw"></i>Edit Profile</a></li>
            
                
            @if ($user->role==1)
                <li><a href="/users/create"><i class="fa fa-list-alt fa-fw"></i>Create Task</a></li>
                <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Charts</a></li>
            @endif
           
        </ul>

        {{-- starts here --}}
        <div class="">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-blue-active">
                <div class="widget-user-image">
                  <img class="img-circle" src="{{ URL::asset('storage/img/upl/'.$user->profile_pic.'') }}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Nadia Carmichael</h3>
                <h5 class="widget-user-desc">Lead Developer</h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                  <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                  <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                  <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                </ul>
              </div>
            </div>
        {{-- ends here --}}
</div>

<div class="col-md-3 col-lg-3 blog-sidebar">

        
</div>
@endsection