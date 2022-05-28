<?php 
    $con=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($con,"search");
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
                    <p>Search by:</p>
                    <select name="searchby" id="searchby">
                        <option value="Search by..." selected>Search by...</option>
                        <option value="name">Name</option>
                        <option value="email">Email</option>
                        <option value="phonenum">Phone Number</option>
                        <option value="dept">Department</option>
                        <option value="expertise">Expertise</option>
                    </select>
					<p>Search: </p><input type="text" name="search">
					<input type="submit" name="Submit" value="Search">
                </div>
            </div>
        </form>
    </div>
	<br>
    <div class="results">
        <?php
            if(isset($_POST["Submit"])){
				$search_query = $_POST['search'];
                $search_by = $_POST['searchby'];
				if($search_by=="Search by...")
				{
				echo "<script type=text/javascript>alert ('Please select a search type!')</script>";
				}
				else{
                $query = "select * from lecturers where $search_by like '%$search_query%'";
                $query_run = mysqli_query($con,$query);
                while ($row2=mysqli_fetch_array($query_run))
				{
                    $a=$row2['Name'];
                    $b=$row2['Email'];
                    $c=$row2['Phone'];
                    $d=$row2['Department'];
                    $e=$row2['Expertise'];
                    $f=$row2['Image'];
                ?>
            <div class="box">
				<div class="img"><img src="<?php echo $f;?>"></div>
				<div class="text">
					<?php echo $a?><br>
					<?php echo $b?><br>
					<?php echo $c?><br>
					<?php echo $d?>
					<?php if($e!=" "){echo "<br><br>Expertise: <br>";} echo $e?><br>
				</div>
			</div>
			<br><br>
				<?php }
				}
			}
        ?>

    </div>
</body>
</html>