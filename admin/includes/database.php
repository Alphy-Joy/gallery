<?php
    require('config.php');
    class Database{

        public $connection;

        function __construct()
        {
            $this->open_db_connection();
        }

        // establishing database connection
        public function open_db_connection()
        {
            //$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            // if(mysqli_connect_error()){
            //     echo "Database connection failed ".mysqli_connect_errno();
            // }
            if($this->connection->connect_errno){
                echo "Database connection failed ".$this->connection->connect_error;
            }
        }
        //executing the query
        public function query($sql)
        {
            //$result = mysqli_query($this->connection,$sql);
            $result = $this->connection->query($sql);
            $this->confirm_query($result);
            return $result;
        }
        //checking if the query execution failed
        private function confirm_query($result)
        {
            if(!$result)
            {
                die("Query failed".$this->connection->error);
            }
        }
        //escape all special characters in an SQL query
        public function escape_string($string)
        {
            //$escaped_string = mysqli_escape_string($this->connection,$string);
            $escaped_string = $this->connection->real_escape_string($string);
            return $escaped_string;
        }
        //get insert id
        public function get_insert_id()
        {
            return $this->connection->insert_id;
        }
    }

    // initializing class
    $database = new Database();

?>