<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$username = $_POST['username'];
$userid = shell_exec("id $username");
if (empty($userid)) {
    echo "USER NOT FOUND";
}
else 
    {
    echo "$userid";    
}


?>