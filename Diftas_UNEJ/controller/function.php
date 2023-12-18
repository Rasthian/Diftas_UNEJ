<?php
function view($page, $data=[]) {
    include 'view/'.$page.'.php';
}

function session_diskusi(){
    session_start();
    auth::sessionProgram();
    auth::cookieData();
}

?>