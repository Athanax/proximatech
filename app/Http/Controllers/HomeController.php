<?php

namespace App\Http\Controllers;
use App\Notification;
use App\Conversation;
use App\User;
use App\Message;
use App\Task;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $notifications = Notification::where('status','2')
            ->orderBy('id','desc')
            ->where('user_id', Auth::user()->id)
            ->get();
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')
            ->orderBy('updated_at','desc')
            ->get();
        $users = User::all();
        
        $messages = Conversation::all();

        $tasks = Task::all();
        
        $roles = Role::all();

        return view('home')
            ->with('notifications', $notifications)
            ->with('users', $users)
            ->with('messages', $messages)
            ->with('tasks', $tasks)
            ->with('roles', $roles)
            ->with('conversations',$conversations);
            
      
       
    }
}
