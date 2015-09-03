<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

class Category_model extends CI_Model
{
    public $em;                         //doctrine entity manager

    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }
    
    //-----Helper functions
    private function getSubscribedCategoryIds($userId)
    {
        $subscribedCategories =  $this->doctrine->em->getRepository('Entities\Subscriptions')->findBy(array('userid' => $userId));
        if(!is_array($subscribedCategories) || empty($subscribedCategories))
            return array();
        $categoryIds = array();
        for($i = 0; $i < count($subscribedCategories); $i++)
        {
            $categoryIds[$i] = $subscribedCategories[$i]->getCategoryid()->getId();
        }
        return $categoryIds;
    }
    //---------------------
    
    public function CreateCategory($displayName, $shortDesc, $longDesc, $status, $pseudoSubscriptionCount){
        $category = new Entities\Category;
        
        $category->setDisplayname($displayName);
        $category->setShortdesc($shortDesc);
        $category->setLongdesc($longDesc);
        $category->setCreatedon(new \DateTime("now"));
        
        $category->setStatus($status);
        $category->setPseudosubscriptioncount($pseudoSubscriptionCount);
        
        try
        {
            $this->em->persist($category);
            $this->em->flush();
            return array("status" => "success", "data" => array("Category Added Successfully."));
        }
        catch(Exception $exc)
        {
            return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
        }
    }
    
    
    public function ReadAllCategory($userId){
        if(($user = $this->doctrine->em->getRepository('Entities\User')->find($userId)) == NULL)
            return array("status" => "error", "message" => array("Title" => "Invalid User ID.", "Code" => "503"));
        
        $allCategory = $this->doctrine->em->getRepository('Entities\Category')->findAll();
        
        for($i = 0; $i < count($allCategory); $i++)
        {
            $data[$i] = new stdClass();
            $data[$i]->id = $allCategory[$i]->getId();
            $data[$i]->displayName = $allCategory[$i]->getDisplayname();
            $data[$i]->shortDescription = $allCategory[$i]->getShortDesc();
            $data[$i]->longDesc = $allCategory[$i]->getLongdesc();
            $data[$i]->createdOn = $allCategory[$i]->getCreatedon();
            $data[$i]->status = $allCategory[$i]->getStatus();
            $data[$i]->pseudoSubscriptionCount = $allCategory[$i]->getPseudosubscriptioncount();
            
            $data[$i]->subscribed = in_array($allCategory[$i]->getId(), self::getSubscribedCategoryIds($userId));
            
            $allDeals = $this->doctrine->em->getRepository('Entities\Deals')->findBy(array("categoryid" => $allCategory[$i]->getId()));
            $data[$i]->dealCount = count($allDeals);
            $data[$i]->iconUrl = "/public/images/category/". $allCategory[$i]->getId() . ".png";
        }
        
        if(isset($data) && count($data) > 0)
            return array("status" => "success", "data" => array($data));
        else
            return array("status" => "error", "message" => array("Title" => "No Data Found.", "Code" => "200"));
    }
    
    public function ListAllCategory(){
        $allCategory = $this->doctrine->em->getRepository('Entities\Category')->findAll();
        if($allCategory != NULL){
            for($i = 0; $i < count($allCategory); $i++)
            {
                $categoryList[$i] = new stdClass();
                $categoryList[$i]->id = $allCategory[$i]->getId();
                $categoryList[$i]->name = $allCategory[$i]->getDisplayname();
            }
            return array("status" => "success", "data" => $categoryList);
        }
        else
            return array("status" => "error", "message" => array("Title" => "No Category Found.", "Code" => "200"));
    }
    
    public function UpdateSubscription($userId,  $toSubscribe, $toUnSubscribe){
        if(($user = $this->doctrine->em->getRepository('Entities\User')->find($userId)) == NULL)
            return array("status" => "error", "message" => array("Title" => "Invalid User ID.", "Code" => "503"));
        
        $categoryIds = self::getSubscribedCategoryIds($userId);

        foreach($toSubscribe as $category)
        {
            if($categoryIds != NULL && in_array($category, $categoryIds))
                continue;
            else
            {
                $subscription = new Entities\Subscriptions;
                
                try
                {
                    $subscription->setUserid($user);
                    $subscription->setCategoryid($this->doctrine->em->getRepository('Entities\Category')->find($category));
                    $subscription->setSubscribedon(new \DateTime("now"));
                    
                    $this->em->persist($subscription);
                    $this->em->flush();
                }
                catch(Exception $exc)
                {
                    return array("status" => "error", "message" => array("Title" => "Error Occured While Subscribing", "Code" => "401"));
                }
            }
        }
        
        $categoryIds = self::getSubscribedCategoryIds($userId);
        if(!empty($categoryIds))  //no deletion if subscription array is empty
        {
            foreach($toUnSubscribe as $category)
            {
                if(in_array($category, $categoryIds))
                {
                    try
                    {
                        $this->doctrine->em->remove($this->doctrine->em->getRepository('Entities\Subscriptions')
                                ->findOneBy(array("userid" => $userId, "categoryid" => $category)));
                        $this->doctrine->em->flush();
                    }
                    catch(Exception $exc)
                    {
                        return array("status" => "error", "message" => array("Title" => "Error Occured While Unsubscribing", "Code" => "401"));
                    }
                }
            }
        }
        return array("status" => "success", "data" => array("Category Subscribed Successfully."));
    }
    
    public function UpdateCategory($updateFields, $categoryId){
        $user = new Entities\Category;
        try
        {
            $this->db->update('category', $updateFields, array("id" => $categoryId));
            return array("status" => "success", "data" => array("Category Details Updated Successfully."));
        }
        catch(Exception $exc)
        {
            return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
        }
    }
    
    public function DeleteCategory($categoryId){
        try
        {
            $category = $this->doctrine->em->getRepository('Entities\Category')->find($categoryId);
            $category->delete();
            return array("status" => "success", "data" => array("Category Deleted Successfully."));
        }
        catch(Exception $exc)
        {
            return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
        }
    }
}