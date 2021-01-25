<?php



// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository extends DatabaseManager
{
    // private $databaseManager;

    // // This class needs a database connection to function
 
    public $allData;
    public $updateData;

    public function create()

     //TODO: add submit alert 
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

    //TODO: combine the 2 update function.. 
    public function update()
    {
        //take the id of data in POST and store in the session for update2()
        $updateID = $_POST["edit"];
        $_SESSION["updateID"]=$updateID;

        //select this row to find out the value of name and origin
        $sql="SELECT * FROM apples WHERE id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$updateID]);
        //store inside a variable to use in the overview's input
        $this->updateData = $stmt->fetch();
    }


    public function update2() //execute when update button (with POST name = update is clicked
    {
        //grab the POST value for variables
        $name = $_POST["name"];
        $origin = $_POST["origin"];
        //get back the id from session
        $updateID = $_SESSION["updateID"]; 

        $sql = "UPDATE apples SET name=? , origin=?
        WHERE apples.id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$name, $origin,$updateID]);

        //execute the get() to update data on screen
        $this->get();

        //unset session 
        unset($_SESSION["updateID"]);
    }

    public function delete()
    {
        //TODO: add delete alert 

        $deleteId = $_POST["delete"];
    

        //first create a sql 
        $sql="DELETE FROM apples WHERE id=?";

        //prepare the statement
        $stmt = $this->connect()->prepare($sql);
                
        //the execute method requires array with the values
        $stmt->execute([$deleteId]);

       

        $this->get();
    }

}