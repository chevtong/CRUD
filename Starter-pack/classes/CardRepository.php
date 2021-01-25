<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository extends DatabaseManager
{
    // private $databaseManager;

    // // This class needs a database connection to function
 
    public $allData;

    public function create()
    {
        $name = $_POST["name"];
        $origin =$_POST["origin"];

        //first create a sql 
        $sql="INSERT INTO apples(name, origin) 
        VALUES(?,?) ";

        //prepare the statement
        $stmt = $this->connect()->prepare($sql);
                
        //the execute method requires array with the values
        $stmt->execute([$name,$origin]);

        $_POST["name"]=$_POST["origin"]="";

        $this->get();
    }

    // Get one
    public function find()
    {

    }

    // Get all
    public function get()
    {
        // TODO: replace dummy data by real one
        // return [
        //     ['name' => 'dummy one'],
        //     ['name' => 'dummy two'],
        // ];

        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->database-> (runYourQueryHere)
        $sql = "SELECT * FROM apples";

        $stmt = $this->connect()->query($sql);

        $this->allData = $stmt->fetchAll();

    }

    public function update()
    {

    }

    public function delete()
    {
        $deleteId = $_POST["delete"];
    

        //first create a sql 
        $sql="DELETE FROM apples WHERE id=?";

        //prepare the statement
        $stmt = $this->connect()->prepare($sql);
                
        //the execute method requires array with the values
        $stmt->execute([$deleteId]);

        //$_POST["name"]=$_POST["origin"]="";

        $this->get();
    }

}