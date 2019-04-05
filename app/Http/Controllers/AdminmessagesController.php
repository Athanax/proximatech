<?php

namespace App\Http\Controllers;

use App\Adminmessage;
use Illuminate\Http\Request;

class AdminmessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //return $request;
        $message = new Adminmessage;

        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();
        return redirect()->back()->with('success','You have send a message to the Proximatech. Reply will be done via email as soon as possible');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adminmessage  $adminmessage
     * @return \Illuminate\Http\Response
     */
    public function show(Adminmessage $adminmessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adminmessage  $adminmessage
     * @return \Illuminate\Http\Response
     */
    public function edit(Adminmessage $adminmessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adminmessage  $adminmessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adminmessage $adminmessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adminmessage  $adminmessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adminmessage $adminmessage)
    {
        //
    }
}
