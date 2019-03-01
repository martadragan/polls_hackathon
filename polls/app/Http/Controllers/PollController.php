<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Option;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    public function index()
    {
        $polls = Poll::all();
        return view('/polls/index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        $user = auth()->user();
        $user_id = $user->id;
        return view('polls/create', compact('user_id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
      
       
  
       $poll = new Poll;
       $poll->title = $request->title;
       $poll->user_id = Auth::id();
       $poll->text = $request->text;
       $poll->save();

       $option_texts = $request->input('option', []);
       
       foreach ($option_texts as $nr => $option) {
           $option_object = new Option;
           $option_object->option = $option;
           $option_object->poll_id = $poll->id;
           $option_object->save();
           
       }


       

        return redirect(action('PollController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Poll::findOrFail($id);
        $isVoted = Vote::where([
            ['user_id', '=', \Auth::id()],
            ['poll_id', '=', $id]
        ])->count();

        return view('/polls/show', compact(['poll', 'isVoted']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll = Poll::findOrFail($id);
    
        return view('/polls/edit', compact(['poll']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $poll = Poll::findOrFail($id);
        $poll->update($request->only([
            'title',
            'text'
        ]));

        $option_texts = $request->input('option', []);
       
       foreach ($option_texts as $option_id => $option) {
           $option_object = Option::find($option_id);
           $option_object->option = $option;
           $option_object->poll_id = $poll->id;
           $option_object->save();
           
       }

        return redirect(action('PollController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Poll::findOrFail($id);
        $poll->delete();
        return redirect('/polls');
    }
}
