<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
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
</style>



<div class="gallery">
    <a href="_DSC3455.jpg" data-caption="Image caption" caption='test'>
        <img src="_DSC3455.jpg" alt="First image">
    </a>

    <a href="_DSC3491.jpg">
        <img src="_DSC3491.jpg" alt="Second image">
    </a>
    <a href="_DSC3491.jpg">
        <img src="_DSC3491.jpg" alt="Third image">
    </a>
    <a href="_DSC3455.jpg" data-caption="Image caption" caption='test'>
        <img src="_DSC3455.jpg" alt="First image">
    </a>

    <a href="_DSC3491.jpg">
        <img src="_DSC3491.jpg" alt="Second image">
    </a>
    <a href="_DSC3491.jpg">
        <img src="_DSC3491.jpg" alt="Third image">
    </a>
</div>
</div>

<script>
    baguetteBox.run('.gallery', {
        captions: true,
        noScrollbars: false,
        animation: 'slideIn',
        buttons: true
    });
</script>

