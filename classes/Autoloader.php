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
    public $extensions = array('.php', '.class.php', '.interface.php');
    public $paths = array('/classes/', '/interfaces/');
    

    public function __construct()
    {
        $this->autloader();
    }
    
    public function autloader()
    {
        foreach ($this->paths as $path)
        {
            foreach ($this->extensions as $ext )
            {
                echo $path."file".$ext."<br />";
               if (is_file($path.$this->className.$ext) && is_callable($path.$this->className.$ext) 
                       && !class_exists($this->className))
               {
                   include_once $path.$this->className.$ext;
                   echo $path.$this->className.$ext." :loaded";
               }
            }
        }
        
    }
}
