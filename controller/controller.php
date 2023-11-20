<?php 

require_once('config/conn.php');
require_once('Model/DataModels.php');

class DataController {
    public function index()
    {
        include('view/home/homepage.php');
    }


}