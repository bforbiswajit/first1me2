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
                $profile['firstName'] = $thisUser->getFirstname();
                $profile['lastName'] = $thisUser->getLastname();
                $profile['os'] = $thisUser->getOs();
                $profile['email'] = $thisUser->getEmail();
                $profile['mobile'] = $thisUser->getMobile();
                $profile['country'] = $thisUser->getCountry();
                $profile['state'] = $thisUser->getState();
                $profile['city'] = $thisUser->getCity();
                return array("status" => "success", "data" => array("Logged in Successfully.", "userId" => $thisUser->getId(), "profile" => $profile));
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
    
    public function UpdatePassword($email, $oldPassword = "", $newPassword = ""){
        $thisUser = $this->doctrine->em->getRepository('Entities\User')->findOneBy(array('email' => $email));
        
        if($thisUser != NULL)
        {
            if($oldPassword != ""){     //Change Password
                if(crypt($oldPassword, strlen($email)) == $thisUser->getPassword())
                {
                    $cryptedPassword = crypt($newPassword, strlen($email));
                    $this->db->update('user',array("password" => $cryptedPassword), array("id" => $thisUser->getId()));
                }
                else
                    return array("status" => "error", "message" => array("Title" => "Sorry, Password Didn't Match.", "Code" => "401"));
            }
            else{                       //Forget Password
                $newPassword = chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122)) . rand(0,9) . rand(0,9) . rand(0,9);
                $cryptedPassword = crypt($newPassword, strlen($email));
                $this->db->update('user',array("password" => $cryptedPassword), array("id" => $thisUser->getId()));
            }
            
            $this->load->library('email');
            $this->email->set_mailtype("html");
            $this->email->from('admin@firstme.com', 'FirstMe Team');
            $this->email->to($email); 
            $this->email->cc('admin@sathiplanners.com'); 
            $this->email->bcc('sunshine.cst.07@gmail.com'); 

            $this->email->subject('First Me Password Update');
            $message = "Hi " . $thisUser->getFirstname() . ",<br/>Your Password has been changed successfully."
                    . "\nYour Current Credentials are as follows<br/>"
                    . "<table><tr style='background-color: blue; color: white;'><td>Email</td><td>Password</td></tr><tr style='background-color: #3399FF;'><td>" . $email . "</td><td>" . $newPassword . "</td></tr></table>";
            $this->email->message($message);	

            $this->email->send();
            
            return array("status" => "success", "data" => array("Password Updated Successfully, and an email has been sent with the new credentials. $newPassword"));
        }
        else
            return array("status" => "error", "message" => array("Title" => "Sorry, User not found.", "Code" => "401"));
    }
}