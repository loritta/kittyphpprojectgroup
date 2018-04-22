<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    #pawIconNav {
        
        display: inline;
        margin: 0;
        padding: 0;
        height: 6%;
        width: 5%;
    }
</style>
<script>
    document.getElementById("pawIcon").style.display = "none";
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Company Name</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="cats.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cats.php?content=resources">Useful Resources</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cats.php?content=about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cats.php?content=contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cats.php?content=contact">Order</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Our Cats
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Adopt a cat</a>
                    <a class="dropdown-item" href="#">Cats who found a home</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="cats.php?content=gallery">Image Gallery</a>
                </div>
            </li>
            <li class="nav-item">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">
                    <img id='pawIconNav' src="paw-prints-clipart-cat-paw.png" desalt="Avatar" class="avatar"></span>
                <a href="#menu" class="box-shadow-menu">
                    Menu
                </a>
                <!-- <a class="nav-link disabled" href="#">Disabled</a> -->
            </li>
        </ul>

    </div>
</nav>