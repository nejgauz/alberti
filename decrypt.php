<?php
echo 'Производится расшифровка...' . PHP_EOL;

if (empty($argv[1])) {
    exit('Недостаточно аргументов');
}

$string = $argv[1];
$limit = mb_strlen($string, 'UTF-8');

$alphabet = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
$cryptoAlphabet1 = 'гдеёжзийклмнопрстуфхцчшщъыьэюяабв';
$cryptoAlphabet2 = 'ийклмнопрстуфхцчшщъыьэюяабвгдеёжз';
$cryptoAlphabet3 = 'жзийклмнопрстуфхцчшщъыьэюяабвгдеё';

$result = '';
for ($i = 0; $i < $limit; $i++) {
    $letter = mb_substr($string, $i, 1);
    if ($i % 3 === 0) {
        $position = mb_strripos($cryptoAlphabet1, $letter);
    } elseif ($i % 3 === 1) {
        $position = mb_strripos($cryptoAlphabet2, $letter);
    } else {
        $position = mb_strripos($cryptoAlphabet3, $letter);
    }
    if ($position !== false) {
        $result .= mb_substr($alphabet, $position, 1);
    } else {
        $result .= mb_substr($string, $i, 1);
    }
}

echo 'Результат: ' . PHP_EOL . $result . PHP_EOL;