<?php
function view($page) {
    include('view/'.$page.'.php');
}
function titleheader($string, $type, $classValues='') {
    echo 
    "<$type" . " class=\"$classValues\"" . ">" . 
        $string . 
    "</$type>";
}


?>