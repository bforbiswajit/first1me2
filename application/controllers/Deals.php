<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */
session_start();
defined('BASEPATH') OR exit('Forbidden!');

class Deals extends CI_Controller
{
    public function index()
    {
        echo "Default Controller Action For Deals.";
    }
    
    public function Add(){
        /*if(isset($_SESSION['vendorId']) && ($vendorId = $_SESSION['vendorId']) != "")
        {*/
            if(preg_match("/^\w[a-zA-A0-9\.\,\s\/\\\]{1,30}/", $name = isset($_POST['name']) ? trim($_POST['name']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Deal Name. {$_POST['name']}.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[0-9]{1,5}/", $categoryId = isset($_POST['categoryId']) ? intval(trim($_POST['categoryId'])) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Category ID.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[0-9]{1,10}/", $vendorId = isset($_POST['vendorId']) ? intval(trim($_POST['vendorId'])) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Vendor ID.", "Code" => "400")));
                exit;
            }

            if(!isset($_FILES['dealImg']))
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Thumbnail Image Link.", "Code" => "400")));
                exit;
            }

            /*if(preg_match("/[0-9a-zA-Z\.\_\/\\\]{1,160}/", $bigImg = isset($_POST['bigImg']) ? trim($_POST['bigImg']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Large Image Link.", "Code" => "400")));
                exit;
            }*/

            if(preg_match("/^\w[a-zA-A0-9\.\,\s\/\\\]{1,30}/", $region = isset($_POST['region']) ? trim($_POST['region']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Region.", "Code" => "400")));
                exit;
            }

            if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\%\@\$\s\\\]{1,255}/", $shortDesc = isset($_POST['shortDesc']) ? trim($_POST['shortDesc']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Short Description.", "Code" => "400")));
                exit;
            }

            if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\%\@\$\s\\\]{1,}/", $longDesc = isset($_POST['longDesc']) ? trim($_POST['longDesc']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Long Description.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z0-9\-\_\.\,\s\\\]{0,50}/", $expiresOn = isset($_POST['expiresOn']) ? trim($_POST['expiresOn']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Expiry Details (YYYY-MM-DD hh:mm:ss).", "Code" => "400")));
                exit;
            }
            
            $likes = 0;
            $views = 0;
            $pseudoViews = 0;
            $status = 1;

            $this->load->model('Deals_model');
            echo json_encode($this->Deals_model->CreateDeals($name, $categoryId, $vendorId, $region, $shortDesc, $longDesc, $likes, $views, $pseudoViews, $expiresOn, $status));
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
    
    public function GetMyDeals(){
        if(preg_match("/[0-9]{1,10}/", $userId = isset($_POST['userId']) ? intval(trim($_POST['userId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid User ID.", "Code" => "400")));
            exit;
        }
        $this->load->model('Deals_model');
        echo json_encode($this->Deals_model->ReadUserDeals($userId));
    }
    
    public function MarkAsSeen(){
        if(preg_match("/[0-9]{1,10}/", $userId = isset($_POST['userId']) ? intval(trim($_POST['userId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid User ID.", "Code" => "400")));
            exit;
        }
        
        if(preg_match("/[0-9]{1,10}/", $dealId = isset($_POST['dealId']) ? intval(trim($_POST['dealId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Deal ID.", "Code" => "400")));
            exit;
        }
        
        $this->load->model('Deals_model');
        echo json_encode($this->Deals_model->UpdateSeen($userId, $dealId));
    }
    
    public function AddToFavourite(){
        if(preg_match("/[0-9]{1,10}/", $userId = isset($_POST['userId']) ? intval(trim($_POST['userId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid User ID.", "Code" => "400")));
            exit;
        }
        
        if(preg_match("/[0-9]{1,10}/", $dealId = isset($_POST['dealId']) ? intval(trim($_POST['dealId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Deal ID.", "Code" => "400")));
            exit;
        }
        
        if(preg_match("/[0-9]{1}/", $favourite = isset($_POST['favourite']) ? intval(trim($_POST['favourite'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid favourte instruciton.", "Code" => "400")));
            exit;
        }
        
        $this->load->model('Deals_model');
        echo json_encode($this->Deals_model->UpdateFavourite($userId, $dealId, $favourite));
    }
}