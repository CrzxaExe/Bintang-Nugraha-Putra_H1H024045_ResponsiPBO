<?php

require_once "./src/class/Pokemon.php";

$pk = new Venusaur();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style/output.css" >
    <title>Pokecare</title>
</head>
<body class="max-w-5xl w-full min-h-screen flex flex-col mx-auto overflow-x-hidden">
    <div>
        <h1 class="w-full text-5xl text-center">PokéCare</h1>
    </div>
    <div class="flex flex-col gap-3 pt-6 justify-center relative items-center">
        <div class="py-5 px-4 w-full z-2 bg-zinc-200 flex flex-col justify-center items-center">
            <div>
                <h1 class="font-bold text-5xl w-full"><?= $pk->getName() ?></h1>

                <div class="w-full flex flex-row justify-center mt-3 gap-2">
                    <?php foreach($pk->getType() as $type): ?>
                        <span class="bg-zinc-600 text-white px-2 py-1 inline-flex justify-center items-center rounded-lg"><?= $type ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <img src="https://cdn.dribbble.com/userupload/21208770/file/original-bceebded65c4bad0cd6b870afd432e95.png?resize=752x564&vertical=center" alt="venusaur" class="w-full max-w-40 aspect-square bg-white rounded-lg" />

            <h2 class="text-zinc-900 mt-5 text-2xl text-center rounded-lg">Level: <?= $pk->getLevel() ?></h2>
            <p class="text-center mt-4">
                HP: <?= $pk->getHp() ?><br/>
                Atk: <?= $pk->getAtk() ?><br/>
                Def: <?= $pk->getDef() ?><br/>
                Speed: <?= $pk->getSpeed() ?><br/>
            </p>
        </div>


        <div class="w-full z-20 bg-zinc-200 py-4">
            <h2 class="font-bold">Moveset</h2>
            <ul class="flex flex-wrap w-full justify-center items-center gap-2">
                <?php foreach($pk->getAbility() as $ability): ?>
                    <li class="bg-zinc-600 text-white px-2 py-1 inline-flex justify-center items-center rounded-lg"><?= $ability ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div>
        <h2 class="mt-4 text-xl w-full text-center">Menu</h2>
        <div class="flex flex-row justify-center gap-5">
            <a class="bg-lime-500 px-5 py-1.5 rounded-xl" href="train.php">Training</a>
            <a class="bg-lime-500 px-5 py-1.5 rounded-xl" href="training-history.php">History</a>
        </div>
    </div>
</body>
</html>