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


<?php foreach($card->allData as $data){?>
   <li>
   		<?php echo $data["name"] . " - " . $data["origin"] . "<br>";?>

		<form action="" method="post">

			<button name="edit" value="<?php echo $data["id"]; ?>">EDIT</button>
			<button name="delete" value="<?php echo $data["id"]; ?>">DELETE</button>

		</form>	
   </li>
      <?php }?>
</ul>

<form action="" method="post">
<label>Name</label>
<input type="text" name="name" id="">
<label>Origin</label>
<input type="text" name="origin" id="">

<button type="submit" name="submit" value="submit">Add</button>
</form>

</body>
</html>