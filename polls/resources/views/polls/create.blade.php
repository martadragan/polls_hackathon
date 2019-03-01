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
          <div id="input_fields_container_part">
              <div>
                <input type='button' value='Add Button' id='addButton'>
              </div>
              <br>
            </div>
      </div>
       <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
     </form>
   
     <script>


$(document).ready(function(){

var counter = 2;

$("#addButton").click(function () {
    
var newInputField = $(document.createElement('div'))
   .attr("id", 'TextBoxDiv' + counter);
            
newInputField.after().html('<label>Option:</label>' +
    '<input type="text" name="option[' + counter + 
    ']" id="option' + counter + '" value="" >');
        
newInputField.appendTo("#input_fields_container_part");

    
counter++;
 });});

     </script>

@endsection
