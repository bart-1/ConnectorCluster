<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ConnectorCluster\classes;
use ConnectorCluster\interfaces\ConnectorDBInterface;

/**
 * Description of abstractConnector
 *
 * @author bart-1
 */
abstract class ConnectorDB implements ConnectorDBInterface
{
   
    protected $dbh;
    public $iniFileName;
    protected $iniParserData = array();


    public function __construct($iniFileName)
    {
        $this->iniFileName = $iniFileName; 
    }
    
    public function iniFileLoader()
    {
        $this->iniParserData = parse_ini_file("ini/$this->iniFileName");
    }
    
    public abstract function prepareStmt();
   
    protected function connectPDO()
    {
        try 
        {
            $this->dbh = new PDO("$this->iniParserData['engineDB']:host=$this->iniParserData['hostDB']; dbname=$this->iniParserData['nameDB]",
            $this->iniParserData['loginDB'], $this->iniParserData['passwdDB'], $this->iniParserData['optionsDB']);
            $this->dbh->beginTransaction();
            
            
        } catch (PDOException $ex) {
             $this->dbh->rollBack(); 
             echo "błąd: ".$ex->getMessage();
        }
    }
    protected function endConnection()
    {
        $this->stmt->closeCursor();
        $this->dbh->commit();
        $this->dbh = null;
    }
}
