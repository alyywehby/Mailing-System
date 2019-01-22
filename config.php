<?php

define("SERVER_NAME", "localhost");
define("DB_NAME", "LIUMail");
define("USERNAME", "root");
define("PASSWORD", "");

$link = mysqli_connect(SERVER_NAME,USERNAME,PASSWORD,DB_NAME);

if(!$link){
    echo"Unable to connect: " . mysqli_error($link);
}

?>