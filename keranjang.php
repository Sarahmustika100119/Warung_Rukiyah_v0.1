<?php
    require 'functions.php';
    require 'item.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Rukiyah</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<!--List Navbar-->
<div class="topnavbar">
    <ul>
    <li><img id="logo" src="logo.png" alt="logo" height="100%"></li>
    <div class="menu">
        <li><a href="index.php"><b>Home</b></a></li>
        <li><a href="kategori.php"><b>Kategori</b></a></li>
        <li><a href="tentang.php"><b>Tentang</b></a></li>
        <li><a href="feedback.php"><b>Feedback</b></a></li>
    </div>
    </ul>
    </div>          

<div class="container"> 
<h1>Keranjang</h1>  
<br>

<!--Baris 1--->
<?php 
session_start();


if(isset($_GET["id_barang"]) && !isset($_POST['update'])){ 
	$sql = "SELECT * FROM barang WHERE id=".$_GET["id_barang"];
	$result = mysqli_query($koneksi, $sql);
	$brg = mysqli_fetch_assoc($result); 
	$item = new Item();
        $item["id_barang"] = $brg["id_barang"];
        $item["nama_barang"] = $brg["nama_barang"];
        $item["harga"] = $brg["harga"];
        $iteminstock = $brg["stok"];
        $item["stok"] = 1;
}
?>

<div style="background-color: white;">
<form method="post" action=""> 
    <table border="1" cellpadding="5", cellspacing="4">
        <tr>
            <th>Pilih Semua</th>
            <th>Produk</th>
            <th>Harga Satuan</th>
            <th>Kuantitas</th>
            <th>Total Harga</th>
        </tr>
    </table>
    <h3>Total Harga</h3>

</div>
</div>
 


</body>
</html>