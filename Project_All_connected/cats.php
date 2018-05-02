<?php
session_start();

require_once 'includes/function.php';
?>



<!DOCTYPE html>
<html lang="en" >

    <head>
        <!-- baguetteBox CDN (for images galleries) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js" async></script>

        <!-- bootstrap CDN -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cats | Scottish fold & Scottish straight</title>

        <link rel="stylesheet" href="styles/cats.css" />
        <link rel="stylesheet" href="styles/nav_base.css" />
        <link rel="stylesheet" href="styles/videoScreen.css" />
        <link rel="stylesheet" href="styles/about.css" />
        <link href="https://fonts.googleapis.com/css?family=Bevan|Cabin+Sketch|Fugaz+One|Indie+Flower|Nova+Mono|Righteous|Sacramento|Shadows+Into+Light+Two|Yatra+One" rel="stylesheet">
        <link rel="STYLESHEET" type="text/css" href="styles/pwdwidget.css" />
        <script src="scripts/pwdwidget.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="scripts/nav.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <div class="navTop example-left shadowPlay">

                We are located in Canada, Montreal. We may ship your kitten to your door in another province or country.
            </div>
            
            <nav>
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content row row-eq-height adoptedSpace">

                        <div class="col-sm-12 col-md-4">
                            <a class="navFont <?php if (basename($_SERVER['SCRIPT_NAME']) == 'content/cats.php') {
                    echo 'active';
                } else {
                    echo '';
                } ?>"  href="cats.php">Home</a>
                            <a class="navFont <?php if (basename($_SERVER['SCRIPT_NAME']) == 'content=about') {
                    echo 'active';
                } else {
                    echo '';
                } ?>"  href="cats.php?content=about">About</a>
                            <a class="navFont <?php if (basename($_SERVER['SCRIPT_NAME']) == 'content/breeds.php') {
                    echo 'active';
                } else {
                    echo '';
                } ?>"  href="cats.php?content=breeds">Breeds</a>
                            <a class="navFont <?php if (basename($_SERVER['SCRIPT_NAME']) == 'content/adopted.php') {
                                echo 'active';
                            } else {
                                echo '';
                            } ?>"  href="cats.php?content=adopted">Our cats</a>
                            <a class="navFont <?php if (basename($_SERVER['SCRIPT_NAME']) == 'content/gallery.php') {
                                echo 'active';
                            } else {
                                echo '';
                            } ?>"  href="cats.php?content=gallery">For adoption</a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <a class="navFont <?php if (basename($_SERVER['SCRIPT_NAME']) == 'content/resources.php') {
                                echo 'active';
                            } else {
                                echo '';
                            } ?>" href="cats.php?content=resources">Useful Resources</a>
                            <a class="navFont <?php if (basename($_SERVER['SCRIPT_NAME']) == 'content/contact.php') {
                                echo 'active';
                            } else {
                                echo '';
                            } ?>" href="cats.php?content=contact">Contact</a>

<?php
if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] == 'admin') {
        echo "<a class='navFont' href='cats.php?content=addcats'>ADD CATS</a>";
        echo '<a class="navFont" href="cats.php?content=logout&flush=true">LOG OUT</a>';
    } else {
        echo "<a class='navFont' href='cats.php?content=order'>ORDER</a>";
        echo '<a class="navFont" href="cats.php?content=logout&flush=true">LOG OUT</a>';
    }
} else {
    echo '<a href="cats.php?content=login">LOG IN</a>';
}
?>
                        </div>
                        <div class="col-sm-12 col-md-4 center">
                            <a href="#" >
                                <img src="images/facebook-0.png" class='social' alt="Facebook page">
                            </a>
                            <a href="#" >
                                <img src="images/instagram-0.png" class='social' alt="Instagram page">
                            </a>
                            <a href="#" >
                                <img src="images/twitter-0.png" class='social' alt="Twitter page">
                            </a>
                            <a href="#" >
                                <img src="images/youtube-0.png" class='social' alt="Youtube page">
                            </a>
                        </div>

                    </div>
                </div>
                <span class='pawIcon' style="font-size:30px;cursor:pointer" onclick="openNav()">
                    <img src="images/paw_red.png" alt="Menu paw" class="avatar">
                </span>
                <!-- <a href="#menu" class="box-shadow-menu">
                     Menu
                 </a>-->

            </nav>
            <div class="username">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<p class='username'> Hi, welcome " . ucfirst($_SESSION['username']) . "!</p>";
                }
                ?>

            </div>
			<?php
                if (isset($_SESSION['username'])) {
                    if ($_SESSION['username'] != 'admin') {
                        $servername = "den1.mysql2.gear.host";
$username = "phpcats";
$password = "Ii0EExX_H~yx";
$dbname = "phpcats";
$GLOBALS['userId']=0;
 

    

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = ("SELECT id FROM users WHERE username='".$_SESSION['username']."';"); 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
   
    while($row = $result->fetch_assoc()) {
      $GLOBALS['userId']= $row["id"];
    }
   
}


$sql = ("SELECT name, availabilityDate, cost FROM cats JOIN"
            . " orders ON cats.orderId=orders.id WHERE userId='".$GLOBALS['userId']."';"); 
$result = $conn->query($sql);
$SESSION['cartItems']=$result->num_rows;
                        
                        
                        
                   
                    echo "<p class='username' style='font-size:1.5em'><a  href='cats.php?content=order'> "
. "<img src='images/Shoping_Cart.png' width='5%' height='5%' alt='Cart'></a><b>"." ".$SESSION['cartItems']."</b></p>";
                }
                
                    }
                ?>
        </header>
        <div id="home">
<?php loadContent('content', 'home'); ?>
        </div>
         <div class="footer">
            
            <small class="signature">Designed, developed, filmed and photographed by Chris, Dmitrii and Larisa 2018</small>
        <?php $con= Database::getConnection();
                if($result=$con->query('select database() ')){
                        $row =$result->fetch_array(MYSQLI_NUM);
                echo '<p>*** Using Database '. $row[0].' ***</p>';
                        
                }
                ?>
         
         </div>
        
    </body>
</html>
