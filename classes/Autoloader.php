<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ConnectorCluster\classes;

/**
 * Description of Autoloader
 *
 * @author bartek
 */
class Autoloader
{
    public $className;
   // public $extensions = array('.php', '.class.php', '.interface.php');
    
    public $paths = array('interfaces/', 'classes/');
    

    public function __construct()
    {
        spl_autoload_register(null, false);
        $this->autloader();
    }
    
    public function autloader()
    {
        foreach ($this->paths as $path)
        {
            $filesNames = scandir($path);
            foreach ($filesNames as $fileName )
            {
                echo $path.$fileName."<br />";
               if (is_file($path.$fileName) && is_readable($path.$fileName) 
                       && !class_exists(rtrim($fileName, '.php')))
               {
                   include_once $path.$fileName;
                   echo $path.$fileName." :loaded"."<br />";
                  // echo rtrim($fileName, '.php')))."<br />";
               }
            }
        }
        
    }
}
