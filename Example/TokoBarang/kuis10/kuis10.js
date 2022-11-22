function formatNumber(number){
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}
$(function(){
    $('button').click(function(){
        if($('input').val().length == 0){
            return swal('','Mohon masukan nama negara terlebih dahulu','warning')
        }
        var countryName = $('input').val().toLowerCase();
        swal({
            title:"",
            text:"Mencari Data...",
            icon: "https://media.tenor.com/RVvnVPK-6dcAAAAC/reload-cat.gif",
            button: false
        })
        $.ajax({
            method: "GET",
            url: "https://covid-193.p.rapidapi.com/statistics",
            data: {
                country: countryName
            },
            headers:{
                "X-RapidAPI-Host": "covid-193.p.rapidapi.com",
                "X-RapidAPI-Key": "ddc0de882fmshef820d773e81007p1f5704jsnf1d8ceab8bf5"
            },
            success: function(res){
                if(res.response.length == 0){
                    return swal('data tidak ditemukan','Pastikan nama negara yang dituliskan benar','warning')
                }
                var data = res.response[0].cases
                $('.active-case').text(formatNumber(data.active));
                $('.critical-case').text(formatNumber(data.critical));
                $('.new-case').text(formatNumber(data.new));
                $('.recovered').text(formatNumber(data.recovered));
                swal.close()
                // capitalize
                var newCountry = countryName.charAt(0).toUpperCase() + countryName.slice(1)
                $('.nama-negara').text(newCountry);
                $('.card-statistik').show();
            }
        });
    });
})