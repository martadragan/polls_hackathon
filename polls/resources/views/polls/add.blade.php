@extends('polls/create')
<button class="add_row"><a href="#"></a></button>
<div class="options">
    <tbody>
    <td><input type="text" name="option[]"></td>
    </tbody>
</div>

<script type="text/javascript">
    $('.addRow').on('click', function(){
        addRow();
    });

    function addRow(){
        let input = <td><input type="text" name="option[]"></td>;
        $('tbody').append('td');
    };
</script>