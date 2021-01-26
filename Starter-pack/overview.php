<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>

<body>

    <h1>Goodcard - track your collection of Pokémon cards</h1>

    <ul>
		<!-- display all data in a foreach loop -->
        <?php foreach($cards as $card){ ?>
		<li>
        <?php echo $card["name"] . " - ";
				echo $card["origin"] . "<br>"; ?>

			<form method="post">

				<!-- use another form to get POST value(with data.id) with the clicked btn -->
				<button name="delete" value="<?php echo $card["id"]; ?>">delete</button>
				<button name="edit" value="<?php echo $card["id"]; ?>">Edit</button>

			</form>
		</li>
        <?php }?>
	</ul>


		
	<form action="" method="post">
		<label>Name</label>
		<input type="text" name="name" placeholder="Apple's Type" value="<?php //if(!empty($card->updateData)){
			//echo $card->updateData["name"];} //change value to the selected data when update btn is clicked?>">
		<label>Origin</label>
		<input type="text" name="origin" placeholder="Origin Country" value="<?php //if(!empty($card->updateData)){
			//echo $card->updateData["origin"];} //change value to the selected data when update btn is clicked ?>">
		
		<?php //if(!empty($card->updateData)){ 
		//name of btn change to update instead of submit in POST, to call out edit() on index.php?>
		<!-- <button type="update" name="update" value="update">UPDATE</button> -->
		
		
		<?php // } else { ?>

			<button type="submit" name="submit" value="submit">SUBMIT</button>

		<?php  //}?> 
	</form>


</body>

</html>