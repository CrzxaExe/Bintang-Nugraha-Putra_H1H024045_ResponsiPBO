<?php

require_once "./src/class/Pokemon.php";

$pk = new Venusaur();

if(isset($_POST['reset'])) {
    $pk->resetData();
}

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
    <title>History Training</title>
</head>
<body class="max-w-5xl w-full flex flex-col mx-auto overflow-x-hidden">

    <?php include "./src/views/header.html" ?>

    <main class="flex flex-col gap-3 pt-6">
        <div>
            <h1 class="text-3xl font-bold"><i class="bx bx-paper"></i>History <?= $pk->getName() ?></h1>
        </div>

        <div class="flex flex-col gap-4">
            <?php foreach($pk->getHistory() as $i => $h): ?>
                <div class="bg-zinc-200 px-4 py-3 rounded-xl">
                    <h1 class="text-2xl font-bold rounded-lg block w-fit">Training <?= $h['type'] ?></h1>

                    <div class="flex flex-row gap-2 mt-3 max-w-full">
                        <div class="flex flex-col gap-2 bg-white px-2 w-50 justify-center items-center py-3 rounded-xl">
                            <h5 class="text-sm text-zinc-600"><?= strtoupper($h['type'])  ?></h5>
                            <span class=""><?= $h['up'] ?></span>
                        </div>

                        <div class="flex flex-col gap-2 bg-white px-2 w-40 justify-center items-center py-3 rounded-xl">
                            <h5 class="text-sm text-zinc-600">Intensitas</h5>
                            <span class=""><?= $h['intensity'] ?></span>
                        </div>
                        
                        <div class="flex flex-col gap-2 bg-white px-2 w-40 justify-center items-center py-3 rounded-xl">
                            <h5 class="text-sm text-zinc-600">Level</h5>
                            <th class="text-3xl font-bold px-3 block"><?= $h['level'][0] ?> -> <?= $h['level'][1] ?></th>
                        </div>

                        <div class="flex flex-col gap-2 bg-white px-2 w-50 justify-center items-center py-3 rounded-xl">
                            <h5 class="text-sm text-zinc-600">Health</h5>
                            <th class="text-3xl font-bold px-3 block"><?= $h['hp'][0] ?> -> <?= $h['hp'][1] ?></th>
                        </div>
                        
                        <div class="flex flex-col gap-2 bg-white px-2 w-60 justify-center items-center py-3 rounded-xl">
                            <th class="text-3xl font-bold px-3 block">Durasi <?= $h['duration'] ?> Menit</th>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <form action="training-history.php" method="POST" class="mt-8">
            <button type="submit" name="reset" class="bg-rose-400 px-4 py-2 text-white">Reset Pokemon</button>
        </form>
    </main>

</body>
</html>