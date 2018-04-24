<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1 class="title">Registration</h1>
<p>* required fields</p>
<form name="signup" id="signup" method="post" action="cats.php?content=signup_result" autocomplete="off">  
    <label class="formLabel" for="name" >Name*:</label><br/>
    <input class="formLabel" type="text" name="name" id="name" required="required"  maxlength="100"><br/>
    <label class="formLabel" for="username" >User name*:</label><br/>
    <input class="formLabel" type="text" name="username" id="username" required="required"  maxlength="30"><br/>
    <div class='para'>

 <label for='regpwd'>Password*:</label> <br />
		<div class='pwdwidgetdiv' id='thepwddiv'></div>
		<script  type="text/javascript" >
		var pwdwidget = new PasswordWidget('thepwddiv','regpwd');
		pwdwidget.MakePWDWidget();
		</script>
		<noscript>
		<div><input type='password' id='regpwd' name='regpwd' /></div>		
		</noscript>
    </div><br/>
    <label class="formLabel" for="confPassword" >Confirm password*:</label><br/>
    <input class="formLabel" type="password" name="confPassword" id="confPassword" required="required" maxlength="30"><br/>
    <label class="formLabel" for="email" >Email*:</label><br/>
    <input class="formLabel" type="text" name="email" id="email" required="required"  maxlength="100"><br/>
    
 
    <button type="submit" id="submit" name="submit">Register</button>