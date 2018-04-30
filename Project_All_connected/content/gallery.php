<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="styles/adopt.css"/>


<div class="aboutEven aboutMain pageBanner">
    <h1 class="textCenter">Find your perfect companion</h1>
</div>



<div id="container" class="container gallery-container">

    <div class="mainHeader">
        <h2>Our Featured Cats and Kittens</h2>
    </div>

    <div class="tz-gallery">
        <div class="row row-eq-height adoptedSpace" id='row'>

            <script>
                $(document).ready(function () {
                    $(".btnAdopt").click(function () {
                        $(".modal").modal('hide');
                        $("#adoptModal").modal('show');

                    });

                    // using ajax to send the message to the server without reloading or redirecting page
                    $('#btnAdoptRequest').click(function () {

                        var user = $("#user").val();
                        var message = $("#message").val();


                        $.ajax({
                            url: 'adoptInfoRequest.php',
                            type: 'POST',
                            data: {
                                user: user,
                                message: message
                            },
                            success: function (msg) {
                                $("#adoptModal").modal('hide');

                                alert("Your message was sent!");

                            }
                        });
                    });


                    $('#btnAddCart').click(function () {

                        $.ajax({
                            url: 'addNewOrder.php',
                            type: 'POST',
                            data: {
                                userName: userName,
                                catId: selectedCat
                            },
                            success: function (msg) {
                                $("#adoptModal").modal('hide');

                                alert("Your order has been sent!");

                            }
                        });
                        
                    });

                });


                var userName;
                var selectedCat;

                function selectCat(id) {
                    selectedCat = id;
                }

            </script>


        </div>
    </div>
</div>



<?php
// php scripts below

function getConnection() {
    $servername = "den1.mysql2.gear.host";
    $username = "phpcats";
    $password = "Ii0EExX_H~yx";
    $dbname = "phpcats";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

$conn = getConnection();

$sql = "SELECT id, name, dob, vaccineA, vaccineB, deworming, availabilityDate, gender, description FROM cats";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        // if the availability date is 0000-00-00, consider the cat adopted and dont display it
        $availDate = $row['availabilityDate'];

        if ($availDate == '0000-00-00') {
            continue;
        }

        $id = $row['id'];
        $name = $row["name"];
        $dob = $row['dob'];
        $vaccineA = ((bool) $row['vaccineA']) ? 'yes' : 'no';
        $vaccineB = ((bool) $row['vaccineB']) ? 'yes' : 'no';
        $deworming = ((bool) $row['deworming']) ? 'yes' : 'no';

        ($row['gender'] === null) ? $gender = 'Unknown' : $gender = $row['gender'];
        ($row['description'] === null) ? $description = 'No description' : $description = $row['description'];


        $imageLink = getImageLink($id);

        if ($imageLink === null) {
            $imageLink = 'images/noimage.jpeg';
        }

        addThumbnail($name, $imageLink);
        createModal($id, $name, $dob, $gender, $vaccineA, $vaccineB, $deworming, $availDate, $description);
    }
    createAdoptModal(); // the modal for when you click "adopt", only 1 is needed
} else {
    echo "0 results";
}

runGallery();

$conn->close();

function thumbnailInnerHTML($name, $imageLink) {
    return "\"<div class='thumbnail'>\" + 
            \"<a href='" . $imageLink . "' class='lightbox'><img src='" . $imageLink . "' alt='" . $name . "'></a>\" + 
            \"<div class='caption'>\" + 
            \"<button type='button' class='btn btnAll' data-toggle='modal' data-target='#" . $name . "ModalCenter'>" . $name . "</button>\" +
            \"</div></div>\"";
}

function addThumbnail($name, $imageLink) {

    $innerHTML = thumbnailInnerHTML($name, $imageLink);
    echo "<script>var newDiv = null;" .
    " newDiv = document.createElement('DIV');" .
    " newDiv.className = 'col-sm-6 col-md-4';" .
    " newDiv.innerHTML = " . $innerHTML . ";" .
    " document.getElementById('row').appendChild(newDiv);</script>;";
}

function getImageLink($id) {

    $conn = getConnection();

    $sql = "SELECT image FROM catsimages WHERE catId = " . $id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            return $row['image'];
        }
    } else {
        return null;
    }
}

function runGallery() {
    echo "<script>
            baguetteBox.run('.tz-gallery', {
                captions: true,
                noScrollbars: false,
                animation: 'slideIn',
                buttons: true
            });
            </script>";
}

function createModal($id, $name, $dob, $gender, $vaccineA, $vaccineB, $deworming, $availDate, $description) {
    echo "
    <div class='modal fade' id='" . $name . "ModalCenter' tabindex='-1' role='dialog' aria-labelledby='" . $name . "ModalCenterTitle' 
        aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='" . $name . "ModalLongTitle'>" . $name . "</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <h6>Date of Birth: " . $dob . "</h6><br />
                    <h6>Gender: " . $gender . "</h6><br />
                    <h6>Vaccine A: " . $vaccineA . "</h6><br />
                    <h6>Vaccine B: " . $vaccineB . "</h6><br />  
                    <h6>Dewormed: " . $deworming . "</h6><br />
                    <h6>Availability Date: " . $availDate . "</h6><br /> 
                    <h6>Description: " . $description . "</h6><br />
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btnAll' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btnAll btnAdopt' onclick=\"selectCat(" . $id . ")\">Adopt " . $name . "!</button>
                </div>
            </div>
        </div>
    </div>";

}

function createAdoptModal() {

    if (isset($_SESSION['username']) && $_SESSION['username'] != null) {
        // if user is logged in, save the username to a javascript variable to be used later if needed (when adopting)
        echo "<script>userName = '" . $_SESSION['username'] . "';</script>"; 
        
        // create the modal for a logged in user
        echo "
        <div class='modal fade' id='adoptModal' tabindex='-1' role='dialog' aria-labelledby='adoptModalLabel' aria-hidden='true'>
        
            <div class='modal-dialog modal-dialog-centered' role='document'>
            
                <div class='modal-content'>
                
                  <div class='modal-header'>
                    <h4 class='modal-title' id='exampleModalLabel'>Ready to adopt?</h4>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  
                  <div class='modal-body'>
                    <button type='button' class='btn btnAll btnSuccess btnCall'><span class='glyphicon glyphicon-earphone'</span>
                        Call us at 1-800-1212-0155 if you need any information</button>
                    <h5>You can also send us a direct message, we'll get back to you asap!</h5>
                    <form>
                      <div class='form-group'>
                        <label for='userName' class='col-form-label'>Your name:</label>
                        <input type='text' class='form-control' id='user' name='userName'>
                      </div>
                      <div class='form-group'>
                        <label for='message-text' class='col-form-label'>Your Message: (make sure you leave us a way to contact you!)</label>
                        <textarea class='form-control' id='message'></textarea>
                      </div>
                      <button type='button' class='btn btn-primary' id='btnAdoptRequest'>Send message</button>

                    </form>
                    
                    <h5>Got all the info you need? Click the button below to purchase your new companion</h5>

                  </div>
                  

                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                    <button type='button' class='btn btn-primary' id='btnAddCart'>Adopt Now!</button>
                  </div>                 
            </div>
          </div>
        </div>";
        // create the modal for user not logged in
    } else {
        echo "
        <div class='modal fade' id='adoptModal' tabindex='-1' role='dialog' aria-labelledby='adoptModalLabel' aria-hidden='true'>
        
            <div class='modal-dialog modal-dialog-centered' role='document'>
            
                <div class='modal-content'>
                
                  <div class='modal-header'>
                    <h4 class='modal-title' id='exampleModalLabel'>Login required</h4>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  
                  <div class='modal-body'>

                    <h5>Please login or create an account to adopt!</h5>
      
                  </div>
                  
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                    <button type='button' class='btn btn-primary' id='btnLogin' onclick=\"location.href='cats.php?content=login';\">Login</button>
                  </div>                 
            </div>
          </div>
        </div>";
    }
}
