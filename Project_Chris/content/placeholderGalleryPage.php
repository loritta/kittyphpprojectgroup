<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    .thumbnail > img,
    .thumbnail a > img,
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        display: block;
        max-width: 100%;
        height: auto;
    }

    .gallery-container h1 {
        text-align: center;
        margin-top: 70px;
        font-weight: bold;
        color: #58595a;
    }

    .gallery-container p.page-description {
        text-align: center;
        margin: 30px auto;
        font-size: 18px;
        color: #85878c;
    }

    .tz-gallery {
        padding: 40px;
    }

    .tz-gallery .thumbnail {
        padding: 0;
        background-color: #fff;
        border-radius: 4px;
        border: none;
        transition: 0.15s ease-in-out;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.06);
        transition: transform 0.4s ease;
    }

    .tz-gallery .thumbnail:hover {
        transform: translateY(-10px) scale(1.02);
    }

    .tz-gallery .lightbox img {
        border-radius: 4px 4px 0 0;
        height: 250px;
        min-width: 250px;
        width: auto;
    }

    .tz-gallery .caption {
        padding: 5px 0px 5px 0px;
        text-align: center;
    }

    .tz-gallery .caption h3 {
        font-size: 14px;
        font-weight: bold;
        margin-top: 0;
    }

    .tz-gallery .caption p {
        font-size: 12px;
        color: #7b7d7d;
        margin: 0;
    }


    /*
    .gallery {
        text-align: center;
        width: 60%;
        margin: 0 auto;
    }
    .gallery:after {
        content: '';
        display: block;
        height: 2px;
        margin: .5em 0 1.4em;
        background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(77,77,77,1) 50%, rgba(0, 0, 0, 0) 100%);
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(77,77,77,1) 50%, rgba(0, 0, 0, 0) 100%);
    }

    .gallery img {
        height: 100%;
    }

    .gallery a {
        width: 240px;
        height: 180px;
        display: inline-block;
        overflow: hidden;
        margin: 4px 6px;
        box-shadow: 0 0 4px -1px #000;
    }

    .caption {
        border: 1px solid black;
    }

    .thumbnail {
        border: 1px solid black;
    }
    */
</style>


<div id="container" class="container gallery-container">
    <div class="tz-gallery">
        <div class="row row-eq-height">

            <div class="col-sm-6 col-md-4">

                <div class='thumbnail'>
                    <a href="_DSC3455.jpg" data-caption="Image caption" caption='test' class='lightbox'>
                        <img src="_DSC3455.jpg" alt="First image">
                    </a>
                    <div class="caption">
                        <h3>Kitty 1</h3>
                        <!-- <button type="button" class="btn btn-primary">More Info</button> -->

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="_DSC3491.jpg" class='lightbox'>
                        <img src="_DSC3491.jpg" alt="Second image">
                    </a>
                    <div class="caption">
                        <h3>Kitty 2</h3>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="_DSC3491.jpg" class='lightbox'>
                        <img src="_DSC3491.jpg" alt="Third image">
                    </a>
                    <div class="caption">
                        <h3>Kitty 3</h3>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4" class='lightbox'>
                <div class='thumbnail'>
                    <a href="_DSC3455.jpg" data-caption="Image caption" caption='test'>
                        <img src="_DSC3455.jpg" alt="First image">
                    </a>
                    <div class="caption">
                        <h3>Kitty 4</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    baguetteBox.run('.tz-gallery', {
        captions: true,
        noScrollbars: false,
        animation: 'slideIn',
        buttons: true
    });
</script>

