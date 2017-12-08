<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class GameController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $games = App\Game::all();

        return view('game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('game.create');
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
        $game = new App\Game;
        $game->name = $request->get('name');        
        
        // if ($request->hasFile('flight_image')) {            
        //     $image = $request->file('flight_image');
        //     $name = time() . 'flight.' . $image->getClientOriginalExtension();
        //     $image_path = public_path('images');
        //     $image->move($image_path, $name);
        //     $game->flight_image = $name;            
        // }

        // if ($request->hasFile('block_image')) {            
        //     $image = $request->file('block_image');
        //     $name = time() . 'block.' . $image->getClientOriginalExtension();
        //     $image_path = public_path('images');
        //     $image->move($image_path, $name);
        //     $game->block_image = $name;            
        // }

        $game->save();

        return redirect('/game');
        
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
        $game = App\Game::find($id);
        return view('game.edit', compact('game'));
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
        $game = App\Game::find($id);
        $game->name = $request->get('name');
        $game->save();

        return redirect()->route('game.edit', ['id' =>$id]);
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

    public function play($id) 
    {
        $game = App\Game::find($id);

        return view('game.sample.index', compact('game'));
    }
}
