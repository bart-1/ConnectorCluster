<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ConnectorCluster\Classes;

/**
 * Description of Autoloader
 *
 * @author bartek
 */
class Autoloader
{
    public $className;
    
    public function __construct($className)
    {
         spl_autoload_register(function ($className)
        {
            include str_replace('\\', '/', __NAMESPACE__.$className . '.php');
        });
    }
}
