<?php

namespace App\Http\Controllers;

use App\Option;
use App\Poll;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Option  $option
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Option $option)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Option  $option
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Option $option)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Option  $option
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Option $option)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Option  $option
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Option $option)
    // {
    //     //
    // }

    // public function find($id) 
    // {
    //     $poll = findOrFail($id);
        
    // }

    public function vote()
    {

        $request = request();
        // dd($request->all());
        $option = Option::find($request->id);
        $option->nr_of_times++;
        $vote = new \App\Vote;
        $vote->poll_id = $option->poll_id;
        $vote->option_id = $option->id;
        $vote->user_id = \Auth::id();

        $vote->save();
        $option->save();
 
        return back();
        
    }
}
