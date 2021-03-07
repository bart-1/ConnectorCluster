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
 * Description of Autoloader
 *
 * @author bartek
 */
class Autoloader
{
    public $className;
   // public $extensions = array('.php', '.class.php', '.interface.php');
    
    public $paths = array('interfaces/', 'classes/');
    

    public function __construct()
    {
        spl_autoload_register(null, false);
        $this->autloader();
    }
    
    public function autloader()
    {
        foreach ($this->paths as $path)
        {
            $filesNames = scandir($path);
            foreach ($filesNames as $fileName )
            {
                echo $path.$fileName."<br />";
               if (is_file($path.$fileName) && is_readable($path.$fileName) 
                       && !class_exists(rtrim($fileName, '.php')))
               {
                   include_once $path.$fileName;
                   echo $path.$fileName." :loaded"."<br />";
                  // echo rtrim($fileName, '.php')))."<br />";
               }
            }
        }
        
    }
}
