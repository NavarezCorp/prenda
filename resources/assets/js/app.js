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
    
    $(".image-uploader").change(function(){
        var image_id = '';
        
        switch($(this).attr('id')){
            case 'image_1':
                image_id = 'img_1';
                break;
                
            case 'image_2':
                image_id = 'img_2';
                break;
                
            case 'image_3':
                image_id = 'img_3';
                break;
                
            case 'image_4':
                image_id = 'img_4';
                break;
                
            case 'image_5':
                image_id = 'img_5';
                break;
        }
        
        previewFile(image_id, $(this).attr('id'));
    });
    
    $(".item-photos-thumbnail > img").click(function(){
        var src = '';
        
        switch($(this).attr('alt')){
            case 'image1':
                src = '/images/' + $(this).attr('class') + '_image_1_725x483.jpg';
                break;
                
            case 'image2':
                src = '/images/' + $(this).attr('class') + '_image_2_725x483.jpg';
                break;
                
            case 'image3':
                src = '/images/' + $(this).attr('class') + '_image_3_725x483.jpg';
                break;
                
            case 'image4':
                src = '/images/' + $(this).attr('class') + '_image_4_725x483.jpg';
                break;
        }
        
        $(".item-photos-thumbnail-big").attr('src', src);
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

function previewFile(image_id, file_id){
    console.log(image_id);
    console.log(file_id);
    
    var preview = document.getElementById(image_id);
    var file = document.getElementById(file_id).files[0];
    var reader = new FileReader();

    reader.onloadend = function(){
        preview.src = reader.result;
    }
    
    if(file) reader.readAsDataURL(file);
    else preview.src = "";
}