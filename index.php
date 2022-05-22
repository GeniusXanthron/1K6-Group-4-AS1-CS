<?php 
    $con=mysqli_connect("localhost","","");
    mysqli_select_db($con,"kgpndir");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
    <title>KGPN Directories</title>
</head>
<body>
    <div class="topbar">
        <img src="assets/genius.jpg" alt="">
        <h1>Kolej GENIUS@Pintar Negara</h1>
        <h2>Directory: Search</h2>
    </div>
    <div class="mainpanel">
        <form method="post" action="index.php">
            <div class="formy">
                <div id="form"><p>Search: </p><input type="text" name="search"></div>
            </div>
            <br><br>
            <input type="submit" name="Submit" value="Submit">
        </form>
        <?php
            if(isset($_POST["Submit"])) {
                $search_query = $_POST['search'];

                $query = "select * from staff where name like '$search_query'";
                $query_run = mysqli_query($con,$query);
            }
        ?>
    </div>
</body>
</html>