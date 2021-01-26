<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>AppleDay - the Real Apple Collection</title>
</head>

<body>
    <div class="container">

        <div class="content">
            <h1>Apple Day</h1>
            <p>No other fruits can compare to a sweet, crisp, juicy apple. There are more than 7,500 varieties around
                the world.</p>
            <ul>
                <!-- display all data in a foreach loop -->
                <?php foreach($cards as $card){ ?>

                <li>

					<p>

                    <?php echo $card["name"] . " - ";
				echo $card["origin"] . "<br>"; ?>
					</p>

                    <!-- TODO: add tooltip  -->
                    <a href="show.php?id=<?php echo $card["id"]?>"><i class="fas fa-info-circle"></i></a>

                    <a href="edit.php?id=<?php echo $card["id"]?>"><i class="fas fa-pen"></i></a>
                    <a href="delete.php?id=<?php echo $card["id"]?>"><i class="fas fa-trash-alt"></i></a>

                   
                </li>

                <?php }?>
            </ul>



            <form action="" method="post">

				TO ADD A New Type of Apple <br>
                <label>Name</label>
                <input type="text" name="name" placeholder="Apple's Type">

                <label>Origin</label>
                <input type="text" name="origin" placeholder="Origin Country">

                <button type="submit" name="submit" value="submit">SUBMIT</button>

            </form>
        </div>

        <div class="background"></div>
    </div>


</body>

</html>