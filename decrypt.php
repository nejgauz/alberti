<?php
echo 'Производится расшифровка...' . PHP_EOL;

if (empty($argv[1]) || empty($argv[2]) || empty($argv[3])) {
    exit('Недостаточно аргументов');
}

$string = $argv[1];
$alphabetQuantity = (int)$argv[2];
$shifts = explode(' ', $argv[3]);

if (count($shifts) !== $alphabetQuantity) {
    exit('Количество алфавитов не совпадает с количеством смещений');
}

$alphabet = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
foreach ($shifts as $index => $shift) {
    ${"alphabet$index"} = mb_substr($alphabet, $shift) . mb_substr($alphabet, 0, $shift);
}

$result = '';
$limit = mb_strlen($string, 'UTF-8');
for ($i = 0; $i < $limit; $i++) {
    $letter = mb_substr($string, $i, 1);
    $j = $i % $alphabetQuantity;
    $position = mb_strripos(${"alphabet$j"}, $letter);
    if ($position !== false) {
        $result .= mb_substr($alphabet, $position, 1);
    } else {
        $result .= mb_substr($string, $i, 1);
    }
}

echo 'Результат: ' . PHP_EOL . $result . PHP_EOL;