<?php
session_start();
?>

<?php
$_SESSION['username']="";

$servername = "den1.mysql2.gear.host";
$username = "phpcats";
$password = "Ii0EExX_H~yx";
$dbname = "phpcats";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT password from users WHERE username='". $_POST['username'] ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    
    
        echo "<p>You've successfully logged in."
        . "<a href='cats.php' style='color:blue'>Go to home page</a></p>";
    $username = $_POST['username'];
    $_SESSION['username']=$username;
   
} else {
    echo "Username or password are incorrect"
    . "<a href='cats.php?content=login' style='color:blue'>Try again</a></p>";
}
$conn->close();


//if (!preg_match("/^\(([0-9]{3})\)([0-9]{3})(-)([0-9]{4})$/", $_POST["phone"])) {
//            echo "<p><span style='color:red;'>Invalid phone number</span><br/>"
//            . "A valid phone number must be in the format <span class='black'>(555)555-5555</span><br/>"
//            . "<span class='blue'>Click the Back button, enter a valid phone number and resubmit.<br/><br/>"
//            . "Thank You.</span></p>";
//        } else {
//            echo "Hi <span class='blue'>" . $_POST['fname'] . "</span>.Thank you for completing the survey.<br/>"
//            . "You have been added to the <span class='blue'>" . $_POST['books'] . "</span> mailing list.<br/><br/>"
//            . "<span class='black'>The following information has been saved in our database:</span><br/><br/>"
//            . "<table id='tbl'><tr id='grad'><td>Name</td><td>Email</td><td>Phone</td><td>OS</td></tr>"
//            . "<tr><td>" . $_POST['fname'] . " " . $_POST['lname'] . "</td><td>" . $_POST['email'] . "</td><td>" . $_POST['phone'] . "</td><td>" . $_POST['system'] . "</td></tr></table><br/>";
//        
//            echo "<p id='end'>This is only a sample form. You have not been added to a mailing list in our database.</p>";
//        }