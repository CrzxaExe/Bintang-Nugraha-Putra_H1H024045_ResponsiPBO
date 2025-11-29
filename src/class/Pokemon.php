<?php

abstract class Data {
    abstract public function loadData();
    abstract public function saveData(): void;
    abstract public function setData($data): void;
    abstract public function resetData(): void;
    abstract public function getHistory();
    abstract public function addHistory($data): void;
}

class Pokemon extends Data {
    private string $name;
    private int $level = 0;
    private array $type = [];

    // stats
    private int $hp = 0;
    private int $atk = 0;
    private int $def = 0;
    private int $speed = 0;

    // ability
    private array $ability = [];

    // training history
    private array $history = [];


    public function __construct() {
        $data = $this->loadData();

        $this->setData($data);
    }

    // Getter
    public function getName(): string {
        return $this->name;
    }
    public function getLevel(): int {
        return $this->level;
    }
    public function getType(): array {
        return $this->type;
    }
    public function getHp(): int {
        return $this->hp;
    }
    public function getAtk(): int {
        return $this->atk;
    }
    public function getDef(): int {
        return $this->def;
    }
    public function getSpeed(): int {
        return $this->speed;
    }
    public function getAbility(): array {
        return $this->ability;
    }

    // Setter
    protected function addLevel(int $value): void {
        $this->level += $value;
    }
    protected function setSpeed(int $value): void {
        $this->speed = $value;
    }
    protected function setDef(int $value): void {
        $this->def = $value;
    }
    protected function setAtk(int $value): void {
        $this->atk = $value;
    }
    protected function setHp(int $value): void {
        $this->hp = $value;
    }

    // Data
    public function loadData(string $filename = "data.json") {
        $data = [
            "pokemon" => "Venusaur",
            "level" => 0,
            "type" => ["plant", "poison"],
            "stats" => [
                "hp" => 80,
                "atk" => 82,
                "def" => 83,
                "speed" => 80
            ],
            "ability" => [],
            "history" => []
        ];

        if(file_exists($filename)) {
            $data = json_decode(file_get_contents($filename), true);
        }

        return $data;
    }
    public function setData($data): void {
        $this->name = $data["pokemon"];
        $this->level = $data["level"];
        $this->type = $data["type"];
        
        $this->hp = $data['stats']['hp'];
        $this->atk = $data['stats']['atk'];
        $this->def = $data['stats']['def'];
        $this->speed = $data['stats']['speed'];

        $this->ability = $data['ability'] ?? [];
        $this->history = $data['history'] ?? [];
    }
    public function saveData(): void {
        $data = [
            "pokemon" => (string)$this->name,
            "level" => (int)$this->level,
            "type" => (array)$this->type,
            "stats" => [
                "hp" => (int)$this->hp,
                "atk" =>(int) $this->atk,
                "def" => (int)$this->def,
                "speed" => (int)$this->speed
            ],
            "ability" => (array)$this->ability,
            "history" => (array)$this->history,
        ];

        $json = json_encode($data);

        file_put_contents("data.json", $json);
    }
    public function resetData(): void {
        $data = $this->loadData("data_back.json");
        $this->setData($data);
        $this->saveData();
    }
    public function getHistory() {
        return $this->history;
    }
    public function addHistory($data): void {
        $this->history[] = $data;
    }

    // Moveset
    public function getMove(): array {
        return $this->ability;
    }
    protected function setMove(array $data): void {
        foreach($data as $move) {
            $this->ability[] = $move;
        }

        $this->saveData();
    }
    public function training(string $type, int $intensity): string {
        return "";
    }
}

class Venusaur extends Pokemon {
    public function __construct() {
        parent::__construct();
    }

    public function training(string $type, int $intensity): string {
        $up = 0;
        $hp = $this->getHp() + (30 * $intensity);

        switch($type) {
            case "speed":
                $up = $this->getSpeed() + ($intensity * 2);
                $this->setSpeed($up);
                break;
            case "def":
                $up = $this->getDef() + $intensity;
                $this->setDef($up);
                break;
            case "atk":
                $up = $this->getAtk() + ($intensity * 3);
                $this->setAtk($up);
                break;
        }

        $this->addHistory([
            "type" => $type,
            "intensity" => $intensity,
            "up" => $up,
            "level" => [0 => $this->getLevel(), 1 => $this->getLevel() + $intensity],
            "hp" => [0 => $this->getHp(), 1 => $hp],
            "duration" => $intensity * 20
        ]);

        $move = $this->getSpecialMove($this->getLevel() + $intensity);
        $this->setMove($move);
        $getMove = count($move) > 0 ?"<br/><br/>Mempelajari move baru: " . implode(", ", $move) : "";

        $this->setHp($hp);
        $this->addLevel($intensity);

        $this->saveData();

        $str = "<p class='bg-zinc-200 px-5 py-4 rounded-lg mt-4 font-semibold'>Training berhasil, pokemonmu naik level ke {$this->getLevel()}<br/>Hp -> {$hp}<br/>Stat {$type} -> {$up}{$getMove}</p>";
        return $str;
    }

    public function getSpecialMove(int $lvl): array {
        $moves = [
            [ "lvl" => 1, "ability" => ["Growl", "Tackle"]],
            [ "lvl" => 3, "ability" => ["Vine Whip"]],
            [ "lvl" => 6, "ability" => ["Growth"]],
            [ "lvl" => 9, "ability" => ["Leech Seed"]],
            [ "lvl" => 12, "ability" => ["Razor Leaf"]],
            [ "lvl" => 15, "ability" => ["Poison Powder", "Sleep Powder"]],
            [ "lvl" => 25, "ability" => ["Take Down"]],
            [ "lvl" => 30, "ability" => ["Magical Leaf"]],
            [ "lvl" => 35, "ability" => ["Synthesis"]],
            [ "lvl" => 40, "ability" => ["Amnesia"]],
            [ "lvl" => 42, "ability" => ["Sludge Wave"]],
            [ "lvl" => 45, "ability" => ["Double-Edge"]],
            [ "lvl" => 55, "ability" => ["Solar Beam"]],
        ];

        $filtered = array_filter($moves, function($v, $k) use ($lvl) {
            return $v['lvl'] <= $lvl;
        }, ARRAY_FILTER_USE_BOTH);

        $map = [];

        $current = $this->getMove();
        $lowerCurrent = array_map('strtolower', $current);

        foreach ($filtered as $val) {
            foreach ($val['ability'] as $ability) {
                if (in_array(strtolower($ability), $lowerCurrent, true)) continue;
                $map[] = $ability;
            }
        }

        return array_values(array_unique($map));
    }
}