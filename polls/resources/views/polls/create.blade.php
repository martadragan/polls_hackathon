@extends('layouts.app')

@section('content')
    
<form method="post" action="{{ action('PollController@store') }}">
    @csrf
<input type="hidden" name="user_id" value="{{ $user_id }}" />
       <div class="form-group">
         <label>Title:</label>
         <input type="text" name="title" class="form-control">
       </div>
       <div class="form-group">
        <label for="description">Text: </label>
          <textarea class="form-control" name="text" id="" rows="3"> {{old('text')}} </textarea>
      </div>
      <div class="options">
      </div>
       <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
     </form>
   

@endsection
