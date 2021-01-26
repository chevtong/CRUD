<?php 

require 'setup.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);

$cards = $cardRepository->find();

if(!empty($_POST["update"])){
    $cardRepository->update();
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
  