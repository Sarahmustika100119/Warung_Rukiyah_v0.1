<?php

//koneksi php ke MySQL
$koneksi = mysqli_connect("localhost","user","Localhost123","warung");

//Fungsi Query
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows =[];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>
