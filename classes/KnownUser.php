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
use ConnectorCluster\interfaces\KnownUserInterface;

/**
 * Description of KnownUser
 *
 * @author bartek
 */
class KnownUser implements KnownUserInterface
{
    public $name;
    public $email;
    public $id;
            
    public function setUserData()
    {
        
    }
    public function getUserData()
    {
        
    }
    
}
