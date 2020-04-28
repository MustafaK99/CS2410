<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Items;

class ItemsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Items::orderBy('category','desc')->paginate(10);
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
            'category' => 'required',
            'itemName' => 'required',
            'description'=> 'required',
            'foundPlace'=> 'required',
            'colour' => 'required',
             'item_image' => 'image|max:1999'

        ]);

        
            $filenameWithExt = $request->file('item_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('item_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('item_image')->storeAs('public/item_images',$fileNameToStore);
        
        $item = new Items;
        $item->category = $request->input('category');
        $item->itemName = $request->input('itemName');
        $item->description = $request->input('description');
        $item->foundPlace = $request->input('foundPlace');
        $item->colour = $request->input('colour');
        $item->item_image =  $fileNameToStore;
        $item->save();

        return redirect ('/items')->with('success', 'Item Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item =  Items::find($id);
        return view('items.show')->with('item' , $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //
    }
}
