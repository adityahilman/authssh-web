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
    
    public function getDownloadLog() {
        $sql_download = "SELECT * FROM USER_LOG";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_download = mysql_query($sql_download) or die (mysql_error());
        return $query_download;
    }
    
    public function getViewLastTenLog() {
        $sql_view="SELECT * FROM USER_LOG GROUP BY USER_ID DESC LIMIT 10";
        $c=new ConnectionDB();
        $c->openConnection();
        $query=mysql_query($sql_view) or die (mysql_error());
        return $query;
    }
     public function getViewTopTenLog() {
        $sql_topten = "SELECT USER_NAME, USER_IP, COUNT(*) FROM USER_LOG  where USER_LOGIN_STATUS = 'success' group by USER_NAME DESC LIMIT 10";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_topten = mysql_query($sql_topten) or die(mysql_error());
        return $query_topten;
    }

    public function getUserSummaryLog() {
        $sql_user="SELECT USER_NAME, COUNT(*) FROM USER_LOG GROUP BY USER_NAME";
        $c=new ConnectionDB();
        $c->openConnection();
        $query=mysql_query($sql_user) or die (mysql_error());
        return $query;
    }
      
    public function getIpSummaryLog() {
        $sql_ip="SELECT USER_IP, COUNT(*) FROM USER_LOG GROUP BY USER_IP";
        $c=new ConnectionDB();
        $c->openConnection();
        $query=  mysql_query($sql_ip) or die (mysql_error());
        return $query;
    }
    
    public function getTopTenIpSummaryLog() {
        $sql_toptenip="SELECT USER_IP, COUNT(*) FROM USER_LOG GROUP BY USER_IP ORDER BY COUNT(*) DESC LIMIT 10";
        $c=new ConnectionDB();
        $c->openConnection();
        $query_toptenip = mysql_query($sql_toptenip) or die (mysql_error());
        return $query_toptenip;
    }
    
    public function getSearchUsers() {
        $search_user = "SELECT * FROM USER_LOG WHERE USER_NAME = '".$this->getUsername()."' ";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_search = mysql_query($search_user) or die (mysql_error());
        return $query_search;
    }
    
    // function untuk bar chart
    public function getUserChartSummaryLog() {
        //$sql_chart="SELECT USER_NAME, USER_LOGIN_STATUS, COUNT(*) FROM USER_LOG GROUP BY USER_NAME, USER_LOGIN_STATUS";
        $sql_chart="SELECT USER_LOGIN_STATUS, COUNT(*) FROM USER_LOG GROUP BY USER_LOGIN_STATUS";
        $c=new ConnectionDB();
        $c->openConnection();
        $query_chart=mysql_query($sql_chart) or die (mysql_error());
        return $query_chart;
    }
    
    public function getUserSuccessChartSummaryLog() {
        //$sql_chart="SELECT USER_NAME, USER_LOGIN_STATUS, COUNT(*) FROM USER_LOG GROUP BY USER_NAME, USER_LOGIN_STATUS";
        $sql_success="SELECT USER_LOGIN_STATUS, COUNT(*) FROM USER_LOG WHERE USER_LOGIN_STATUS = 'Success' GROUP BY USER_LOGIN_STATUS";
        $c=new ConnectionDB();
        $c->openConnection();
        $query_success=mysql_query($sql_success) or die (mysql_error());
        return $query_success;
    }
    
    public function getUserFailedChartSummaryLog() {
        //$sql_chart="SELECT USER_NAME, USER_LOGIN_STATUS, COUNT(*) FROM USER_LOG GROUP BY USER_NAME, USER_LOGIN_STATUS";
        $sql_failed="SELECT USER_LOGIN_STATUS, COUNT(*) FROM USER_LOG WHERE USER_LOGIN_STATUS = 'Failed' GROUP BY USER_LOGIN_STATUS";
        $c=new ConnectionDB();
        $c->openConnection();
        $query_failed=mysql_query($sql_failed) or die (mysql_error());
        return $query_failed;
    }
    
    public function exportMysqlToCsv($filename = 'export.csv') {
        $csv_terminated = "\n";
        $csv_separator = ",";
        $csv_enclosed = '"';
        $csv_escaped = "\\";
        $sql_query = "SELECT * FROM USER_LOG";

        // Gets the data from the database
        $result = mysql_query($sql_query);
        $fields_cnt = mysql_num_fields($result);


        $schema_insert = '';

        for ($i = 0; $i < $fields_cnt; $i++) {
            $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, stripslashes(mysql_field_name($result, $i))) . $csv_enclosed;
            $schema_insert .= $l;
            $schema_insert .= $csv_separator;
        } // end for

        $out = trim(substr($schema_insert, 0, -1));
        $out .= $csv_terminated;

        // Format the data
        while ($row = mysql_fetch_array($result)) {
            $schema_insert = '';
            for ($j = 0; $j < $fields_cnt; $j++) {
                if ($row[$j] == '0' || $row[$j] != '') {

                    if ($csv_enclosed == '') {
                        $schema_insert .= $row[$j];
                    } else {
                        $schema_insert .= $csv_enclosed .
                                str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
                    }
                } else {
                    $schema_insert .= '';
                }

                if ($j < $fields_cnt - 1) {
                    $schema_insert .= $csv_separator;
                }
            } // end for

            $out .= $schema_insert;
            $out .= $csv_terminated;
        } // end while

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Length: " . strlen($out));
        // Output to browser with appropriate mime type, you choose ;)
        header("Content-type: text/x-csv");
        //header("Content-type: text/csv");
        //header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=$filename");
        echo $out;
        exit;
    }

}
