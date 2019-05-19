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

function lookingGroupPlaces($map, $required_places) {
    $step = 0;
    $row = 0;
    $arr =[];
    for($i = 0; $i <count($map) ;$i++ ){
        for($j = 0; $j <count ($map[$i]); $j++) {
            if($step !== $required_places) {
                if($map[$i][$j] === FALSE) {
                    $step++;
                    $row = $i + 1;
                    $arr[] = $j + 1;
                }else {
                    $step = 0;
                    $arr = [];
                }
            } 
        } 
    }

    if(count($arr) == $required_places){
        echo "Посадочные места на $required_places персон! <br> ";
        for($i = 0;$i <count($arr); $i++){
            echo "Номер ряда $row , место $arr[$i] <br>";
        }
    } else {
        echo "Мест нет";
    }
}

$map = generate(2, 8, 50);
$row = 1;
$place = 1;
$required_places = 5;

$reverve = reserve($map, $row, $place);
//logReserve($row, $place, $reverve);

//$reverve = reserve($map, $row, $place);
//logReserve($row, $place, $reverve);*/

lookingGroupPlaces($map,$required_places);