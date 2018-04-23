<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$servername = "den1.mysql2.gear.host";
$username1 = "phpcats";
$password1 = "Ii0EExX_H~yx";
$dbname = "phpcats";




if($_POST['password']!=$_POST['confPassword']){
    
    echo "Confirmation password doesn't match password!"
    . "<a href='cats.php?content=signup' style='color:blue'>Try again</a></p>";
}
else{
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username1, $password1);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO users 
    VALUES (:id, :name, :username, :password,  :email, :time)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':time', $time);

    // insert a row
    $id=0;
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password=$_POST['password'];
    $email = $_POST['email'];
    
    $stmt->execute();


    echo "You've successfully registered";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}