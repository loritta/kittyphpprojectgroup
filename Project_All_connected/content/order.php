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
       

    
    </div>
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
    echo "<table id='myTab' style='width:70%'><tr style='font-size:1.5em;font-family: Comic Sans MS, cursive, sans-serif;'><th>Name</th><th>Availability</th><th>Cost</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr ><td>".$row["name"]."</td><td>".$row["availabilityDate"]."</td><td>".$row["cost"]."</td></tr>";
    }
    echo "</table>";
   
    
} else {
     ?><script>alert("Your order is empty!");
        </script> <?php
}
$conn->close();
     
 }
?> 
        <p><b>TOTAL:</b> <span id="total"></span>$</p>
</div>
 <script>
     var total=0;
 var table = document.getElementById('myTab');
    for (var r = 1, n = table.rows.length; r < n; r++) {
        for (var c = 2, m = table.rows[r].cells.length; c < 3; c++) {
            total=total+parseFloat(table.rows[r].cells[c].innerHTML);
        }
    }

document.getElementById('total').innerHTML=total+"";
 </script>