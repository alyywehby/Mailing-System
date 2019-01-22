<?php
require 'config.php';
$sentTo = $_POST["sendTo"];
$sub = $_POST["subject"];
$body = $_POST["body"];
$img = $_FILES["attachment"]["name"];
$fromId = $_POST["userID"];
move_uploaded_file($_FILES["attachment"]["tmp_name"],"$img");


$query ="Insert into message (FromId,ToId,Subject,Body,Attachment) VALUES ($fromId,$sentTo,'$sub','$body','$img')";
//$query1 = "SELECT * , message.Id as Mid FROM message INNER JOIN users on message.FromId = users.Id WHERE message.ToId = $fromId";
$result=mysqli_query($link,$query);
//$result1=mysqli_query($link,$query1);
//if(!$result1)
//    echo mysqli_error($link);
//else{
//    echo "<div id='list' style='border: black 2px solid'>";
//    echo "<h1>My INBOX</h1>";
//    while ($row = mysqli_fetch_array($result1)){
//        $messageID = $row["Mid"];
//        echo "<div>";
//        echo "From: " . $row["Username"] . " Subject: " . $row["Subject"] . "<a href='readMail.php?messageID=$messageID'>READ</a>";
//        echo "</div>";
//        echo "<hr>";
//    }
//    echo "</div>";
//}
header("Location: mailList.php");