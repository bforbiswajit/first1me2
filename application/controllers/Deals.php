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
        /*if(isset($_SESSION['adminId']) && ($vendorId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/^\w[a-zA-Z0-9\.\,\s\/\\\]{1,30}/", $name = isset($_POST['name']) ? trim($_POST['name']) : "") == 0)
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
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Deal Image Link.", "Code" => "400")));
                exit;
            }

            /*if(preg_match("/[a-zA-Z]{1,20}/", $country = isset($_POST['country']) ? trim($_POST['country']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Country Name.", "Code" => "400")));
                exit;
            }

            if(preg_match("/[a-zA-Z]{1,20}/", $state = isset($_POST['state']) ? trim($_POST['state']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid State Name.", "Code" => "400")));
                exit;
            }*/

            if(preg_match("/[a-zA-Z\,\s\S\-\.]{1,80}/", $region = isset($_POST['region']) ? trim($_POST['region']) : "") == 0)
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
    
    public function Push(){
        if(preg_match("/^[a-z][a-z0-9\.\_]*@[a-z][a-z0-9\.]+[a-z]$/", $email = isset($_POST['email']) ? trim($_POST['email']) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Email Address.", "Code" => "400")));
            exit;
        }
        
        $this->load->model('Deals_model');
        echo json_encode($this->Deals_model->DemoGCM($email));
    }
    
    public function Edit(){
        if(preg_match("/[0-9]{1,10}/", $dealId = isset($_POST['dealId']) ? intval(trim($_POST['dealId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Deal ID.", "Code" => "400")));
            exit;
        }
        else    //no further proceedings, if category id is missing
        {
            if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\s\\\]{1,30}/", $name = isset($_POST['name']) ? trim($_POST['name']) : "") != 0)
            {
                $updateFields["name"] = $name;
            }

            if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\%\@\$\s\\\]{1,255}/", $shortDesc = isset($_POST['shortDesc']) ? trim($_POST['shortDesc']) : "") != 0)
            {
                $updateFields["shortDesc"] = $shortDesc;
            }

            if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\%\@\$\s\\\]{1,}/", $longDesc = isset($_POST['longDesc']) ? trim($_POST['longDesc']) : "") != 0)
            {
                $updateFields["longDesc"] = $longDesc;
            }

            if(is_array($updateFields) && count($updateFields) > 0)
            {
                $this->load->model('Deals_model');
                echo json_encode($this->Deals_model->UpdateDeal($updateFields, $dealId));
            }
            else
                echo json_encode(array("status" => "error", "message" => array("Title" => "No fields found to update.", "Code" => "400")));
        }
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
    
    public function GetThis(){
        /*if(isset($_SESSION['adminId']) && ($vendorId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/[0-9]{1,10}/", $dealId = isset($_POST['dealId']) ? intval(trim($_POST['dealId'])) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Deal ID.", "Code" => "400")));
                exit;
            }
            $this->load->model('Deals_model');
            echo json_encode($this->Deals_model->ReadSingleDeals($dealId));
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
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
    
    public function DeleteThis(){
        if(preg_match("/[0-9]{1,10}/", $dealId = isset($_POST['dealId']) ? intval(trim($_POST['dealId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Deal ID.", "Code" => "400")));
            exit;
        }
        
        $this->load->model('Deals_model');
        echo json_encode($this->Deals_model->Delete($dealId));
    }
}