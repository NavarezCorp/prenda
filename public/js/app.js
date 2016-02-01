$(document).ready(function (){
    $.datepicker.setDefaults($.datepicker.regional['en']);
    
    $("#datepicker, #datepicker-edit").datepicker({
        dateFormat: "DD, d MM, yy",
        onSelect: function(dateText){
            $('.auction-schedule-add').removeAttr('disabled');
        }
    });
    
    $(".auction-schedule-calendar").click(function(){
        $("#datepicker").datepicker('show');
    });
    
    $(".auction-schedule-edit").click(function(){
        $("#datepicker-edit").datepicker('show');
    });
    
    $(".edit-button").click(function(){
        console.log('edit button clicked with id:' + $(this).attr('id'));
        $(".auction-schedule-edit-action-" + $(this).attr('id')).removeClass('hidden');
    });
    
    $(".auction-schedule-cancel").click(function(){
        $('#datepicker-edit').val('');
        $(".auction-schedule-edit-action").addClass('hidden');
    });
    
    /*
    $(".auction-schedule-add").click(function(){
        console.log('saving data...');
        var date_str = $("#datepicker").val();
        $("#datepicker").val('');
        $('.auction-schedule-add').attr('disabled','disabled');
        
        $.ajax({
            method: "POST",
            url: "/auction",
            data: {date:date_str, '_token': $('input[name=_token]').val()}
        })
        .done(function(data){
            console.log("second success");
            console.log(data);
        })
        .fail(function(data){
            console.log("error");
            console.log(data.responseText);
        })
        .always(function(){
            console.log("complete");
        })
        .complete(function(){
            console.log("second complete");
        });
    });
    */
});