<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Conversation;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $converses=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        
        //return chats and messages
        if (Auth::user()) {

            $messages = Message::where('s_id',Auth::user()->id)
                ->orWhere('r_id', Auth::user()->id)->get();

           // 
            $conversations=Conversation::where('s_id',auth()->user()->id)
                ->orWhere('r_id',auth()->user()->id)
                ->orderBy('updated_at','desc')
                ->get();

            $notifications = Notification::where('status','2')
                ->where('user_id', Auth::user()->id)
                ->get();

            return view('messages.index')->with('messages',$conversations)
                ->with('conversations',$converses)
                ->with('notifications', $notifications);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $converses=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        
        $users = User::all();
        //return $users;
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        return view('messages.create')->with('users',$users)->with('conversations',$converses)->with('notifications', $notifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $converses=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        
        $this->validate($request,[
            'r_id'=>'required',
            'message'=>'required'
        ]);
        $message=new Message;
        $message->body=$request->input('message');
        $message->s_id=auth()->user()->id;
        $message->r_id=$request->input('r_id');
   
        $message->save();
        
        $user=$request->input('r_id');

        $chat=Conversation::where(function($query) use($user){
            $query->where('s_id',auth()->user()->id)
            ->where('r_id',$user);
        })->orWhere(function($query) use($user){
            $query->where('s_id',$user)
            ->where('r_id',auth()->user()->id);
        })->get();
        //return $chat;
        
      $r_name=User::find($user);
     //return $r_name->name;
      
        if(count($chat)==0){
            
            $conversation=new Conversation;
            $conversation->s_id=auth()->user()->id;
            $conversation->r_id=$user;
            $conversation->s_name=Auth::user()->name;
            $conversation->r_name=$r_name->name;
            $conversation->last_message=$request->input('message');
            $conversation->save();

        }
        else{
            $chat_id= $chat[0]['id'];
            $converse=Conversation::find($chat_id);
            $converse->s_id=auth()->user()->id;
            $converse->r_id=$user;
            $converse->s_name=Auth::user()->name;
            $converse->r_name=$r_name->name;
            $converse->last_message=$request->input('message');
            $converse->save();
        }

        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        
        return redirect()->route('messages.show',['reciever'=>$r_name])->with('conversations',$converses)->with('notifications', $notifications);
        }
        
    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(User $message)
    {
        //
         $user=$message->id;
         //return $user;
         $set_read=Conversation::Where('r_id',auth()->user()->id)->where('s_id', $user)->where('status','unread')->orderBy('updated_at','desc')->first();
        //return $set_read;
        if (!empty($set_read)) {
            if ($set_read->r_id == Auth::user()->id) {
                $set_read->status = 'read';
                $set_read->save();
            }
        }

        
        

        $messages=Message::where(function($query) use($user){
            $query->where('s_id',auth()->user()->id)
            ->where('r_id',$user);
        })->orWhere(function($query) use($user){
            $query->where('s_id',$user)
            ->where('r_id',auth()->user()->id);
        })->orderBy('created_at','asc')->get();
        //return $messages;
        $converses=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        
        $user_2 = User::find($user);

        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        
        return view('messages.show')->with('chats',$messages)->with('conversations',$converses)->with('reciever', $user_2)->with('notifications', $notifications);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $message)
    {
        //
        $converses=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        $this->validate($request,[
            'body'=>'required'
        ]);
        $name = $message->name;
        $user=$message->id;
        
        if (Auth::user()) {


            $message= new Message;
            $message->s_id=Auth::user()->id;
            $message->r_id=$user;
            $message->body=$request->input('body');
            $message->save();

            $chat=Conversation::where(function($query) use($user){
                $query->where('s_id',auth()->user()->id)
                ->where('r_id',$user);
            })->orWhere(function($query) use($user){
                $query->where('s_id',$user)
                ->where('r_id',auth()->user()->id);
            })->get();
         
          $chat_id= $chat[0]['id'];

            $converse=Conversation::find($chat_id);
            $converse->s_id=auth()->user()->id;
            $converse->r_id=$user;
            $converse->s_name=Auth::user()->name;
            $converse->r_name=$name;
            $converse->last_message=$request->input('body');
            $converse->save();
            $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();


            return redirect()->route('messages.show',['reciever'=>$user])->with('conversations',$converses)->with('notifications', $notifications);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
