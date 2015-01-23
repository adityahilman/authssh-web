<?php
/* 
Halaman class.db.php
*/
class ConnectionDB {
        private $connect;

        public function closeConnection() {
                mysql_close($this->connect);
        }

        public function openConnection() {
                $host = DB_HOST;
                $user = DB_USER;
                $pass = DB_PASS;
                $db = DB_NAME;
                $this->connect = mysql_connect($host,$user,$pass) or die(mysql_error());

                if ($this->connect)
                {
                        mysql_select_db($db) or die(mysql_error());
                        //echo "Connection to database is established<br/>";
                }
                else {
                        echo "Connection Failed to AUTHSSH Database";
                }

        }
}


?>