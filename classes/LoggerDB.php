<?php

/*
 * Copyright (C) 2021 Bartosz Woldański
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace ConnectorCluster\classes;
use ConnectorCluster\classes\SessionKeeper;
use ConnectorCluster\classes\CrypterTrait;

/**
 * Description of LoggerDB
 *
 * @author bartek
 */
class LoggerDB extends ConnectorDB
{
    
    private $login;
    private $passwd;
    protected $table;
    private $stmt;
    private $passwdMatrix;


    public function __construct($login, $passwd, $table, $iniFileName)
    {
        $this->login = filter_var($login, FILTER_SANITIZE_STRING);
        $this->passwd = $this->crypterTrait($passwd);
        $this->table = $table;
       
        parent::__construct($iniFileName);
        $this->connectPDO();
        $this->prepareStmt();
        $this->checkPasswd();
        $this->endConnection();
        
    }
    public function prepareStmt()
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
            SessionKeeper::sessionStarter();
        }
        else { 
            SessionKeeper::sessionDestroyer();
            $case = 'Wrong password';
            MessageManager::keepInLog($case)::sendToView($case);
            
        }
    }
   
    
}
