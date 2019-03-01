@extends('layouts.app')

@section('content')
    
<form method="post" action="{{ action('PollController@update', $poll->id) }}">
    @csrf
    {{ method_field('PUT')}}
       <div class="form-group">
         <label>Title:</label>
         <input type="text" name="title" class="form-control" value="{{ old('title', $poll->title) }}">
       </div>
       <div class="form-group">
        <label for="description">Text: </label>
          <textarea class="form-control" name="text" id="" rows="3"> {{ old('text', $poll->text) }} </textarea>
      </div>
      <div class="options">          
          
          @foreach ($poll->options as $option)
              <input type="text" value="{{$option->option}}" name="option[{{$option->id}}]">
          @endforeach
                  
      </div>
       <button type="submit" class="btn btn-primary">Submit</button>
      
     </form>
   

@endsection
