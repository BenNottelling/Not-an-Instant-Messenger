<title>Not an Instant Messenger</title>
<head>
<!-- <link href="./css/default.css" rel="stylesheet" type="text/css" media="all" /> -->
<link href="./css/default.css" rel="stylesheet" type="text/css" media="all" />
<div class="content">
        <form action="index.php" method="post">
            <?php
            if(!empty($_REQUEST["txt"])){
                $txt = $_REQUEST["txt"];
                echo "Chat Room: <input name='txt' type='text' size='25' value=\"$txt\"/>";
            }else{
                echo "Chat Room: <input name='txt' type='text' size='25' value='default'>"; 
            }
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
if(!empty($_POST["txt"])) {
	$my_file = $_POST["txt"] . ".txt";
	} else {
	$my_file = 'default.txt';
	}

if(!empty($_POST["name"])&&!empty($_POST["msg"])) {
$name = $_POST["name"];
$message = $_POST["msg"];

setcookie("name", $name, time() + (86400 * 30 * 12));

$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
fwrite($handle, "\n" . $name . " : " . $message);
fclose($handle);
}
if(!empty($_POST["name"])){
	$file = "text.php?name=" . $name . "&txt=" . $_POST["txt"];
} else {
	$file = "text.php?name=" . $name . "&txt=" . $_POST["txt"];
}
$path = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . "/";
echo "<iframe src='" . $path . "$file" . "'width=100% height=100%></iframe>";
?>
</body>