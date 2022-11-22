$(function(){
    $('#fadein').click(function () { 
        $('#text-anim').fadeIn(1000,'linear',function(){
            
        });
        
    });
    $('#fadeout').click(function () { 
        $('#text-anim').fadeOut(1000,'linear',function(){
            
        });
        
    });
    // pakai fadetoggle 
    $('#fade').click(function () { 
        
    $('#text-anim').fadeToggle(1000, 'linear');
        
    });

    $('#fadetoin').click(function () { 
        $('#text-anim').fadeTo(1000,1,'linear',function(){
            
        });
        
    });
    $('#fadetoout').click(function () { 
        $('#text-anim').fadeTo(1000,0.4,'linear',function(){
            
        });
        
    });
    $('#show').click(function () { 
        $('#text-anim').show(500,'linear',function(){
        });
    });
    $('#hide').click(function () { 
        $('#text-anim').hide(500,'linear',function(){
        });
    });
    // pakai toggle
    $('#toggle').click(function () { 
        $('#text-anim').toggle(500,'linear',function(){
        });
    });
    $('#slideup').click(function () { 
        $('#text-anim').slideUp(500,'linear',function(){
        });
    });
    $('#slidedown').click(function () { 
        $('#text-anim').slideDown(500,'linear',function(){
        });
    });
    $('#slidetoggle').click(function () { 
        $('#text-anim').slideToggle(500,'linear',function(){
        });
    });
})