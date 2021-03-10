<?php 

require 'setup.php';

//IMPORTANT! need to create the connection on every new pages
$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);

//instead of using get(), use find() to show only one specific data row 
$cards = $cardRepository->find();

//when the confirm btn is clicked, there will be POST value and execute the delete()
if(!empty($_POST["confirmDelete"])){
    $cardRepository->delete();
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

<h1>Delete the apple's information</h1>

    <ul>
        <!-- display the selected data in a foreach loop -->
        <?php foreach($cards as $card){ ?>
        <li>
            <?php echo $card["name"] . " - ";
				echo $card["origin"] . "<br>"; ?>
        </li>
        <?php }?>
    </ul>

    <form action="" method="post">
        SURE?
        <button type="submit" name="confirmDelete" value="confirmDelete">Confirm</button>
    </form>

    
</body>

</html>