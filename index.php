<?php
    require 'functions.php';
    $barang = query ("select * from barang");
    
    session_start();
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
<div class="produk">
<h2>Special di Warung Rukiyah Hari Ini</h2> 
<!--Slideshow--> 
<center> 
<div class="slideshow">
    <img class="mySlides" src="ban_1.png" style="width: 85%">
    <img class="mySlides" src="ban_2.png" style="width: 85%">
</div>
</center>

<!--Baris Produk 1--->
<h2>Produk Terlaris</h2>
<div class="flex-container">
<?php foreach ($barang as $brg) : ?>
<div class="list-produk">
    <img src="img/<?= $brg["gambar"]; ?>" alt="Logo" width="70%">   
    <h4><?= $brg["nama_barang"] ?></h4>
    <p>Rp. <?= $brg["harga"] ?> ,-</p>
    <p>Stok barang : <?= $brg["stok"]?></p> 
    <a class="tombol" href="keranjang.php?id= <?php echo $brg["id_barang"]; ?> &action=add">Tambahkan ke Keranjang</a>     
    </div>
    <?php endforeach; ?>

</div>

<br>
<br>
<!--Baris Produk 2--->
<h2>Produk Terbaru</h2>
<div class="flex-container">
<?php foreach ($barang as $brg) : ?>
<div class="list-produk">
    <img src="img/<?= $brg["gambar"]; ?>" alt="Logo" width="70%">   
    <h4><?= $brg["nama_barang"] ?></h4>
    <p>Rp. <?= $brg["harga"] ?> ,-</p>
    <p>Stok barang : <?= $brg["stok"]?></p> 
    <a class="tombol" href="keranjang.php?id= <?php echo $brg["id_barang"]; ?> &action=add">Tambahkan ke Keranjang</a>     
    </div>
    <?php endforeach; ?>
</div>




<!--Javascript untuk Slideshow-->
<script>
    var myIndex = 0;
    carousel();
    
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 5000); // Change image every 2 seconds
    }
    </script>

</body>
</html>