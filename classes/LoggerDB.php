<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ConnectorCluster\classes;

/**
 * Description of LoggerDB
 *
 * @author bartek
 */
class LoggerDB extends ConnectorDB
{
    private $login;
    private $passwd;


    public function __construct($login, $passwd, $iniFileName)
    {
        parent::__construct($iniFileName);
        $this->login = $login;
        $this->passwd = $passwd;
    }
    
    public function prepareStmt()
    {
        
    }
}
