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
    
    public function Add(){
        if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\s\\\]{1,30}/", $displayName = isset($_POST['displayName']) ? trim($_POST['displayName']) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Display Name.", "Code" => "400")));
            exit;
        }
        
        if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\s\\\]{1,255}/", $shortDesc = isset($_POST['shortDesc']) ? trim($_POST['shortDesc']) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Short Description.", "Code" => "400")));
            exit;
        }
                
        if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\s\\\]{1,}/", $longDesc = isset($_POST['longDesc']) ? trim($_POST['longDesc']) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Long Description.", "Code" => "400")));
            exit;
        }
        
        if(!isset($_FILES['categoryImg']))
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Category Image Link.", "Code" => "400")));
            exit;
        }
        
        /*$createdOn = addcslashes(mysqli_real_escape_string($mysqli, $_POST['createdOn']), "%_");
        if(($status = addcslashes(mysqli_real_escape_string($mysqli, $_POST['status']), "%_")) == "")
            return json_encode(array("status" => "error", "message" => "Short Description Not Found."));*/
        $status = 1;
        $pseudoSubscriptionCount = 0;
        
        $this->load->model('Category_model');
        echo json_encode($this->Category_model->CreateCategory($displayName, $shortDesc, $longDesc, $status, $pseudoSubscriptionCount));
    }
    
    public function GetAll(){
        if(preg_match("/[0-9]{1,10}/", $userId = isset($_POST['userId']) ? intval(trim($_POST['userId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid User ID.", "Code" => "400")));
            exit;
        }
        
        $this->load->model('Category_model');
        echo json_encode($this->Category_model->ReadAllCategory($userId));
    }
    
    public function Listing(){
        $this->load->model('Category_model');
        echo json_encode($this->Category_model->ListAllCategory());
    }
    
    public function Subscribe(){
        if(preg_match("/[0-9]{1,10}/", $userId = isset($_POST['userId']) ? intval(trim($_POST['userId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid User ID.", "Code" => "400")));
            exit;
        }
        
        /*if(preg_match("/[0-9]{1,5}/", $categoryId = isset($_POST['categoryId']) ? intval(trim($_POST['categoryId'])) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Category ID.", "Code" => "400")));
            exit;
        }*/
        if(isset($_POST['toSubscribe']) && isset($_POST['toUnSubscribe']))
        {
            $this->load->model('Category_model');
            
            if($_POST['toSubscribe'] != "")
                $toSubscribe = array_map('intval', explode(',', $_POST['toSubscribe']));
            else
                $toSubscribe = array();
            
            if($_POST['toUnSubscribe'] != "")
                $toUnSubscribe = array_map('intval', explode(',', $_POST['toUnSubscribe']));
            else
                $toUnSubscribe = array();
            
            if((count($toSubscribe) + count($toUnSubscribe)) > 0)
                echo json_encode($this->Category_model->UpdateSubscription($userId, $toSubscribe, $toUnSubscribe));
            else
                echo json_encode(array("status" => "error", "message" => array("Title" => "Either Subscribe or Unsubscribe ID must be mentioned.", "Code" => "400")));
        }
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Category IDs Not Found", "Code" => "400")));
    }
    
    public function Update(){
        if(isset($_SESSION['adminId']) && $_SESSION['adminId'] != "")
        {
            if(preg_match("/[0-9]{1,10}/", $categoryId = isset($_POST['categoryId']) ? intval(trim($_POST['categoryId'])) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Category ID.", "Code" => "400")));
                exit;
            }
            else    //no further proceedings, if category id is missing
            {
                if(preg_match("/^\w[a-zA-Z0-9\-\_\.\,\s\\\]{1,30}/", $displayName = isset($_POST['displayName']) ? trim($_POST['displayName']) : "") != 0)
                {
                    $updateFields["displayName"] = $displayName;
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
                    $this->load->model('Category_model');
                    echo json_encode($this->Category_model->UpdateCategory($updateFields, $categoryId));
                }
                else
                    echo json_encode(array("status" => "error", "message" => array("Title" => "No fields found to update.", "Code" => "400")));
            }
        }
        else
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Filure.", "Code" => "401")));
        }
    }
    
    public function Delete(){
        if(isset($_SESSION['adminId']) && $_SESSION['adminId'] != "")
        {
            if(preg_match("/[0-9]{1,10}/", $categoryId = isset($_POST['categoryId']) ? intval(trim($_POST['categoryId'])) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Category ID.", "Code" => "400")));exit;
            }
            else
            {
                $this->load->model('Category_model');
                echo json_encode($this->Category_model->DeleteCategory($categoryId));
            }
        }
        else
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Filure.", "Code" => "401")));
        }
    }
}