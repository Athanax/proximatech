<?php

namespace App\Http\Controllers;

use App\Post;
use App\Notification;
use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        $posts = Post::orderBy('id','asc')->paginate(5);
        //return $posts;
        return view('posts.index')->with('posts', $posts)->with('conversations',$conversations)->with('notifications', $notifications);

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
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
        if (Auth::user()->role == 1) {
            

        return view('posts.create')->with('notifications', $notifications)->with('conversations',$conversations);
        }
        $posts = Post::orderBy('id','asc')->paginate(5);
        return view('posts.index')->with('posts', $posts)->with('notifications', $notifications)->with('conversations',$conversations);
    
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
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        if (Auth::user()->role==1) {
            $this->validate($request,[
                'body'=>'required',
                'url'=>'nullable|image|max:1999',
            ]);
            

                        
            if($request->hasFile('url')){
                //get filename adn extension
                $filenamewithext=$request->file('url')->getClientOriginalName();
                //get just filename
                $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
                //get just extension
                $extension=$request->	file('url')->getClientOriginalExtension();
                $fileNameToStore=	$filename.'_'.time().'.'.$extension;
                //upload image
                $path=$request->file('url')->	storeAs('public/img/posts',	$fileNameToStore);
            }
            else{
                $fileNameToStore = 'noimage.jpg';
            }

            $post=new Post;
            $post->body=$request->input('body');
            $post->url=$fileNameToStore;
            $post->user_id=Auth::user()->id;
            $post->save();

            return redirect('/posts')->with('success->post created successfully')->with('conversations',$conversations)->with('notifications', $notifications);
            //return $fileNameToStore;

        }
        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        $poste = Post::find($post)->first();

        return view('posts.show')->with('post', $poste)->with('notifications', $notifications)->with('conversations',$conversations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();

        $post = Post::find($post)->first();

        return view('posts.edit')->with('post',$post)->with('notifications', $notifications)->with('conversations',$conversations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
        if (Auth::user()->role==1) {
            $this->validate($request,[
                'body'=>'required',
                'url'=>'nullable|image|max:1999',
            ]);
            

                        
            if($request->hasFile('url')){
                //get filename adn extension
                $filenamewithext=$request->file('url')->getClientOriginalName();
                //get just filename
                $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
                //get just extension
                $extension=$request->	file('url')->getClientOriginalExtension();
                $fileNameToStore=	$filename.'_'.time().'.'.$extension;
                //upload image
                $path=$request->file('url')->	storeAs('public/img/posts',	$fileNameToStore);
            }
            else{
                $fileNameToStore = $post->url;

                $fileNameToStore;
                //return $fileNameToStore;
            }
           // return $post;

            $poste=Post::find($post->id);
            //return $post;
            $poste->body=$request->input('body');
            $poste->url=$fileNameToStore;
            $poste->user_id=Auth::user()->id;
            $poste->save();

            return redirect('/posts')->with('success->Post Editted Successfully')->with('conversations',$conversations)->with('notifications', $notifications);
            //return $fileNameToStore;

        }
        return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $conversations=Conversation::Where('r_id',auth()->user()->id)
            ->where('status','unread')->orderBy('updated_at','desc')->get();
        $notifications = Notification::where('status','2')->where('user_id', Auth::user()->id)->get();
       
        if(Auth::user()->role==1) {

            
            $del = Post::find($post)->first();
            //return $del;

            $del->delete();
    
            return redirect('/home')->with('conversations',$conversations)->with('success','This Task has been Deleted successfully')->with('notifications', $notifications);
                
            }
    
            return view('home')->with('notifications', $notifications)->with('conversations',$conversations);
    }
}
