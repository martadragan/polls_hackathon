@extends('layouts.app')


@section('content')
    
<h1>Polls:</h1>


@foreach ($polls as $poll)

{{-- <h3>{{ $poll->title }}</h3>
<br> --}}
<h3><a href="{{ action('PollController@show', $poll->id)}}">{{ $poll->text }}</a></h3>
<br>

  
    @if ($poll->user_id == Auth::id())
    <button><a href="{{ action('PollController@edit', $poll->id)}}">Edit</a></button>
    <hr>
    <br>
    <br>
    
    @endif
@endforeach

@endsection

