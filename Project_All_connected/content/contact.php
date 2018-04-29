<?php
/**

 * 
 * Contact form with spam prevention

 * 
 *  */

?>

<link rel="stylesheet" href="styles/contact.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
   
      // Form validation code will come here.
      function Validate()
      { var regex = /^[a-zA-Z ]{2,30}$/;
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
      
         if(document.contact.name.value == "" )
         {
            alert( "Please provide your name!" );
            document.contact.name.focus() ;
            return false;
         }
         else if(!regex.test(document.contact.name.value)){
             alert( "Your name sould be longer then 5 characters!" );
            document.contact.name.focus() ;
            return false; 
         }
         
        
         if( document.contact.email.value == "" )
         {
            alert( "Please provide your Email!" );
            document.contact.email.focus() ;
            return false;
         }
         else if(!re.test(document.contact.email.value))
         {
             alert( "Please provide a valid Email!" );
            document.contact.email.focus() ;
             return ;
         }
         
      
         if( document.contact.text.value == "" && document.contact.text.value.length <=10)
         {
            alert( "Please provide a miningful Message!" );
            document.contact.text.focus() ;
            return false;
         }
         return( true );
      }
     function resetForm(){
         document.contact.text.value="";
         document.contact.name.value="";
         document.contact.email.value="";
         document.contact.address.value="";
         document.contact.phone.value="";
     }
</script>

<div class="aboutMain aboutEven">


    <div class="formFrame notMoving">

        <h1 class="title">Contact us</h1>
        <p>If you would like more information or want to book a demo, please provide us with your details below</p>
        <small class="emailHelp" class="">* required fields</small><br />

        <form name="contact" id="contact"
              method="post" action="<?php echo($_SERVER['PHP_SELF']);?>" autocomplete="on" onsubmit="return validate();">
            <div class="box">
                <label class="formLabel" for="name">Name*</label>
                <input required type="text" minlength="2" id="name" name="name" class="formLabel" maxlength="80" autofocus="autofocus" /></br>
                
                <label class="formLabel" for="email">E-mail*</label>
                <input required type="email" id="email" name="email" class="formLabel" placeholder=" id@domain.com" /><br />

                <label  class="formLabel" for="address">Address</label>
                <input type="address" id="address" name="address" class="formLabel"  /></br>
                
                <label class="formLabel" for="phone">Phone number</label>
                <input type="phone" id="phone" name="phone" class="formLabel"/></br>
                
                <input type="text" id="website" name="website" class="hidden"/>

            </div>
            <div class="box">
                <label class="formLabel" for="subject">Subject</label>
                <input type="text" id="subject" name="subject" class="formLabel"/></br>
                
                <label class="formLabel" for="text">Your message*</label>
                <textarea required id="text" minlength="10" name="text" class="formLabel" rows="5" cols="" required="required"></textarea></br>
                
                <small class="emailHelp" class="">We'll never share your personal information with anyone else.</small><br />

            </div>
            <button id="submit" name="submit" value="click" class="btn btnAll" type="submit">Send</button>
            <button id="test" name="test" value="click" class="btn btnAll" type="button" onclick="return Validate();">Test</button>
            <button id="clear_form" name="clear" class="btn btnAll" type="button" onclick="resetForm();">Reset</button>
        </form>
    </div>
</div>

 <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['submit'])) {
    $email_to = "larisa.sabalin@gmail.com";

    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error . "<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    if (!isset($_POST['name']) ||
            !isset($_POST['email']) ||
            !isset($_POST['text'])
    ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = htmlspecialchars($_POST['name']);
    $email_from = htmlspecialchars($_POST['email']);
    $telephone = (!empty($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "n/a");
    $comments = htmlspecialchars($_POST['text']);
    $subject = (!empty($_POST['subject']) ? htmlspecialchars($_POST['subject']) : "n/a");

    $email_subject = clean_string($subject);
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);
mail($email_from, $email_subject, $email_message, $headers);
alert( "Mail Sent. Thank you " . $name . ", we will contact you shortly. \n "
                    . "You will now be redirected back to home page." );
?>

    <div class="aboutMain aboutEven">


        <div class="formFrame notMoving">

            <h1 class="title textCenter">
                
                <?php ?>
                
            </h1>
        </div>
    </div>
   <!-- <META http-equiv="refresh" content="2;URL=home.php">-->


    <?php
}
}
//die();

?>







