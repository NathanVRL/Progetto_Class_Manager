<?php
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri = ltrim($uri, "/");
$uri = rtrim($uri, "/");
$uri = explode("/", $uri);
$second = strtolower($uri[1]);
switch ($second){
    case "classi":
        echo "funzionaaaaaaa nella classe classiaosaodoc yeahhhh budyy ";
        break;
    case "studenti":
        echo "funzionaaaaaaa nella classe studenti sus";
        break;
}





?>