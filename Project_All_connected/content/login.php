<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



?>

<div class="backMain">
  </div>

        <div class="formFrame">
        <h1 class="title">Log in</h1>
        <p>* required fields</p>
        <p>Not registered with us? <a href='cats.php?content=signup' style='color:blue;'>Registration</a></p>
<form name="login" id="login" method="post" action="cats.php?content=login_result" autocomplete="off">  
    <label class="formLabel" for="username" >User name*:</label><br/>
    <input class="formLabel" type="text" name="username" id="username" required="required"  maxlength="30"><br/>
    <div class='para'>

 <label for='regpwd'>Password*:</label> <br />
		<div class='pwdwidgetdiv' id='thepwddiv'></div>
		<script type="text/javascript">
		var pwdwidget = new PasswordWidget('thepwddiv','regpwd');
		pwdwidget.enableGenerate=false;
		pwdwidget.enableShowStrength=false;
		pwdwidget.MakePWDWidget();
		</script>
		<noscript>
		<div><input type='password' id='regpwd' name='regpwd' /></div>		
		</noscript>
    </div><br/>
    <button type="submit" id="submit" name="submit">Log in</button>



      

