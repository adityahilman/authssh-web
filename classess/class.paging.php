<?php
/**
 * class Paging
 *
 * @author adit
 */
include "class.db.php";
include dirname(__FILE__) . "/../config/config.db.php";

class PAGING {
    var $limit = 0;
    public function getData()
    {
        $query_select = "SELECT * FROM USER_LOG ORDER BY USER_ID DESC LIMIT 0,10";
        $c = new ConnectionDB();
        $c->openConnection();
        $query_data = mysql_query($query_select) or die (mysql_error());
        while ($row = mysql_fetch_array($query_data))
                $data[] = $row;
        return $data;
    }
    
    public function getPosition($limit)
    {
        if (empty($_GET['page']))
        {
            $position = 0;
            $_GET['page'] = 1;
        }
        else
        {
            $position = ($_GET['page']-1)*$limit;
        }
        return $position;
    }
    
    public function countData()
    {
        $query_count = "SELECT * FROM USER_LOG";
        $c = new ConnectionDB();
        $c->openConnection();
        $sql_count = mysql_query($query_count) or die (mysql_error());
        $count_data = mysql_num_rows($sql_count);
        return $count_data;
    }
    
    public function countPage($count_data,$limit)
    {
        $totalPage = ceil($count_data/$limit);
        return $totalPage;
    }
    
    public function navPage($getPage,$totalPage)
    {
        $linkPage = "";
        for ($i=1; $i<=$totalPage;$i++)
        {
            if ($i == $getPage)
            {
                $linkPage .= "<b>$i</b> |";
            }
            else
            {
                $linkPage .= "<a href=$_SERVER[PHP_SELF]?page=$i>$i</a> |";
            }
            $linkPage .= "";
        }
        return $linkPage;
    }
}
