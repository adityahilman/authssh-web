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
include "db.php";
include dirname(__FILE__) . "/../config/config.db.php";

class USERS {
//put your code here
    private $username, $password, $level, $insert, $c, $userdetail, $email, $createdby, $delete;
    
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
    
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email=$email;
    }

    public function getLevel() {
        return $this->level;
    }
    public function setLevel($level) {
        $this->level=$level;
    }
    
    public function getCreatedBy() {
        return $this->createdby;
    }
    public function setCreatedBy($createdby) {
        $this->createdby=$createdby;
    }
    
    public function getUserDetail() {
        return $this->userdetail;
    }
    public function setUserDetail($userdetail) {
        $this->userdetail=$userdetail;
    }
    
    // For Paging
    public function getOffset() {
        return $this->offset;
    }

    public function setOffset($offset) {
        $this->offset = $offset;
    }
    
    public function getLimit() {
        return $this->limit;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
    }

    public function getPage() {
        return $this->page;
    }

    public function setPage($page) {
        $this->page = $page;
    }
    
    // --- End of Paging Variable ---
    
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
           $sql_webuser = "INSERT INTO USER_ADMIN (USERNAME_ADMIN, EMAIL_ADMIN, PASSWORD_ADMIN, LEVEL_ADMIN, CREATED_BY) VALUES ('".$this->getUsername()."','".$this->getEmail()."','".$this->getPassword()."','".$this->getLevel()."','".$this->getCreatedBy()."')";
           $c=new ConnectionDB();
           $c->openConnection();
           $query=mysql_query($sql_webuser) or die (mysql_error());
            if($query) 
                {
                    $insert = true;
                }
            $c->closeConnection();
            return $insert;
        }
    }
    
    // function delete web user 
    public function getDeleteUser() {
        $delete = false;
        $username_admin = $_GET['username'];
        // user admin tidak boleh di delete
        if ($username_admin == 'admin')
        {
            ?> <script>alert("Cannot delete user admin.");document.location.href="view.webusers.php";</script> <?php
            return $delete;
        }
        else {
            //$sql_del_user = "DELETE FROM USER_ADMIN WHERE USERNAME_ADMIN = '".$this->getUsername()."' ";
            $sql_del_user = "DELETE FROM USER_ADMIN WHERE USERNAME_ADMIN = '$username_admin' ";
            $c = new ConnectionDB();
            $c->openConnection();
            $query_del_user = mysql_query($sql_del_user) or die (mysql_error());
            if ($query_del_user)
            {
                $delete = TRUE;
            }
            $c->closeConnection();
            return $delete;
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
        if (mysql_num_rows($query_search) != 1)
        {
            ?> <script>alert("User not found.");document.location.href="view.webusers.php";</script> <?php
        }
        else {
            return $query_search;
        }
    }
    
    public function getWebUsers() {
        $list_user = "SELECT * FROM USER_ADMIN";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_list_user = mysql_query($list_user) or die(mysql_error());
        return $query_list_user;
    }

    public function getPagingWebUsers() {
        $list_userpaging = "SELECT * FROM USER_ADMIN GROUP BY ID_ADMIN ASC LIMIT ".$this->getOffset().",".$this->getLimit()." ";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_list_userpaging = mysql_query($list_userpaging) or die(mysql_error());
        return $query_list_userpaging;
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
    
    public function getDeleteUsersLinux() {
        $delete = false;
        $user_linux = $_GET['user_linux'];
        $sql_del_userlinux = "DELETE FROM USER WHERE USER_NAME = '$user_linux' ";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_deluserlinux = mysql_query($sql_del_userlinux) or die (mysql_error());
        if ($query_deluserlinux)
        {
            $delete = true;
        }
        $c->closeConnection();
        return $delete;
    }
    
    public function getSearchUsersLinux() {
        $search_userlinux = "SELECT * FROM USER WHERE USER_NAME =  '" . $this->getUsername() . "' ";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_searchlinux = mysql_query($search_userlinux) or die (mysql_error());
        return $query_searchlinux;
    }
}