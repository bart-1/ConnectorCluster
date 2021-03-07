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
