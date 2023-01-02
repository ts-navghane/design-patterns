<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Flyweight\DB\CatDataBase;

$db = new CatDataBase();

echo "Client: Let's see what we have in \"cats.csv\".\n";

// To see the real effect of the pattern, you should have a large database with
// several millions of records. Feel free to experiment with code to see the
// real extent of the pattern.
$handle  = fopen(__DIR__.'/Input/cats.csv', 'rb');
$row     = 0;
$columns = [];

while (($data = fgetcsv($handle)) !== false) {
    if ($row === 0) {
        for ($c = 0, $cMax = count($data); $c < $cMax; $c++) {
            $columnIndex         = $c;
            $columnKey           = strtolower($data[$c]);
            $columns[$columnKey] = $columnIndex;
        }
        $row++;
        continue;
    }

    $db->addCat(
        $data[$columns['name']],
        $data[$columns['age']],
        $data[$columns['owner']],
        $data[$columns['breed']],
        $data[$columns['image']],
        $data[$columns['color']],
        $data[$columns['texture']],
        $data[$columns['fur']],
        $data[$columns['size']],
    );
    $row++;
}
fclose($handle);

echo "\nClient: Let's look for a cat named \"Siri\".\n";
$cat = $db->findCat(['name' => 'Siri']);
$cat?->render();

echo "\nClient: Let's look for a cat named \"Bob\".\n";
$cat = $db->findCat(['name' => 'Bob']);
$cat?->render();
