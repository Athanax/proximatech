@extends('layouts.app')
@section('main')
    

<div class="row">

    <div class="col-md-9 col-lg-9 col-sm-9 col-sm-3 pull-left">
           
<div class="contact-clean col-md-9 col-md-offset-1">
        <form method="post" action="{{ route('messages.store') }}">
            {{ csrf_field() }}
                <h2 class="text-center">Contact us</h2>
                <div class="">
                        <div class="form-group">
                            
                          <label class="control-label">Recipient</label>
                          <select class="form-control select2" name="r_id" 
                                  style="width: 100%;">
                                  <option selected="selected" disabled>No Contact Selected</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                          </select>
                        </div>
                        <!-- /.form-group -->
        
                      </div>
                
                <div class="form-group"><textarea class="form-control" rows="5" name="message" placeholder="Message"></textarea></div>
                <div class="form-group"><button class="btn btn-primary pull-right" type="submit">send </button></div>
            </form>
        </div> 
        
    </div>
    
            
    <div class="col-md-3 col-lg-3 col-sm-3 blog-sidebar">

            
    </div>

</div>

@endsection