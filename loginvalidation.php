<?php
/**
 * Created by PhpStorm.
 * User: AliWehbi
 * Date: 11/13/2018
 * Time: 9:55 AM
 */
session_start();
if(isset($_SESSION["isLoggedIN"]) && $_SESSION["isLoggedIN"]){
    echo "<span>Welcome LIU_".$_SESSION["name"]."</span>";
    echo "<a href='logout.php'>Logout</a>";
}
else{
    header("Location: index.php");
}