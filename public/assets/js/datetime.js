const date = new Date();
if (date.getTimezoneOffset() == 0) (a=date.getTime() + ( 7 *60*60*1000))
else (a=date.getTime());
date.setTime(a);
let tahun= date.getFullYear ();
let hari= date.getDay ();
let bulan= date.getMonth ();
let tanggal= date.getDate ();
let hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
let bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
document.getElementById("tb-date").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
