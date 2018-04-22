<?php
/**

 * 
 * Main content 

 * 
 *  */
require_once 'includes/function.php';
?>



<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cats | Scottish fold & Scottish straight</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>

        <link rel="stylesheet" href="cats.css" />
        <link rel="stylesheet" href="nav_base.css" />
        <link rel="stylesheet" href="videoScreen.css" />
        <link href="https://fonts.googleapis.com/css?family=Bevan|Cabin+Sketch|Fugaz+One|Indie+Flower|Nova+Mono|Righteous|Sacramento|Shadows+Into+Light+Two|Yatra+One" rel="stylesheet">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <div class="navTop example-left shadowPlay">

                We are located in Canada, Montreal. We may ship your kitten to your door in another province or country.
            </div>
            <nav>
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <div class="left">
                            <a class="navFont active"  href="cats.php">Home</a>
                            <a class="navFont"  href="cats.php?content=about">About</a>
                            <a class="navFont"  href="index.html">Breeds</a>
                            <a class="navFont"  href="index.html">Adopted</a>
                            <a class="navFont"  href="index.html">Gallery</a>
                        </div>
                        <div class="right">
                            <a class="navFont" href="cats.php?content=resources">Useful Resources</a>
                            <a class="navFont" href="cats.php?content=contact">Contact</a>
                            <a class="navFont" href="order.html">Order</a>
                            <a class="navFont" href="order.html">Login</a>


                        </div>
                    </div>
                </div>
                <span id='pawIcon' style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="paw-prints-clipart-cat-paw.png" desalt="Avatar" class="avatar"></span>
                <a href="#menu" class="box-shadow-menu">
                    Menu
                </a>

            </nav>
        </header>
        <div id="home">
       <?php loadContent('content', 'home');?>
    </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
