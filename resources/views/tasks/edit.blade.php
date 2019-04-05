@extends('layouts.app')

@section('main')



<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <h2>Create Task</h2>
    <div class="justify-content-center ">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="col-md-offset-1" action="{{ route('tasks.update',[$task->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="tittle" class="col-md-4 control-label">Tittle</label>
            
                            <div class="col-md-6">
                                <input  type="tittle" class="form-control" name="tittle" value="{{ $task->tittle }}" value="" autofocus> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duration" class="col-md-4 control-label">Tittle</label>
            
                            <div class="col-md-6">
                                <input  type="date" class="form-control" name="duration" value="{{ $task->duration }}" autofocus> 
                            </div>
                        </div>
                        <input class="form-control" type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <div class="col-md-10">
                                    <label for="duration" class="control-label">Tittle</label><br>
                                    <textarea class="form-control" id="editor" name="description"  cols="4" rows="4">{{ $task->description }}</textarea>
                                    
                            </div>
                                
                                
                            </div>
                        
                        <input type="submit" class="btn btn-primary pull-right">
                    
                    </form>
                </div>

            </div>
                
                
        </div>
            
    </div>
   
</div>
<div class="col-md-3 col-sm-3 col-lg-3 blog-sidebar">

        <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li>
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