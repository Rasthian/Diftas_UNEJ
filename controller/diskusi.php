<?php
require_once 'config/conn.php';
require_once 'function.php';
require_once 'model/DataModels.php';

class DiskusiController
{
    public function index()
    {
        session_start();
        DataModel::cookieData();
        DataModel::sessionHomepage();
        $username = $_SESSION['session_nim'];
        include ('view/home/homepage.php');
    }
}
