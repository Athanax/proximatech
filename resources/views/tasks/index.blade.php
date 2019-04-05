@extends('layouts.app')

@section('main')





<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    
<div class="box box-primary">
        <div class="panel-heading">
            <h3>Tasks</h3>
            
        </div>
        <div class="box-body">
                    
            
            <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                              <tr>
                                    <th>Id</th>
                                    <th>Tittle</th>
                                    <th>Body</th>
                                    <th>User_id</th>
                                    <th>Dev_id</th>
                                    <th>Created_at</th> 
                                    <th>Status</th>                                         
                              </tr>
                          </thead>   
                          <tbody>
                                @if (count($tasks)>0)
                                @foreach ($tasks as $task)
                        
                             
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->tittle }}</td>
                                <td><a class="btn btn-primary" href="/tasks/{{ $task->id }}">View</a>
                                </td>
                                <td>{{ $task->user_id }}</td>
                                <td>{{ $task->dev_id }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>{{ $task->status }}</td>
                                <td><span class="label label-success">Active</span>
                                </td>                                       
                            </tr>
                               @endforeach
                               
                            @else
                            <p>Currently no Tasks</p>
                            @endif
                            
                        </a>
                            
                          </tbody>
                        </table>
                        <div class="col-md-offset-5 col-sm-offset-5">
                                {{ $tasks->links() }}
                        </div>
                        
                    </div>
                </div>
    
        </div>
    
    
    </div>

</div>

<div class="col-md-3 col-lg-3 blog-sidebar">

        <ul class="nav nav-pills nav-stacked">
                {{-- <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li> --}}
                <li><a href="/tasks"><i class="fa fa-file-o fa-fw"></i>All Tasks</a></li>
                <li><a href="/tasks/create"><i class="fa fa-list-alt fa-fw"></i>Create Task</a></li>
                <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Charts</a></li>
                <li><a href="#"><i class="fa fa-table fa-fw"></i>Table</a></li>
                <li><a href="#"><i class="fa fa-tasks fa-fw"></i>Forms</a></li>
                <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Calender</a></li>
                <li><a href="#"><i class="fa fa-book fa-fw"></i>Library</a></li>
                <li><a href="#"><i class="fa fa-pencil fa-fw"></i>Applications</a></li>
                <li><a href="#"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
            </ul>
</div>
@endsection


