<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ConnectorCluster\classes;

/**
 * Description of RegisterDB
 *
 * @author bartek
 */
class RegisterDB extends ConnectorDB
{
    private $handlerDB;
    private $iniFileName;
    private $iniParserData = array();
    
    public function __construct($param)
    {
        
    }
}
