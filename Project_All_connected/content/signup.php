<?php
if (isset($_SESSION['username'])) {
    ?>
    <script>window.location.href = "./cats.php";</script><?php
}

$nameErr = $emailErr = $passErr = $cityErr = $prErr = $phErr = "";
$name = $uName = $addr = $city = $province = $country = $pCode = $phone = $passW = $confPass = $email = "";
$isBr=false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "den1.mysql2.gear.host";
    $username1 = "phpcats";
    $password1 = "Ii0EExX_H~yx";
    $dbname = "phpcats";




    $name = filter_var(($_POST['name']), FILTER_SANITIZE_STRING);
    if (!preg_match("/^[a-zA-Z -]*$/", $name)) {
        $nameErr = "Only letters, white space and dash allowed";
    }


    $uName = filter_var(($_POST['username']), FILTER_SANITIZE_STRING);

    $addr = filter_var(($_POST['address']), FILTER_SANITIZE_STRING);

    $city = filter_var(($_POST['city']), FILTER_SANITIZE_STRING);
    if (!preg_match("/^[a-zA-Z -]*$/", $city)) {
        $cityErr = "Only letters, white space and dash allowed";
    }
    $province = filter_var(($_POST['province']), FILTER_SANITIZE_STRING);
    if (!preg_match("/^[a-zA-Z -]*$/", $province)) {
        $prErr = "Only letters, white space and dash allowed";
    }
    $country = filter_var(($_POST['country']), FILTER_SANITIZE_STRING);

    $pCode = filter_var(($_POST['pCode']), FILTER_SANITIZE_STRING);

    $phone = filter_var(($_POST['phone']), FILTER_SANITIZE_STRING);
    if (!preg_match("/^[0-9 -+]*$/", $phone)) {
        $phErr = "Only numbers, white space, plus sign and dash allowed";
    }

    $passW = $_POST['regpwd'];
    $confPass = $_POST['confPassword'];
    $email = filter_var(($_POST['email']), FILTER_SANITIZE_STRING);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    
   
    $isBr=isset($_POST['checkb']);

   
    
    
    if ($_POST['regpwd'] != $_POST['confPassword']) {

        $passErr = "Confirmation password doesn't match password!";
    } else if ($nameErr != "") {
        ;
    } else if ($emailErr != "") {
        ;
    } else {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username1, $password1);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO users 
    VALUES (:id, :name, :username, :isBreeder,  :password,  :email, :address, :city, :province,
    :postalCode, :country, :phone, :time)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':username', $uName);
            $stmt->bindParam(':isBreeder', $isBr);
            $stmt->bindParam(':password', $passW);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $addr);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':province', $province);
            $stmt->bindParam(':postalCode', $pCode);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':time', $time);

            $stmt->execute();
            ?><script>window.location.href = "cats.php?content=login";</script> <?php
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}
?>
<div id="regMain" style="margin: auto; width: 50%">
    <h1 class="title">Registration</h1>
    <p>* required fields</p>
    <form name="signup" id="signup" method="post" action="cats.php?content=signup" autocomplete="off">  
        <table style="width:60%">

            <tr><td>
                    <label class="formLabel" for="name" >Name*:</label><br/>
                    <input class="formLabel" type="text" name="name" id="name" required="required"  maxlength="100" size="35" value="<?php echo $name; ?>"><br/>
                    <span class="error"> <?php echo $nameErr; ?></span><br/>


                    <label class="formLabel" for="username" >User name*:</label><br/>
                    <input class="formLabel" type="text" name="username" id="username" required="required"  maxlength="30" size="35" value="<?php echo $uName; ?>"><br/><br/>


                    <label class="formLabel" for="address" >Address*:</label><br/>
                    <input class="formLabel" type="text" name="address" id="address" required="required"  maxlength="100" size="35" value="<?php echo $addr; ?>"><br/><br/>

                    <label class="formLabel" for="city" >City*:</label><br/>
                    <input class="formLabel" type="text" name="city" id="city" required="required"  maxlength="45" size="35" value="<?php echo $city; ?>"><br/>
                    <span class="error"> <?php echo $cityErr; ?></span><br/>

                    <label class="formLabel" for="province" >Province*:</label><br/>
                    <input class="formLabel" type="text" name="province" id="province" required="required"  maxlength="45" size="35" value="<?php echo $province; ?>"><br/>
                    <span class="error"> <?php echo $prErr; ?></span><br/>

                    <label class="formLabel" for="pCode" >Postal code*:</label><br/>
                    <input class="formLabel" type="text" name="pCode" id="pCode" required="required"  maxlength="10" size="35" value="<?php echo $pCode; ?>"><br/>
                </td>
                <td>
                    <label class="formLabel" for="country">Country*:</label><br/>
                    <select class="formLabel" id="country" name="country">

                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Angertina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahabas, The">Bahamas, The</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                        <option value="Congo, Republic of the">Congo, Republic of the</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia, The">Gambia, The</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Greece">Greece</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Ivory Coast">Ivory Coast</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, North">Korea, North</option>
                        <option value="Korea, South">Korea, South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Lichtenstein">Lichtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia">Micronesia</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vatican City">Vatican City</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select><br/><br/>

                    <label class="formLabel" for="email" >Email*:</label><br/>
                    <input class="formLabel" type="text" name="email" id="email" required="required"  maxlength="100" size="35" value="<?php echo $email; ?>"><br/>
                    <span class="error"> <?php echo $emailErr; ?></span><br/>
                    <label class="formLabel" for="phone" >Phone:</label><br/>
                    <input class="formLabel" type="text" name="phone" id="phone" maxlength="20" size="35" value="<?php echo $phone; ?>"><br/>
                    <span class="error"> <?php echo $phErr; ?></span><br/>
                    <div class='para'>

                        <label for='regpwd'>Password*:</label> 
                        <div class='pwdwidgetdiv' id='thepwddiv'></div>
                        <script  type="text/javascript" >
                            var pwdwidget = new PasswordWidget('thepwddiv', 'regpwd');
                            pwdwidget.MakePWDWidget();
                        </script>
                        <noscript>
                        <div><input type='password' id='regpwd' name='regpwd' required="required" maxlength="30" size="35" value="<?php echo $passW; ?>"/></div>		
                        </noscript>
                    </div><br/>

                    <label class="formLabel" for="confPassword" >Confirm password*:</label><br/>
                    <input class="formLabel" type="password" name="confPassword" id="confPassword" required="required" maxlength="30" ><br/>
                    <span class="error"> <?php echo $passErr; ?></span><br/>

                    <label class="formLabel" for="checkb" >Are you a breeder?</label>
                    <input type="checkbox" id="checkb"  name="checkb" <?php if(isset($_POST['checkb'])){ if($_POST['checkb']){ echo "checked='checked'";}} ?>><br/>
                </td>
            </tr>



        </table>

        <button class="btn btnAll" type="submit" id="submit" name="submit">Register</button>
    </form>
</div>