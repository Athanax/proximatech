

@extends('layouts.app')

@section('main')


<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    
    <div class="box box-primary">
            <div class="box-heading">
                <h3>Roles</h3>
                
            </div>
            <div class="box-body">
                        
                
                <div class="row">
                        <div class="span5">
                            <table class="table table-striped table-condensed">
                                <thead>
                                  <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>created at</th>
                                        <th></th>
                                        <th></th>

                                                                              
                                  </tr>
                              </thead>   
                              <tbody>
                                    @if (count($roles)>0)
                                    @foreach ($roles as $role)
                            
                                 
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td><a class="btn btn-primary" href="/roles/{{ $role->id }}">View</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('roles.destroy',[$role->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                         
                                </tr>
                                   @endforeach
                                   
                                @else
                                <p>Currently no Tasks</p>
                                @endif
                                
                            </a>
                                
                              </tbody>
                            </table>
                           
                            
                        </div>
                    </div>
        
            </div>
     
        </div>
    
    </div>
    
    <div class="col-md-3 col-lg-3 blog-sidebar">
    
            <ul class="nav nav-pills nav-stacked">
                    {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
                   
                    <li><a href="/roles/create"><i class="fa fa-list-alt fa-fw"></i>Create Role</a></li>
                    
              
                   
    </div>
@endsection