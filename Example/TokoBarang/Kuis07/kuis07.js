$(function(){
    $('#jk').change(function(e){
        alert('Jenis Kelamin Kamu :'+ e.currentTarget.value)
    })
    $('#Judul').mouseenter(function () { 
        alert("Ayo isi formnya")
    })
    $('#submit').click(function (e) { 
        if($('#nama').val() == ''){
         e.preventDefault();
            alert('data belum diisi')
        }else{
            // reload
            alert('Tersubmit')
        }
    })
    $('#reset').dblclick(function(){
        alert('Udh mas')
    })
    $('#form').submit(function (e) { 
        alert("tersubmit")
        
    });

})