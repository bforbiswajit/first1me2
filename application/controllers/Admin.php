<?php
session_start();
/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class Admin extends CI_Controller
{
    public function index()
    {
        echo "Default Controller Action For Admin.";
    }
    
    public function Login(){
        if(isset($_SESSION['adminId']) && $_SESSION['adminId'] != ""){
            echo json_encode(array("status" => "success", "data" => array("Already Logged in.")));
            return;
        }
        
        if(preg_match("/^[a-z][a-z0-9\.\_]*@[a-z][a-z0-9\.]+[a-z]$/", $email = isset($_POST['email']) ? trim($_POST['email']) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Email Address.", "Code" => "400")));
            exit;
        }
        
        if(preg_match("/[a-zA-Z0-9\'\"\s\.\,\-\+\/\\\]{4,250}/", $password = isset($_POST['password']) ? trim($_POST['password']) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Password.", "Code" => "400")));
            exit;
        }
        
        $this->load->model('Admin_model');
        echo json_encode($this->Admin_model->CheckLogin($email, $password));
    }
    
    public function Logout(){
        session_destroy();
        echo json_encode(array("status" => "success", "data" => array("Logged Out Successfully.")));
    }
    
    public function CheckSession(){
        print_r($_SESSION);
    }
}