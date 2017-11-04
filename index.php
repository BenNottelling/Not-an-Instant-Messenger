<title>Not an Instant Messenger</title>
<head>
<div class="content">
        <form action="im.php" method="post">
            <?php
            if(!empty($_POST["name"])){
                $name = $_POST["name"];
                echo "Name: <input name='name' type='text' size='25' value=\"$name\"/>";
            }else{
                if(!isset($_COOKIE["name"])) {
                    echo 'Name: <input name="name" type="text" size="25" value="dumbass"/>';
                } else {
                    $name = $_COOKIE["name"];
                    echo "Name: <input name='name' type='text' size='25' value=\"$name\"/>";
                }
            }
            ?>
            Message: <input name="msg" type="text" size="25" autocomplete="off"/>
            <input name="mySubmit" type="submit" value="submit" />
        </form>
    </div>
</head>

<body>
<?php
if(!empty($_POST["name"])&&!empty($_POST["msg"])){
$name = $_POST["name"];
$message = $_POST["msg"];
setcookie("name", $name, time() + (86400 * 30 * 12));
$my_file = 'text.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
fwrite($handle, "\n" . $name . " : " . $message);
fclose($handle);
}
if(!empty($_POST["name"])){$file = "text.php?name=" . $name;}else{$file = "text.php";}
echo "<iframe src=\"$file\" width=100% height=100%></iframe>";
?>
</body>