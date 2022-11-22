const banjir = prompt("Apakah Rumah tersebut sering banjir?")
const longsor = prompt("Apakah Rumah tersebut sering longsor?")
const pabrik = prompt("Apakah Rumah tersebut dekat dengan indsutri/pabrik?")
const l_tanah = prompt("Berapa Luas Tanahnya?")
const l_bgn = prompt("Berapa Luas Bangunannya?")
const kolam_renang = prompt("Apakah Rumah tersebut memiliki Kolam renang?") 
const parkir = prompt("Apakah Rumah tersebut memiliki Halaman Parkir yang luas?") 
const kebun = prompt("Apakah Rumah tersebut memiliki Kebun di belakangnya?") 
let pattern = /(yes|yea|ya|y|ada)/
let pattern_tdk = /(tidak|tdk|g|gak|gak)/
var mau
if(pattern_tdk.test(banjir)){
    if(pattern_tdk.test(longsor)){
        if(pattern_tdk.test(pabrik)){
            if(l_tanah >= 800){
                if(l_bgn >= 400){
                    if(pattern.test(kolam_renang)){
                        if(pattern.test(parkir)){
                            if(pattern.test(kebun)){
                                alert("Aku Mw");
                            }else{
                                alert("Gak Deh")
                            }
                        }else{
                            alert("Gak Deh")
                        }
                    }else{
                        alert("Gak Deh")
                    }
                }else{
                    alert("Gak Deh")
                }
            }else{
                alert("Gak Deh")
            }
        }else{
            alert("Gak Deh")
        }
    }else{
        alert("Gak Deh")
    }
}else{
    alert("Gak Deh")
}