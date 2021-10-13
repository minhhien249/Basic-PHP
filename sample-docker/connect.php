<?php
function connect()
{
    $servername = "db";
    $username = "sampleUser";
    $password = "password";
    $dbname = "sampleDB";

    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $con;
}
