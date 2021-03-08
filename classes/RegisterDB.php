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

/**
 * Description of RegisterDB
 *
 * @author bartek
 */
class RegisterDB extends ConnectorDB
{
    use ConnectorCluster\classes\CrypterTrait;
    private $login;
    private $passwd;
    protected $table;
    private $stmt;
    
    public function __construct($login, $passwd, $table, $iniFileName)
    {
        $this->login = filter_var($login, FILTER_SANITIZE_STRING);
        $this->passwd = crypterTrait($passwd);
        $this->table = $table;
       
        parent::__construct($iniFileName);
        $this->connectPDO();
        $this->prepareStmt();
        
        $this->endConnection();
    }
    
    public function prepareStmt()
    {
        $this->stmt = $this->dbh->prepare("INSERT INTO :table (login, passwd) VALUES (:login, :passwd)");
        $this->stmt = bindParam(':table', $this->table);
        $this->stmt = bindParam(':login', $this->login);
        $this->stmt = bindParam(':passwd', $this->passwd);
        $this->stmt->execute();
    }
}
