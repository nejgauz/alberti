<?php
echo 'Производится шифрование...' . PHP_EOL;

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
    $position = mb_strripos($alphabet, $letter);
    if ($position !== false) {
        if ($i % 3 === 0) {
            $result .= mb_substr($cryptoAlphabet1, $position, 1);
        } elseif ($i % 3 === 1) {
            $result .= mb_substr($cryptoAlphabet2, $position, 1);
        } else {
            $result .= mb_substr($cryptoAlphabet3, $position, 1);
        }
    } else {
        $result .= mb_substr($string, $i, 1);
    }
}

echo 'Результат: ' . PHP_EOL . $result . PHP_EOL;



