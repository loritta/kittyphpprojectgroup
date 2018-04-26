<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="styles/adopted.css"/>



<div class="aboutEven aboutMain notMoving">
    <h1 class="textCenter">Our cats with new homes</h1>
</div>


<div id="container" class="container gallery-container">
    <div class="tz-gallery">
        <!--first row-->
        <div class="row row-eq-height adoptedSpace">

            <div class="col-sm-6 col-md-4">

                <div class='thumbnail'>
                    <a href="images/_DSC3450.jpg" data-caption="Image caption" class='lightbox'>
                        <img src="images/_DSC3450.jpg" alt="First image">

                    </a>
                    <div class="caption">
                        <button type="button" class="btn btnAll" data-toggle="modal" data-target="#theBearModalCenter">
                            "The Bear"
                        </button>
                        <!-- <button type="button" class="btn btn-primary">More Info</button> -->

                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="images/_DSC3492.jpg" class='lightbox'>
                        <img src="images/_DSC3492.jpg" alt="Second image">
                    </a>
                    <div class="caption">
                        <button type="button" class="btn btnAll" data-toggle="modal" data-target="#busyaModalCenter">
                            "Busya"
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="images/_DSC3494.jpg" class='lightbox'>
                        <img src="images/_DSC3494.jpg" alt="Third image">
                    </a>
                    <div class="caption">
                        <h3>"Busya"</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>                          
        <!--end first row-->

        <!--second row-->
        <div class="row row-eq-height adoptedSpace">

            <div class="col-sm-6 col-md-4">

                <div class='thumbnail'>
                    <a href="images/_DSC3965.jpg" data-caption="Image caption" class='lightbox'>
                        <img src="images/_DSC3965.jpg" alt="First image">
                    </a>
                    <div class="caption">
                        <h3>"The bear 2"</h3>
                        <!-- <button type="button" class="btn btn-primary">More Info</button> -->

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="images/_DSC3457.jpg" class='lightbox'>
                        <img src="images/_DSC3457.jpg" alt="Second image">
                    </a>
                    <div class="caption">
                        <h3>"Shanya & The bear"</h3>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="images/_DSC4005.jpg" class='lightbox'>
                        <img src="images/_DSC4005.jpg" alt="Third image">
                    </a>
                    <div class="caption">
                        <h3>"Greycy"</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <!--end second row-->

        <!--third row-->
        <div class="row row-eq-height adoptedSpace">

            <div class="col-sm-6 col-md-4">

                <div class='thumbnail'>
                    <a href="images/_DSC3952.jpg" data-caption="Image caption" caption='test' class='lightbox'>
                        <img src="images/_DSC3952.jpg" alt="First image">
                    </a>
                    <div class="caption">
                        <h3>"Boubou"</h3>
                        <!-- <button type="button" class="btn btn-primary">More Info</button> -->

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="images/_DSC3951.jpg" class='lightbox'>
                        <img src="images/_DSC3951.jpg" alt="Second image">
                    </a>
                    <div class="caption">
                        <h3>"Boubou"</h3>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="images/_DSC3452.jpg" class='lightbox'>
                        <img src="images/_DSC3452.jpg" alt="Third image">
                    </a>
                    <div class="caption">
                        <h3>"The bear"</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end third row-->

    <!-- Button trigger modal -->


    <!-- Modals -->

    <!-- "The Bear" Modal -->
    <div class="modal fade" id="theBearModalCenter" tabindex="-1" role="dialog" aria-labelledby="theBearModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="theBearModalLongTitle">"The Bear"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Breed: Cat</h6><br />
                    <h6>Age: 99</h6><br />
                    <h6>Gender: Male</h6><br />
                    <h6>Vaccinated: Yes</h6><br />
                    <h6>De-Clawed: No</h6><br />
                    <h6>About "The Bear"</h6>
                    <p>We call him "The Bear" because he eats people and he weights
                        800 pounds.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Adopt!</button>
                </div>
            </div>
        </div>
    </div>
    <!-- "Busya" Modal -->
    <div class="modal fade" id="busyaModalCenter" tabindex="-1" role="dialog" aria-labelledby="busyaModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="busyaodalLongTitle">Busya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Breed: Gray cat?</h6><br />
                    <h6>Age: 0.1 years</h6><br />
                    <h6>Gender: Female</h6><br />
                    <h6>Vaccinated: No</h6><br />
                    <h6>De-Clawed: No</h6><br />
                    <h6>About Busya</h6>
                    <p>She's a cat and she's already adopted, donate now thank you.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
