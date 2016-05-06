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
            case 'image0':
                src = '/images/' + $(this).attr('class') + '/image_0_725x483.jpg';
                break;
                
            case 'image1':
                src = '/images/' + $(this).attr('class') + '/image_1_725x483.jpg';
                break;
                
            case 'image2':
                src = '/images/' + $(this).attr('class') + '/image_2_725x483.jpg';
                break;
                
            case 'image3':
                src = '/images/' + $(this).attr('class') + '/image_3_725x483.jpg';
                break;
                
            case 'image4':
                src = '/images/' + $(this).attr('class') + '/image_4_725x483.jpg';
                break;
        }
        
        $(".item-photos-thumbnail-big").attr('src', src);
    });
    
    $(".select-pawnshop").change(function(){
        //$('.add-branch').removeClass('disabled-link');
        //$('.add-branch').removeAttr('disabled');
        //$('.select-branch').removeAttr('disabled');
    });
    
    $(".select-province").change(function(){
        $.getJSON("/search/" + $(this).attr('name') + ':' + $(this).val(), function(data){
            var html = '';
            
            for(var x = 0; x < data.cities.length; x++) html += '<option value="' + data.cities[x].id + '">' + data.cities[x].name + '</option>';
            
            $('.select-city').html(html);
        });
    });
    
    $(".select-pawnshops").change(function(){
        window.location = '/search/ps:' + $(this).val();
    });
    
    // -----------------------
    var substringMatcher = function(strs){
        return function findMatches(q, cb){
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str){
                if(substrRegex.test(str)){
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };
    
    var branches_ = [];
    
    $.getJSON("/search/branches", function(data){
        for(var i = 0; i < data.branches.length; i++) branches_[i] = data.branches[i].branch;
    });
    
    $('#branches-autocomplete .typeahead').typeahead(
        {
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'states',
            source: substringMatcher(branches_)
        }
    );
    // -----------------------
    
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
        .complete(function(){auction-schedule-add
            console.log("second complete");
        });
    });
    */
    
    $("#dialog-confirm").dialog({
        autoOpen: false,
        resizable: false,
        height: 180,
        modal: true,
        buttons: {
            "Yes": function(){
                $(this).dialog("close");
                
                $.getJSON("/update", {'type':'tag', 'id':$('.tag-as-sold').attr('id')}, function(result){
                    $('.tag-as-sold').removeClass('btn-primary');
                    $('.tag-as-sold').addClass('btn-default disabled');
                });
            },
            "No": function(){
                $(this).dialog("close");
            }
        }
    });
    
    $(".tag-as-sold").click(function(){
        $("#dialog-confirm").dialog('open');
    });
    
    $(".delete-auction-schedule").click(function(){
        return confirm("Do you want to delete this auction schedule?");
    });
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