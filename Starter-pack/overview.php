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

				<a href="edit.php?id=<?php echo $card["id"]?>">edit</a>

				<a href="delete.php?id=<?php echo $card["id"]?>">delete</a>

			</form>
		</li>
        <?php }?>
	</ul>


		
	<form action="" method="post">
		<label>Name</label>
		<input type="text" name="name" placeholder="Apple's Type">


		<label>Origin</label>
		<input type="text" name="origin" placeholder="Origin Country">
		
	

			<button type="submit" name="submit" value="submit">SUBMIT</button>

		
	</form>


</body>

</html>