<?php
echo 'Производится шифрование...' . PHP_EOL;

if (empty($argv[1]) || empty($argv[2]) || empty($argv[3]) || empty($argv[4])) {
    exit('Недостаточно аргументов');
}

$string = $argv[1];
$shift1 = (int)$argv[2];
$shift2 = (int)$argv[3];
$shift3 = (int)$argv[4];
$limit = mb_strlen($string, 'UTF-8');

$alphabet = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
$cryptoAlphabet1 = mb_substr($alphabet, $shift1) . mb_substr($alphabet, 0, $shift1);
$cryptoAlphabet2 = mb_substr($alphabet, $shift2) . mb_substr($alphabet, 0, $shift2);
$cryptoAlphabet3 = mb_substr($alphabet, $shift3) . mb_substr($alphabet, 0, $shift3);


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



