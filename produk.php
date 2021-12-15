<?php
    require 'functions.php';
    $kategori = query ("select * from barang");
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
        <li><a href="keranjang.php"><b>Keranjang</b></a></li>
        <li><a href="kategori.php"><b>Kategori</b></a></li>
        <li><a href="tentang.php"><b>Tentang</b></a></li>
    </div>
    </ul>
</div>

<div class="container">
<div class="produk">
<h1>Produk</h1>
<div class="flex-container">
<?php foreach ($kategori as $ktg) : ?>
<div class="list-produk">
    <img src="img/<?= $ktg["gambar"]; ?>" alt="Logo" width="70%">   
    <h4><?= $ktg["nama_barang"];?></h4>
    <p>Rp. <?= $ktg["harga"];?> ,-</p>
    <p>Stok barang : <?= $ktg["stok"];?></p> 
    <a class="tombol" href="keranjang.php?id= <?php echo $ktg["id_barang"]; ?> &action=add">Tambahkan ke Keranjang</a>     
    </div>
    <?php endforeach; ?>


</div>
</div>
</div>