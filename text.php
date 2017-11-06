<head>
<link href="./css/default.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="refresh" content="3" >
</head>
<body>
<?php
$name = $_REQUEST["name"];
$file = $_REQUEST["txt"] . ".txt";

function startswith($haystack, $needle) {
    return $haystack[0] === $needle[0]
        ? strncmp($haystack, $needle, strlen($needle)) === 0
        : false;
}
if ($file = fopen("$file", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        if(startswith($line,$name) > 0){
        $line = str_replace($name . " : ","",$line);
        echo '<p align="right" style="color:red">' . $line . '</p>';
        }else{
        echo '<p align="left" style="color:blue">' . $line . '</p>';   
        }
    }
    fclose($file);
}
?>
<script>
window.onload=toBottom;

function toBottom()
{
window.scrollTo(0, document.body.scrollHeight);
}
</script>
</body>