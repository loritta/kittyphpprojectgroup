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
        <!-- baguetteBox CDN (for images galleries) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js" async></script>
        
        <!-- bootstrap CDN -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cats | Scottish fold & Scottish straight</title>

        <link rel="stylesheet" href="cats.css" />
        <link rel="stylesheet" href="nav_base.css" />
        <link rel="stylesheet" href="videoScreen.css" />
        <link href="https://fonts.googleapis.com/css?family=Bevan|Cabin+Sketch|Fugaz+One|Indie+Flower|Nova+Mono|Righteous|Sacramento|Shadows+Into+Light+Two|Yatra+One" rel="stylesheet">
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
                            <a class="navFont"  href="cats.php?content=placeholderGalleryPage">Adopted</a>
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
