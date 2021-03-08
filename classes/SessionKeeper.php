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
 * Description of SessionKeeper
 *
 * @author bartek
 */
class SessionKeeper
{
 
    public static function sessionStarter()
    {
        session_start();
        $_SESSION['userKnown'] = 1; 
        $_SESSION['time'] = time(); 
        $_SESSION['machine'] = $_SERVER['HTTP_USER_AGENT']; 
       new UserKnown(); 
        
    }
    public static function sessionDestroyer()
    {
        $_SESSION['userKnown'] = 0; 
        session_destroy();
    }
    
}
