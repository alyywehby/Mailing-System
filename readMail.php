<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
require_once 'loginvalidation.php';
require_once 'config.php';
$MessageID = $_GET["messageID"];
$query = "SELECT * FROM message inner join users on message.FromId=users.Id WHERE message.Id= $MessageID";
$result = mysqli_query($link, $query);
if(!$result)
echo mysqli_error($link);
else{
    echo "<br>";
    echo "<a href='mailList.php'>Inbox</a>";
while ($row = mysqli_fetch_array($result)){
    echo "<br>";
    echo "<h1>" . $row["Subject"] . "</h1>";
    echo "<img style='border-radius: 50%' width='50px' src='".$row["Profile"]."'>";
    echo $row["Username"];
    echo "<br>";
    echo $row["EmailAddress"];
    echo "<br>";
    echo $row["Body"];
    echo "<br>";
    echo "<img src='".$row["Attachment"]."'>";
}
}
?>
</body>
</html>