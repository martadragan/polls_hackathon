@extends('layouts.app')

@section('content')
<div class="jumbotron">

<h1>{{ $poll->text}}</h1>
<form method="post" action="{{ action('OptionController@vote') }}">
    @csrf

    @if(! $isVoted)
    <select name="id" id="">

    @foreach ($poll->options as $option)
            <option value="{{$option->id}}"> {{$option->option }} </option>
        @endforeach

        
    </select>

    
    
    <button type="submit">VOTE</button>

    @else 
        <h3>You have already voted</h3>
           <ul>
                @foreach ($poll->options as $option)
                <li>{{$option->option }} : {{$option->nr_of_times }}</li>
            @endforeach       
        </ul> 
    @endif

    <button type="submit"><a href="http://polls.localhost:8080/poll">Back to Polls</a> </button>
</form>
</div>
@endsection