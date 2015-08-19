<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

class User_model extends CI_Model
{
    public $em;                         //doctrine entity manager

    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }
    
    public function CreateUser($token, $os, $firstName, $lastName, $email, $mobile, $country, $state, $city, $password, $fbStatus){
        $thisUser = $this->doctrine->em->getRepository('Entities\User')->findBy(array('email' => $email));
        if(is_array($thisUser) && !empty($thisUser))
        {
            return array("status" => "error", "message" => array("Title" => "Email already exists.", "Code" => "400"));
        }
        
        $user = new Entities\User;
        
        $user->setToken($token);
        $user->setOs($os);
        $user->setFirstname($firstName);
        $user->setLastname($lastName);
        $user->setEmail($email);
        $user->setMobile($mobile);
        $user->setCountry($country);
        $user->setState($state);
        $user->setCity($city);
        $user->setPassword(crypt($password, strlen($email)));
        $user->setFbstatus($fbStatus);
        $user->setRegisteredon(new \DateTime("now"));
        //var_dump($user);exit;
        try
        {
            $this->em->persist($user);
            $this->em->flush();
            
            $thisUser = $user->getId();
            /*$thisUser = $this->doctrine->em->getRepository('Entities\Users')->findOneBy(
                    array('email' => $email)
                );*/
            
            //return array("status" => "success", "data" => array("User Added Successfully.", "userId" => $thisUser->getId()));
            return array("status" => "success", "data" => array("User Added Successfully.", "userId" => $thisUser));
        }
        catch(Exception $exc)
        {
            return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
        }
    }
    
    public function UpdateFacebookStatus($userId)
    {
        $user = new Entities\User;
        try
        {
            $this->db->update('user', array("fbStatus" => 1), array("id" => $userId));
            return array("status" => "success", "data" => array("Facebook Status Updated Successfully."));
        }
        catch(Exception $exc)
        {
            return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
        }
    }
    
    public function Login($email, $password){
        $thisUser = $this->doctrine->em->getRepository('Entities\User')->findOneBy(array('email' => $email));
        
        if($thisUser != NULL)
        {
            if(crypt($password, strlen($email)) == $thisUser->getPassword())
            {
                return array("status" => "success", "data" => array("Logged in Successfully.", "userId" => $thisUser->getId()));
            }
            else
                return array("status" => "error", "message" => array("Title" => "Email / Password mismatch.", "Code" => "401"));
        }
        else
            return array("status" => "error", "message" => array("Title" => "User not found.", "Code" => "401"));
        
    }
    
    public function UpdateCity($userId, $fieldsToUpdate){
        $deal = new Entities\User;
        try
        {
            $this->db->update('user', $fieldsToUpdate, array("id" => $userId));
            return array("status" => "success", "data" => array("City Updated Successfully."));
        }
        catch(Exception $exc)
        {
            return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
        }
    }
}