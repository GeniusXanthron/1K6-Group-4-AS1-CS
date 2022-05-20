<?php 
    $con=mysqli_connect("localhost","","");
    mysqli_select_db($con,"kgpndir");
?>
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
        <h1>Kolej GENIUS@Pintar Negara</h1>
        <h2>Directory</h2>
    </div>
    <div class="mainpanel">
        <form action="keyin">
            <p>Name: </p><input type="text" name="name">
            <p>Phone Number: </p><input type="text" name="phno">
            <p>Department: </p><input type="text" name="dept">
            <br><br>
            <input type="submit" name="submeet" value="Enter">
        </form>
        <?php
            if(isset($_POST["submeet"])) {
                $name = $_POST('name');
                $phone = $_POST('phno');
                $dept = $_POST('dept');

                $query = "insert into staff values ('','$name','$phone','$dept')";
                $query_run = mysqli_query($con,$query);
            }
        ?>
    </div>
</body>
</html>