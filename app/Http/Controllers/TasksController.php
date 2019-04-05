<?php

namespace App\Http\Controllers;

use App\Task;
use App\Notification;
use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notifications = Notification::where('status','2')->orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        $tasks = Task::orderBy('id','asc')->paginate(10);
        //return $tasks;
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        return view('tasks.index')->with('tasks',$tasks)->with('notifications', $notifications)->with('conversations',$conversations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $notifications = Notification::where('status','2')->orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        return view('tasks.create')->with('notifications', $notifications)->with('conversations',$conversations);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $notifications = Notification::where('status','2')->orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        $this->validate($request,[
            'tittle'=>'required',
            'duration'=>'required',
            'description'=>'required',
            'attachment'=>'nullable|mimes:pdf,png|max:2999',
        ]);


                        
            if($request->hasFile('attachment')){
                //get filename adn extension
                $filenamewithext=$request->file('attachment')->getClientOriginalName();
                //get just filename
                $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
                //get just extension
                $extension=$request->	file('attachment')->getClientOriginalExtension();
                $fileNameToStore=	$filename.'_'.time().'.'.$extension;
                //upload image
                $path=$request->file('attachment')->	storeAs('public/img/attachments',	$fileNameToStore);
            }else {
                $fileNameToStore=NULL;
            }
           
           // return $post;

           
            //return redirect('/posts')->with('success->Post Editted Successfully');
            //return $fileNameToStore;
            $task = new Task;
            $task->tittle=$request->input('tittle');
            $task->duration=$request->input('duration');
            $task->user_id=Auth::user()->id;
            $task->dev_id=1;
            $task->description=$request->input('description');
            $task->attachment=$fileNameToStore;
            //return $task;

            $notification = new Notification;
            $notification->user_id = Auth::user()->id;
            $notification->body = 'You have successfully created a new task:'.$task->tittle;

            //return $task->tittle;
            //return $notification;

            $task->save();
            $notification->save();
            $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
            return redirect('/tasks')->with('success','Task Created Successfully')->with('notifications', $notifications)->with('conversations',$conversations);

        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        $notifications = Notification::where('status','2')->orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        //return $task;
        //$taske = Task::find($task)->first();
        //return $taske;
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        return view('tasks.show')->with('task', $task)->with('notifications', $notifications)->with('conversations',$conversations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        
        $notifications = Notification::where('status','2')->orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        if ($task->user_id==Auth::user()->id) {
            $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        return view('tasks.edit')->with('task', $task)->with('notifications', $notifications)->with('conversations',$conversations);

        //return view('tasks.edit');

        }elseif (Auth::user()->role==1) {

            //$task = Task::find($task)->first();
            $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
            return view('tasks.edit')->with('task', $task)->with('notifications', $notifications)->with('conversations',$conversations);
    

        }
        $conversations=Conversation::where('s_id',auth()->user()->id)->where('status','unread')
            ->orWhere('r_id',auth()->user()->id)->orderBy('updated_at','desc')->get();
        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        //return $task;
        $notifications = Notification::where('status','2')->orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        $taske = $task;
        //return $taske;
        if ($taske->user_id==Auth::user()->id) {

        $this->validate($request,[
            'tittle'=>'required',
            'duration'=>'required',
            'description'=>'required'
        ]);
        
        //$taske = Task::find($task)->first();

        $taske->tittle=$request->input('tittle');
        $taske->duration=$request->input('duration');
        $taske->user_id=Auth::user()->id;
        $taske->dev_id=1;
        $taske->description=$request->input('description');

        // send a notification
        $notification = new Notification;
        $notification->user_id = Auth::user()->id;
        $notification->body = 'You have successfully edited '.$task->tittle;

        $notification->save();

        $notification = new Notification;
        $notification->user_id =1;
        $notification->body = 'User '.$taske->user_id.' has editted his task';

        $notification->save();
        $taske->save();
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        return redirect('/tasks')->with('success','This Task has been updated successfully')->with('conversations',$conversations)->with('notifications', $notifications);

        }elseif (Auth::user()->role==1) {
            $this->validate($request,[
                'tittle'=>'required',
                'duration'=>'required',
                'description'=>'required'
            ]);
            
            $taske = Task::find($task)->first();
    
            $taske->tittle=$request->input('tittle');
            $taske->duration=$request->input('duration');
            $taske->user_id=$taske->user_id;;
            $taske->dev_id=1;
            $taske->description=$request->input('description');

            //send a notification
            $notification = new Notification;
            $notification->user_id = Auth::user()->id;
            $notification->body = 'You have successfully edited '.$task->tittle.' task';
            $notification->save();

            $notification = new Notification;
            $notification->user_id =1;
            $notification->body = 'User '.$taske->user_id.' has editted his task';
    
            $notification->save();

            //return $notification;
            $taske->save();
            $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
            return redirect('/tasks')->with('success','This Task has been updated successfully')->with('notifications', $notifications);

        }

        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $notifications = Notification::where('status','2')->orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        //dd($task);
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        if ($task->user_id==Auth::user()->id) {
    
       
        //$del=Task::find($task)->first();

        //return $task;
        $task->delete();

        // send a notification
        $notification = new Notification;
        $notification->user_id = Auth::user()->id;
        $notification->body = 'You have successfully deleted '.$task->tittle;

        $notification->save();

        $notification = new Notification;
        $notification->user_id =1;
        $notification->body = 'User '.$task->user_id.' has deletd his task'.$task->id;

        $notification->save();
            
        return redirect('/home')->with('success','This Task has been Deleted successfully')->with('conversations',$conversations)->with('notifications', $notifications);

        }elseif (Auth::user()->role==1) {

            
        $del=Task::find($task)->first();

        $del->delete();

        return redirect('/home')->with('success','This Task has been Deleted successfully')->with('conversations',$conversations)->with('notifications', $notifications);
            
        }

        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
    }
}
