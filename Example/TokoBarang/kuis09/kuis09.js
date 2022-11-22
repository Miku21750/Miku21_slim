$(function(){
    $('#add-class').click(function () { 
        $('#text-change').addClass('text-red');
    });
    $('#remove-class').click(function () { 
        $('#text-change').removeClass('text-red');
    });
    $('#add-remove-class').click(function () { 
        $('#text-change').removeClass('text-red').addClass('text-blue');
    });
    $('#check-class').click(function () { 
        alert($('#text-change').hasClass('text-blue'))
    });
    $('#add-text').click(function () { 
        $('#text-change').append('<br>Text2');
    })
})
