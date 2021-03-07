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
    use ConnectorCluster\classes\CrypterTrait;
    private $login;
    private $passwd;
    protected $table;
    private $stmt;
    private $passwdMatrix;


    public function __construct($login, $passwd, $table, $iniFileName)
    {
        $this->login = filter_var($login, FILTER_SANITIZE_STRING);
        $this->passwd = crypterTrait($passwd);
        $this->table = $table;
       
        parent::__construct($iniFileName);
        $this->connectPDO();
        $this->prepareStmt();
        $this->checkPasswd();
        $this->endConnection();
        
    }
    private function prepareStmt()
    {
        $this->stmt = $this->dbh->prepare("SELECT passwd FROM :table WHERE login = :login");
        $this->stmt = bindParam(':table', $this->table);
        $this->stmt = bindParam(':login', $this->login);
        $this->stmt->execute();
    }
    
    private function checkPasswd()
    {
        $this->passwdMatrix = $this->stmt->fetchObject();
        if ($this->passwdMatrix['passwd'] == $this->passwd)
        {
            $logged = new SessionKeeper(true);
        }
        else { $logged = new SessionKeeper(false); }
    }
    
}
