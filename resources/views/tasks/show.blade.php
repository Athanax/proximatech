@extends('layouts.app')

@section('main')



<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-9">
            <span class="pull-left"><h2>{{ $task->tittle }}</h2></span>
            <span><a class="btn btn-primary pull-right" href="/tasks">Back</a></span><br><br>
            <hr>
    
            
            <p>{{ $task->description }}</p>
            <p> You can find the complete code on, it contains more themes and background image option</p>

            <form action="{{ route('tasks.destroy',[ $task->id ]) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <input type="submit" value="Delete" class="btn btn-danger pull-right">
            </form>
            @if ($task->attachment!=NULL)
                <a href="{{ URL::asset('storage/img/attachments/'.$task->attachment.'') }}" target="_blank">Attachment</a>
            @else
                <p>No attachments for this task</p>
            @endif
        </div>

        
        
        <div class="col-md-3 col-lg-3 blog-sidebar">

                <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><i class="fa fa-th fa-fw"></i>Menu</a></li>
                        <li><a href="/tasks/create"><i class="fa fa-list-alt fa-fw"></i>Create Task</a></li>
                        <li><a href="/tasks/{{ $task->id }}/edit"><i class="fa fa-file-o fa-fw"></i>Edit task</a></li>
                        <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Charts</a></li>
                        <li><a href="#"><i class="fa fa-table fa-fw"></i>Table</a></li>
                        <li><a href="#"><i class="fa fa-tasks fa-fw"></i>Forms</a></li>
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Calender</a></li>
                        <li><a href="#"><i class="fa fa-book fa-fw"></i>Library</a></li>
                        <li><a href="#"><i class="fa fa-pencil fa-fw"></i>Applications</a></li>
                        <li><a href="#"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
                    </ul>
            
        </div>
    
    </div>

</div>

@endsection
