<?php 
/**

 * 
 * content 
 
 * 
 *  */



?>
 <link rel="stylesheet" href="styles/contact.css" />
  <div class="aboutMain abboutEven">
  

        <div class="formFrame notMoving">
           
        <h1 class="title">Contact us</h1>
        <p>If you would like more information or want to book a demo, please provide us with your details below</p>
<small class="emailHelp" class="">* required fields</small><br />
        <form name="order" id="contact"
                method="post" action="#order_info" autocomplete="on">
            <div class="box">
                <label class="formLabel" for="your_name">Name*</label>
                <input type="text" id="your_name" name="your_name" class="formLabel" maxlength="80" required="required" autofocus="autofocus" /></br>
                <label class="formLabel" for="email">E-mail*</label>
                <input type="email" id="email" name="email" class="formLabel" required="required" placeholder=" id@domain.com" /><br />

                <label  class="formLabel" for="address">Address</label>
                <input type="text" id="address" name="address" class="formLabel" required="required" /></br>
                <label class="formLabel" for="ph_number">Phone number</label>
                
                <input type="text" id="ph_number" name="ph_number" required="required"  class="formLabel"/></br>
                </div>
            <div class="box">
                <label class="formLabel" for="your_text">Your message</label>
                <textarea id="your_text" name="your_text" class="formLabel" rows="5" cols="" required="required"></textarea></br>
                <small class="emailHelp" class="">We'll never share your personal information with anyone else.</small><br />
                
            </div>
                <button id="submit_form" name="submit_form" class="btn btn-default btn-sm" type="button" onclick="validateForm();">Send</button>
                <button id="clear_form" name="clear_form" class="btn btn-default btn-sm" type="button" onclick="resetForm();">Reset</button>
              </form>

        </div>
      </div>
<!--
      <div id="contact_info">
          <table class="contact_info_t  lang-en">
              <tr>
                  <td id="name_l" class="name_l">Name</td>
                  <td id="name_v" class="name_v"></td>
              </tr>
              <tr>
                  <td id="email_l" class="email_l">E-mail</td>
                  <td id="email_v" class="email_v"></td>
              </tr>
              <tr>
                  <td id="address_1" class="address_1">Address</td>
                  <td id="address_v" class="address_v"></td>
              </tr>
              <tr>
                  <td id="phone_l" class="phone_l">Phone Number</td>
                  <td id="phone_v" class="phone_v"></td>
              </tr>
              <tr>
                  <td id="message_l" class="message_l">Message</td>
                  <td id="message_v" class="message_v"></td>
              </tr>
          </table>


    </div>-->

    
