<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$conn = getConnection();


// insert into table "orders" -> userId, catId
// first get userId using the passed userName value (which should be unique)
$userName = $_POST['userName'];
$catId = $_POST['catId'];
$userId;
$errors = true;

if ($conn != null && isset($userName) && $userName != null) {

    $sql = "SELECT id FROM users WHERE name= '" . $userName . "';";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // first get the user id
        while ($row = $result->fetch_assoc()) {
            $userId = $row['id'];
        }

        // insert the values to the table (using prepared statement)
        $statement = $conn->prepare("INSERT INTO orders (userId, catId) VALUES (?,?);");
        $statement->bind_param("ii", $userId, $catId);
        $statement->execute();

    }
}



function getConnection() {
    $servername = "den1.mysql2.gear.host";
    $username = "phpcats";
    $password = "Ii0EExX_H~yx";
    $dbname = "phpcats";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
