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

class ViewLog {
//put your code here
    private $username, $ip, $status, $c ;
    
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    // function view log
    public function getViewLog() {
        $sql_view="SELECT * FROM USER_LOG";
        $c=new ConnectionDB();
        $c->openConnection();
        $query=mysql_query($sql_view) or die (mysql_error());
        return $query;
    }
    
    public function getViewLastTenLog() {
        $sql_view="SELECT * FROM USER_LOG GROUP BY USER_ID DESC LIMIT 10";
        $c=new ConnectionDB();
        $c->openConnection();
        $query=mysql_query($sql_view) or die (mysql_error());
        return $query;
    }
    
    public function getUserSummaryLog() {
        $sql_user="SELECT USER_NAME, COUNT(*) FROM USER_LOG GROUP BY USER_NAME";
        $c=new ConnectionDB();
        $c->openConnection();
        $query=mysql_query($sql_user) or die (mysql_error());
        return $query;
    }
    
    public function getUserChartSummaryLog() {
        //$sql_chart="SELECT USER_NAME, USER_LOGIN_STATUS, COUNT(*) FROM USER_LOG GROUP BY USER_NAME, USER_LOGIN_STATUS";
        $sql_chart="SELECT USER_LOGIN_STATUS, COUNT(USER_LOGIN_STATUS) FROM USER_LOG GROUP BY USER_LOGIN_STATUS";
        $c=new ConnectionDB();
        $c->openConnection();
        $query_chart=mysql_query($sql_chart) or die (mysql_error());
        return $query_chart;
    }
    
    
    public function getIpSummaryLog() {
        $sql_ip="SELECT USER_IP, COUNT(*) FROM USER_LOG GROUP BY USER_IP";
        $c=new ConnectionDB();
        $c->openConnection();
        $query=  mysql_query($sql_ip) or die (mysql_error());
        return $query;
    }
    
     public function getSearchUsers() {
        $search_user = "SELECT * FROM USER_LOG WHERE USER_NAME = '".$this->getUsername()."' ";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_search = mysql_query($search_user) or die (mysql_error());
        return $query_search;
    }
}
