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
    <h1 class="textCenter">These kitties need a new home!</h1>
</div>

<div id="container" class="container gallery-container">
    <div class="tz-gallery">
        <!--first row-->
        <div class="row row-eq-height adoptedSpace">

            <div class="col-sm-6 col-md-4">

                <div class='thumbnail'>
                    <a href="images/ForAdoption/Bailey.jpg" class='lightbox'>
                        <img src="images/ForAdoption/Bailey.jpg" alt="Bailey">

                    </a>
                    <div class="caption">
                        <button type="button" class="btn btnAll" data-toggle="modal" data-target="#baileyModalCenter">
                            Bailey
                        </button>
                        <!-- <button type="button" class="btn btn-primary">More Info</button> -->

                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="images/ForAdoption/Fromage.jpg" class='lightbox'>
                        <img src="images/ForAdoption/Fromage.jpg" alt="Fromage">
                    </a>
                    <div class="caption">
                        <button type="button" class="btn btnAll" data-toggle="modal" data-target="#fromageModalCenter">
                            Fromage
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class='thumbnail'>
                    <a href="images/ForAdoption/JohnSnow.jpg" class='lightbox'>
                        <img src="images/ForAdoption/JohnSnow.jpg" alt="John Snow">
                    </a>
                    <div class="caption">
                        <button type="button" class="btn btnAll" data-toggle="modal" data-target="#johnSnowModalCenter">
                            John Snow
                        </button>
                    </div>
                </div>
            </div>
        </div>                          
        <!--end first row-->
        
        
    </div>
    
    <!-- Bailey Modal -->
    <div class="modal fade" id="baileyModalCenter" tabindex="-1" role="dialog" aria-labelledby="baileyModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="baileyModalLongTitle">Bailey</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Breed: Cat</h6><br />
                    <h6>Age: 2</h6><br />
                    <h6>Gender: Female</h6><br />
                    <h6>Vaccinated: Yes</h6><br />
                    <h6>De-Clawed: Yes</h6><br />
                    <h6>About Bailey</h6>
                    <p>A female cat with blue eyes, she loves staring at walls and making you believe in 
                        ghosts again.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Adopt!</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Fromage Modal -->
    <div class="modal fade" id="fromageModalCenter" tabindex="-1" role="dialog" aria-labelledby="fromageModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fromageModalLongTitle">Fromage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Breed: Cat</h6><br />
                    <h6>Age: 3 months</h6><br />
                    <h6>Gender: Male</h6><br />
                    <h6>Vaccinated: No</h6><br />
                    <h6>De-Clawed: No</h6><br />
                    <h6>About Fromage</h6>
                    <p>Fromage means "cheese" in french. We call him that because he likes cheese and has some
                        stuck on his face constantly. Also he never smiles.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Adopt!</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- John Snow Modal -->
    <div class="modal fade" id="johnSnowModalCenter" tabindex="-1" role="dialog" aria-labelledby="johnSnowModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="johnSnowModalLongTitle">John Snow</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Breed: Cat</h6><br />
                    <h6>Age: 2 months</h6><br />
                    <h6>Gender: Male</h6><br />
                    <h6>Vaccinated: No</h6><br />
                    <h6>De-Clawed: No</h6><br />
                    <h6>About John Snow</h6>
                    <p>Not named after a certain popular HBO series.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Adopt!</button>
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
