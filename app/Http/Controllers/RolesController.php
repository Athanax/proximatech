<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Notification;
use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        if (Auth::user()->role==1) {
             //
        //$roles = Role::orderBy('id','asc')->get();
        $roles = Role::all();
        //return $roles;

        return view('roles.index')->with('roles', $roles)->with('notifications', $notifications)->with('conversations',$conversations);
        }

        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        if (Auth::user()->role ==1) {
            $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
            if (Auth::user()->role==1) {
                return view('roles.create')->with('notifications', $notifications)->with('conversations',$conversations);
            }
            return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
        }
        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
        if (Auth::user()->role==1) {
             //
            $this->validate($request,[
                'name'=>'required'
            ]);

            $role = new Role;

            $role->name = $request->input('name');
            $role->save();

            $notification = new Notification;
            $notification->user_id =Auth::user()->id;
            $notification->body = 'You have created a new role. '.$role->name;
           
            $notification->save();

            return redirect('/roles')->with('success','New role created successfully')->with('conversations',$conversations)->with('notifications', $notifications);
        }

        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->orderBy('id','desc')->get();

        if (Auth::user()->role==1) {
            $role = Role::find($role)->first();

            $users = User::where('role',$role->id)->get();

            //return $users;

            return view('roles.show')->with('role',$role)->with('users', $users)->with('conversations',$conversations)->with('notifications', $notifications);
        }
        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        //return $role->id;
        $users = User::where('role','!=',$role->id)->get();
        //return $users;
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        return view('roles.edit')->with('role',$role)->with('conversations',$conversations)->with('notifications', $notifications)->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        if (Auth::user()->role == 1) {
            
            $this->validate($request,[
                'user'=>'required'
            ]);
            $users = User::where('role',$role->id)->get();
            
            $user = $request->input('user');

            $user = User::find($user);
            //return $user;

            $user->role = $role->id;
            $user->save();

            $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
            
            $notification = new Notification;
            $notification->user_id =$user->id;
            $notification->body = $user->name.', You have been given a new role. Check profile for more details.';
           
            $notification->save();

            $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
            
            $notification = new Notification;
            $notification->user_id =Auth::user()->id;
            $notification->body = 'You have given '.ucfirst($user->name).', Id='.$user->id.' a new role.';
           
            $notification->save();
            //return 'details saved';
            return view('roles.show')->with('role', $role)->with('conversations',$conversations)->with('notifications', $notifications)->with('users', $users);
        }
        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
        
        if (Auth::user()->role==1) {
            $user = Auth::user();

            $del = Role::find($role)->first();

            //return $del;

            $del->delete();

            return redirect('/home')->with('user', $user)->with('conversations',$conversations)->with('success', 'Role Deleted successfully')->with('notifications', $notifications);
        }

        return view('home')->with('conversations',$conversations)->with('notifications', $notifications);
        
    }
}
