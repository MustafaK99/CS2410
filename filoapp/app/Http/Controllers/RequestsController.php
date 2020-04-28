<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Requests;

class RequestsController extends Controller
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
        $this->validate($request,[
            'requestReason' => 'required',

        ]);
       
       
       
        $itemRequest = new Requests;
        $itemRequest->requestReason  = $request->input('requestReason');
        $itemRequest->item_id  = $request->input('itemId');
        $itemRequest->status = 'pending';
        $itemRequest->user_id = auth()->user()->id;
        $itemRequest->save();
        return redirect ('/items')->with('success', 'Request Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request= Requests::find($id);
        
        //Check if post exists before deleting
        if (!isset($request)){
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
       // if(auth()->user()->id !==$post->user_id){
        //    return redirect('/posts')->with('error', 'Unauthorized Page');
       // }

       // if($post->cover_image != 'noimage.jpg'){
            // Delete Image
         //   Storage::delete('public/cover_images/'.$post->cover_image);
        //}
        
        $request->delete();
        return redirect('/home')->with('success', 'Request Removed');
    }

}

