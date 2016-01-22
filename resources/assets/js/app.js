$(document).ready(function (){
    $.datepicker.setDefaults($.datepicker.regional['en']);
    
    $("#datepicker").datepicker({
        dateFormat: "DD, d MM, yy"
    });
    
    $(".auction-schedule-calendar").click(function(){
        $("#datepicker").datepicker('show');
    });
    
    $(".auction-schedule-add").click(function(){
        $("#datepicker").val('');
    });
});