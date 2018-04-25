<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
            <button type="submit" id="submit" name="submit">Log in</button>
        </form>
    </div>
</div>





