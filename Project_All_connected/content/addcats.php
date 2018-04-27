<?php
$servername = "den1.mysql2.gear.host";
$username1 = "phpcats";
$password1 = "Ii0EExX_H~yx";
$dbname = "phpcats";

$nameErr = $emailErr = $passErr = $cityErr = $prErr = $phErr = "";
$name = $uName = $addr = $city = $province = $country = $pCode = $phone = $passW = $confPass = $email = "";
$isBr = false;

$result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$GLOBALS['target_file'] = "images/" . basename($_FILES["fileupload"]["name"]);



    $name = filter_var(($_POST['name']), FILTER_SANITIZE_STRING);
    if (!preg_match("/^[a-zA-Z -]*$/", $name)) {
        $nameErr = "Only letters, white space and dash allowed";
    }
    $dob = $_POST['dob'];
    $vaccineA = isset($_POST['checkb']);
    $vaccineB = isset($_POST['checkb2']);
    $deworm = isset($_POST['checkb3']);
    $avD = $_POST['avDate'];
    $adD = $_POST['adDate'];
    $imgPath =$GLOBALS['target_file'];


//    $uName = filter_var(($_POST['username']), FILTER_SANITIZE_STRING);
//
//    $addr = filter_var(($_POST['address']), FILTER_SANITIZE_STRING);
//
//    $city = filter_var(($_POST['city']), FILTER_SANITIZE_STRING);
//    if (!preg_match("/^[a-zA-Z -]*$/", $city)) {
//        $cityErr = "Only letters, white space and dash allowed";
//    }
//    $province = filter_var(($_POST['province']), FILTER_SANITIZE_STRING);
//    if (!preg_match("/^[a-zA-Z -]*$/", $province)) {
//        $prErr = "Only letters, white space and dash allowed";
//    }
//    $country = filter_var(($_POST['country']), FILTER_SANITIZE_STRING);
//
//    $pCode = filter_var(($_POST['pCode']), FILTER_SANITIZE_STRING);
//
//    $phone = filter_var(($_POST['phone']), FILTER_SANITIZE_STRING);
//    if (!preg_match("/^[0-9 -+]*$/", $phone)) {
//        $phErr = "Only numbers, white space, plus sign and dash allowed";
//    }
//
//    $passW = $_POST['regpwd'];
//    $confPass = $_POST['confPassword'];
//    $email = filter_var(($_POST['email']), FILTER_SANITIZE_STRING);
//
//
//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        $emailErr = "Invalid email format";
//    }
//
//
//    $isBr = isset($_POST['checkb']);
//    if ($_POST['regpwd'] != $_POST['confPassword']) {
//
//        $passErr = "Confirmation password doesn't match password!";
//    } else if ($nameErr != "") {
//        ;
//    } else if ($emailErr != "") {
//        ;
//    } else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username1, $password1);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO cats ( name, dob,  vaccineA,  vaccineB, deworming, availabilityDate, adoptionDate) 
    VALUES ( :name, :dob,  :vaccineA,  :vaccineB, :deworming, :availabilityDate, :adoptionDate)");


        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':vaccineA', $vaccineA);
        $stmt->bindParam(':vaccineB', $vaccineB);
        $stmt->bindParam(':deworming', $deworm);
        $stmt->bindParam(':availabilityDate', $avD);
        $stmt->bindParam(':adoptionDate', $adD);


        $stmt->execute();
        $last_id = $conn->lastInsertId();
        if (isset($imgPath)) {
            $stmt = $conn->prepare("INSERT INTO catsimages (catId, image)
    VALUES ( :catId, :image)");


            $stmt->bindParam(':catId', $last_id);
            $stmt->bindParam(':image', $imgPath);



            $stmt->execute();
        }
        $result = "Successfully added.";
        ?><script>alert("Entry was succesfully added");
        </script> <?php
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
//}
?>



<div id="regMain" style="margin: auto; width: 50%">
    <h1 class="title">Add a cat</h1>
    <p>* required fields</p>
    <form name="signup" id="signup" method="post" action="cats.php?content=addcats" autocomplete="off" enctype="multipart/form-data">  

        <label class="formLabel" for="name" >Name*:</label><br/>
        <input class="formLabel" type="text" name="name" id="name" required="required"  maxlength="100" size="35" value="<?php echo $name; ?>"><br/>
        <span class="error"> <?php echo $nameErr; ?></span><br/>

        <label class="formLabel" for="name" >DOB*:</label><br/>
        <input class="formLabel" type="date" name="dob" id="dob" required="required"  value="<?php echo $name; ?>"><br/>

        <label class="formLabel" for="checkb" >Vaccine A*:</label>
        <input type="checkbox" id="checkb"  name="checkb" <?php
        if (isset($_POST['checkb'])) {
            if ($_POST['checkb']) {
                echo "checked='checked'";
            }
        }
        ?>><br/>
        <label class="formLabel" for="checkb2" >Vaccine B*:</label>
        <input type="checkbox" id="checkb2"  name="checkb2" <?php
        if (isset($_POST['checkb2'])) {
            if ($_POST['checkb2']) {
                echo "checked='checked'";
            }
        }
        ?>><br/>
        <label class="formLabel" for="checkb3" >Deworming*:</label>
        <input type="checkbox" id="checkb3"  name="checkb3" <?php
        if (isset($_POST['checkb3'])) {
            if ($_POST['checkb3']) {
                echo "checked='checked'";
            }
        }
        ?>><br/>

        <label class="formLabel" for="avDate" >Availability Date:</label><br/>
        <input class="formLabel" type="date" name="avDate" id="avDate"    value="<?php echo $name; ?>"><br/>

        <label class="formLabel" for="adDate" >Adoption Date:</label><br/>
        <input class="formLabel" type="date" name="adDate" id="adDate"    value="<?php echo $name; ?>"><br/>

        <label for="fileupload"> Select an image to upload</label><br/>
        <input type="file" name="fileupload" id="fileupload" accept="image/*" onchange="loadFile(event)"><br/>
        <img id="output" width="50" height="50"/><br/><br/>
        <script>
            var loadFile = function (event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
<!--        <script type="text/javascript">
            function getFilePath() {
                $('input[type=file]').change(function () {
                    var filePath = $('#fileupload').val();
                    <?php $path = "<script>document.write(filePath)</script>" ;?>   
                });
            }
        </script>-->

        <button type="submit" id="submit" name="submit">Save</button>
    </form><br/>
</div>
<?php
$conn = new mysqli($servername, $username1, $password1, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cats";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 cats";
}
$conn->close();
?>
     
<?php
$target_dir = "images/";
$GLOBALS['target_file'] = $target_dir . basename($_FILES["fileupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($GLOBALS['target_file'],PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($GLOBALS['target_file'])) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileupload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $GLOBALS['target_file'])) {
        echo "The file ". basename( $_FILES["fileupload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>