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
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Pokecare</title>
</head>
<body class="max-w-5xl w-full min-h-screen flex flex-col mx-auto overflow-x-hidden">

    <?php include "./src/views/header.html" ?>
 
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
            <img src="https://cdn.dribbble.com/userupload/21208770/file/original-bceebded65c4bad0cd6b870afd432e95.png?resize=752x564&vertical=center" alt="venusaur" class="w-full max-w-40 mt-4 aspect-square bg-white rounded-lg" />

            <h2 class="text-zinc-900 mt-5 text-2xl text-center rounded-lg">Level: <?= $pk->getLevel() ?></h2>
            <p class="text-center mt-4">
                HP: <?= $pk->getHp() ?><br/>
                Atk: <?= $pk->getAtk() ?><br/>
                Def: <?= $pk->getDef() ?><br/>
                Speed: <?= $pk->getSpeed() ?><br/>
            </p>
        </div>


        <div class="w-full z-20 bg-zinc-200 py-4">
            <h2 class="font-bold text-center">Moveset</h2>
            <ul class="flex flex-wrap w-full justify-center items-center gap-2">
                <?php foreach($pk->getAbility() as $ability): ?>
                    <li class="bg-zinc-600 text-white px-2 py-1 inline-flex justify-center items-center rounded-lg"><?= $ability ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>