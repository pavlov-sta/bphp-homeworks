<?php

function generate($rows, $placesPerRow, $avaliableCount) {
    $arr = [];
    for($i = 0; $i < $rows; $i++){
        for($j = 0; $j < $placesPerRow; $j++) {
            $arr[$i][$j] = FALSE;
        } 
    }
    if ($rows * $placesPerRow > $avaliableCount) {
        return FALSE;
    } else {
        return $arr;
    }
};

function reserve(&$map, $row, $place) {
    if($map[$row-1][$place-1] === FALSE) {
             $map[$row-1][$place-1] = TRUE;
            return TRUE;
    }   else {
            return FALSE;
    }
}

function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place <br>".PHP_EOL;
    } else {
        echo "Что-то пошло не так =( Бронь не удалась<br>".PHP_EOL;
    }
}

$map = generate(5, 8, 50);
$row = 3;
$place = 5;

$reverve = reserve($map, $row, $place);
logReserve($row, $place, $reverve);

$reverve = reserve($map, $row, $place);
logReserve($row, $place, $reverve);