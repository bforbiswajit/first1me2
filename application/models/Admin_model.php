<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

class Admin_model extends CI_Model
{
    public $em;                         //doctrine entity manager

    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }
    
    public function CheckLogin($email, $password){
        if(($user = $this->em->getRepository('Entities\Admin')->findOneBy(array("email" => $email))) == NULL)
            return array("status" => "error", "message" => array("Title" => "Invalid Email.", "Code" => "503"));

        if(md5($password) != $user->getPassword())
            return array("status" => "error", "message" => array("Title" => "Email/Password mismatch. Try again", "Code" => "401"));
        else{
            $_SESSION['adminId'] = $user->getId();
            return array("status" => "success", "data" => array("Logged in Successfully."));
        }
    }
}