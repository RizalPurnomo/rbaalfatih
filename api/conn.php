<?php
 $host = "10.10.10.252:3434";  //Nama Host
 $user = "root"; //Nama User
 $pass = "kebersamaan"; //Password
 $db = "jbsakad"; //Nama Database
  
 //Koneksi
 $link = mysqli_connect($host, $user, $pass)
  or die (mysqli_error());
  
 //Pilih Database
 mysqli_select_db($link,$db)
  or die(mysqli_error()." Database Not Found!");
?>