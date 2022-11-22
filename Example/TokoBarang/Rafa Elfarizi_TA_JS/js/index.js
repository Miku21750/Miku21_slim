// Animasi Judul
var words = ['Test Feature','Test API','Test Bug',"Dll"],
    part,
    i = 0,
    offset = 0,
    len = words.length,
    forwards = true,
    skip_count = 0,
    skip_delay = 15,
    speed = 70;
var wordflick = function () {
  setInterval(function () {
    if (forwards) {
      if (offset >= words[i].length) {
        ++skip_count;
        if (skip_count == skip_delay) {
          forwards = false;
          skip_count = 0;
        }
      }
    }
    else {
      if (offset == 0) {
        forwards = true;
        i++;
        offset = 1;
        if (i >= len) {
          i = 0;
        }
      }
    }
    part = words[i].substr(0, offset);
    if (skip_count == 0) {
      if (forwards) {
        offset++;
      }
      else {
        offset--;
      }
    }
    $('.word-ketik').text(part);
  },speed);
};

$(document).ready(function () {
  wordflick();
});

// AJAX API
$(function(){
    // $('#API-1').hide();
    $('#API-1').addClass('hide-text');
    $('#start-API').click(function (e){ 
        e.preventDefault();
        Swal.fire({
            title:"",
            text:"Mengirim Pesan...",
            imageUrl: "https://media.tenor.com/RVvnVPK-6dcAAAAC/reload-cat.gif",
            imageWidth: 300,
            showConfirmButton: false,
            // button: true
        })
        $.ajax({
            method: "GET",
            url: "https://api.waifu.pics/sfw/hug",
            success: function (response) {
                $('#API-1').attr('src',response.url);
                // $('#API-1').show();
                $('#API-1').removeClass('hide-text');
                swal.close()
            }   
        });
    });
    $('#start-API-2').click(function (e){ 
        e.preventDefault();
        
        Swal.fire({
            title:"",
            text:"Mengirim Pesan...",
            imageUrl: "https://media.tenor.com/RVvnVPK-6dcAAAAC/reload-cat.gif",
            imageWidth: 300,
            showConfirmButton: false
        })
        $.ajax({
            method: "GET",
            url: "https://zenzapis.xyz/entertainment/simisimi?",
            data:{
                text: $('#ChatBot').val(),
                apikey: 'keymikuzenz21'
            },
            success: function (response) {
                $('#API-2 > p').text(response.result.message);
                // $('#API-1').show();
                swal.close()

            }
        });
    });
    $('#start-API-3').click(function (e){ 
        e.preventDefault();
        Swal.fire({
            title:"",
            text:"Mencari Data...",
            imageUrl: "https://media.tenor.com/RVvnVPK-6dcAAAAC/reload-cat.gif",
            imageWidth: 300,
            button: false
        })
        var command = $('#jenis-tebak').find(':selected').val();
        switch(command){
            case 'tebakkata':{
                $.ajax({
                    url: "https://zenzapis.xyz/entertainment/"+command,
                    data: {
                        apikey: 'keymikuzenz21'
                    },
                    success: function (response) {
                        var jawaban = response.result.jawaban
                        Swal.fire({
                            title: 'Question',
                            text: response.result.soal,
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Jawab',
                            showLoaderOnConfirm: true,
                            preConfirm: (jawab) =>{
                                
                                if(jawab.toUpperCase() === jawaban.toUpperCase()){
                                    Swal.fire({
                                        title: 'Jawaban Benar'
                                    })
                                }else{
                                    Swal.fire({
                                        title: 'Jawaban Salah',
                                        text: "jawaban benar ialah : "+jawaban
                                    })
                                }
                            }
                        })
                    }
                });
            }
            break;
            case 'tebakkimia':{
                $.ajax({
                    url: "https://zenzapis.xyz/entertainment/"+command,
                    data: {
                        apikey: 'keymikuzenz21'
                    },
                    success: function (response) {
                        var jawaban = response.result.unsur
                        Swal.fire({
                            title: 'Question',
                            text: response.result.lambang,
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Jawab',
                            showLoaderOnConfirm: true,
                            preConfirm: (jawab) =>{
                                if(jawab.toUpperCase() === jawaban.toUpperCase()){
                                    Swal.fire({
                                        title: 'Jawaban Benar'
                                    })
                                }else{
                                    Swal.fire({
                                        title: 'Jawaban Salah',
                                        text: "jawaban benar ialah : "+jawaban
                                    })
                                }
                            }
                        })
                    }
                });
            }
            break;
            case 'tebakkalimat':{
                $.ajax({
                    url: "https://zenzapis.xyz/entertainment/"+command,
                    data: {
                        apikey: 'keymikuzenz21'
                    },
                    success: function (response) {
                        var jawaban = response.result.jawaban
                        Swal.fire({
                            title: 'Question',
                            text: response.result.soal,
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Jawab',
                            showLoaderOnConfirm: true,
                            preConfirm: (jawab) =>{
                                if(jawab.toUpperCase() === jawaban.toUpperCase()){
                                    Swal.fire({
                                        title: 'Jawaban Benar'
                                    })
                                }else{
                                    Swal.fire({
                                        title: 'Jawaban Salah',
                                        text: "jawaban benar ialah : "+jawaban
                                    })
                                }
                            }
                        })
                    }
                });
            }
            // break;
            // case 'tebaklirik':{
            //     $.ajax({
            //         url: "https://raw.githubusercontent.com/BochilTeam/database/master/games/tebaklirik.json",
            //         success: function (response) {
            //             var res = response[Math.floor(Math.random() * response.length)]
            //             var jawaban = res.jawaban
            //             Swal.fire({
            //                 title: 'Question',
            //                 text: res.soal,
            //                 input: 'text',
            //                 showCancelButton: true,
            //                 confirmButtonText: 'Jawab',
            //                 showLoaderOnConfirm: true,
            //                 preConfirm: (jawab) =>{
            //                     if(jawab.toUpperCase() === jawaban.toUpperCase()){
            //                         Swal.fire({
            //                             title: 'Jawaban Benar'
            //                         })
            //                     }else{  
            //                         Swal.fire({
            //                             title: 'Jawaban Salah',
            //                             text: "jawaban benar ialah : "+jawaban
            //                         })
            //                     }
            //                 }
            //             })
            //         }
            //     });
            // }
            // break;
            // case 'tebaklontong':{
            //     $.ajax({
            //         url: "https://raw.githubusercontent.com/BochilTeam/database/master/games/caklontong.json",
            //         success: function (response) {
            //             var res = response[Math.floor(Math.random() * response.length)]
            //             var jawaban = res.jawaban
            //             var desc = res.deskripsi
            //             Swal.fire({
            //                 title: 'Question',
            //                 text: response.result.soal,
            //                 input: 'text',
            //                 showCancelButton: true,
            //                 confirmButtonText: 'Jawab',
            //                 showLoaderOnConfirm: true,
            //                 preConfirm: (jawab) =>{
            //                     if(jawab.toUpperCase() === jawaban.toUpperCase()){
            //                         Swal.fire({
            //                             title: 'Jawaban Benar'
            //                         })
            //                     }else{
            //                         Swal.fire({
            //                             title: 'Jawaban Salah',
            //                             text: "jawaban benar ialah : "+jawaban+"\n"+desc
            //                         })
            //                     }
            //                 }
            //             })
            //         }
            //     });
            // }
            // break;
            case 'tebakcharanime':{
                $.ajax({
                    url: "https://api.jikan.moe/v4/random/characters",
                    success: function (response) {
                        var res = response.data
                        var jawaban = res.name
                        Swal.fire({
                            title: 'Question',
                            imageUrl: res.images.jpg.image_url || res.images.webp.image_url,
                            // text: res.about,
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Jawab',
                            showLoaderOnConfirm: true,
                            preConfirm: (jawab) =>{
                                if(jawab.toUpperCase() === jawaban.toUpperCase()){
                                    Swal.fire({
                                        title: 'Jawaban Benar'
                                    })
                                }else{
                                    Swal.fire({
                                        title: 'Jawaban Salah',
                                        text: "jawaban benar ialah : "+jawaban
                                    })
                                }
                            }
                        })
                    }
                });
            }
            break;
            case 'susunkata':{
                $.ajax({
                    url: "https://zenzapis.xyz/entertainment/"+command,
                    data: {
                        apikey: 'keymikuzenz21'
                    },
                    success: function (response) {
                        var jawaban = response.result.jawaban
                        var clue = response.result.tipe
                        Swal.fire({
                            title: 'Question',
                            text: response.result.soal,
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Jawab',
                            showLoaderOnConfirm: true,
                            preConfirm: (jawab) =>{
                                if(jawab.toUpperCase() === jawaban.toUpperCase()){
                                    Swal.fire({
                                        title: 'Jawaban Benar'
                                    })
                                }else{
                                    Swal.fire({
                                        title: 'Jawaban Salah',
                                        text: "jawaban benar ialah : "+jawaban
                                    })
                                }
                            }
                        })
                    }
                });
            }
            break;
            case 'tebakbendera':{
                $.ajax({
                    url: "https://zenzapis.xyz/entertainment/"+command,
                    data: {
                        apikey: 'keymikuzenz21'
                    },
                    success: function (response) {
                        var res = response.result
                        var jawaban = res.name
                        var clue = res.flag
                        Swal.fire({
                            title: 'Question',
                            imageUrl: res.img,
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Jawab',
                            showLoaderOnConfirm: true,
                            preConfirm: (jawab) =>{
                                if(jawab.toUpperCase() === jawaban.toUpperCase()){
                                    Swal.fire({
                                        title: 'Jawaban Benar'
                                    })
                                }else{
                                    Swal.fire({
                                        title: 'Jawaban Salah',
                                        text: "jawaban benar ialah : "+jawaban
                                    })
                                }
                            }
                        })
                    }
                });
            }
            break;
            // case 'tebakgambar':{
            //     $.ajax({
            //         url: "https://raw.githubusercontent.com/BochilTeam/database/master/games/tebakgambar.json",
            //         success: function (response) {
            //             var res = response[Math.floor(Math.random()* response.length)]
            //             var jawaban = res.jawaban
            //             var clue = res.deskripsi
            //             Swal.fire({
            //                 title: 'Question',
            //                 imageUrl: res.img,
            //                 input: 'text',
            //                 showCancelButton: true,
            //                 confirmButtonText: 'Jawab',
            //                 showLoaderOnConfirm: true,
            //                 preConfirm: (jawab) =>{
            //                     if(jawab.toUpperCase() === jawaban.toUpperCase()){
            //                         Swal.fire({
            //                             title: 'Jawaban Benar'
            //                         })
            //                     }else{
            //                         Swal.fire({
            //                             title: 'Jawaban Salah',
            //                             text: "jawaban benar ialah : "+jawaban
            //                         })
            //                     }
            //                 }
            //             })
            //         }
            //     });
            // }
            // break;
            case 'tebakkalimat':{
                $.ajax({
                    url: "https://zenzapis.xyz/entertainment/"+command,
                    data: {
                        apikey: 'keymikuzenz21'
                    },
                    success: function (response) {
                        var jawaban = response.result.jawaban
                        Swal.fire({
                            title: 'Question',
                            text: response.result.soal,
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Jawab',
                            showLoaderOnConfirm: true,
                            preConfirm: (jawab) =>{
                                if(jawab.toUpperCase() === jawaban.toUpperCase()){
                                    Swal.fire({
                                        title: 'Jawaban Benar'
                                    })
                                }else{
                                    Swal.fire({
                                        title: 'Jawaban Salah',
                                        text: "jawaban benar ialah : "+jawaban
                                    })
                                }
                            }
                        })
                    }
                });
            }
            break;
            
            default:{

            }
            break
        }
        // swal.fire({
        //     title: 'Submit your Github username',
        //     input: 'text',
        //     inputAttributes: {
        //       autocapitalize: 'off'
        //     },
        //     showCancelButton: true,
        //     confirmButtonText: 'Look up',
        //     showLoaderOnConfirm: true,
        //     preConfirm: (login) => {
        //       return fetch(`https://zenzapis.xyz/entertainment/tebakkata?apikey=keymikuzenz21`)
        //         .then(response => {
        //           if (!response.result) {
        //             throw new Error(response.status)
        //           }
        //           return response.json()
        //         })
        //         .catch(error => {
        //           swal.showValidationMessage(
        //             `Request failed: ${error}`
        //           )
        //         })
        //     },
        //     allowOutsideClick: () => !swal.isLoading()
        //   }).then((result) => {
        //     if (result.isConfirmed) {
        //       swal.fire({
        //         title: `${result.soal}`,
        //         // imageUrl: result.value.avatar_url
        //       })
        //     }
        //   })
        // const image_input = document.querySelector("#EditPhoto");
        // const url = '';
        // image_input.addEventListener("change", function() {
        // const reader = new FileReader();
        // reader.addEventListener("load", () => {
        //     const uploaded_image = reader.result;
        //     url = uploaded_image
        //     // document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
        // });
        // reader.readAsDataURL(this.files[0]);
        // });
        // $.ajax({
            
        //     method: "GET",
        //     url: "https://zenzapis.xyz/creator/smeme",
        //     data:{
        //         url: url,
        //         text:$('#text1').val(),
        //         text2:$('#text2').val(),
        //         apikey: 'keymikuzenz21'
        //     },
        //     success: function (response) {
        //         $('#API-3 > img').attr('src',response);
        //         $('#API-3 > img').show();
        //         swal.close()
        //     }
        // });
    });
})