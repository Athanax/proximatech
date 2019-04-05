@extends('layouts.app')

@section('main')



<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <form action="{{ route('profile.update',[$user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="container-fluid">
                <div class="fb-profile">
                        <img align="left"  class="fb-image-lg" src="{{ URL::asset('storage/img/upl/'.$user->cover_image.'') }}" alt="Profile image example"/>
                        <img align="left"  class="fb-image-profile thumbnail" src="{{ URL::asset('storage/img/upl/'.$user->profile_pic.'') }}" alt="Profile image example"/>
                      
                    <div class="container-fluid">
                        <div class="fb-profile-text" >
                                <div class="form-group">
                                        
                                        <input type="hidden" name="_method" value="PUT">
                                        <input class="form-control" type="text" name="name" value="{{ $user->name }}" style="width:auto;">
                                        <p>{{ $user->email }}</p>
                                        <body>
                                                
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                            <label for="duration" class="control-label">Upload Profile Picture</label><br>
                                            <input type="file" name="profile_pic" value="noimage1.jpg"><br>
                                    </div>     
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                            <label for="duration" class="control-label">Upload Cover Image</label><br>
                                            <input type="file" name="cover_image"><br>
                                    </div>     
                                </div>
                                
                                
                            </div>
                    </div>
               
                </div>
                <input type="submit" class="btn btn-primary pull-right">
            </div>
        </form>
        <ul class="nav nav-pills nav-stacked col-sm-offset-3">
            {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
            <li><a href="/profile/{{ $user->id }}"><i class="fa fa-file-o fa-fw"></i>View Profile</a></li>
            
            @if ($user->role==1)
                <li><a href="/profile"><i class="fa fa-list-alt fa-fw"></i>All users</a></li>
                <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Charts</a></li>
            @endif
            
           
        </ul>
    </div> <!-- /container -->
    
    
</div>

<div class="col-md-3 col-lg-3 blog-sidebar">

   
</div>

@endsection