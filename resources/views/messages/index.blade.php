@extends('layouts.app')

@section('main')

<div class="row">

<div class="col-md-9 col-lg-9 col-sm-9 col-sm-3 pull-left">
        <div class="box box-primary">

        <div class="box-header with-border">
                <h3 class="box-title">Messages</h3>
                <a href="/messages/create" class="btn btn-primary pull-right">New Message</a>
              </div>
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

       

    
</div>


</div>


<div class="col-md-3 col-lg-3 col-sm-3 blog-sidebar">

        
</div>

</div>

      
@endsection