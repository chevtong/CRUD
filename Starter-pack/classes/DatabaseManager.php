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

    public function __construct(string $host, string $name, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->password = $password;
        
    }

    public function connect()
    {
        try{
            
            //use $dsn for just clearer view
            $dsn = "mysql:host=$this->host;dbname=collection;";

            //PDO require the dsn, username and password
            $this->database = new PDO($dsn, $this->name, $this->password);

            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $exception) { //to get error if connection failed
            
           echo "Connection Error - " . $exception->getMessage();
        }

        
    }
}