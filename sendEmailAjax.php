<?php
require 'config.php';
$sentTo = $_POST["sendTo"];
$sub = $_POST["subject"];
$body = $_POST["body"];
$img = $_FILES["attachment"]["name"];
$fromId = $_POST["userID"];
move_uploaded_file($_FILES["attachment"]["tmp_name"],"$img");


$query ="Insert into message (FromId,ToId,Subject,Body,Attachment) VALUES ($fromId,$sentTo,'$sub','$body','$img')";

$result=mysqli_query($link,$query);

header("Location: mailList.php");