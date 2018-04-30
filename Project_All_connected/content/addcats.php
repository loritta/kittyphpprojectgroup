<?php
$servername = "den1.mysql2.gear.host";
$username1 = "phpcats";
$password1 = "Ii0EExX_H~yx";
$dbname = "phpcats";

$idErr = $nameErr = $emailErr = $passErr = $cityErr = $prErr = $phErr = "";
$name = $gender = $descr = "";
$isBr = false;



$GLOBALS['id'] = 0;
$GLOBALS['orderId'] = 0;
$GLOBALS['name'] = "";
$GLOBALS['dob'] = date("d-m-Y");
$GLOBALS['vaccineA'] = false;
$GLOBALS['vaccineB'] = false;
$GLOBALS['deworming'] = false;
$GLOBALS['availabilityDate'] = date("d-m-Y");
$GLOBALS['adoptionDate'] = date("d-m-Y");
$GLOBALS['gender'] = "female";
$GLOBALS['description'] = "female";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $GLOBALS['target_file'] = "images/" . basename($_FILES["fileupload"]["name"]);


    $catId = filter_var(($_POST['catId']), FILTER_SANITIZE_STRING);
    if (!preg_match("/^[0-9]*$/", $catId)) {
        $idErr = "Only numbers allowed";
    }
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
    $imgPath = $GLOBALS['target_file'];
    $gender = $_POST['gender'];
    $descr = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

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
        if (($catId == "...")) {
            $stmt = $conn->prepare("INSERT INTO cats ( name, dob,  vaccineA,  vaccineB, deworming, availabilityDate, adoptionDate, gender, description) 
    VALUES ( :name, :dob,  :vaccineA,  :vaccineB, :deworming, :availabilityDate, :adoptionDate, :gender, :description)");


            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':vaccineA', $vaccineA);
            $stmt->bindParam(':vaccineB', $vaccineB);
            $stmt->bindParam(':deworming', $deworm);
            $stmt->bindParam(':availabilityDate', $avD);
            $stmt->bindParam(':adoptionDate', $adD);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':description', $descr);
            $stmt->execute();
            ?><script>alert("Entry was succesfully added");
            </script> <?php
            $last_id = $conn->lastInsertId();
            if ($imgPath != "" && $imgPath != "images/") {
                $stmt = $conn->prepare("INSERT INTO catsimages (catId, image)
    VALUES ( :catId, :image)");


                $stmt->bindParam(':catId', $last_id);
                $stmt->bindParam(':image', $imgPath);



                $stmt->execute();
            }
        } else {
            $sql = "UPDATE cats SET name='" . $name . "', dob='" . $dob . "', vaccineA='" . $vaccineA . "', vaccineB='" . $vaccineB . "',"
                    . "deworming='" . $deworm . "',availabilityDate='" . $avD . "',  adoptionDate='" . $adD . "',  gender='" . $gender . "',  "
                    . "description='" . $descr . " '  WHERE id=" . $catId . ";";

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            ?><script>
                var numbRec = <?php echo json_encode($stmt->rowCount()); ?>;
                alert(numbRec + " record(s) UPDATED successfully");</script><?php
            if ($imgPath != "" && $imgPath != "images/") {

                
                
                
              $stmt = $conn->prepare("SELECT * FROM catsimages WHERE catId='" . $catId . "'");
               $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                ?><script>
               
                alert(<?php echo gettype($result); echo $catId;?> );</script><?php
                if ($result>0) {


 ?><script>
               
                alert(<?php echo $imgPath; ?> );</script><?php
                    $stmt = $conn->prepare("UPDATE  catsimages SET image=" . $imgPath . "WHERE catId=" . $catId . ";");


                    // Prepare statement
                    $stmt = $conn->prepare($sql);

                    // execute the query
                    $stmt->execute();
                } else {
                    $stmt = $conn->prepare("INSERT INTO catsimages (catId, image)
    VALUES ( :catId, :image)");
                $stmt->bindParam(':catId', $catId);
                $stmt->bindParam(':image', $imgPath);
                $stmt->execute();
                }
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
//}
?>



<div id="regMain">
    <table >
        <tr >
            <td style="position: absolute; left:  15%; top: 15%">
                <div >
                    <h1 class="title">Add a cat</h1>
                    <p>* required fields</p>
                    <form name="addcats" id="addcats" method="post" action="cats.php?content=addcats" autocomplete="off" enctype="multipart/form-data">  
                        <label class="formLabel" for="catId" >Cat Id:</label><br/>
                        <input class="formLabel" type="text" name="catId" id="catId" maxlength="10" size="25" value="..."><br/>
                        <span class="error"> <?php echo $idErr; ?></span><br/>
                        <label class="formLabel" for="name" >Name*:</label><br/>
                        <input class="formLabel" type="text" name="name" id="name" required="required"  maxlength="100" size="25" ><br/>
                        <span class="error"> <?php echo $nameErr; ?></span><br/>

                        <label class="formLabel" for="name" >DOB*:</label><br/>
                        <input class="formLabel" type="date" name="dob" id="dob" required="required" ><br/>

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
                        <input class="formLabel" type="date" name="avDate" id="avDate"    value="<?php echo $GLOBALS['name']; ?>"><br/>

                        <label class="formLabel" for="adDate" >Adoption Date:</label><br/>
                        <input class="formLabel" type="date" name="adDate" id="adDate"    value="<?php echo $name; ?>"><br/>

                        <label for="fileupload"> Select an image to upload</label><br/>
                        <input type="file" name="fileupload" id="fileupload" accept="image/*" onchange="loadFile(event)"><br/>
                        <img id="output" width="100" height="100"/><br/><br/>
                        <script>
                            var loadFile = function (event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                        <label for='gender'>Gender</label><br>
                        <input type="radio" name="gender" value="male" checked> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>

                        <label for='description'>Description</label><br>
                        <textarea rows="5" cols="40" name="description" id="description"></textarea><br>

                        <button type="submit" id="submit" name="submit">Save</button>
                    </form><br/>

                </div>
            </td>
            <td style="position: absolute; right: 15%; top: 15%">
                <div >
                    <h1>Edit cat data</h1>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username1, $password1, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT cats.id, name, dob, vaccineA, vaccineB, deworming, availabilityDate, "
        . "adoptionDate, gender, description, image FROM cats LEFT JOIN catsimages ON cats.id=catsimages.catId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<select id="list" onchange="getSelectValue();">';
    // output data of each row
    while ($row = $result->fetch_assoc()) {
//                            echo "<p   id='" . $row['name'] . "' onclick='myFunction(this.id);' >"."<span style='visibility:hidden'>". "#" . $row['id'] . " Name: " . $row['name'] ."DOB: " . $row['dob'] .
//                            "Vaccine A: " . $row['vaccineA'] . "Vaccine B: " . $row['vaccineB'] . "Deworming: " . $row['deworming'] .
//                            "Availability Date: " . $row['availabilityDate'] . "Adoption Date: " . $row['adoptionDate'] .
//                            "Gender: " . $row['gender'] . "Description: " . $row['description'] . '</span>' . "</p>";
        echo "<option value='" . "#" . $row['id'] . " Name: " . $row['name'] . "DOB: " . $row['dob'] .
        "Vaccine A: " . $row['vaccineA'] . "Vaccine B: " . $row['vaccineB'] . "Deworming: " . $row['deworming'] .
        "Availability Date: " . $row['availabilityDate'] . "Adoption Date: " . $row['adoptionDate'] .
        "Gender: " . $row['gender'] . "Description: " . $row['description'] . "Image Path: " . $row['image'] . "label=''" . "' >" . $row['id'] . "." . $row['name'] . "</option>";
    }
    echo "</select>";
} else {
    ?><script>alert("0 cats")</script><?php
                    }


                    $conn->close();
                    ?>
                    <script>

//                        function myFunction(clicked) {
//                            var x = document.getElementById("" + clicked + "").innerHTML;
//                            // alert(clicked);
//                            document.getElementById("name").value = x.substring(x.lastIndexOf("Name: ") + 6, x.lastIndexOf("<span"));
//                            document.getElementById("dob").value = x.substring(x.lastIndexOf("DOB: ") + 5, x.lastIndexOf("Vaccine A: "));
//                            //document.getElementById("checkb").value=x.substring(x.lastIndexOf("A: ")+3,x.lastIndexOf("Vaccine B: "));
//
//                            document.getElementById("avDate").value = x.substring(x.lastIndexOf("Availability Date: ") + 19, x.lastIndexOf("Adoption"));
//                            document.getElementById("adDate").value = x.substring(x.lastIndexOf("Adoption Date: ") + 15, x.lastIndexOf("Gender"));
//
//                            var temp = x.substring(x.lastIndexOf("A: ") + 3, x.lastIndexOf("Vaccine B: "));
//                            var temp2 = (temp == 0) ? false : true;
//                            document.getElementById("checkb").checked = temp2;
//
//                            var temp3 = x.substring(x.lastIndexOf("B: ") + 3, x.lastIndexOf("Deworming:"));
//                            var temp4 = (temp3 == 0) ? false : true;
//                            document.getElementById("checkb2").checked = temp4;
//
//                            var temp5 = x.substring(x.lastIndexOf("Deworming: ") + 11, x.lastIndexOf("Availability"));
//                            var temp6 = (temp5 == 0) ? false : true;
//                            document.getElementById("checkb3").checked = temp6;
//
//
//                        }
                        function getSelectValue() {

                            var x = document.getElementById("list").value;
                            document.getElementById("catId").value = x.substring(x.lastIndexOf("#") + 1, x.lastIndexOf(" Name: "));
                            document.getElementById("name").value = x.substring(x.lastIndexOf("Name: ") + 6, x.lastIndexOf("DOB: "));
                            document.getElementById("dob").value = x.substring(x.lastIndexOf("DOB: ") + 5, x.lastIndexOf("Vaccine A: "));



                            var temp = x.substring(x.lastIndexOf("A: ") + 3, x.lastIndexOf("Vaccine B: "));
                            var temp2 = (temp == 0) ? false : true;
                            document.getElementById("checkb").checked = temp2;

                            var temp3 = x.substring(x.lastIndexOf("B: ") + 3, x.lastIndexOf("Deworming:"));
                            var temp4 = (temp3 == 0) ? false : true;
                            document.getElementById("checkb2").checked = temp4;

                            var temp5 = x.substring(x.lastIndexOf("Deworming: ") + 11, x.lastIndexOf("Availability"));
                            var temp6 = (temp5 == 0) ? false : true;
                            document.getElementById("checkb3").checked = temp6;


                            document.getElementById("avDate").value = x.substring(x.lastIndexOf("Availability Date: ") + 19, x.lastIndexOf("Adoption"));
                            document.getElementById("adDate").value = x.substring(x.lastIndexOf("Adoption Date: ") + 15, x.lastIndexOf("Gender"));

                            var temp7 = x.substring(x.lastIndexOf("Gender: ") + 8, x.lastIndexOf("Description: "));
                            var temp8 = (temp7 == "male") ? true : false;
                            if (temp8) {
                                document.addcats.gender[0].checked = true;
                            } else {
                                document.addcats.gender[1].checked = true;
                            }

                            document.getElementById("description").value = x.substring(x.lastIndexOf("Description: ") + 13, x.lastIndexOf("Image Path:"));

                            var path = x.substring(x.lastIndexOf("Image Path: ") + 12, x.lastIndexOf("label"));
                            document.getElementById("output").src = path;
                            //document.getElementById("fileupload").value = "path.jpg";
                        }
                    </script>

                </div>
            </td>
        </tr>
    </table>

</div>

<?php
//$content = "<script> document.write(x) </script>";
//       echo $content;
//        $conn = new mysqli($servername, $username1, $password1, $dbname);
//// Check connection
//        if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        }
//
//          $sql = "SELECT * FROM cats WHERE name="."'".$catName."'";
//        $result = $conn->query($sql);
//
//        if ($result->num_rows > 0) {
//
//            // output data of each row
//            while ($row = $result->fetch_assoc()) {
//                $GLOBALS['id'] = $row['name'];
//                $GLOBALS['orderId'] = $row['orderId'];
//                $GLOBALS['name'] = $row['name'];
//                $GLOBALS['dob'] = $row['dob'];
//                $GLOBALS['vaccineA']= $row['vaccineA'];
//                $GLOBALS['vaccineB']= $row['vaccineB'];
//                $GLOBALS['deworming']= $row['deworming'];
//                $GLOBALS['availabilityDate']= $row['availabilityDate'];
//                $GLOBALS['adoptionDate']= $row['adoptionDate'];
//                $GLOBALS['gender']= $row['gender'];
//                $GLOBALS['description']= $row['description'];
//            }
//            
//        }
//        $conn->close();
//        ;
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($GLOBALS['target_file'], PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["fileupload"])) {
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            ?><script>alert("File is not an image.");</script><?php
            $uploadOk = 0;
        }
    }
// Check if file already exists
        if (file_exists($target_file)) {
            ?><script>alert("Sorry, file already exists.");</script><?php
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileupload"]["size"] > 500000) {
            ?><script>alert("Sorry, your file is too large.");</script><?php
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            ?><script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script><?php
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            ?><script>alert("Sorry, your file was not uploaded.");</script><?php
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $GLOBALS['target_file'])) {
                ?><script>alert("The file has been uploaded.");</script><?php
            } else {
                ?><script>alert("Sorry, there was an error uploading your file.");</script><?php
            }
        }
    
}
?>

