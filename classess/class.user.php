<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author adityahilman
 */
include "class.db.php";
include dirname(__FILE__) . "/../config/config.db.php";

class USERS {
//put your code here
    private $username, $password, $level, $insert, $c, $userdetail;
    
    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username=$username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password=$password;
    }
    
    public function getLevel() {
        return $this->level;
    }
    public function setLevel($level) {
        $this->level=$level;
    }
    
    public function getUserDetail() {
        return $this->userdetail;
    }
    public function setUserDetail($userdetail) {
        $this->userdetail=$userdetail;
    }
    // --- USER WEB ---
    // function insert User ke table USER_ADMIN
    public function getInsertUser() {
        $insert = false;
        // check user on database
        $check_user = "SELECT * FROM USER_ADMIN WHERE USERNAME_ADMIN = '".$this->getUsername()."' ";
        $c=new ConnectionDB();
        $c->openConnection();
        $query_check_user = mysql_query($check_user) or die (mysql_error());
        if (mysql_num_rows($query_check_user) == 1)
        {
            ?>
            <script>alert("User already exist.");document.location.href="view.webusers.php";</script>
            <?php
        }
        else 
        {
           $sql = "INSERT INTO USER_ADMIN (USERNAME_ADMIN, PASSWORD_ADMIN, LEVEL_ADMIN) VALUES ('".$this->getUsername()."','".$this->getPassword()."','".$this->getLevel()."')";
           $c=new ConnectionDB();
           $c->openConnection();
           $query=mysql_query($sql) or die (mysql_error());
            if($query) 
                {
                    $insert = true;
                }
            $c->closeConnection();
            return $insert;
        }
    }
    // Update password
    public function getUpdatePassword() {
        $insert = false;
        $sql_update_pass = "UPDATE USER_ADMIN SET PASSWORD_ADMIN = '".$this->getPassword()."' WHERE USERNAME_ADMIN = '".$this->getUsername()."' ";
        $c=new ConnectionDB();
        $c->openConnection();
        $query_update_pass = mysql_query($sql_update_pass) or die (mysql_error());
        if ($query_update_pass)
        {
            $insert = TRUE;
        }
        $c->closeConnection();
        return $insert;
    }
    
    public function getSearchUsers() {
        $search_user = "SELECT * FROM USER_ADMIN WHERE USERNAME_ADMIN = '" . $this->getUsername() . "' ";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_search = mysql_query($search_user) or die(mysql_error());
        return $query_search;
    }
    
    public function getWebUsers() {
        $list_user = "SELECT * FROM USER_ADMIN";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_list_user = mysql_query($list_user) or die(mysql_error());
        return $query_list_user;
    }

    // --- End Of USERS WEB ---
    
    
    
    // --- Function for LINUX USERS ---
    public function getUsersLinux() {
        $sql_linux = "SELECT * FROM USER";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_linux = mysql_query($sql_linux) or die(mysql_error());
        return $query_linux;
    }
    
    public function getAddUsersLinux() {
        $insert = false;
        $check_userlinux = "SELECT * FROM USER WHERE USER_NAME = '".$this->getUsername()."' ";
        $c=new ConnectionDB();
        $c->openConnection();
        $query_check_userlinux = mysql_query($check_userlinux) or die (mysql_error());
        if (mysql_num_rows($query_check_userlinux) == 1)
        {
            ?>
            <script>alert("User already exist.");document.location.href="view.linuxusers.php";</script>
            <?php
        }
        else 
        {
           $sql_userlinux = "INSERT INTO USER (USER_NAME, USER_DETAIL) VALUES ('".$this->getUsername()."', '".$this->getUserDetail()."') ";
           $c=new ConnectionDB();
           $c->openConnection();
           $query_userlinux=mysql_query($sql_userlinux) or die (mysql_error());
            if($query_userlinux) 
                {
                    $insert = true;
                }
            $c->closeConnection();
            return $insert;
        }
    }
    
    // --- END of Function for LINUX USERS ---
  
}
