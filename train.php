<?php

require_once "./src/class/Pokemon.php";

$tr = new Venusaur();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style/output.css" >
    <title>Training</title>
</head>
<body class="max-w-5xl w-full flex flex-col mx-auto overflow-hidden">

    <main class="flex flex-col gap-3 pt-6">
        <div>
            <h1 class="w-full text-5xl text-center">Training <?= $tr->getName() ?></h1>

            <h2 class="mt-4 text-xl w-full text-center">Menu</h2>
            <div class="flex flex-row justify-center gap-5">
                <a class="bg-lime-500 px-5 py-1.5 rounded-xl" href="/">Home</a>
                <a class="bg-lime-500 px-5 py-1.5 rounded-xl" href="training-history.php">History</a>
            </div>
        </div>

        <?php
            if(isset($_POST['training'])) {
                echo $tr->training($_POST['training'],(int) $_POST['intensity']);
            }
        ?>

        <div class="bg-zinc-200 mt-6 py-5 px-4 rounded-lg">
            <form action="train.php" method="POST">
                <label for="name" class="block text-xl font-bold mb-1">Intensitas training</label>
                <input type="number" name="intensity" id="intensity" value="1" min="1" class="bg-white placeholder:bg-white block">
                
                <label for="name" class="block text-xl mt-6 font-bold mb-1">Stats yang akan di train</label>
                <div class="flex flex-row gap-2">
                    <button class="bg-lime-500 cursor-pointer  px-3 py-1 rounded-lg font-bold" type="submit" name="training" value="atk">Attack</button>
                    <button class="bg-lime-500 cursor-pointer px-3 py-1 rounded-lg font-bold" type="submit" name="training" value="def">Defense</button>
                    <button class="bg-lime-500 cursor-pointer px-3 py-1 rounded-lg font-bold" type="submit" name="training" value="speed">Speed</button>
                </div>
            </form>
        </div>

    </main>
    
</body>
</html>