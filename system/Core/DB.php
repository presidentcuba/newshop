<?php

class DB
{
    protected $server;
    protected $username;
    protected $password;
    protected $datatbase;
    protected $conn;


    public function __construct() 
    {   $this->server   = $GLOBALS['env_database']['server'];
        $this->username = $GLOBALS['env_database']['username'];
        $this->password = $GLOBALS['env_database']['password'];
        $this->database = $GLOBALS['env_database']['database'];
        #connect database
        $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
        #set utf8
        $this->conn->set_charset('utf8');
    }
    #query
    public function query($sql = '') 
    {
        $query = $this->conn->query($sql);
        if ($query) {
            return $query;
        }
        return false;
    }

    public function numRows($sql)
    {
        $query = $this->query($sql);
        if ($query) {
            return $query->num_rows;
        }

        return 0;
    }
    #Fetch
    public function fetch($sql) 
    {
        $result = $this->query($sql);


        if ($result->num_rows > 0 ) {
            return $result->fetch_assoc();
        }
        return false;
    }

    public function fetchArray($sql)
    {
        $result = $this->query($sql);
        
        if ($result->num_rows > 0) {
            $data = [];
           
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        }
        
        return false;
    }

    public function getLastId($sql = '')
    {
        $result = $this->query($sql);
        if ($result) {
            return $this->conn->insert_id;
        }
        return 0;
    }
}