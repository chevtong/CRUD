<?php 

require 'setup.php';

//header('location:index.php');

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
//$cards = $cardRepository->get();

$cards = $cardRepository->find();

if(!empty($_POST["confirmDelete"])){
    $cardRepository->delete();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


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
        SURE?
        <button type="submit" name="confirmDelete" value="confirmDelete">Confirm</button>

	</form>
</body>
</html>
  


