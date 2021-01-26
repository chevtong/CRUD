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
        $name = $_POST["name"];
        $origin = $_POST["origin"];

         //first create a sql 
         $sql="INSERT INTO apples(name, origin) 
         VALUES(?,?) ";
 
        //prepare the statement
        $result = $this->databaseManager->database->prepare($sql);

         //the execute method requires array with the values
         $result->execute([$name,$origin]);

         //give back the empty value in POST to avoid the submission again
         $_POST["name"]=$_POST["origin"]="";
 
    }

    // Get one
    public function find()
    {
        $dataId = $_GET["delete"];

        
        $sql="SELECT * FROM apples WHERE id=?";
  
        $result = $this->databaseManager->database->prepare($sql);

        //the execute method requires array with the values
        $result->execute([$dataId]);

        return $result;

    }

    // Get all
    public function get()
    {
            // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->database-> (runYourQueryHere)
        $sql = "SELECT * FROM apples";
        $result = $this->databaseManager->database->query($sql);

        return $result;
    }
    public function prepareUpdate()
    {
       // $_POST["edit"] = 
       
    }

    public function update()
    {
       
    }

    public function delete()
    {
      
            // //TODO: add delete alert 
            $dataId = $_GET["delete"];
        
            //first create a sql 
            $sql="DELETE FROM apples WHERE id=?";
    
            //prepare the statement
            $result = $this->databaseManager->database->prepare($sql);
                    
            //the execute method requires array with the values
            $result->execute([$dataId]);

            header('Location: index.php');
 
    }

}