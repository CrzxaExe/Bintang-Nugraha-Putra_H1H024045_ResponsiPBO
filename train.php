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
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Training</title>
</head>
<body class="max-w-5xl w-full flex flex-col mx-auto overflow-hidden">

    <?php include "./src/views/header.html" ?>


    <main class="flex flex-col gap-3 pt-6">
        <div>
            <h1 class="text-5xl font-bold">Training <?= $tr->getName() ?></h1>
        </div>


        <?php
            if(isset($_POST['training'])) {
                echo $tr->training($_POST['training'],(int) $_POST['intensity']);
            }
        ?>

        <div class="bg-zinc-200 mt-6 py-5 px-4 rounded-lg">
            <form action="train.php" method="POST">
                <label for="name" class="block text-xl font-bold mb-1">Intensitas training</label>
                <p class="text-sm text-zinc-700">Seberapa lama Pokemon akan di training</p>
                <input type="number" name="intensity" id="intensity" value="1" min="1" class="bg-white placeholder:bg-white block">
                
                <label for="name" class="block text-xl mt-6 font-bold mb-1">Metode Pelatihan</label>
                <div class="flex flex-col gap-2">
                    <button class="bg-lime-100 border border-lime-500 cursor-pointer px-3 py-1 rounded-lg font-bold" type="submit" name="training" value="atk">
                        <h1 class="w-full text-lg text-left text-lime-800"><i class="bx bx-star"></i> Latihan Menyerang</h1>
                        <span class="text-sm text-left w-full block text-lime-600">Berlatih menyerang bersama kepin, akan meningkatkan stat atk</span>
                    </button>
                    <button class="bg-lime-100 border border-lime-500 cursor-pointer px-3 py-1 rounded-lg font-bold" type="submit" name="training" value="def">
                        <h1 class="w-full text-lg text-left text-lime-800"><i class="bx bx-shield"></i> Latihan Bertahan</h1>
                        <span class="text-sm text-left w-full block text-lime-600">Berlatih menahan sang.. maksudnya menahan serangan, akan meningkatkan stat def</span>
                    </button>
                    <button class="bg-lime-100 border border-lime-500 cursor-pointer px-3 py-1 rounded-lg font-bold" type="submit" name="training" value="speed">
                        <h1 class="w-full text-lg text-left text-lime-800"><i class="bx bx-time"></i> Latihan Kecepatan</h1>
                        <span class="text-sm text-left w-full block text-lime-600">Berlatih mengoco... berlari, akan meningkatkan stat speed</span>
                    </button>
                </div>
            </form>
        </div>

    </main>
    
</body>
</html>