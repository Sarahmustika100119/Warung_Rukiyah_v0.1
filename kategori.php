<?php
    require 'functions.php';
    $kategori = query ("select * from kategori");
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
<h1>Kategori</h1>  
<br>
<!--Baris 1--->
<center>
<div class="flex-container">
<?php foreach ($kategori as $ktg) : ?>
    <div class="list-kategori">
        <a href=href="produk.php?id=<?php echo $ktg["id_kategori"]; ?>>
        <img src="logo.png" alt="Logo" width="80%">
        <h4><?= $ktg["nama_kategori"] ?></h4></a>
    </div>  
    <?php endforeach; ?>

</div>
</div>
</center>  


</body>
</html>