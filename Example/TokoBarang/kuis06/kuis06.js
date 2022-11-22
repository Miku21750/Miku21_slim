// if (typeof jQuery === "undefined") {
//     var script = document.createElement('script');
//     script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
//     script.type = 'text/javascript';
//     document.getElementsByTagName('head')[0].appendChild(script);
// }
function hideEl(){
    $(function(){
        $('p').hide()
    })
}
function hideClass(){
    $(function(){
        $('.hide').hide()
    })
}
function hideAttr(){
    $(function(){
        $('[href]').hide()
    })
}
$(function(){
    $("a").hide()
})
