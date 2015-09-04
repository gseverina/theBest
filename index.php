<?php
error_reporting(E_ERROR);
error_reporting(E_ALL);

$layout  = file_get_contents("theBest.html");
$content = file_get_contents("main.html");
$main_list = file_get_contents("main-list.html");
$text_area = file_get_contents("text_area.html");
$go_home = file_get_contents("go_home.html");

//die(print_r($_REQUEST));

if(isset($_REQUEST["sel"])) {

    $content = str_replace("{main-text}", "OK... but first let me know your best " . $_REQUEST['sel'], $content);
    $content = str_replace("{main-list}", $text_area, $content);

} elseif(isset($_REQUEST["text"])) {

    $content = str_replace("{main-text}", "The best is " . $_REQUEST["text"], $content);
    $content = str_replace("{main-list}", $go_home, $content);

} else {

    $content = str_replace("{main-text}", "What is the best ?", $content);
    $content = str_replace("{main-list}", $main_list, $content);

}

$layout = str_replace("{content}", $content, $layout);

echo $layout;

?>
