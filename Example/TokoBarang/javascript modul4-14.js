// tipe data number
var umur = 30
var jml_mobil = 4
var phi = 3.14
// tipe data string
var nama = "Andi Taru"
var alamat = "Kota Salatiga"
var pendidikan = "Wharton University"
// Tipe data object
var player = {
    playerName: "Gamelab",
    scores: 0,
    bestScore: 0
}
// var [nama_variabel] = [nilai_awal]
var playerName = "Gamelab"
var playerScore = 100
// var tanpa nilai
var playerName
var playerScore
// var baru, tipe string
var player = "Gamelab.ID"
//var lama, diganti, tipe number
var player = 100
//lingkup jangkauan var
{
    var playerName = "Gamelab.ID"
}
// variable dipanggil disini
playerName = "Educa Studio"

// let function
// perbedaan dengan var, let hanya boleh dideklarasikan 1 kali
// let player = "Gamelab.ID"
// jika dideklarasikan lagi maka error
// let player = 100

// let hanya bisa digunakan lokal
// {
//     let playerName = "Gamelab.id"
// }
// tidak bisa dipanggil disini
// playerName = "educa studio"

playerName = "Gamelab.ID"
var playerName
// tidak error

// playerName = "Gamelab.ID"
// let playerName = "Educa Studio"
// error, karena sudah digunakan

// deklarasi dan assignment
var playerName = "Andi Taru"
var playerScore = 0

//assignment nilai baru
playerName = "Gamelab.ID"
playerScore = 100

// assignment dengan +=
playerScore += 10
// 110

// aritmatika
var x = 10
var y = 5
var z = x+y
// 15

var a = 11
var b = 5
var c = a % b
// 1

// operator string
var firstName = "Andi"
var lastName = "Taru"
var fullName = firstName+" "+lastName

// gabung string
var myname = "Andi"
// var myname += " Taru"

// let a = 4+6 //10
// let b = "4" + 6 //46
// let c = "Gamelab" + 46 //Gamelab 46

// perbandingan
var a = 0
var b = 10
var c = "0"
console.log( a == b ) //false
console.log( a == c ) //true
console.log( a === b ) //false
console.log( a==b ? "a==b": "a != b") //a != b

// operator tipe
var a = 10
var b = "Gamelab.ID"
var c = {}
var d = true
var e = ["Apel","Bengkoang"]
// Mengembalikan tipe variabel, typeof
console.log(typeof(a)) //number
console.log(typeof(b)) //string
console.log(typeof(c)) //object
console.log(typeof(d)) //boolean
// mengembalikan nilai objek jika objek, instanceof
console.log(e instanceof Array)  //true

// bitwise, angka 32 bit
console.log(0 & 0) //0
console.log(0 & 1) //0
console.log(1 & 1) //1
console.log(0 | 0) //0
console.log(0 | 1) //1
console.log(1 | 1) //1

let brand1 = "Educa"
let brand2 = 'Gamelab'
let brand3 = 'Marbel'
// daripada menulis satu satu :
const brands = ["Educa","Gamelab","Marbel"]

// IF
var name = "Andi Taru"
if ( name == "Andi Taru"){
    console.log("Andi Taru Logged in")
}
var score = 0
if( score == 100){
    console.log("Victory")
}
var umur = 30
var mobil =4
if (umur == 50 || mobil == 4){
    console.log("Umur 50 atau Mobil 4")
}

var suhu = 33
if (suhu == 33){
    console.log("Suhu Panas")
}else{
    console.log("Suhu Tidak Panas")
}
var suhu = 20
if (suhu == 33){
    console.log("Suhu Panas")
}else{
    console.log("Suhu Tidak Panas")
}

var jumlah_roda = 5
if(jumlah_roda == 2){
    console.log("Sepeda")
}else if(jumlah_roda == 3){
    console.log("Bajaj")
}else if(jumlah_roda == 4){
    console.log("Mobil")
}else{
    console.log("Bukan Sepeda, Bajaj, maupun mobil")
}

// nested if
var roda = 0;
var tipe = 0;
var txt_roda = "";
var txt_tipe = "";
roda = 4;
tipe = 1;
if(roda == 2){
    txt_roda = "Sepeda"
    if(tipe == 0){
        txt_tipe = "Anak"
    }else{
        txt_tipe = "Dewasa"
    }
}else if(roda == 4){
    txt_roda = "Mobil"
    if(tipe == 0){
        txt_tipe = "Manual"
    }else{
        txt_tipe = "Matic"
    }
}else{
    txt_roda = "unkown"
}
console.log( txt_roda+" "+txt_tipe)

var nama_hari = "";
switch (new Date().getDay()){
    case 0:
        nama_hari = "Minggu"
        break;
    case 1:
        nama_hari = "Senin"
        break;
    case 2:
        nama_hari = "Selasa"
        break;
    case 3:
        nama_hari = "Rabu"
        break;
    case 4:
        nama_hari = "Kamis"
        break;
    case 5:
        nama_hari = "Jumat"
        break;
    case 6:
        nama_hari = "Sabtu"
        break;
}
console.log(nama_hari)
var id_platform =0;
var nama_platform = "";
switch(id_platform){
    case 1:
        nama_platform = "Android"
        break;
    case 1:
        nama_platform = "IOS"
        break;
    case 2:
        nama_platform = "Selasa"
        break;
    default:
        nama_platform = "Selasa"
        break;
}
console.log(nama_platform)
var x = 2
var y = 4
switch (y %x){
    case 0:
        console.log("Genap")
        break;
    case 1:
        console.log("Ganjil")
        break;
    default:
        console.log("Error")
        break;
}

// perulangan
for (var i = 0; i < 5; i++){
    console.log(i)
}
var output = ""
for (var i = 10; i > 0;i-=2){
    output += i + " "
}
console.log(output)

// for in, untuk pengulangan object
const platform = {situs:"Gamelab", ekstensi:"ID",id:99}
var output = "";
for (let key in platform){
    output +=platform[key]
}
console.log(output)
const angka = [1,2,3,4,5]
var output = ""
for(let index in angka){
    output+= angka[index]+ " _ "
}
console.log(output)

// for of, pengulangan object (array yang bisa diubah)
// const angka = [1,2,3,4,5]
// var output = ""
// for(let a of angka){
//     output+= a+ " _ "
// }
// console.log(output)

// for of string
// let platform = "Gamelab Indonesia"
// let output = ""
// for (let p of platform){
//     output += p +"";
// }
// console.log(output)

var i = 0
var output = ""
while ( i < 10 ){
    output += i + " "
    i++
}
console.log(output)

var i = 0
var output = ""
do{
    output += i + " "
    i++
} while (i > 10)
console.log(output)

// // perbedaan for dan while
// const brands = ["Educa","Gamelab","Marbel"]
// let i = 0
// let text = ""
// for (;brands[i];){
//     text += brands[i]
//     i++
// }
// console.log(text)

// // while
// i = 0
// text = ""
// while (brands[i]){
//     text += brands[i]
//     i++
// }
// console.log(text)

// nested loop
var text = ""
for (var x=0; x<3; x++){
    for (var y=0; y<3;y++){
        text +="*"
    }
    text+="\n"
}
console.log(text)

// fungsi dan rekursi
function jalan(){
    console.log("Mobil Jalan")
}
jalan()
jalan()
jalan()

function toCelcius(farenheit){
    return (5/9) * (farenheit-32)
}
console.log(10+"Farenheit = "+toCelcius(10)+" Celcius");
console.log(27+"Farenheit = "+toCelcius(27)+" Celcius");

// rekursi
function konterMenurun(a1){
    console.log(a1)
    let a2 = a1 -1
    if (a2 > 0){
        konterMenurun(a2)
    }else{
        console.log("Finish")
    }
}
konterMenurun(3);

function jumlahDigit(a1){
    let a2 = a1 -1
    if(a2  > 0){
        return a1 + jumlahDigit(a2)
    }
    return 1;
}
console.log(jumlahDigit(5))

function get_data_kelas(id){
    const kelas = {
        id: 0,
        nama: "",
        jml_peserta:0,
        jml_peserta_lulus: 0,
        jml_peserta_ongoing: 0,
        jml_peserta_tidak_lulus: 0
    }
    const arr_jml_peserta = [100,200,300]
    const arr_jml_peserta_lulus = [10,20,30]
    const arr_jml_peserta_ongoing =  [20,40,60]
    const arr_jml_peserta_tidak_lulus =  [70,140,210]

    kelas.id = id;
    kelas.jml_peserta = arr_jml_peserta[id-1]
    kelas.jml_peserta_lulus = arr_jml_peserta_lulus[id-1]
    kelas.jml_peserta_ongoing = arr_jml_peserta_ongoing[id-1]
    kelas.jml_peserta_tidak_lulus = arr_jml_peserta_tidak_lulus[id-1]

    switch(id){
        case 1:
            kelas.nama = "Pemograman Dasar"
            break;
        case 2:
            kelas.nama = "Pemograman Beorientasi Objek"
            break;
        case 3:
            kelas.nama = "Pemograman Game"
            break;
        default:
            kelas.nama = "Tidak Diketahui"
            break;
    }
    return kelas;
}
let kelas = get_data_kelas(1)
console.log(kelas.id)
console.log(kelas.nama)
console.log(kelas.jml_peserta)
console.log(kelas.jml_peserta_lulus)
console.log(kelas.jml_peserta_ongoing)
console.log(kelas.jml_peserta_tidak_lulus)
