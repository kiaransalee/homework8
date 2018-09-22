<?php
session_start();


$username = $_SESSION['username'];


if (!empty($_GET['ca']) ) {

$ca = $_GET['ca'];
if ($ca < 2) {
    $rate = 'плохо';
} elseif ($ca > 1) {
    $rate = 'неплохо';
} elseif ($ca = 3) {
    $rate = 'отлично';
}

$text = $username . ",\n" . 'Вы ' . $rate . "\n" . 'знаете игровые миры' ;

$boxfile = __DIR__ . '/tes.png';
if (!file_exists($boxfile)) {
    echo 'Файл с картинкой не найден!';
    exit;
}




//Задаем ширину и высоту
$image = imagecreatefrompng ($boxfile);
//$backcolor = imagecolorallocate ($image, 240, 248, 255);
$textcolor = imagecolorallocate ($image, 139, 35, 35);


//Открываем файл фонового изображения

//imagefill($image, 0,0,$backcolor);
//imagecopy($image, $imBox, 100, 100, 0, 0, 256, 256);

$fontfile = __DIR__ . '/01.ttf';
if (!file_exists($fontfile)) {
    echo 'Файл со шрифтом не найден';
    exit;
}

imagettftext($image, 30, 0, 500, 400, $textcolor, $fontfile, $text);
header("Content-type: image/png");

imagepng($image);
imagedestroy($image);
}