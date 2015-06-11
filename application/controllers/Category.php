<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class Category extends CI_Controller
{
    public function index()
    {
        echo "Default Controller Action For Category.";
    }
    
    public function Add()
    {
        $displayName = addcslashes(mysqli_real_escape_string($mysqli, $_POST['displayName']), "%_");
        $shortDesc = addcslashes(mysqli_real_escape_string($mysqli, $_POST['shortDesc']), "%_");
        $longDesc = addcslashes(mysqli_real_escape_string($mysqli, $_POST['longDesc']), "%_");
        //$createdOn = addcslashes(mysqli_real_escape_string($mysqli, $_POST['createdOn']), "%_");
        $status = addcslashes(mysqli_real_escape_string($mysqli, $_POST['status']), "%_");
        $psudoSubscriptionCount = 0;
        
        $this->load->model('CategoryModel');
        $this->CategoryModel->createCategory();
    }
}