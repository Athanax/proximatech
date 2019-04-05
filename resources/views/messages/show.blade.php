@extends('layouts.app')

@section('main')


<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
 
        
  



    <div class="container-fluid">
            <!-- DIRECT CHAT PRIMARY -->
            <div class="box box-primary direct-chat direct-chat-primary" >
              <div class="box-header with-border">
                <h3 class="box-title">{{ ucfirst($reciever->name) }}</h3>
  
                <div class="box-tools pull-right">
                  <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages">3</span>
    
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                    <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" id="mess">
                        @foreach ($chats as $chat)
                        <!--/.direct-chat-messages-->
                            @if ($chat->s_id==Auth::user()->id)
                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">{{ Auth::user()->name }}</span>
                                        <span class="direct-chat-timestamp pull-left">{{ $chat->created_at }}</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{{ URL::asset('storage/img/upl/'.Auth::user()->profile_pic.'') }}" alt="Message User Image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                        {{ $chat->body }}
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                            @elseif($chat->r_id==Auth::user()->id)

                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">{{ $reciever->name }}</span>
                                        <span class="direct-chat-timestamp pull-right">{{ $chat->created_at }}</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{{ URL::asset('storage/img/upl/'.$reciever->profile_pic.'') }}" alt="Message User Image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                        {{ $chat->body }}
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                            @endif 
                        @endforeach
                    
                    <div class="" id="scroll">
                     
                    </div>
                    </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer" id="send">
                <form action="{{ route('messages.update',[$reciever->id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put" >
                  <div class="input-group">
                    <input type="text" name="body" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-btn">
                          <input type="submit" value="Send" class="btn btn-primary btn-flat">
                        </span>
                  </div>
                </form>
              </div>
              <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
          </div>

</div>

<div class="col-md-3 col-lg-3 blog-sidebar">

        
</div>

  <script>
 
 $(document).ready(function(){
  scrollingElement = document.getElementById('mess');
  scrollingElement.scrollTop = scrollingElement.scrollHeight;

   
 });


  </script>
      
@endsection