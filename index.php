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
                <div id="form">
                    <p>Search: </p><input type="text" name="search">
                    <p>Search by:</p>
                    <select name="searchby" id="searchby">
                        <option value="pls" selected>...</option>
                        <option value="name" selected>Name</option>
                        <option value="email">Email</option>
                        <option value="phonenum">Phone Number</option>
                        <option value="dept">Department</option>
                        <option value="expertise">Expertise</option>
                    </select>
                </div>
            </div>
            <br><br>
            <input type="submit" name="Submit" value="Submit">
        </form>
    </div>
        <div class="results">
            <table style="border: 2px solid black;" border>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Expertise</th>
                <th>Image</th>
            </tr>
            <?php
            if(isset($_POST["Submit"])) {
                $search_query = $_POST['search'];
                $search_by = $_POST['searchby'];

                $query = "select * from staff where $search_by like '%$search_query%'";
                $query_run = mysqli_query($con,$query);
                while ($row2=mysqli_fetch_array($query_run)) {
                    $a=$row2['name'];
                    $b=$row2['email'];
                    $c=$row2['phonenum'];
                    $d=$row2['dept'];
                    $e=$row2['expertise'];
                    $f=$row2['imgurl'];
            ?>
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $b; ?></td>
                <td><?php echo $c; ?></td>
                <td><?php echo $d; ?></td>
                <td><?php echo $e; ?></td>
                <td><?php echo '<img src='.$f.'>'; ?></td>
            </tr>
            </table>
        </div>
            <?php }
            }
        ?>
</body>
</html>