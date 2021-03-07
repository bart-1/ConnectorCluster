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
 *
 * @author bartek
 */
trait CrypterTrait
{
    private function crypterTrait($phrase)
    {
        $parser = parse_ini_file("ini/$this->iniFileName");
        $salt = $parser['security'];
        return hash('SHA512', $salt.filter_var($phrase, FILTER_SANITIZE_STRING));
    }
    
}
