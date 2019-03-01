

$(document).ready(function(){

var counter = 2;

$("#addButton").click(function () {
    
var newInputField = $(document.createElement('div'))
   .attr("id", 'TextBoxDiv' + counter);
            
newInputField.after().html('<label>Textbox #'+ counter + ' : </label>' +
    '<input type="text" name="option' + counter + 
    '" id="option' + counter + '" value="" >');
        
newInputField.appendTo("#input_fields_container_part");

    
counter++;
 });});
