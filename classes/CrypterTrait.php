<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
