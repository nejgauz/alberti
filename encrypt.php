<?php
echo 'Производится шифрование...' . PHP_EOL;

if (empty($argv[1]) || empty($argv[2]) || empty($argv[3])) {
    exit('Недостаточно аргументов' . PHP_EOL);
}

$string = $argv[1];
$alphabetQuantity = (int)$argv[2];
$shifts = explode(' ', $argv[3]);

if (count($shifts) !== $alphabetQuantity) {
    exit('Количество алфавитов не совпадает с количеством смещений' . PHP_EOL);
}

$alphabet = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
foreach ($shifts as $index => $shift) {
    $shift = $shift % 33;
    ${"alphabet$index"} = mb_substr($alphabet, $shift) . mb_substr($alphabet, 0, $shift);
}

$result = '';
$limit = mb_strlen($string, 'UTF-8');
for ($i = 0; $i < $limit; $i++) {
    $letter = mb_substr($string, $i, 1);
    $position = mb_strripos($alphabet, $letter);
    if ($position !== false) {
        $j = $i % $alphabetQuantity;
        $result .= mb_substr(${"alphabet$j"}, $position, 1);
    } else {
        $result .= mb_substr($string, $i, 1);
    }
}

echo 'Результат: ' . PHP_EOL . $result . PHP_EOL;



