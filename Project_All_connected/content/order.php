<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

 <link rel="stylesheet" type="text/css" href="styles/contact.css"/>
<div class="aboutMain aboutEven">
    <div class="registrationFrame notMoving">

        <h1 class="title textCenter">YOUR ORDER</h1>
       
<?php



$servername = "den1.mysql2.gear.host";
$username = "phpcats";
$password = "Ii0EExX_H~yx";
$dbname = "phpcats";
$GLOBALS['userId']=0;
 
if (isset($_SESSION['username'])) {
    

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = ("SELECT id FROM users WHERE username='".$_SESSION['username']."';"); 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
   
    while($row = $result->fetch_assoc()) {
      $GLOBALS['userId']= $row["id"];
    }
   
}


$sql = ("SELECT name, availabilityDate, cost FROM cats JOIN"
            . " orders ON cats.orderId=orders.id WHERE userId='".$GLOBALS['userId']."';"); 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='width:90%'><tr><th>Name</th><th>Availability</th><th>Cost</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["availabilityDate"]."</td><td>".$row["cost"]."</td></tr>";
    }
    echo "</table>";
} else {
     ?><script>alert("Your order is empty!");
        </script> //<?php
}
$conn->close();
     

 }
?> 
    
    </div>
</div>