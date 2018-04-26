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
    </head>
    <body>
        <header>
            <div class="navTop example-left shadowPlay">

                We are located in Canada, Montreal. We may ship your kitten to your door in another province or country.
            </div>
            <div style="position: absolute; top: 40px; right: 20px; ">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "Hi, " . ucfirst($_SESSION['username'])."!";
                }
                ?>

            </div>
            <nav>
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <div class="left">
                            <a class="navFont active"  href="cats.php">Home</a>
                            <a class="navFont"  href="cats.php?content=about">About</a>
                            <a class="navFont"  href="cats.php?content=breeds">Breeds</a>
                            <a class="navFont"  href="cats.php?content=adopted">Our cats</a>
                            
                        </div>
                        <div class="right">
                            <a class="navFont"  href="cats.php?content=gallery">For adoption</a>
                            <a class="navFont" href="cats.php?content=resources">Useful Resources</a>
                            <a class="navFont" href="cats.php?content=contact">Contact</a>
                            
                           <?php
                            if (isset($_SESSION['username'])) {
                                if ($_SESSION['username'] == 'admin') {
                                    echo "<a class='navFont' href='cats.php?content=upload'>ADD CATS</a>";
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
                    </div>
                </div>
                <span class='pawIcon' style="font-size:30px;cursor:pointer" onclick="openNav()">
              <img src="images/paw_red.png" alt="Menu paw" class="avatar">
          </span>
               <!-- <a href="#menu" class="box-shadow-menu">
                    Menu
                </a>-->

            </nav>
        </header>
        <div id="home">
            <?php loadContent('content', 'home'); ?>
        </div>
        <script>
                    function openNav() {
                        document.getElementById("myNav").style.display = "block";
                    }

                    function closeNav() {
                        document.getElementById("myNav").style.display = "none";
                    }
        </script>
    </body>
</html>
