<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$userN="";
$passW="";


?>

 <link rel="stylesheet" href="styles/contact.css" />


<div class="aboutMain aboutEven">


    <div class="formFrame notMoving">

        <h1 class="title textCenter">Log in</h1>

        <small class="emailHelp" class="">* required fields</small><br />
        <p class="textCenter">Not registered with us? <a href='cats.php?content=signup' style='color:blue;'>Registration</a></p>

        <form name="login" id="login" method="post" action="cats.php?content=login_result" autocomplete="off">  
            <div class="box">
                <label  for="username" >User name*:</label><br/>
                <input class="formLabel" type="text" name="username" id="username" required="required"  maxlength="30"><br/>
                <div class='para'>

                    <label for='regpwd'>Password*:</label> <br />
                    <div class='pwdwidgetdiv' id='thepwddiv'></div>
                    <script type="text/javascript">
                        var pwdwidget = new PasswordWidget('thepwddiv', 'regpwd');
                        pwdwidget.enableGenerate = false;
                        pwdwidget.enableShowStrength = false;
                        pwdwidget.MakePWDWidget();
                    </script>
                    <noscript>
                    <div><input class="formLabel" type='password' id='regpwd' name='regpwd' /></div>		
                    </noscript>
                </div><br/>
            </div>
            <button class="btn btnAll" type="submit" id="submit" name="submit">Log in</button>
        </form>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$_SESSION['username']="";

$servername = "den1.mysql2.gear.host";
$username = "phpcats";
$password = "Ii0EExX_H~yx";
$dbname = "phpcats";

 $GLOBALS['userN'] = $_POST["username"];
    $GLOBALS['passW']=$_POST["regpwd"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users WHERE username='". $_POST['username']."' and password='".$_POST['regpwd']."'";
$result = $conn->query($sql);

if ($result->num_rows ==1) {
    
   
        
   $_SESSION['username']= $_POST['username']; ?><script>window.location.href = "cats.php";</script> <?php
    
   
} else {
    echo "<br/>Username or password are incorrect";
    
}
$conn->close();

}

