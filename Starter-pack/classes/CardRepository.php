<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private $databaseManager;
    public $id;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create()
    {
        //set variables for the values needed
        $name = $_POST["name"];
        $origin = $_POST["origin"];

        //create the sql 
        $sql="INSERT INTO apples(name, origin) VALUES(?,?) ";
 
        //prepare the statement
        $result = $this->databaseManager->database->prepare($sql);

        //the execute method requires array with the values
        $result->execute([$name,$origin]);
    }

    // Get one
    public function find()
    {
        //set variables for the values needed
        $dataId = $_GET["id"];
        
        //create the sql
        $sql="SELECT * FROM apples WHERE id=?";

        //prepare the connection
        $result = $this->databaseManager->database->prepare($sql);

        //the execute method 
        $result->execute([$dataId]);

        //need to return for this result in order to show in array
        return $result;
    }

    // Get all - will be loaded with the index page
    public function get()
    {
        //create sql
        $sql = "SELECT * FROM apples";

        //connect to the database with query(), not neccessary to prepare then execute here since no info input 
        $result = $this->databaseManager->database->query($sql);

        //need to return for this result in order to show in array on overview.php
        return $result;
    }
   

    public function update()
    {
            // //TODO: add delete alert
            
            //get values by setting variables
            $dataId = $_GET["id"];
            $name = $_POST["name"];
            $origin = $_POST["origin"];
        
            //create a sql 
            $sql="UPDATE apples
            SET name = ?, origin=?
            WHERE id = ?";
    
            //prepare the statement
            $result = $this->databaseManager->database->prepare($sql);
                    
            //the execute method requires array with the values
            $result->execute([$name,$origin,$dataId]);

            //return the page to index
            header('Location: index.php');
    }

    public function delete()
    {
      
            // //TODO: add delete alert 

            //get values by setting variables
            $dataId = $_GET["id"];
        
            //first create a sql 
            $sql="DELETE FROM apples WHERE id=?";
    
            //prepare the statement
            $result = $this->databaseManager->database->prepare($sql);
                    
            //the execute method requires array with the values
            $result->execute([$dataId]);

            header('Location: index.php');
    }
}