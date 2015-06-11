<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

class CategoryModel extends CI_Model
{
    public $em;                         //doctrine entity manager

    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }
    
    public function createCategory()
    {
        
    }
}