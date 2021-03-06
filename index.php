<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
        
        ?>
    </body>
</html>
