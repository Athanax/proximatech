@extends('layouts.app')

@section('main')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    
    <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Users who are {{ $role->name }}</h3>
                
            </div>
            <div class="panel-body">
                        
                
                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>View</th>
                                    <th>Created_at</th> 
                                    <th>Role</th>                                         
                                </tr>
                            </thead>   
                            <tbody>
                                @if (count($users)>0)
                                @foreach ($users as $user)
                        
                                
                            <tr>
                                <td>#{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td><a class="btn btn-primary" href="/profile/{{ $user->id }}">View</a>
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->role }}</td>
                                </td>                                       
                            </tr>
                                @endforeach
                                
                            @else
                            <p>Currently no Users</p>
                            @endif
                            
                        </a>
                            
                            </tbody>
                        </table>
                        <div class="col-md-offset-5 col-sm-offset-5">
                                {{-- {{ $users->links() }} --}}
                        </div>
                        
                    </div>
                </div>
    
        </div>
    
    
    </div>

</div>
    
<div class="col-md-3 col-lg-3 blog-sidebar">

    <ul class="nav nav-pills nav-stacked">
        <li><a href="/roles"><i class="fa fa-tasks fa-fw"></i>All Roles</a></li>
        <li><a href="/roles/{{ $role->id }}/edit"><i class="fa fa-plus fa-fw"></i>Add new member</a></li>
    </ul>
</div>


@endsection