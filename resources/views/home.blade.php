@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                    {{-- @yield('menu') --}}
                <div class=""></div>

                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div>
            </div>
            

                  @if (Auth::user()->role ==1)
                  <div class="row">
                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                          <div class="inner">
                            <h3>{{ count($tasks) }}</h3>
              
                            <p>New Tasks</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
              
                            <p>Bounce Rate</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3>{{ count($users) }}</h3>
              
                            <p>User Registrations</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                          <a href="/profile" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>65</h3>
              
                            <p>Unique Visitors</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                  @endif
                  <div class="row">
                    <div class="col-md-7">

                        {{-- this box displays the users --}}

                        <div class="box box-primary">
                          <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="fa fa-users"></i>
              
                            <h3 class="box-title">Users</h3>
              
                            <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">
                              <div class="btn-group" data-toggle="btn-toggle">
                                <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                              </div>
                            </div>
                          </div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                              <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
                                {{-- content here --}}

                                @if (count($users)>0)
                                @foreach ($users as $user)
                                <ul class="products-list product-list-in-box">
                                    <li class="item">
                                      <div class="product-img">
                                        <img src="{{ URL::asset('storage/img/upl/'.$user->profile_pic.'') }}" alt="Profile Image">
                                      </div>
                                      <div class="product-info">
                                        <a href="/profile/{{ $user->id }}" class="product-title">{{ $user->name }}
                                          <span class="label label-warning pull-right">{{ $user->id }}</span></a>
                                        <span class="product-description">
                                              {{ $user->email }}
                                            </span>
                                      </div>
                                    </li>
                                    <!-- /.item -->

                                  </ul>
                                @endforeach
                               
                                @else
                                <p>Currently no users</p>
                                @endif

                                {{-- end of content --}}
                            </div>
                            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;">
                            </div>
                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                            </div>
                          </div>
                            <!-- /.chat -->
                            <div class="box-footer">
                              {{-- box footer --}}
                            </div>
                          </div>

                          {{-- this is the end of messages box --}}

                          {{-- the messages div starts here --}}
                            
                        <div class="box box-primary">
                            <div class="box-header ui-sortable-handle" style="cursor: move;">
                              <i class="fa fa-comments"></i>
                
                              <h3 class="box-title">Messages</h3>
                
                              <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">
                                <div class="btn-group" data-toggle="btn-toggle">
                                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                                  </button>
                                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                                </div>
                              </div>
                            </div>
                              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
                                  {{-- content here --}}
                                  
                                  @if (count($messages)>0)
                                  @foreach ($messages as $message)
                                  
                                  <div class="box-footer no-padding">
                                      <ul class="nav nav-stacked">
                                          @if ($message->r_id == Auth::user()->id)
                                              
                                              <div class="box-body">
                                                      <ul class="products-list product-list-in-box">
                                                          <li class="item">
                                                          
                                                          <div class="product-info">
                                                         
                                                              <a class="product-title" href="/messages/{{ $message->s_id }}">{{ ucfirst($message->s_name) }}</a>
                                                              
                                                                  <div class="row">
                                                                          <span class="product-description col-md-6 small">
                                                                                  {{ $message->last_message }}
                                                                          </span>
                                                                          <span class="product-description col-md-6 small">
                                                                              {{ $message->updated_at }}
                                                                          </span>
                                                                  </div>
                                                          </div>
                                                          </li>
                                                   
                                                      </ul>
                                                  </div>
                                          @else
                                          <div class="box-body">
                                              <ul class="products-list product-list-in-box">
                                                  <li class="item">
                                                  
                                                  <div class="product-info">
                                                 
                                                      <a class="product-title" href="/messages/{{ $message->r_id }}">{{ ucfirst($message->r_name) }}</a>
                                                      <div class="row">
                                                              <span class="product-description col-md-6 col-sm-6 small">
                                                                      {{ $message->last_message }}
                                                              </span>
                                                              <span class="product-description col-md-6 col-sm-6 small">
                                                                  {{ $message->updated_at }}
                                                              </span>
                                                      </div>
                                                     
                                                  </div>
                                                  </li>
                                           
                                              </ul>
                                          </div>
                                          
                                          @endif
                                      </ul>
                                  </div>
                                  @endforeach             
                                  @else  
                                  <div class="alert alert-primary" role="alert">
                                      <strong>Currently No Messages</strong>
                                  </div>
                                  @endif

                                  {{-- end of content --}}
                              </div>
                              <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;">
                              </div>
                              <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                              </div>
                            </div>
                              <!-- /.chat -->
                              <div class="box-footer">
                                {{-- box footer --}}
                              </div>
                            </div>
                          {{-- the messages div ends here --}}
                    </div>
                    <div class="col-md-5">
                      {{-- the tasks div starts here --}}
                            
                      <div class="box box-primary">
                          <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="fa fa-tasks"></i>
              
                            <h3 class="box-title">Tasks</h3>
              
                            <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">
                              <div class="btn-group" data-toggle="btn-toggle">
                                <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                              </div>
                            </div>
                          </div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                              <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
                                {{-- content here --}}

                                @if (count($tasks)>0)
                               
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                      <thead>
                                      <tr>
                                        <th>Task id</th>
                                        <th>Tittle</th>
                                        <th>Status</th>
                                        <th>Duration</th>
                                      </tr>
                                      </thead>
                                      @foreach ($tasks as $task)
                                      <tbody>
                                      <tr>
                                        <td><a href="/tasks/{{ $task->id }}"># {{ $task->id }}</a></td>
                                        <td><a href="/tasks/{{ $task->id }}">{{ $task->tittle }}</a></td>
                                        <td><span class="label label-success">Progress</span></td>
                                        <td>
                                            {{ $task->duration }}
                                        </td>
                                      </tr>
                                      
                                      </tbody>
                                      @endforeach
                                    </table>
                                  </div>
                                
                                
                                @else
                                <div class="container-fluid text-center">
                                    <p>Currently no Tasks</p>
                                </div>
                                    
                                @endif
                                 
                                {{-- end of content --}}
                            </div>
                            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;">
                            </div>
                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                            </div>
                          </div>
                            <!-- /.chat -->
                            <div class="box-footer text-center">
                              {{-- box footer --}}
                              <p><a class="" href="/tasks">View all tasks</a></p>
                            </div>
                          </div>
                        {{-- the tasks div ends here --}}
                    
                          @if (Auth::user()->role == 1)
                              {{-- the roles div starts here --}}
                            
                      <div class="box box-primary">
                          <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="fa fa-user"></i>
              
                            <h3 class="box-title">Roles</h3>
              
                            <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">
                              <div class="btn-group" data-toggle="btn-toggle">
                                
                                <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                              </div>
                            </div>
                          </div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                              <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
                                {{-- content here --}}
                                
                                @if (count($roles)>0)
                               
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                      <thead>
                                      <tr>
                                        <th>Role id</th>
                                        <th>Name</th>
                                        
                                      </tr>
                                      </thead>
                                      @foreach ($roles as $role)
                                      <tbody>
                                      <tr>
                                        <td><a href="/roles/{{ $role->id }}"># {{ $role->id }}</a></td>
                                        <td><a href="/roles/{{ $role->id }}">{{ $role->name }}</a></td>
                                      </form>
                                      <td>
                                        <form method="POST" action="{{ route('roles.destroy', ['id'=> $role->id]) }}">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="delete">
                                          <input type="hidden" name="id" value="{{ $role->id }}" id="">
                                          
                                            <button type="submit" name="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Remove</button>
                                          
                                          </td>
                                        
                                        
                                        <td>
                                            <a href="roles/{{ $role->id }}/edit"><button class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add user</button></a>
                                        </td>
                                      </tr>
                                      
                                      </tbody>
                                      @endforeach
                                    </table>
                                  </div>
                                
                                
                                @else
                                <div class="container-fluid text-center">
                                    <p>Currently no roles</p>
                                </div>
                                    
                                @endif
                                 
                                {{-- end of content --}}
                            </div>
                            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;">
                            </div>
                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                            </div>
                          </div>
                            <!-- /.chat -->
                      
                          </div>
                        {{-- the roles div ends here --}} 
                          @endif

                       
                    
                    </div>
                  </div>
        </div>
    </div>
</div>
@endsection
