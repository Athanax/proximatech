<?php

namespace App\Http\Controllers;

use App\User;
use App\Notification;
use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
        if (Auth::user()->role==1) {
            $users=User::orderBy('id','asc')->paginate(10);
            return view('profile.index')->with('users',$users)->with('conversations',$conversations)->with('notifications', $notifications);
        }
        $user = Auth::user();
        return redirect()->route('profile.show',['user'=> $user])->with('conversations',$conversations)->with('notifications', $notifications);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        //$user= User::where('id', $user)->first();
        
        $user = User::find($id);

       // return $id;
        return view('profile.show')->with('user',$user)->with('conversations',$conversations)->with('notifications', $notifications);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
        //return Auth::user();
        $user = User::find($id);
        if (Auth::user()->id==$id) {
           

        // return $id;
        return view('profile.edit')->with('user',$user)->with('conversations',$conversations)->with('notifications', $notifications);

        }
        else{
            return view('profile.show')->with('user', Auth::user())->with('error','cant edit this profile')->with('conversations',$conversations)->with('notifications', $notifications);
        }
        
        
        //return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
        $alt_profile_pic=Auth::user()->profile_pic;
        $alt_cover_image=Auth::user()->cover_image;


        if ($alt_cover_image == NULL) {
                
            $alt_cover_image='cover_image.jpg';
            //return $alt_cover_image;
        }
        

        if ($alt_profile_pic == NULL) {
                
            $alt_profile_pic='avatar.png';
            //return $alt_profile_pic;
        }
        
        $this->validate($request,[
            'name'=>'required',
            'cover_image'=>'image|nullable|max:1999',
            'profile_pic'=>'image|nullable|max:1999'
        ]);
        //Hanndle File upload
        if($request->hasFile('cover_image')){
            //get filename adn extension
            $filenamewithext=$request-> 	file('cover_image')->	
            getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
            //get just extension
            $extension=$request->	file('cover_image')->	getClientOriginalExtension();
            $fileNameToStore=	$filename.'_cover_'.time().'.'.$extension;
            //upload image
            $path=$request->file('cover_image')->	storeAs('public/img/upl',	$fileNameToStore);
        }
        else{

            $fileNameToStore = $alt_cover_image;

        }
     
       

        if($request->hasFile('profile_pic')){
            //get filename adn extension
            $filenamewithext2=$request->file('profile_pic')->getClientOriginalName();
            //get just filename
            //return $filenamewithext;
            $filename2=pathinfo($filenamewithext2, PATHINFO_FILENAME);
            //get just extension
            $extension2=$request->	file('profile_pic')->	getClientOriginalExtension();
            $fileNameToStore2=	$filename2.'_'.time().'.'.$extension2;
            //upload image
            $path2=$request->file('profile_pic')->	storeAs('public/img/upl',	$fileNameToStore2);
            
        }
        else{
            $fileNameToStore2 = $alt_profile_pic;
            if ($fileNameToStore2==' ') {
                $fileNameToStore2=='avatar2.png';
            }
        }

        
        $user=User::find($id);
            
        $user->name=$request->input('name');
        $user->cover_image=$fileNameToStore;
        $user->profile_pic=$fileNameToStore2;

        $save=$user->save();
        

        
        return redirect()->route('profile.show',['user'=> $user])->with('conversations',$conversations)->with('success','Profile editted Successfully')->with('notifications', $notifications);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
