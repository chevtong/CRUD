<?php 

require 'setup.php';

//IMPORTANT! need to create the connection on every new pages
$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);

//instead of using get(), use find() to show only one specific data row 
$cards = $cardRepository->find();

//when the update btn is clicked, there will be POST value and execute the update()
if(!empty($_POST["update"])){
    $cardRepository->update();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">

    <title>AppleDay - the Real Apple Collection</title>
</head>

<body>

    <h1>Edit the apple's information</h1>
    <ul>
        <!-- display all data in a foreach loop -->
        <?php foreach($cards as $card){ ?>
        <li>
            <?php echo $card["name"] . " - ";
				echo $card["origin"] . "<br>"; ?>


        </li>
        <?php }?>
    </ul>


    <form action="" method="post">
        <label>Name</label>
        <input type="text" name="name" placeholder="Apple's Type" value="<?php if(!empty($_GET["id"])){
			echo $card["name"];} //change value to the selected data?>">


        <label>Origin</label>
        <input type="text" name="origin" placeholder="Origin Country" value="<?php  if(!empty($_GET["id"])){
			echo $card["origin"];}//change value to the selected data  ?>">


        <button type="update" name="update" value="update">UPDATE</button>

    </form>

    
</body>

</html>