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
    <title>History Training</title>
</head>
<body class="max-w-5xl w-full flex flex-col mx-auto overflow-x-hidden">
    
    <main class="flex flex-col gap-3 pt-6">
        <div>
            <h1 class="w-full text-5xl text-center">PokéCare</h1>

            <h2 class="mt-4 text-xl w-full text-center">Menu</h2>
            <div class="flex flex-row justify-center gap-5">
                <a class="bg-lime-500 px-5 py-1.5 rounded-xl" href="/">Home</a>
                <a class="bg-lime-500 px-5 py-1.5 rounded-xl" href="train.php">Training</a>
            </div>
        </div>

        <hr/>

        <div>
            <?php foreach($pk->getHistory() as $i => $h): ?>
                <div class="bg-zinc-300 px-4 py-3">
                    <h1 class="py-2"><?= $h['type'] ?></h1>
                    <th class="py-2"><?= $h['intensity'] ?></th>
                    <th class="py-2"><?= $h['level'][0] ?> -> <?= $h['level'][1] ?></th>
                    <th class="py-2"><?= $h['hp'][0] ?> -> <?= $h['hp'][1] ?></th>
                    <th class="py-2"><?= $h['duration'] ?> menit</th>
                </div>
            <?php endforeach; ?>
        </div>

        <form action="training-history.php" method="POST" class="mt-8">
            <button type="submit" name="reset" class="bg-rose-400 px-4 py-2 text-white">Reset Pokemon</button>
        </form>
    </main>

</body>
</html>