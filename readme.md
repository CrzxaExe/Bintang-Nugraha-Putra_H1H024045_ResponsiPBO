# Tugas Responsi PBO

```
Nama        : Bintang Nugraha Putra
NIM         : H1H024045
Shift Awal  : B
Shift Akhir : C
```

## Cara menjalankan aplikasi

Pertama-tama unduh repo ini dulu yaitu dengan ketik ini pada terminal:

```bash
git clone
```

Pindahkan folder tersebut ke dalam `www`(untuk laragon) atau `htdocs`(untuk xampp), open apache dan buka pada browser masing-masing, jika masih belum bisa kan ada youtube.

## Pillar OOP

- Enkapsulasi

Enkapsulasi sendiri merupakan sebuah konsep yang menyatukan antara atribut dan juga fungsi yang dibungkus menjadi satu

```php
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

   ...

    protected function addLevel(int $value): void {}
    protected function setSpeed(int $value): void {}
    protected function setDef(int $value): void {}
    protected function setAtk(int $value): void {}
    protected function setHp(int $value): void {}

    public function loadData(string $filename = "data.json") {}
    public function setData($data): void {}
    public function saveData(): void {}
    public function resetData(): void {}
    public function getHistory() {}
    public function addHistory($data): void {}

    ...

}
```

- Pewarisan

Konsep ini memungkinkan sebuah kelas untuk mewarisi atribut atau method yang dimiliki oleh kelas yang sudah ada.

```php
class Pokemon extends Data {...}
class Venusaur extends Pokemon {...}
```

- Abstraksi

Konsep ini hanya mendefinisikan bentuk dari class yang akan diturunkan. Menjadi pondasi properti dan method yang akan dimiliki oleh class yang mengimplementasikan.

```php
abstract class Data {
    abstract public function loadData();
    abstract public function saveData(): void;
    abstract public function setData($data): void;
    abstract public function resetData(): void;
    abstract public function getHistory();
    abstract public function addHistory($data): void;
}
```

- Polimofisme

Konsep ini menjelaskan tentang kemampuan sebuah object yang dapat merespon metode yang sama dengan cara yang berbeda.

```php
class Pokemon extends Data {
    ...
    public function training(string $type, int $intensity): string;
}

class Venusaur extends Pokemon {
    ...

    public function training(string $type, int $intensity): string;
}
```

## Penjelasan Singkat Kode

### Class Data

Sebuah class abstrak yang akan menjadi dasar untuk class Pokemon agar dapat menyimpan, mengatur, dan membaca data dari file `data.json` ataupun lainnya

### Class Pokemon

Sebuah class yang memiliki atribut yang mendeskripsikan statistik pokemon tersebut gunanya untuk mengambil menyediakan data yang diperlukan dan menjalankan fungsi utama dari program.<br/>
Terdapat getter dan setter untuk mengolah data:

```php
class Pokemon extends Data {
    ...

    // Getter
    public function getName(): string {}
    public function getLevel(): int {}
    public function getType(): array {}
    public function getHp(): int {}
    public function getAtk(): int {}
    public function getDef(): int {}
    public function getSpeed(): int {}
    public function getMove(): array {}

    // Setter
    protected function addLevel(int $value): void {}
    protected function setSpeed(int $value): void {}
    protected function setDef(int $value): void {}
    protected function setAtk(int $value): void {}
    protected function setHp(int $value): void {}
    protected function setMove(array $data): void {}

    ...
}
```

Dan juga terdapat implementasi dari kelas abstrak yaitu Data:

```php
class Pokemon extends Data {
    ...

    public function loadData() {}
    public function saveData(): void {}
    public function setData($data): void {}
    public function resetData(): void {}
    public function getHistory() {}
    public function addHistory($data): void {}


    ...
}
```

### Class Venusaur

Merupakan kelas turunan dari pokemon yang berarti kelas ini akan memiliki semua method dan properti yang ada pada kelas indukan yaitu kelas Pokemon. Ini hanya memiliki 2 method utama yaitu training dan getSpecialMove.<br/>

- Method training()

> Pada kelas pokemon, method ini belum di implementasikan karena pokemon sendiri harus memiliki sebuah turunana(element/identtas) dulu agar dapat ditraining. Method ini akan menjalankan program untuk leveling dan menghasilkan string yang akan digunakan untuk feedback pada halaman train.

- Method getSpecialMove()

> Method ini akan mengembalikan array yang berisi moveset yang bisa didapatkan saat mencapai level tertentu. Tidak ada moveset duplikat pada keluarannya.

## Demo Singkat Aplikasi

![]

Segini ajah, gada bantuan AI sejadinya aja
