<?php


$nameErr = $emailErr = $passErr = $cityErr = $prErr = $phErr = "";
$name = $uName = $addr = $city = $province = $country = $pCode = $phone = $passW = $confPass = $email = "";
$isBr = false;

$result="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "den1.mysql2.gear.host";
    $username1 = "phpcats";
    $password1 = "Ii0EExX_H~yx";
    $dbname = "phpcats";




    $name = filter_var(($_POST['name']), FILTER_SANITIZE_STRING);
    if (!preg_match("/^[a-zA-Z -]*$/", $name)) {
        $nameErr = "Only letters, white space and dash allowed";
    }
    $dob=$_POST['dob'];
    $vaccineA=isset($_POST['checkb']);
    $vaccineB=isset($_POST['checkb2']);
    $deworm=isset($_POST['checkb3']);
    $avD=$_POST['avDate'];
    $adD = $_POST['adDate'];
    $img = $_POST['fileupload'];


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
            if(isset($_POST['fileupload'])){
                $stmt = $conn->prepare("INSERT INTO catsimages (catId, image)
    VALUES ( :catId, :image)");
           
           
            $stmt->bindParam(':catId', $last_id);
            $stmt->bindParam(':image', $img);
               
          

            $stmt->execute();
                
            }
           $result= "Successfully added.";
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
    <form name="signup" id="signup" method="post" action="cats.php?content=addcats" autocomplete="off">  

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
        <input type="file" name="fileupload" id="fileupload"> <br/><br/>



        <button type="submit" id="submit" name="submit">Save</button>
    </form><br/><?php echo $result; ?>
</div>