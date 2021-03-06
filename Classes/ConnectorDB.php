<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ConnectorCluster;

/**
 * Description of abstractConnector
 *
 * @author bart-1
 */
abstract class ConnectorDB implements ConnectorDBInterface
{
   
    public $handlerDB;
    public $iniFileName;
    public $iniParserData = array();


    public function __construct($iniFileName)
    {
        $this->iniFileName = $iniFileName; 
    }
    
    public function iniFileLoader()
    {
        $this->iniParserData = parse_ini_file("ini/$this->iniFileName");
    }
    
    public abstract function prepareStmt();
   
    public function connectPDO()
    {
        $this->handlerDB = new PDO("$this->iniParserData['engineDB']:host=$this->iniParserData['hostDB']; dbname=$this->iniParserData['nameDB]",
        $this->iniParserData['loginDB'], $this->iniParserData['passwdDB'], $this->iniParserData['optionsDB']);
    }
}
