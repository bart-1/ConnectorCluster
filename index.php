<!DOCTYPE html>
<!--
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
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>logowanie</title>
    </head>
    <body>
        
        <div>
            <div>
                <span> logowanie </span>
                <form action="index.php" method="post">
                    <input type="text" name="login"/>
                    <input type="password" name="passwd"/>
                    <input type="submit" value="zaloguj"/>
                </form>
                <span> rejestracja </span>
                <form action="index.php" method="post">
                    <input type="text" name="loginR"/>
                    <input type="password" name="passwdR"/>
                    <input type="submit" value="zarejestruj"/>
                </form>
                
            </div>
            
        </div>
        <?php
        require_once 'classes/Autoloader.php';
        $loader = new ConnectorCluster\classes\Autoloader();
        ?>
    </body>
</html>
