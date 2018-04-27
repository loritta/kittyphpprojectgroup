

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="styles/adopted.css"/>

<div class="aboutEven aboutMain notMoving">
    <h1 class="textCenter">These kitties need a new home!</h1>
</div>

<div id="container" class="container gallery-container">
    <div class="tz-gallery">
        <div class="row row-eq-height adoptedSpace" id='row'>



        </div>
    </div>
</div>
<?php

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
        ($row['description'] === null) ? $description = 'No description' : $description = row['description'];


        $imageLink = getImageLink($id);

        if ($imageLink === null) {
            $imageLink = 'images/noimage.jpeg';
        }

        addThumbnail($name, $imageLink);
        createModal($name, $dob, $gender, $vaccineA, $vaccineB, $deworming, $availDate, $description);
    }
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

function createModal($name, $dob, $gender, $vaccineA, $vaccineB, $deworming, $availDate, $description) {
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
                    <button type='button' class='btn btnAll'>Adopt " . $name . "!</button>
                </div>
            </div>
        </div>
    </div>";
}
