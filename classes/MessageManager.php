<?php

/*
 * Copyright (C) 2021 bartek
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
 * Description of messegeProjector
 *
 * @author bartek
 */
class MessageManager extends ConnectorDB 
{
    
    protected $case = '';
    
    
    public static function sendToView($case)
    {
        echo "<p> I'm sorry. $case no success</p> ";
    }
    
    public function prepareStmt()
    {
        $this->stmt = $this->dbh->prepare("INSERT INTO :table (log_case) VALUES ($this->case)");
        $this->stmt = bindParam(':table', logs);
        $this->stmt->execute();  
    }
    
    public static function keepInLog($case)
    {
        $this->case = $case;
        parent::connectPDO();
        $this->prepareStmt();
        parent::endConnection();
        
    }
    
}
