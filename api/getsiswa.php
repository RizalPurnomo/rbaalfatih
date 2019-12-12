<?php
 //Memanggil conn.php yang telah kita buat sebelumnya
 include "conn.php";
 
 //Syntax MySql untuk melihat semua record yang
 //ada di tabel siswa
 $sql = "SELECT * FROM siswa WHERE aktif='1' ORDER BY nama";
  
 //Execetute Query diatas
 $query = mysqli_query($link,$sql);
 while($dt=mysqli_fetch_array($query)){
  $item[] = array(
   "replid" =>$dt["replid"],
   "nis" =>$dt["nis"],
   "nisn" =>$dt["nisn"],
   "nik" =>$dt["nik"],
   "noun" =>$dt["noun"],
   "nama" =>$dt["nama"],
   "panggilan" =>$dt["panggilan"],
   "aktif" =>$dt["aktif"],
   "tahunmasuk" =>$dt["tahunmasuk"],
   "idangkatan" =>$dt["idangkatan"],
   "idkelas" =>$dt["idkelas"],
   "suku" =>$dt["suku"], 
   "agama" =>$dt["agama"], 
   "status" =>$dt["status"], 
   "kondisi" =>$dt["kondisi"],
   "kelamin" =>$dt["kelamin"], 
   "tmplahir" =>$dt["tmplahir"], 
   "tgllahir" =>$dt["tgllahir"], 
   "warga" =>$dt["warga"], 
   "anakke" =>$dt["anakke"],
   "jsaudara" =>$dt["jsaudara"], 
   "statusanak" =>$dt["statusanak"], 
   "jkandung" =>$dt["jkandung"], 
   "jtiri" =>$dt["jtiri"], 
   "bahasa" =>$dt["bahasa"], 
   "berat" =>$dt["berat"], 
   "tinggi" =>$dt["tinggi"], 
   "darah" =>$dt["darah"],
   // "foto" =>$dt["foto"], 
   "alamatsiswa" =>$dt["alamatsiswa"], 
   "jarak" =>$dt["jarak"], 
   "kodepossiswa" =>$dt["kodepossiswa"],
   "telponsiswa" =>$dt["telponsiswa"], 
   "hpsiswa" =>$dt["hpsiswa"], 
   "emailsiswa" =>$dt["emailsiswa"], 
   "kesehatan" =>$dt["kesehatan"], 
   "asalsekolah" =>$dt["asalsekolah"], 
   "noijasah" =>$dt["noijasah"], 
   "tglijasah" =>$dt["tglijasah"], 
   "ketsekolah" =>$dt["ketsekolah"], 
   "namaayah" =>$dt["namaayah"], 
   "namaibu" =>$dt["namaibu"], 
   "statusayah" =>$dt["statusayah"], 
   "statusibu" =>$dt["statusibu"], 
   "tmplahirayah" =>$dt["tmplahirayah"], 
   "tmplahiribu" =>$dt["tmplahiribu"], 
   "tgllahirayah" =>$dt["tgllahirayah"], 
   "tgllahiribu" =>$dt["tgllahiribu"],
   "almayah" =>$dt["almayah"], 
   "almibu" =>$dt["almibu"], 
   "pendidikanayah" =>$dt["pendidikanayah"], 
   "pendidikanibu" =>$dt["pendidikanibu"], 
   "pekerjaanayah" =>$dt["pekerjaanayah"], 
   "pekerjaanibu" =>$dt["pekerjaanibu"], 
   "wali" =>$dt["wali"], 
   "penghasilanayah" =>$dt["penghasilanayah"], 
   "penghasilanibu" =>$dt["penghasilanibu"], 
   "alamatortu" =>$dt["alamatortu"], 
   "telponortu" =>$dt["telponortu"], 
   "hportu" =>$dt["hportu"], 
   "emailayah" =>$dt["emailayah"], 
   "alamatsurat" =>$dt["alamatsurat"], 
   "keterangan" =>$dt["keterangan"], 
   "hobi" =>$dt["hobi"], 
   "frompsb" =>$dt["frompsb"],
   "ketpsb" =>$dt["ketpsb"], 
   "statusmutasi" =>$dt["statusmutasi"], 
   "alumni" =>$dt["alumni"], 
   "pinsiswa" =>$dt["pinsiswa"], 
   "pinortu" =>$dt["pinortu"], 
   "pinortuibu" =>$dt["pinortuibu"], 
   "emailibu" =>$dt["emailibu"], 
   "info1" =>$dt["info1"], 
   "info2" =>$dt["info2"], 
   "info3" =>$dt["info3"], 
   "ts" =>$dt["ts"], 
   "token" =>$dt["token"], 
   "issync" =>$dt["issync"] 

  );
 }
 
 //Menampung data yang dihasilkan
 // $json = array(
 //    'result' => 'Success',
 //    'item' => $item
 //   );
 
 //Merubah data kedalam bentuk JSON
 echo json_encode($item);
?>
