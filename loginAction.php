<?php
/**
 * Created by PhpStorm.
 * User: AliWehbi
 * Date: 11/13/2018
 * Time: 9:39 AM
 */
session_start();
require 'config.php';

$name = mysqli_real_escape_string($link,$_POST["username"]);
$pass = $_POST["password"];

$query="SELECT * from users where Username='$name' AND Password='$pass'";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result)==0)
    header("Location: index.php");

while ($row=mysqli_fetch_array($result)) {

    $_SESSION["isLoggedIN"] = true;
    $_SESSION["userId"] = $row['Id'];
    $_SESSION["name"] = $row['Username'];
    header("Location: mailList.php");

}