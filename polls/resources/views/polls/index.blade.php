@extends('layouts.app')

<button><a href="{{ action('PollController@create')}}">CREATE</a></button>


@section('content')
    
<h1>Polls:</h1>


@foreach ($polls as $poll)

<h2>Title: {{ $poll->title }}</h2>
<br>
<h3>Description: {{ $poll->text }}</h2>
<br>

    <button><a href="{{ action('PollController@show', $poll->id)}}">DETAILS</a></button>
<hr>
@endforeach

@endsection

