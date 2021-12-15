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
    <style>
        .error {color: #FF0000;}
    </style>
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
    <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
        
    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="container">
    <div class="background">
    <center>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <h1>Feedback</h2> 
        <p></p>
        <p>Kami senang bisa mengetahui feedback dari anda untuk meningkatkan pelayanan di Warung Rukiyah</p> 
        <br><br>
        <table>
        Nama: <input type="text" name="nama">
        <span class="error">* <?php echo $nameErr;?></span>
            <br><br>
        E-mail: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
            <br><br>
        Subjek: <input type="text" name="website">
        <span class="error"><?php echo $websiteErr;?></span>
            <br><br>
        Kritik dan Saran : <textarea name="comment" rows="5" cols="40"></textarea>
            <br><br>
        
        <input type="submit" name="submit" value="Submit"> 
        </table>
         
    </form>
    </center>
    </div>
</div>


</body>
</html>