<?php
    class DatabaseAccess {
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $dbname = 'farmer_auction';

        /**
         * This function enables connection to the database
         */
        public function connect() {
            $mysql_connect_str = "mysql:host=$this->host;dbname=$this->dbname";
            $dbCon = new PDO($mysql_connect_str, $this->user, $this->password);
            $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbCon;
        }


    }

?>