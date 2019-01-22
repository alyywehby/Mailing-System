<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script>
        $(function () {
            $("#sendEmail").on("submit",function (e) {
                e.preventDefault(); //stop post back
                $.ajax({
                    url:"sendEmailAjax.php",
                    type:"Post",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function (r) {
                        $("#list").prepend(r);
                        //reset the form
                    }
                });
            });
        });
    </script>
</head>
<body>

<?php
require_once 'loginvalidation.php';
require_once 'config.php';
$query = "SELECT * , message.Id as Mid FROM message INNER JOIN users on message.FromId = users.Id WHERE message.ToId =" . $_SESSION["userId"];
$result = mysqli_query($link, $query);
if(!$result)
echo mysqli_error($link);
else{
    echo "<div id='list' style='border: black 2px solid'>";
    echo "<h1>My INBOX</h1>";
    while ($row = mysqli_fetch_array($result)){
        $messageID = $row["Mid"];
       echo "<div>";
       echo "From: " . $row["Username"] . " Subject: " . $row["Subject"] . "<a href='readMail.php?messageID=$messageID'>READ</a>";
       echo "</div>";
       echo "<hr>";
    }
    echo "</div>";
}
?>

<div>
    <h3>Compose</h3>
<form id="sendEmail" method="post" action="sendEmailAjax.php" enctype="multipart/form-data">
    TO: <select name="sendTo">
        <?php
        $queryC = "SELECT * FROM users";
        $resultC = mysqli_query($link,$queryC);
        while($rowC = mysqli_fetch_array($resultC))
        {
            $id = $rowC["Id"];$name = $rowC["Username"];
            echo "<option value='$id'>$name</option>";

        }
        ?>
    </select>
    <br>
    Subject: <input type="text" name="subject">
    <br>
    <textarea cols="30" rows="30" name="body"></textarea>
    <br>
    <input type="file" name="attachment" >
    <br>
    <input type="text" name="userID" value="<?php echo $_SESSION["userId"]?>" hidden>
    <input type="submit" value="Send">
</form>

</div>

</body>
</html>