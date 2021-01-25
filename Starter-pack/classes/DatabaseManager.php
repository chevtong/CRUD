<?php

// This class will manage the connection to the database
// It will be passed on the other classes who need it
class DatabaseManager
{
    // These are private: only this class needs them
    private $host;
    private $name;
    private $password;
    // This one is public, so we can use it outside of this class
    // We could also use a private variable and a getter (but let's not make things too complicated at this point)
    public $database;

   

    public function __construct($host, $name, $password)
    {
        // TODO: Set any user and password information
        $this->host = $host;
        $this->name = $name;
        $this->password = $password;
  

    }

    public function connect()
    {
        // TODO: make the connection to the database

        $this->database = "collection";

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        
        //create the pdo connection
        $pdo = new PDO($dsn, $this->name, $this->password);

        //set default attribute to get the data
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo; 
    }

  

    //this database manager is working fine
}