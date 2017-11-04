<head>
<meta http-equiv="refresh" content="3" >
</head>
<?php
$name = $_REQUEST["name"];
function startswith($haystack, $needle) {
    return $haystack[0] === $needle[0]
        ? strncmp($haystack, $needle, strlen($needle)) === 0
        : false;
}
if ($file = fopen("text.txt", "r")) {
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