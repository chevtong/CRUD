<?php 

require 'setup.php';

//IMPORTANT! need to create the connection on every new pages
$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);

//instead of using get(), use find() to show only one specific data row 
$cards = $cardRepository->find();

if(!empty($_POST["return"])){
    header("Location:index.php");
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

<h1>The Apple's Details</h1>

    <ul>
        <!-- display all data in a foreach loop -->
        <?php foreach($cards as $card){ ?>
        <li>Name: 
            <?php echo $card["name"]; ?>


        </li>
        <li>Origin: <?php echo $card["origin"];?></li>
        <li>Data input on: <?php echo $card["entered_at"];?></li>
        <?php }?>
    </ul>


    <form action="" method="post">



        <button type="return" name="return" value="return">HOME</button>

    </form>

    <div class="background"></div>

</body>

</html>